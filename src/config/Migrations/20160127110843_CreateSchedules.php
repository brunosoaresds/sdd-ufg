<?php
use Cake\ORM\TableRegistry;
use Migrations\AbstractMigration;

class CreateSchedules extends AbstractMigration
{
    protected $schedules = [
        [
            "start_time" => "08:00",
            "end_time" => "09:40"
        ],
        [
            "start_time" => "10:00",
            "end_time" => "11:40"
        ],
        [
            "start_time" => "14:00",
            "end_time" => "15:40"
        ],
        [
            "start_time" => "16:00",
            "end_time" => "17:40"
        ],
        [
            "start_time" => "18:50",
            "end_time" => "20:10"
        ],
        [
            "start_time" => "20:20",
            "end_time" => "22:00"
        ]
    ];

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

        /** Seed roles table by default data */
        $schedulesTable = TableRegistry::get('Schedules');
        foreach ($this->schedules as $schedule) {
            $schedule = $schedulesTable->newEntity($schedule);
            $schedulesTable->save($schedule);
        }
    }

    public function down()
    {
        $this->dropTable('schedules');
    }
}
