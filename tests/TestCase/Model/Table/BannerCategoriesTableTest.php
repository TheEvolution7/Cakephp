<?php
namespace Banner\Test\TestCase\Model\Table;

use Banner\Model\Table\BannerCategoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * Banner\Model\Table\BannerCategoriesTable Test Case
 */
class BannerCategoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Banner\Model\Table\BannerCategoriesTable
     */
    public $BannerCategories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.Acp.BannerCategories',
        'plugin.Acp.BannerCategoriesTitleTranslation',
        'plugin.Acp.BannerCategoriesAliasTranslation',
        'plugin.Acp.BannerCategoriesDescriptionTranslation',
        'plugin.Acp.BannerCategoriesContentTranslation',
        'plugin.Acp.BannerCategoriesTranslations',
        'plugin.Acp.Banners'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('BannerCategories') ? [] : ['className' => BannerCategoriesTable::class];
        $this->BannerCategories = TableRegistry::getTableLocator()->get('BannerCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BannerCategories);

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
