<?php
use Migrations\AbstractMigration;

class CreateRoles extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('roles');
        $table
            ->addColumn('type', 'string', [
                'default' => 'COORDINATOR',
                'limit' => '50',
                'null' => false,
            ])
            ->addColumn('teacher_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('knowledge_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addIndex(
                [
                    'knowledge_id', 'teacher_id'
                ]
            )
            ->create();

        $this->table('roles')
            ->addForeignKey(
                'knowledge_id',
                'knowledges',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'teacher_id',
                'teachers',
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
        $this->table('roles')
            ->dropForeignKey(
                'knowledge_id'
            )
            ->dropForeignKey(
                'teacher_id'
            );

        $this->dropTable('roles');
    }
}
