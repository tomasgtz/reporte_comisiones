<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use App\Model\Entity\Agente;

 
class ListaDeAgentesTable extends Table
{
    public $lista = [];
    
    
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
        $this->setTable('admAgentes');
        $this->setDisplayField('CIDAGENTE');
        $this->setPrimaryKey('CIDAGENTE');
       
        $this->setAgentes();
        
        parent::initialize($config);

     
        
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
       

        return false;
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
    
   private function setAgentes() {
       
       
       $a1 = new Agente();
       $a1->id = "JCarlosMartinez";
       $a1->nombre = "Juan Carlos Martinez";
       $a1->nombre_contpaq = "JUAN MARTINEZ";
       
       
       $a2 = new Agente();
       $a2->id = "gerardo.garcia";
       $a2->nombre = "Gerardo Garcia";
       $a2->nombre_contpaq = "GERARDO GARCIA";
       
       $a3 = new Agente();
       $a3->id = "Miguel San Román";
       $a3->nombre = "Miguel San Román";
       $a3->nombre_contpaq = "MIGUEL SAN ROMAN";
       
       $a4 = new Agente();
       $a4->id = "Amtz";
       $a4->nombre = "Alejandro Martinez";
       $a4->nombre_contpaq = "ALEJANDRO MARTINEZ";
       
       $this->lista[] = $a1;
       $this->lista[] = $a2;
       $this->lista[] = $a3;
       $this->lista[] = $a4;
       
   }
    
    public function getLista() {
        
        $lista2 =[];
        foreach($this->lista as $id => $obj) {
            $lista2[$obj->id] = $obj->nombre_contpaq;
        }
        
        return $lista2;
    }
    
    public function getListaForSearch() {
        
        $lista2 =[];
        foreach($this->lista as $id => $obj) {
            $lista2[$obj->id] = $obj->nombre;
        }
        
        return $lista2;
    }
  
}
