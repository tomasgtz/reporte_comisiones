<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use App\Model\Table\InvoicesTable;


class SalesOrdersController extends AppController
{
    
    public function initialize() {
        
        ini_set('memory_limit', '4096M');
        parent::initialize();
    }
    
    
    public function search()
    {
        $this->loadModel('ListaDeAgentes');
        
        $this->set('agentes', $this->ListaDeAgentes->getListaForSearch());
        $this->set('status', ['sinpagar'=>'Sin pagar','pagado'=>'Pagado']);
        $this->set('filter', $this->request);
        
    }
    
   
    public function results()
    {
        $this->loadModel('Invoices');
		$this->loadModel('InvoicesDetailsKit');
        $this->loadModel('ListaDeAgentes');
        
        $lista = $this->ListaDeAgentes->getLista();
        $agente = $lista[ $this->request->getData('agente') ];
        
        $invs = $this->Invoices->findAllMyInvoices( $agente ); 
		$invs_kits = $this->InvoicesDetailsKit->findAllKitsWithCosts( $invs ); 

        $paid = ($this->request->getData('status') == 'pagado' ? 1 : 0);
        $paid_label = $this->request->getData('status');
        $agente = $this->request->getData('agente');
        
        $sos = $this->Salesorders->getSOWithInvoices( $agente, $paid, $invs, $invs_kits ); 
        
       
        $this->set('sos', $sos);
        $this->set('agente_label', $agente);
        $this->set('pagadas', $paid_label);
        
    }
    
    
    public function togglePaid() {
        
        $this->loadModel('Invoices');
        $this->loadModel('ListaDeAgentes');
        
        $lista = $this->ListaDeAgentes->getLista();
        $agente = $lista[ $this->request->getData('agente') ];
        $invs = $this->Invoices->findAllMyInvoices( $agente );
        
        $sos_selected = $this->request->getData('quote_num');
        
        
        if( $this->Salesorders->selectedSOs($sos_selected) ) {
            $paid_label = $this->request->getData('status');
            $commissions_selected = $this->request->getData('commission');
            
            $sos = $this->Salesorders->getSelectedSOs( $sos_selected, $invs, $commissions_selected ); 
            
            $this->set('sos', $sos);
            $this->set('agente_label', $agente);
            $this->set('pagadas', $paid_label);
            $this->set('total_commission', $this->Salesorders->total_commission);
            $this->set('commissions_selected', $commissions_selected);
        } else {
            $this->Flash->error(__('No se seleccionaron pedidos'));
            
            return $this->redirect(['action' => 'search']);
        }
        
        
    }
    
    public function index()
    {
        return $this->redirect(['action' => 'search']);
    }
    
    public function save() {
      
        $sos = $this->request->getData('quote_num');
      
	  
        $commissions = $this->request->getData('commission');
        //debug($commissions);
        $val = $this->Salesorders->save($sos, $commissions);
      
		
        if( true === $val) {
            $this->Flash->success(__('Los pedidos fueron actualizados exitosamente'));
        } else {
            $this->Flash->success(__('Ocurrió un error al actualizar los pedidos'));
        }
        
        return $this->redirect(['action' => 'search']);
        
    }

    /**
     * View method
     *
     * @param string|null $id Bookmark id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        /*
        $bookmark = $this->Bookmarks->get($id, [
            'contain' => ['Users', 'Tags']
        ]);

        $this->set('bookmark', $bookmark);
        $this->set('_serialize', ['bookmark']);*/
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        /*
        $bookmark = $this->Bookmarks->newEntity();
        if ($this->request->is('post')) {
            $bookmark = $this->Bookmarks->patchEntity($bookmark, $this->request->getData());
            $bookmark->user_id = $this->Auth->user('id');
            if ($this->Bookmarks->save($bookmark)) {
                $this->Flash->success(__('The bookmark has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bookmark could not be saved. Please, try again.'));
        }
        
        $tags = $this->Bookmarks->Tags->find('list', ['limit' => 200]);
        $this->set(compact('bookmark', 'tags'));
        $this->set('_serialize', ['bookmark']);*/
    }

    /**
     * Edit method
     *
     * @param string|null $id  id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        /*
        $bookmark = $this->Bookmarks->get($id, [
            'contain' => ['Tags']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bookmark = $this->Bookmarks->patchEntity($bookmark, $this->request->getData());
            $bookmark->user_id = $this->Auth->user('id');
            if ($this->Bookmarks->save($bookmark)) {
                $this->Flash->success(__('The bookmark has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bookmark could not be saved. Please, try again.'));
        }
        $tags = $this->Bookmarks->Tags->find('list', ['limit' => 200]);
        $this->set(compact('bookmark', 'tags'));
        $this->set('_serialize', ['bookmark']);*/
    }

    /**
     * Delete method
     *
     * @param string|null $id 
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        /*$this->request->allowMethod(['post', 'delete']);
        $bookmark = $this->Bookmarks->get($id);
        if ($this->Bookmarks->delete($bookmark)) {
            $this->Flash->success(__('The bookmark has been deleted.'));
        } else {
            $this->Flash->error(__('The bookmark could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);*/
    }
    
    
   
    
    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        
        // The add and index actions are always allowed.
        if (in_array($action, ['index','results','search', 'togglePaid', 'save'])) {
            return true;
        }
        // All other actions require an id.
        if (!$this->request->getParam('pass.0')) {
            return false;
        }
        
       
        return parent::isAuthorized($user);
    }
    
    //        echo "despues de getSOWithInvoices".time().'<br>';
    
    //        $invs = $this->Salesorders->filterInvoices($invs, $sos);
}
