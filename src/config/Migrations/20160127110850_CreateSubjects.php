<?php
use Cake\ORM\TableRegistry;
use Migrations\AbstractMigration;

class CreateSubjects extends AbstractMigration
{
    protected $subjects = [
        [
            "name" => "Integração 2",
            "theoretical_workload" => 0,
            "practical_workload" => 64,
            "knowledge_id" => 3,
            "course_id" => 3
        ],
        [
            "name" => "Redes de computadores e sistemas distribuídos",
            "theoretical_workload" => 32,
            "practical_workload" => 32,
            "knowledge_id" => 2,
            "course_id" => 3
        ],
    ];

    public function up()
    {
        $table = $this->table('subjects');
        $table
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('theoretical_workload', 'integer', [
                'default' => null,
                'limit' => 5,
                'null' => false,
            ])
            ->addColumn('practical_workload', 'integer', [
                'default' => null,
                'limit' => 5,
                'null' => false,
            ])
            ->addColumn('knowledge_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('course_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'course_id', 'knowledge_id'
                ]
            )
            ->create();

        $this->table('subjects')
            ->addForeignKey(
                'course_id',
                'courses',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'knowledge_id',
                'knowledges',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();

        /** Seed roles table by default data */
        $subjectsTable = TableRegistry::get('Subjects');
        foreach ($this->subjects as $subject) {
            $subject = $subjectsTable->newEntity($subject);
            $subjectsTable->save($subject);
        }
    }

    public function down()
    {
        $this->table('subjects')
            ->dropForeignKey(
                'course_id'
            )
            ->dropForeignKey(
                'knowledge_id'
            );

        $this->dropTable('subjects');
    }
}
