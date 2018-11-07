<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class InvoicesDetailsKitTable extends Table
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

        $this->setTable('admMovimientos');
        $this->setPrimaryKey('CIDMOVTOOWNER');   
        $this->setDisplayField('CIDMOVTOOWNER');
        $this->setAlias('InvoicesDetailsKit');
        
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
            ->integer('CIDMOVIMIENTO')
            ->allowEmpty('CIDMOVIMIENTO', 'create');

       
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
    
   
    public function findAllKitsWithCosts($invs) {

		$kits = [];

		foreach($invs as $id => $details) {
			
			$kits[$id] = 0;

			foreach($details->invoices_details as $id2 => $mov) {
				
				$movs = $this->getCostsFromMov( $mov->CIDMOVIMIENTO );

				if(isset($movs) && is_array($movs) &&  count($movs) > 0 ) {
				
					foreach($movs as $id3 => $kitElement) {
					
						$kits[$id] += $kitElement->CCOSTOESPECIFICO;
					}
					
				}
			}			
		
		}

		return $kits;
	}

	public function getCostsFromMov($mov_id) {
	
		 $movs = $this->find('all')->select(['CIDMOVIMIENTO', 'CCOSTOESPECIFICO'])
			->where([
			'AND' => [['CIDMOVTOOWNER' => $mov_id, 'CMOVTOOCULTO'=>'1']]

		 ])->toArray();


		return $movs;
	}
   
}
