<?php
namespace App\Model\Table;

use App\Model\Entity\Clazze;
use Cake\ORM\Query;
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

        $this->belongsToMany('Teachers', [
            'foreignKey' => 'clazz_id',
            'targetForeignKey' => 'teacher_id',
            'joinTable' => 'clazzes_teachers'
        ]);
        $this->belongsToMany('Locals', [
            'foreignKey' => 'clazz_id',
            'targetForeignKey' => 'local_id',
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
        $rules->add($rules->existsIn(['subject_id'], 'Subjects'));
        $rules->add($rules->existsIn(['process_id'], 'Processes'));
        return $rules;
    }
}
