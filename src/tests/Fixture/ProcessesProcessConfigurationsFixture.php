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
            'process_configuration_id' => ['type' => 'index', 'columns' => ['process_configuration_id', 'process_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['process_id', 'process_configuration_id'], 'length' => []],
            'processes_process_configurations_ibfk_2' => ['type' => 'foreign', 'columns' => ['process_id'], 'references' => ['processes', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'processes_process_configurations_ibfk_1' => ['type' => 'foreign', 'columns' => ['process_configuration_id'], 'references' => ['process_configurations', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
