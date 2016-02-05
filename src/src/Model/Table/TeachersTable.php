<?php
namespace App\Model\Table;

use App\Model\Entity\Teacher;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Teachers Model
 *
 * @property \Cake\ORM\Association\HasMany $Roles
 * @property \Cake\ORM\Association\HasMany $Users
 * @property \Cake\ORM\Association\BelongsToMany $Clazzes
 * @property \Cake\ORM\Association\BelongsToMany $Knowledges
 */
class TeachersTable extends Table
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

        $this->table('teachers');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('Roles', [
            'foreignKey' => 'teacher_id'
        ]);
        $this->hasMany('Users', [
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
    public function validationDefault(Validator $validator)
    {
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
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }

	public function getAllTeachersWithKnowledge(){
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
