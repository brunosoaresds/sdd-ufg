<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProcessesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProcessesTable Test Case
 */
class ProcessesTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.processes',
        'app.clazzes',
        'app.subjects',
        'app.schedules',
        'app.locals',
        'app.teachers',
        'app.clazzes_teachers',
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
        $config = TableRegistry::exists('Processes') ? [] : ['className' => 'App\Model\Table\ProcessesTable'];
        $this->Processes = TableRegistry::get('Processes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Processes);

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
}
