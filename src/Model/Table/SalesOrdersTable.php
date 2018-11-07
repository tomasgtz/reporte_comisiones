<?php
namespace App\Model\Table;

use Cake\Core\Exception\Exception;

class SalesOrdersTable
{

    private $instance_url = "https://sdindustrial.sugarondemand.com/rest/v10";
    
    private $username = "admin";
    
    private $password = "c9MnLnWW";
    
    private $salesman = ['JCarlosMartinez'=>  ['first_name' => 'Juan Carlos',
                                              'last_name'  => 'Martinez'],
                         'gerardo.garcia'=>   ['first_name' => 'Gerardo',
                                              'last_name'  => 'Garcia'],
                         'Miguel San Román'=> ['first_name' => 'Miguel',
                                               'last_name'  => 'San Roman'],
                         'Amtz'=>             ['first_name' => 'Alejandro',
                                               'last_name'  => 'Martinez']
        
                        ];                        
    public $invoices;

	public $kits;
    
    public $commissions;
    
    public $total_commission;
    
    public static function defaultConnectionName() {
        return 'contpaq';
    }
    
    public function sum_commission($amount) {
        
        $this->total_commission += (float)$amount;
    }

    private function authenticate() {
        
        if(!isset($_SESSION['sugar_token']) ||  $_SESSION['sugar_token'] == '') {
            //Login - POST /oauth2/token
            $auth_url = $this->instance_url . "/oauth2/token";
            
            $oauth2_token_arguments = array(
                "grant_type" => "password",
                //client id - default is sugar.
                //It is recommended to create your own in Admin > OAuth Keys
                "client_id" => "sugar",
                "client_secret" => "",
                "username" => $this->username,
                "password" => $this->password,
                //platform type - default is base.
                //It is recommend to change the platform to a custom name such as "custom_api" to avoid authentication conflicts.
                "platform" => "custom_api"
            );
            
            $auth_request = curl_init($auth_url);
            curl_setopt($auth_request, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
            curl_setopt($auth_request, CURLOPT_HEADER, false);
            curl_setopt($auth_request, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($auth_request, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($auth_request, CURLOPT_FOLLOWLOCATION, 0);
            curl_setopt($auth_request, CURLOPT_HTTPHEADER, array(
                "Content-Type: application/json"
            ));
            
            //convert arguments to json
            $json_arguments = json_encode($oauth2_token_arguments);
            curl_setopt($auth_request, CURLOPT_POSTFIELDS, $json_arguments);
            
            //execute request
            $oauth2_token_response = curl_exec($auth_request);
            
            //decode oauth2 response to get token
            $oauth2_token_response_obj = json_decode($oauth2_token_response);
            $oauth_token = $oauth2_token_response_obj->access_token;
            
            $_SESSION['sugar_token'] = $oauth_token;
            
            return $oauth_token;
        } else {
            return $_SESSION['sugar_token'];
        }
        
    }
    
    private function getNewToken() {
        
        unset($_SESSION['sugar_token']);
        return $this->authenticate();
    }
    
    
    /*
     * Funcion para traer del sugar nuevo la lista de pedidos
     * recibe un agente y regresa un arreglo de pedidos como objeto
     * 
     * */
    public function getSO($salesman, $paid) {
        
        $oauth_token = $this->authenticate();
        
        if($paid == 1) {
            $paid_a = ['$in' => ['1']];
        } else {
            $paid_a = ['$in' => ['','0']];
        }
        
        $filter_url = $this->instance_url . "/Opportunities/filter";
        /// "name", account name  {"name":"opportunities_assigned_user", "fields": ["full_name"]}
        $filter_arguments = [
            "filter" => [ '$and' => [
										 "etapa_principal_c" => 'ganada',
                                         "assigned_user_link.first_name" => $this->salesman[$salesman]['first_name'],
                                         "assigned_user_link.last_name"  => $this->salesman[$salesman]['last_name'],
                                         "commission_paid_c" => $paid_a 
                                    ]
                        ] ,
            "max_num" => 200,
            "offset" => 0,                                                               
            //"fields" => 'id,folio_c,num_orden_compra_cliente_c,accounts_opportunities_1_name,assigned_user_name,date_processed_c,numero_factura_c,purchase_order_num_c,monto_oportunidad_c,name,assigned_user_name,commission_paid_c,commission_pay_date_c,commission_perc_c,currency_id', 
			"fields" => 'id,folio_c,num_orden_compra_cliente_c,account_name,assigned_user_name,date_processed_c,numero_factura_c,purchase_order_num_c,monto_oportunidad_c,name,assigned_user_name,commission_paid_c,commission_pay_date_c,commission_perc_c,currency_id', 
            //"view" => "record",
            "favorites" => false,
            "my_items" => false,
        ];
        
        
        $filter_request = curl_init($filter_url);
        curl_setopt($filter_request, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
        curl_setopt($filter_request, CURLOPT_HEADER, false);
        curl_setopt($filter_request, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($filter_request, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($filter_request, CURLOPT_FOLLOWLOCATION, 0);
        curl_setopt($filter_request, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json",
            "oauth-token: {$oauth_token}"
        ]);     
        
        $json_arguments = json_encode($filter_arguments);
//var_dump($json_arguments );
//var_dump($oauth_token	);
        curl_setopt($filter_request, CURLOPT_POSTFIELDS, $json_arguments);
        
        $filter_response = curl_exec($filter_request);
        
        $filter_response_obj = json_decode($filter_response);
        
        if(isset($filter_response_obj->error)) {
            
            if( $filter_response_obj->error == 'invalid_grant' ) {
                $this->getNewToken();
                $this->getSO($salesman, $paid);
            }
        }
        
        $export_ids = [];
        foreach ($filter_response_obj->records as $record) {            
          
            $export_ids[] = $record;
            set_time_limit(300);
        }
        
        return $export_ids;
      
    }
    
    
    
    private function getSelected($list) {
        
        $oauth_token = $this->authenticate();
        
        
        foreach ($list as $id => $so) {
       
            if(isset($so['check']) && $so['check'] == '1') {
                $list_so[] = $so['id'];
            }
        }
       
        
        $filter_url = $this->instance_url . "/Opportunities/filter";
        /// "name", account name  {"name":"opportunities_assigned_user", "fields": ["full_name"]}
        $filter_arguments = [
            "filter" => [ '$and' => [
                                    "id" =>   ['$in' => $list_so] 
                                    ]
                        ] ,
            "max_num" => 200,
            "offset" => 0,
            //"fields" => 'id,folio_c,num_orden_compra_cliente_c,accounts_opportunities_1_name,assigned_user_name,date_processed_c,numero_factura_c,purchase_order_num_c,monto_oportunidad_c,name,assigned_user_name,commission_paid_c,commission_pay_date_c,currency_id',
			"fields" => 'id,folio_c,num_orden_compra_cliente_c,account_name,assigned_user_name,date_processed_c,numero_factura_c,purchase_order_num_c,monto_oportunidad_c,name,assigned_user_name,commission_paid_c,commission_pay_date_c,currency_id',
            //"view" => "record",
            "favorites" => false,
            "my_items" => false,
        ];
        
        
        $filter_request = curl_init($filter_url);
        curl_setopt($filter_request, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
        curl_setopt($filter_request, CURLOPT_HEADER, false);
        curl_setopt($filter_request, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($filter_request, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($filter_request, CURLOPT_FOLLOWLOCATION, 0);
        curl_setopt($filter_request, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json",
            "oauth-token: {$oauth_token}"
            ]);
        
        $json_arguments = json_encode($filter_arguments);
        
        curl_setopt($filter_request, CURLOPT_POSTFIELDS, $json_arguments);
        
        $filter_response = curl_exec($filter_request);
        
        $filter_response_obj = json_decode($filter_response);
        
        if(isset($filter_response_obj->error)) {
            
            if( $filter_response_obj->error == 'invalid_grant' ) {
                $this->getNewToken();
                $this->getSelected($list);
            } else {
                debug("Error al traer registros del Sugar");
                die;
            }
        }
        
        $export_ids = [];
        foreach ($filter_response_obj->records as $record) {
            
            $export_ids[] = $record;
            set_time_limit(300);
        }
        
        
        return $export_ids;
        
    }
    
    
    /*
     * Cada pedido del sugar tiene un campo de factura, el cual es un string que a veces trae varias facturas separadas por un /
     * esta funcion las separa y aparte del arreglo de facturas (objetos) saca los datos
     * 
     * en resumen regresa el mismo arreglo de pedidos pero con su lista de facturas llena
     * 
     * */
    public function splitInvoices(&$arr) {
       
        foreach ($arr as $id => $so) {
            
            @$so->commission = 0;
            
            $invoices = explode('/', $so->numero_factura_c);
            
            $invoices_total = 0;
            $invoices_cost = 0;
            
            if(is_array($invoices)) { 
                
                $inv = [];
                
                foreach($invoices as $k => $v) {
                    
                    $v = strtoupper($v);
                    
                    if(empty($v)) {
                        continue;
                    }
                    
                    $sub1 = substr($v, 0, 1);
                    $sub4 = substr($v, 0, 4);
                    $sub5 = substr($v, 0, 5);
                    
                    if( "FFMCH" === $sub5 || "FFCMH" === $sub5 || "FCMH"  === $sub4 ) {
                        
                        $inv[$k]['serie'] = 'FCMH';
                        
                    } else if ( "FFCTR" === $sub5 || "FCTR" === $sub4   ) {
                        
                        $inv[$k]['serie'] = 'FCTR';
                    
                    } else if ( "A" === $sub1 || strlen($v) == 5 ) {
                        
                        $inv[$k]['serie'] = 'A';
                    
                    }
                    
                    try {
                        if(!empty($v)) {
                            preg_match_all('!\d+!', $v, $matches);
                            
                            $inv[$k]['folio'] = $matches !== FALSE ? $matches[0][0] : '';
                            
                            if( isset($inv[$k]['serie']) && isset($inv[$k]['folio']) ) {
                                $index = $inv[$k]['serie'].(int)$inv[$k]['folio'];
                            
                                set_time_limit(300);
                                if(isset($this->invoices[$index])) {
                                    
                                    $inv[$k]['paid'] = "Pagada";
                                    
                                    if($this->invoices[$index]->CPENDIENTE > 0) {
                                        $inv[$k]['paid'] = "Pendiente";
                                    }
                                    
                                    if($this->invoices[$index]->CCANCELADO == 1) {
                                        $inv[$k]['paid'] = "Factura Cancelada";
                                        $inv[$k]['tcambio'] = 0;
                                        $inv[$k]['total_siva'] = 0;
                                        $inv[$k]['cost'] = 0.001;
                                        $inv[$k]['margin_mxn'] = 0;
                                        $inv[$k]['margin_perc'] = 0;
                                    } else {
                                    
                                        $inv[$k]['tcambio'] = $this->invoices[$index]->CTIPOCAMBIO;
                                        
                                        $inv[$k]['total_siva'] = $this->invoices[$index]->CNETO;
                                        
                                        if($this->invoices[$index]->CIDMONEDA == 2) {
                                            
                                            $subtotal = $this->invoices[$index]->CNETO * $inv[$k]['tcambio'];   
                                            $inv[$k]['total_siva'] = $subtotal;
                                        }
                                        
                                        $inv[$k]['cost'] = $this->getInvoiceCosts($this->invoices[$index]);
                                        
                                        $invoices_total += $inv[$k]['total_siva'];
                                        $invoices_cost += $inv[$k]['cost'];
                                        
                                        $inv[$k]['margin_mxn'] = $inv[$k]['total_siva'] - $inv[$k]['cost'];
                                        
                                        $inv[$k]['margin_perc'] = ($inv[$k]['margin_mxn'] / ($inv[$k]['total_siva'] == 0 ? 0.0001 : $inv[$k]['total_siva'])) * 100;
                                        
                                        $so->commission += ($this->commissions[ $so->folio_c ] / 100 ) * $inv[$k]['margin_mxn'];
                                    }
                                } else {
                                
                                    if($inv[$k]['serie'] == 'A') {
                                        
                                        $inv[$k]['paid'] = "Factura SAI.";
                                        $inv[$k]['total_siva'] = "Factura SAI.";
                                        $inv[$k]['cost'] = "Factura SAI.";
                                        $inv[$k]['margin_mxn'] = "Factura SAI.";
                                        $inv[$k]['margin_perc'] = "Factura SAI.";
                                        $inv[$k]['commission'] = "Factura SAI.";
                                        
                                    } else {
                                        $inv[$k]['paid'] = "La Factura tiene otro agente";
                                        $inv[$k]['total_siva'] = "La Factura tiene otro agente";
                                        $inv[$k]['cost'] = "La Factura tiene otro agente";
                                        $inv[$k]['margin_mxn'] = "La Factura tiene otro agente";
                                        $inv[$k]['margin_perc'] = "La Factura tiene otro agente";
                                        $inv[$k]['commission'] = "La Factura tiene otro agente";
                                    }
                                }
                            } else {
                            
                                $inv[$k]['paid'] = "No se encontró factura";
                                $inv[$k]['total_siva'] = "No se encontró factura";
                                $inv[$k]['cost'] = "No se encontró factura";
                                $inv[$k]['margin_mxn'] = "No se encontró factura";
                                $inv[$k]['margin_perc'] = "No se encontró factura";
                                $inv[$k]['commission'] = "No se encontró factura";
                            }
                        } 
                    } catch(Exception $e) {
                        echo 'Excepción: '.  $e->getMessage(). " VALOR $v \n";
                    }
                    
                }
                
                $so->margin = 0;
                $so->margin_perc = 0;
                
                if($invoices_total != 0) {
                    $so->margin = $invoices_total - $invoices_cost;
                    $so->margin_perc = (($invoices_total - $invoices_cost ) / $invoices_total) * 100;
                }
                
                $so->invoices = $inv;
            }
            
            $this->sum_commission($so->commission);
        }
        
    }
    
    /*
     * Funcion para traer los pedidos del sugar.
     * Ya trae las facturas como una lista de objetos y cada factura como objeto ya trae todo de contpaq
     * 
     * */
    public function getSOWithInvoices($salesman, $paid, $invoices, $kits) {
        
        $this->invoices = $invoices;

		$this->kits = $kits;

        $list = [];
        $list = $this->getSO($salesman, $paid);
        
        if(is_array($list) && count($list) > 0) {
            $this->splitInvoices($list);
        }
        
        return $list;
    }
    
    public function getSelectedSOs($sos_selected, $invoices, $commissions_selected) {
        
        $this->invoices = $invoices;
        $this->commissions = $commissions_selected;
        
        $list = [];
        $list = $this->getSelected($sos_selected);
        
        if(is_array($list) && count($list) > 0) {
            $this->splitInvoices($list);
        }
        
        return $list;
        
    }
    
    
    
    /*
     * Funcion para traer los costos de una factura,
     * va a sus movimientos y suma los costos
     * 
     */
    function getInvoiceCosts($invoice) {
        //var_dump($invoice);
        $cost = 0;
        if(isset($invoice->invoices_details) && is_array($invoice->invoices_details) && count($invoice->invoices_details) > 0) {
            
            foreach($invoice->invoices_details as $id => $detail) {
                $cost += $detail->CCOSTOESPECIFICO;
            }
        }
        
		// also add the cost of kits within the invoice

		$cost += $this->kits[$invoice->CSERIEDOCUMENTO.(int)$invoice->CFOLIO];

        return $cost;
    }
    
    public function save($sos, $commissions_selected) {
        
        foreach ($sos as $id => $so) {
            
            if(true === $this->saveOneByOne($id, $so, $commissions_selected[$id])) {
               continue;
           } else {
               return false;
           }
        }
 
        return true;
    }
    
    
    public function saveOneByOne($id, $commission_paid, $commission_perc) {
        
        $record = new Record();
        $oauth_token = $this->authenticate();
        
        $record->id = $id;
        //Update Record - PUT /<module>/:record
        $url = $this->instance_url . "/Opportunities/$id";
        //Set up the Record details
        //$record->name = 'Updated Test Record';
        $record->commission_paid_c = $commission_paid;
        $record->commission_pay_date_c = date('Y-m-d');
        $record->commission_perc_c = $commission_perc;
        
        if($commission_paid == 0) {
            $record->commission_pay_date_c = '';
            $record->commission_perc_c = '';
        }
       
        set_time_limit(300);
        $curl_request = curl_init($url);
        curl_setopt($curl_request, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($curl_request, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
        curl_setopt($curl_request, CURLOPT_HEADER, false);
        curl_setopt($curl_request, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl_request, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_request, CURLOPT_FOLLOWLOCATION, 0);
        curl_setopt($curl_request, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
            "oauth-token: {$oauth_token}"
        ));
        
        $json_arguments = json_encode($record);
        curl_setopt($curl_request, CURLOPT_POSTFIELDS, $json_arguments);
       
        $curl_response = curl_exec($curl_request);
        
        $updatedRecord = json_decode($curl_response);
       
        if(isset($updatedRecord->error)) {
            
            if( $updatedRecord->error == 'invalid_grant' ) {
                $this->getNewToken();
                $this->saveOneByOne($id, $commission_paid, $commission_perc);
            } else {
                debug("Error al traer registros del Sugar");
                die;
            }
        }
        
        curl_close($curl_request);
        
        return true;
    }
    
    public function selectedSOs($sos) {
        
        if(is_array($sos) && count($sos) > 0) {
            
            foreach($sos as $id => $so) {
                if(isset($so['check'])) {
                    
                    return true;
                }
            }
            
        }
            
        return false;
    }
    
}

?>