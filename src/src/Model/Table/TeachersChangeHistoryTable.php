<?php
namespace App\Model\Table;

use App\Model\Entity\TeachersChangeHistory;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TeachersChangeHistory Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Teachers
 */
class TeachersChangeHistoryTable extends Table
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

        $this->table('teachers_change_history');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Teachers', [
            'foreignKey' => 'teacher_id',
            'joinType' => 'INNER'
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
            ->add('modification_date', 'valid', ['rule' => 'datetime'])
            ->allowEmpty('modification_date');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('registry', 'create')
            ->notEmpty('registry');

        $validator
            ->allowEmpty('url_lattes');

        $validator
            ->add('entry_date', 'valid', ['rule' => 'date'])
            ->requirePresence('entry_date', 'create')
            ->notEmpty('entry_date');

        $validator
            ->allowEmpty('formation');

        $validator
            ->add('workload', 'valid', ['rule' => 'numeric'])
            ->requirePresence('workload', 'create')
            ->notEmpty('workload');

        $validator
            ->allowEmpty('about');

        $validator
            ->requirePresence('rg', 'create')
            ->notEmpty('rg');

        $validator
            ->requirePresence('cpf', 'create')
            ->notEmpty('cpf');

        $validator
            ->add('birth_date', 'valid', ['rule' => 'date'])
            ->requirePresence('birth_date', 'create')
            ->notEmpty('birth_date');

        $validator
            ->allowEmpty('situation');

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
        $rules->add($rules->existsIn(['teacher_id'], 'Teachers'));
        return $rules;
    }
}
