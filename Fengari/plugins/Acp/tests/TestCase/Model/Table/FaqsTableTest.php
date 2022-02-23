<?php
namespace Acp\Test\TestCase\Model\Table;

use Acp\Model\Table\FaqsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * Acp\Model\Table\FaqsTable Test Case
 */
class FaqsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \Acp\Model\Table\FaqsTable
     */
    public $Faqs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.Acp.Faqs',
        'plugin.Acp.FaqCategories',
        'plugin.Acp.Users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Faqs') ? [] : ['className' => FaqsTable::class];
        $this->Faqs = TableRegistry::getTableLocator()->get('Faqs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Faqs);

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
