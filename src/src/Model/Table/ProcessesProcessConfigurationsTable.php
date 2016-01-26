<?php
namespace App\Model\Table;

use App\Model\Entity\ProcessesProcessConfiguration;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProcessesProcessConfigurations Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Processes
 * @property \Cake\ORM\Association\BelongsTo $ProcessConfigurations
 */
class ProcessesProcessConfigurationsTable extends Table
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

        $this->table('processes_process_configurations');
        $this->displayField('process_id');
        $this->primaryKey(['process_id', 'process_configuration_id']);

        $this->belongsTo('Processes', [
            'foreignKey' => 'process_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ProcessConfigurations', [
            'foreignKey' => 'process_configuration_id',
            'joinType' => 'INNER'
        ]);
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
        $rules->add($rules->existsIn(['process_id'], 'Processes'));
        $rules->add($rules->existsIn(['process_configuration_id'], 'ProcessConfigurations'));
        return $rules;
    }
}
