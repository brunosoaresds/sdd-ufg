<?php
namespace App\Test\TestCase\Controller;

use App\Controller\SubjectsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\SubjectsController Test Case
 */
class SubjectsControllerTest extends IntegrationTestCase
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
        'app.users',
        'app.clazzes',
        'app.schedules',
        'app.locals',
        'app.processes',
        'app.process_configurations',
        'app.processes_process_configurations',
        'app.clazzes_teachers',
        'app.knowledges_teachers',
        'app.courses'
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
