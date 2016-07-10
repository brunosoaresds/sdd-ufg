<?php
use Cake\ORM\TableRegistry;
use Migrations\AbstractMigration;

class CreateLocals extends AbstractMigration
{
    protected $locals = [
        [
            "name" => "101",
            "address" => "Instituto de informática",
            "capacity" => 40
        ],
        [
            "name" => "102",
            "address" => "Instituto de informática",
            "capacity" => 40
        ],
        [
            "name" => "103",
            "address" => "Instituto de informática",
            "capacity" => 40
        ],
        [
            "name" => "101",
            "address" => "Centro de aulas B",
            "capacity" => 40
        ],
        [
            "name" => "102",
            "address" => "Centro de aulas B",
            "capacity" => 60
        ],
        [
            "name" => "103",
            "address" => "Centro de aulas B",
            "capacity" => 60
        ]
    ];

    public function up()
    {
        $table = $this->table('locals');
        $table
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('address', 'text', [
                'default' => null,
                'null' => true,
            ])
            ->addColumn('capacity', 'integer', [
                'default' => 0,
                'limit' => 11,
                'null' => false,
            ])
            ->create();

        /** Seed roles table by default data */
        $localsTable = TableRegistry::get('Locals');
        foreach ($this->locals as $local) {
            $local = $localsTable->newEntity($local);
            $localsTable->save($local);
        }
    }

    public function down()
    {
        $this->dropTable('locals');
    }
}
