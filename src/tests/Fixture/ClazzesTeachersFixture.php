<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ClazzesTeachersFixture
 *
 */
class ClazzesTeachersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'clazz_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'teacher_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'status' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => 'PENDING', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'clazz_id' => ['type' => 'index', 'columns' => ['clazz_id', 'teacher_id'], 'length' => []],
            'teacher_id' => ['type' => 'index', 'columns' => ['teacher_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['clazz_id', 'teacher_id'], 'length' => []],
            'clazzes_teachers_ibfk_1' => ['type' => 'foreign', 'columns' => ['clazz_id'], 'references' => ['clazzes', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'clazzes_teachers_ibfk_2' => ['type' => 'foreign', 'columns' => ['teacher_id'], 'references' => ['teachers', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
            'teacher_id' => 1,
            'status' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
