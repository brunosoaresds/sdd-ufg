<?php
namespace App\Model\Table;

use App\Model\Entity\Subject;
use Cake\ORM\Query;
use Cake\ORM\Rule\ExistsIn;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Subjects Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Knowledges
 * @property \Cake\ORM\Association\BelongsTo $Courses
 * @property \Cake\ORM\Association\HasMany $Clazzes
 */
class SubjectsTable extends Table
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

        $this->table('subjects');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Knowledges', [
            'foreignKey' => 'knowledge_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Courses', [
            'foreignKey' => 'course_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Clazzes', [
            'foreignKey' => 'subject_id'
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
            ->add('theoretical_workload', 'valid', ['rule' => 'numeric'])
            ->requirePresence('theoretical_workload', 'create')
            ->notEmpty('theoretical_workload');

        $validator
            ->add('practical_workload', 'valid', ['rule' => 'numeric'])
            ->requirePresence('practical_workload', 'create')
            ->notEmpty('practical_workload');

        $validator
            ->requirePresence('knowledge_id', 'create')
            ->notEmpty('knowledge_id');

        $validator
            ->requirePresence('course_id', 'create')
            ->notEmpty('course_id');

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
                $rule = new ExistsIn(['knowledge_id'], 'Knowledges');
                return $rule($entity, $options);
            },
            ['errorField' => 'knowledge_id', 'message' => __('Selecione um núcleo de conhecimento')]
        );

        $rules->add(
            function ($entity, $options) {
                $rule = new ExistsIn(['course_id'], 'Courses');
                return $rule($entity, $options);
            },
            ['errorField' => 'course_id', 'message' => __('Selecione um curso')]
        );
        return $rules;
    }
}
