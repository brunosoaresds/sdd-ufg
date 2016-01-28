<?php
use Migrations\AbstractMigration;

class CreateLocals extends AbstractMigration
{
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
    }

    public function down()
    {
        $this->dropTable('locals');
    }
}
