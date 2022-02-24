<?php
namespace Acp\Test\TestCase\Model\Table;

use Acp\Model\Table\NewslettersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * Acp\Model\Table\NewslettersTable Test Case
 */
class NewslettersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \Acp\Model\Table\NewslettersTable
     */
    public $Newsletters;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.Acp.Newsletters'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Newsletters') ? [] : ['className' => NewslettersTable::class];
        $this->Newsletters = TableRegistry::getTableLocator()->get('Newsletters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Newsletters);

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
