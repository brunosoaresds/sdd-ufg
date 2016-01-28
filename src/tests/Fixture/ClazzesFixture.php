<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ClazzesFixture
 *
 */
class ClazzesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'name' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'vacancies' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'subject_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'schedule_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'local_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'process_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_turma_disciplina1_idx' => ['type' => 'index', 'columns' => ['subject_id'], 'length' => []],
            'fk_turma_horario1_idx' => ['type' => 'index', 'columns' => ['schedule_id'], 'length' => []],
            'fk_turma_local1_idx' => ['type' => 'index', 'columns' => ['local_id'], 'length' => []],
            'fk_turma_processo_distribuicao1_idx' => ['type' => 'index', 'columns' => ['process_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_turma_disciplina1' => ['type' => 'foreign', 'columns' => ['subject_id'], 'references' => ['subjects', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_turma_horario1' => ['type' => 'foreign', 'columns' => ['schedule_id'], 'references' => ['schedules', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_turma_local1' => ['type' => 'foreign', 'columns' => ['local_id'], 'references' => ['locals', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_turma_processo_distribuicao1' => ['type' => 'foreign', 'columns' => ['process_id'], 'references' => ['processes', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
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
            'id' => 1,
            'name' => 'Lorem ipsum dolor sit amet',
            'vacancies' => 1,
            'subject_id' => 1,
            'schedule_id' => 1,
            'local_id' => 1,
            'process_id' => 1
        ],
    ];
}
