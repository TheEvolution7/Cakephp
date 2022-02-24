<?php
namespace Acp\Test\TestCase\Model\Table;

use Acp\Model\Table\ProductsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * Acp\Model\Table\ProductsTable Test Case
 */
class ProductsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \Acp\Model\Table\ProductsTable
     */
    public $Products;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.Acp.Products',
        'plugin.Acp.ProductCategories',
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
        $config = TableRegistry::getTableLocator()->exists('Products') ? [] : ['className' => ProductsTable::class];
        $this->Products = TableRegistry::getTableLocator()->get('Products', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Products);

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
