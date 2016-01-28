<?php
use Migrations\AbstractMigration;

class CreateProcessConfigurations extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('process_configurations');
        $table
            ->addColumn('type', 'string', [
                'default' => 'CRITERIA',
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('description', 'text', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('data_type', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('value', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->create();
    }

    public function down()
    {
        $this->dropTable('process_configurations');
    }
}
