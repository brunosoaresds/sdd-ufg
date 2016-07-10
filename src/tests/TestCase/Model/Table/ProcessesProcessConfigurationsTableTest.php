<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProcessesProcessConfigurationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProcessesProcessConfigurationsTable Test Case
 */
class ProcessesProcessConfigurationsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.processes_process_configurations',
        'app.processes',
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
        'app.process_configurations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProcessesProcessConfigurations') ? [] : ['className' => 'App\Model\Table\ProcessesProcessConfigurationsTable'];
        $this->ProcessesProcessConfigurations = TableRegistry::get('ProcessesProcessConfigurations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProcessesProcessConfigurations);

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
