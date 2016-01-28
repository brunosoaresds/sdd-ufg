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
            ->add('week_day', 'valid', ['rule' => 'numeric'])
            ->requirePresence('week_day', 'create')
            ->notEmpty('week_day');

        $validator
            ->add('start_time', 'valid', ['rule' => 'time'])
            ->requirePresence('start_time', 'create')
            ->notEmpty('start_time');

        $validator
            ->add('end_time', 'valid', ['rule' => 'time'])
            ->requirePresence('end_time', 'create')
            ->notEmpty('end_time');

        return $validator;
    }
}
