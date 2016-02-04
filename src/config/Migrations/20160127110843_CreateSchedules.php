<?php
use Migrations\AbstractMigration;

class CreateSchedules extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('schedules');
        $table
            ->addColumn('start_time', 'time', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('end_time', 'time', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->create();
    }

    public function down()
    {
        $this->dropTable('schedules');
    }
}
