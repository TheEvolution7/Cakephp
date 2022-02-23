<?php
namespace Acp\Test\TestCase\Model\Table;

use Acp\Model\Table\MailCategoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * Acp\Model\Table\MailCategoriesTable Test Case
 */
class MailCategoriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \Acp\Model\Table\MailCategoriesTable
     */
    public $MailCategories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.Acp.MailCategories'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MailCategories') ? [] : ['className' => MailCategoriesTable::class];
        $this->MailCategories = TableRegistry::getTableLocator()->get('MailCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MailCategories);

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
