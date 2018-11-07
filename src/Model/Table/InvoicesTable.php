<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class InvoicesTable extends Table
{
    
    public static function defaultConnectionName() {
        return 'contpaq';
    }

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('admDocumentos');
        $this->setPrimaryKey('CIDDOCUMENTO');   
        $this->setDisplayField('CIDDOCUMENTO');
        
        
        $this->hasMany('InvoicesDetails', [
            'foreignKey' => 'CIDDOCUMENTO',
            'joinType' => 'INNER',
            'className' => 'InvoicesDetails'
        ]);
        
        $this->hasOne('Agentes', [
             'foreignKey' => 'CIDAGENTE',
             'joinType' => 'INNER',
             'className' => 'Agentes',
            'bindingKey' => 'CIDAGENTE'
            
        ]);
        
        
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('CIDDOCUMENTO')
            ->allowEmpty('CIDDOCUMENTO', 'create');

       
        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        
        return $rules;
    }
    
    public function findAllMyInvoices( $agente_name ) {
        
        $invoicesList = [];
        $invoices = $this->find('all')->where(
            
            [ 
              'OR' => [ 
                        ['Invoices.CSERIEDOCUMENTO' => 'FCMH'], 
                        ['Invoices.CSERIEDOCUMENTO' => 'FCTR'] 
                      ], 
                'AND' => [['Agentes.CNOMBREAGENTE' => $agente_name]]
              ]
            
        
            )->contain(['Invoicesdetails'])
         ->contain(['Agentes']);
        
         //echo $invoices->sql();
         //echo $invoices->count();
         
        foreach ( $invoices as $invoice) {
            
            set_time_limit(30);
            
            $arr = $invoice->invoices_details;
            $totalCCOSTOESPECIFICO = 0;
            $totalCNETO = 0;
            
            if(is_array($arr) ) {
                
                foreach($arr as $k => $v) {
                    
                    $totalCCOSTOESPECIFICO += $v->CCOSTOESPECIFICO;
                    
                    if($v->CNETO < 0) {
                        $v->CNETO = 0;
                    }
                    $totalCNETO += $v->CNETO;
                } 
            }
            
            
            $invoice->totalCCOSTOESPECIFICO = $totalCCOSTOESPECIFICO;
            $invoice->totalCNETO = $totalCNETO;
            
            $invoicesList[$invoice->CSERIEDOCUMENTO.$invoice->CFOLIO] = $invoice;
            
            
        }
     
        
        return $invoicesList;
       
    }
    
    
    public function search() {
        
        //debug($this->InvoicesDetails);
    }
    
   
}
