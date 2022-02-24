<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $bannerCategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __d('acp', 'Actions') ?></li>
        <li><?= $this->Html->link(__d('acp', 'Edit Banner Category'), ['action' => 'edit', $bannerCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__d('acp', 'Delete Banner Category'), ['action' => 'delete', $bannerCategory->id], ['confirm' => __d('acp', 'Are you sure you want to delete # {0}?', $bannerCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'List Banner Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'New Banner Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'List Parent Banner Categories'), ['controller' => 'BannerCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'New Parent Banner Category'), ['controller' => 'BannerCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'List Child Banner Categories'), ['controller' => 'BannerCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'New Child Banner Category'), ['controller' => 'BannerCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'List Banners'), ['controller' => 'Banners', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'New Banner'), ['controller' => 'Banners', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="bannerCategories view large-9 medium-8 columns content">
    <h3><?= h($bannerCategory->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __d('acp', 'Parent Banner Category') ?></th>
            <td><?= $bannerCategory->has('parent_banner_category') ? $this->Html->link($bannerCategory->parent_banner_category->id, ['controller' => 'BannerCategories', 'action' => 'view', $bannerCategory->parent_banner_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Image') ?></th>
            <td><?= h($bannerCategory->image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Id') ?></th>
            <td><?= $this->Number->format($bannerCategory->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Lft') ?></th>
            <td><?= $this->Number->format($bannerCategory->lft) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Rght') ?></th>
            <td><?= $this->Number->format($bannerCategory->rght) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Created') ?></th>
            <td><?= h($bannerCategory->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Modified') ?></th>
            <td><?= h($bannerCategory->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Status') ?></th>
            <td><?= $bannerCategory->status ? __d('acp', 'Yes') : __d('acp', 'No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __d('acp', 'Related Banner Categories') ?></h4>
        <?php if (!empty($bannerCategory->child_banner_categories)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __d('acp', 'Id') ?></th>
                <th scope="col"><?= __d('acp', 'Parent Id') ?></th>
                <th scope="col"><?= __d('acp', 'Image') ?></th>
                <th scope="col"><?= __d('acp', 'Status') ?></th>
                <th scope="col"><?= __d('acp', 'Lft') ?></th>
                <th scope="col"><?= __d('acp', 'Rght') ?></th>
                <th scope="col"><?= __d('acp', 'Created') ?></th>
                <th scope="col"><?= __d('acp', 'Modified') ?></th>
                <th scope="col" class="actions"><?= __d('acp', 'Actions') ?></th>
            </tr>
            <?php foreach ($bannerCategory->child_banner_categories as $childBannerCategories): ?>
            <tr>
                <td><?= h($childBannerCategories->id) ?></td>
                <td><?= h($childBannerCategories->parent_id) ?></td>
                <td><?= h($childBannerCategories->image) ?></td>
                <td><?= h($childBannerCategories->status) ?></td>
                <td><?= h($childBannerCategories->lft) ?></td>
                <td><?= h($childBannerCategories->rght) ?></td>
                <td><?= h($childBannerCategories->created) ?></td>
                <td><?= h($childBannerCategories->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__d('acp', 'View'), ['controller' => 'BannerCategories', 'action' => 'view', $childBannerCategories->id]) ?>
                    <?= $this->Html->link(__d('acp', 'Edit'), ['controller' => 'BannerCategories', 'action' => 'edit', $childBannerCategories->id]) ?>
                    <?= $this->Form->postLink(__d('acp', 'Delete'), ['controller' => 'BannerCategories', 'action' => 'delete', $childBannerCategories->id], ['confirm' => __d('acp', 'Are you sure you want to delete # {0}?', $childBannerCategories->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __d('acp', 'Related Banners') ?></h4>
        <?php if (!empty($bannerCategory->banners)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __d('acp', 'Id') ?></th>
                <th scope="col"><?= __d('acp', 'Banner Category Id') ?></th>
                <th scope="col"><?= __d('acp', 'User Id') ?></th>
                <th scope="col"><?= __d('acp', 'Image') ?></th>
                <th scope="col"><?= __d('acp', 'Image List') ?></th>
                <th scope="col"><?= __d('acp', 'Sort') ?></th>
                <th scope="col"><?= __d('acp', 'Status') ?></th>
                <th scope="col"><?= __d('acp', 'Featured') ?></th>
                <th scope="col"><?= __d('acp', 'Created') ?></th>
                <th scope="col"><?= __d('acp', 'Modified') ?></th>
                <th scope="col" class="actions"><?= __d('acp', 'Actions') ?></th>
            </tr>
            <?php foreach ($bannerCategory->banners as $banners): ?>
            <tr>
                <td><?= h($banners->id) ?></td>
                <td><?= h($banners->banner_category_id) ?></td>
                <td><?= h($banners->user_id) ?></td>
                <td><?= h($banners->image) ?></td>
                <td><?= h($banners->image_list) ?></td>
                <td><?= h($banners->sort) ?></td>
                <td><?= h($banners->status) ?></td>
                <td><?= h($banners->featured) ?></td>
                <td><?= h($banners->created) ?></td>
                <td><?= h($banners->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__d('acp', 'View'), ['controller' => 'Banners', 'action' => 'view', $banners->id]) ?>
                    <?= $this->Html->link(__d('acp', 'Edit'), ['controller' => 'Banners', 'action' => 'edit', $banners->id]) ?>
                    <?= $this->Form->postLink(__d('acp', 'Delete'), ['controller' => 'Banners', 'action' => 'delete', $banners->id], ['confirm' => __d('acp', 'Are you sure you want to delete # {0}?', $banners->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
