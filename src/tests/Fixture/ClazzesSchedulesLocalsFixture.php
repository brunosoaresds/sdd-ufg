<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ClazzesSchedulesLocalsFixture
 *
 */
class ClazzesSchedulesLocalsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'clazz_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'schedule_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'local_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'clazz_id' => ['type' => 'index', 'columns' => ['clazz_id', 'schedule_id', 'local_id'], 'length' => []],
            'schedule_id' => ['type' => 'index', 'columns' => ['schedule_id'], 'length' => []],
            'local_id' => ['type' => 'index', 'columns' => ['local_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['clazz_id', 'schedule_id', 'local_id'], 'length' => []],
            'clazzes_schedules_locals_ibfk_1' => ['type' => 'foreign', 'columns' => ['clazz_id'], 'references' => ['clazzes', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'clazzes_schedules_locals_ibfk_2' => ['type' => 'foreign', 'columns' => ['schedule_id'], 'references' => ['schedules', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'clazzes_schedules_locals_ibfk_3' => ['type' => 'foreign', 'columns' => ['local_id'], 'references' => ['locals', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
            'clazz_id' => 1,
            'schedule_id' => 1,
            'local_id' => 1
        ],
    ];
}
