<?php
namespace App\Model\Table;

use App\Model\Entity\Schedule;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Schedules Model
 *
 * @property \Cake\ORM\Association\HasMany $Clazzes
 */
class SchedulesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('schedules');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('Clazzes', [
            'foreignKey' => 'schedule_id'
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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('code', 'create')
            ->notEmpty('code');

        $validator
            ->add('initial_time', 'valid', ['rule' => 'date'])
            ->requirePresence('initial_time', 'create')
            ->notEmpty('initial_time');

        $validator
            ->add('final_time', 'valid', ['rule' => 'date'])
            ->requirePresence('final_time', 'create')
            ->notEmpty('final_time');

        return $validator;
    }
}
