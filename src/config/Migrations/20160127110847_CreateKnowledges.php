<?php
use Cake\ORM\TableRegistry;
use Migrations\AbstractMigration;

class CreateKnowledges extends AbstractMigration
{
    protected $knowledges = [
        [
            "name" => "Bancos de dados"
        ],
        [
            "name" => "Redes de computadores"
        ],
        [
            "name" => "Desenvolvimento de software"
        ],
        [
            "name" => "Engenharia de software"
        ],
        [
            "name" => "Algorítmos"
        ]
    ];

    public function up()
    {
        $table = $this->table('knowledges');
        $table
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->create();

        $table = $this->table('knowledges_teachers', ['id' => false, 'primary_key' => ['teacher_id', 'knowledge_id']]);
        $table
            ->addColumn('teacher_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('knowledge_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('level', 'integer', [
                'default' => 3,
                'limit' => 2,
                'null' => false,
            ])
            ->addIndex(
                [
                    'knowledge_id', 'teacher_id'
                ]
            )
            ->create();

        /** Associations */
        $this->table('knowledges_teachers')
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

        /** Seed roles table by default data */
        $knowledgesTable = TableRegistry::get('Knowledges');
        foreach ($this->knowledges as $knowledge) {
            $knowledge = $knowledgesTable->newEntity($knowledge);
            $knowledgesTable->save($knowledge);
        }
    }

    public function down()
    {
        $this->table('knowledges_teachers')
            ->dropForeignKey(
                'knowledge_id'
            )
            ->dropForeignKey(
                'teacher_id'
            );

        $this->dropTable('knowledges');
        $this->dropTable('knowledges_teachers');
    }
}
