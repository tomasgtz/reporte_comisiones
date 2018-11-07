<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class InvoicesDetailsTable extends Table
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
        $this->setPrimaryKey('CIDMOVIMIENTO');   
        $this->setDisplayField('CIDMOVIMIENTO');
        $this->setAlias('InvoicesDetails');
        
        $this->belongsTo('InvoicesTable', [
            'foreignKey' => 'CIDDOCUMENTO',
            'joinType' => 'INNER',
            'className' => 'Invoice'
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
    
   
    
   
}
