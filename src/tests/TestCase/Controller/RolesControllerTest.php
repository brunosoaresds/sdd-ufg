<?php
namespace App\Test\TestCase\Controller;

use App\Controller\RolesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\RolesController Test Case
 */
class RolesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.roles',
        'app.teachers',
        'app.users',
        'app.clazzes',
        'app.subjects',
        'app.knowledges',
        'app.knowledges_teachers',
        'app.courses',
        'app.schedules',
        'app.locals',
        'app.processes',
        'app.process_configurations',
        'app.processes_process_configurations',
        'app.clazzes_teachers'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
