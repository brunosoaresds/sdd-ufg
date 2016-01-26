<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TeachersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TeachersTable Test Case
 */
class TeachersTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.teachers',
        'app.roles',
        'app.knowledges',
        'app.subjects',
        'app.courses',
        'app.clazzes',
        'app.schedules',
        'app.locals',
        'app.processes',
        'app.process_configurations',
        'app.processes_process_configurations',
        'app.clazzes_teachers',
        'app.knowledges_teachers',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Teachers') ? [] : ['className' => 'App\Model\Table\TeachersTable'];
        $this->Teachers = TableRegistry::get('Teachers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Teachers);

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
