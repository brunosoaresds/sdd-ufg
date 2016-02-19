<?php

namespace App\Model\Table;

use App\Model\Entity\Process;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Datasource\ConnectionManager;

/**
 * Teachers Model
 *
 * @property \Cake\ORM\Association\HasMany $Roles
 * @property \Cake\ORM\Association\HasMany $Users
 * @property \Cake\ORM\Association\BelongsToMany $Clazzes
 * @property \Cake\ORM\Association\BelongsToMany $Knowledges
 */
class TeachersTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('teachers');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('Roles', [
            'foreignKey' => 'teacher_id'
        ]);
        $this->belongsToMany('Clazzes', [
            'foreignKey' => 'teacher_id',
            'targetForeignKey' => 'clazz_id',
            'joinTable' => 'clazzes_teachers'
        ]);
        $this->belongsToMany('Knowledges', [
            'foreignKey' => 'teacher_id',
            'targetForeignKey' => 'knowledge_id',
            'joinTable' => 'knowledges_teachers'
        ]);

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
                ->add('id', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('id', 'create');

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
    public function buildRules(RulesChecker $rules) {
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }

    public function getSubAllocated(Process $process) {

        $connection = ConnectionManager::get('default');
        $sql = "
            select 
	(select users.name from users where users.id = t.user_id) name,
    t.workload,
     (select COALESCE(SUM(subject_workload), 0) from (select c.id, COALESCE(SUM(s.theoretical_workload)+SUM(s.practical_workload),0) subject_workload from 
	(clazzes c inner join subjects s on s.id = c.subject_id) group by c.id) ch inner join clazzes_teachers ct on ct.clazz_id = ch.id where ct.teacher_id = t.id) as subject_workload,
    clazzes.process_id
from teachers t
left join (clazzes_teachers inner join clazzes on clazzes.id = clazzes_teachers.clazz_id) on clazzes_teachers.teacher_id = t.id
where (t.workload - (select COALESCE(SUM(subject_workload), 0) from (select c.id, COALESCE(SUM(s.theoretical_workload)+SUM(s.practical_workload),0) subject_workload from 
	(clazzes c inner join subjects s on s.id = c.subject_id) group by c.id) ch inner join clazzes_teachers ct on ct.clazz_id = ch.id where ct.teacher_id = t.id)) > 0 and (clazzes.process_id is null or clazzes.process_id = :id)";
        
        $results = $connection->execute($sql,[ "id" => $process->id])->fetchAll('assoc');
        return $results;
    }

    public function getAllTeachersWithKnowledge() {
        return $this
                        ->find('all')
                        ->contain([
                            'Knowledges' => function($q) {
                                return $q->select(['id']);
                            }
                                ])
                                ->hydrate(false)->toArray();
            }

        }
        