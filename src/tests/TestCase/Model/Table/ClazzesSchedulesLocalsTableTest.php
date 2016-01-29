<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClazzesSchedulesLocalsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClazzesSchedulesLocalsTable Test Case
 */
class ClazzesSchedulesLocalsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.clazzes_schedules_locals',
        'app.clazzes',
        'app.subjects',
        'app.knowledges',
        'app.roles',
        'app.teachers',
        'app.users',
        'app.clazzes_teachers',
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
        $config = TableRegistry::exists('ClazzesSchedulesLocals') ? [] : ['className' => 'App\Model\Table\ClazzesSchedulesLocalsTable'];
        $this->ClazzesSchedulesLocals = TableRegistry::get('ClazzesSchedulesLocals', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ClazzesSchedulesLocals);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
