<?php
namespace App\Model\Table;

use App\Model\Entity\Clazze;
use Cake\ORM\Query;
use Cake\ORM\Rule\ExistsIn;
use Cake\ORM\Rule\IsUnique;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Clazzes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Subjects
 * @property \Cake\ORM\Association\BelongsTo $Schedules
 * @property \Cake\ORM\Association\BelongsTo $Locals
 * @property \Cake\ORM\Association\BelongsTo $Processes
 * @property \Cake\ORM\Association\BelongsToMany $Teachers
 */
class ClazzesTable extends Table
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

        $this->table('clazzes');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Subjects', [
            'foreignKey' => 'subject_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Processes', [
            'foreignKey' => 'process_id',
            'joinType' => 'INNER'
        ]);

        $this->hasMany('ClazzesTeachers', [
            'foreignKey' => 'clazz_id',
            'propertyName' => 'intents'
        ]);

        $this->hasMany('ClazzesSchedulesLocals', [
            'foreignKey' => 'clazz_id',
            'propertyName' => 'scheduleLocals'
        ]);

		$this->belongsToMany('Locals', [
            'foreignKey' => 'clazz_id',
            'targetForeignKey' => 'local_id',
            'joinTable' => 'clazzes_schedules_locals'
        ]);

		$this->belongsToMany('Schedules', [
            'foreignKey' => 'clazz_id',
            'targetForeignKey' => 'schedule_id',
            'joinTable' => 'clazzes_schedules_locals'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->add('vacancies', 'valid', ['rule' => 'numeric'])
            ->requirePresence('vacancies', 'create')
            ->notEmpty('vacancies');

        $validator
            ->requirePresence('subject_id', 'create')
            ->notEmpty('subject_id');

        $validator
            ->requirePresence('process_id', 'create')
            ->notEmpty('process_id');

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
        $rules->add(
            function ($entity, $options) {
                $rule = new ExistsIn(['subject_id'], 'Subjects');
                return $rule($entity, $options);
            },
            ['errorField' => 'subject_id', 'message' => __('Selecione uma disciplina')]
        );

        $rules->add(
            function ($entity, $options) {
                $rule = new ExistsIn(['process_id'], 'Processes');
                return $rule($entity, $options);
            },
            ['errorField' => 'process_id', 'message' => __('Selecione um processo de distribuição')]
        );

        $rules->add(
            new IsUnique(['name', 'process_id', 'subject_id']),
            [
                'errorField' => 'name',
                'message' => __('Já existe uma turma para esta disciplina cadastrada neste processo de distribuição')
            ]
        );

        return $rules;
    }
}
