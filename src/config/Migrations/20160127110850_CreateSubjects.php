<?php
use Migrations\AbstractMigration;

class CreateSubjects extends AbstractMigration
{
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
