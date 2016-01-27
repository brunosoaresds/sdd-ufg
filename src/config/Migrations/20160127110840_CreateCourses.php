<?php
use Cake\ORM\TableRegistry;
use Migrations\AbstractMigration;

class CreateCourses extends AbstractMigration
{
    protected $courses = [
        [
            "name" => "Engenharia de Software"
        ],
        [
            "name" => "Sistemas de Informação"
        ],
        [
            "name" => "Ciências da Computação"
        ]
    ];

    public function up()
    {
        $table = $this->table('courses');
        $table
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->create();

        /** Seed roles table by default data */
        $courseTable = TableRegistry::get('Courses');
        foreach ($this->courses as $course) {
            $course = $courseTable->newEntity($course);
            $courseTable->save($course);
        }
    }

    public function down()
    {
        $this->dropTable('courses');
    }

    public function after($direction) {
        if ($direction === 'up') {
            $courseTable = TableRegistry::get('Courses');
            $course = $courseTable->newEntity();

            $course->name = 'Engenharia de software';
            $courseTable->save($course);

            $course->name = 'Sistemas de informação';
            $courseTable->save($course);
        }
    }
}
