<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProcessesProcessConfigurationsFixture
 *
 */
class ProcessesProcessConfigurationsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'process_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'process_configuration_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_processo_distribuicao_has_criterio_criterio_idx' => ['type' => 'index', 'columns' => ['process_configuration_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['process_id', 'process_configuration_id'], 'length' => []],
            'fk_processo_distribuicao_has_criterio_criterio' => ['type' => 'foreign', 'columns' => ['process_configuration_id'], 'references' => ['process_configurations', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_processo_distribuicao_has_criterio_processo_distribuicao1' => ['type' => 'foreign', 'columns' => ['process_id'], 'references' => ['processes', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'process_id' => 1,
            'process_configuration_id' => 1
        ],
    ];
}
