<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SubjectsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SubjectsTable Test Case
 */
class SubjectsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.subjects',
        'app.knowledges',
        'app.roles',
        'app.teachers',
        'app.knowledges_teachers',
        'app.courses',
        'app.clazzes',
        'app.schedules',
        'app.locals',
        'app.processes',
        'app.process_configurations',
        'app.processes_process_configurations',
        'app.clazzes_teachers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Subjects') ? [] : ['className' => 'App\Model\Table\SubjectsTable'];
        $this->Subjects = TableRegistry::get('Subjects', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Subjects);

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
