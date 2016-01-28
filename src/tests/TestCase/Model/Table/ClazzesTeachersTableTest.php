<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClazzesTeachersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClazzesTeachersTable Test Case
 */
class ClazzesTeachersTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.clazzes_teachers',
        'app.clazzes',
        'app.subjects',
        'app.knowledges',
        'app.roles',
        'app.teachers',
        'app.users',
        'app.knowledges_teachers',
        'app.courses',
        'app.schedules',
        'app.locals',
        'app.processes',
        'app.process_configurations',
        'app.processes_process_configurations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ClazzesTeachers') ? [] : ['className' => 'App\Model\Table\ClazzesTeachersTable'];
        $this->ClazzesTeachers = TableRegistry::get('ClazzesTeachers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ClazzesTeachers);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
