<?php
use Migrations\AbstractMigration;

class BannerCategoriesTranslations extends AbstractMigration
{
    public function up()
    {
        $this->table('banner_categories_translations')
            ->addColumn('locale', 'string', [
                'default' => null,
                'limit' => 6,
                'null' => false,
            ])
            ->addColumn('model', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('foreign_key', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('field', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('content', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'locale',
                    'model',
                    'foreign_key',
                    'field',
                ],
                ['unique' => true]
            )
            ->addIndex(
                [
                    'model',
                    'foreign_key',
                    'field',
                ]
            )
            ->create();
    }

    public function down($value='')
    {
        $this->table('banner_categories_translations')->drop()->save();
    }
}
