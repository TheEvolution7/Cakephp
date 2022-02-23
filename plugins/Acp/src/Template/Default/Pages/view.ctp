<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Page $page
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __d('acp', 'Actions') ?></li>
        <li><?= $this->Html->link(__d('acp', 'Edit Page'), ['action' => 'edit', $page->id]) ?> </li>
        <li><?= $this->Form->postLink(__d('acp', 'Delete Page'), ['action' => 'delete', $page->id], ['confirm' => __d('acp', 'Are you sure you want to delete # {0}?', $page->id)]) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'List Pages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'New Page'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'List Page Categories'), ['controller' => 'PageCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'New Page Category'), ['controller' => 'PageCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pages view large-9 medium-8 columns content">
    <h3><?= h($page->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __d('acp', 'Page Category') ?></th>
            <td><?= $page->has('page_category') ? $this->Html->link($page->page_category->id, ['controller' => 'PageCategories', 'action' => 'view', $page->page_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'User') ?></th>
            <td><?= $page->has('user') ? $this->Html->link($page->user->id, ['controller' => 'Users', 'action' => 'view', $page->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Image') ?></th>
            <td><?= h($page->image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Image List') ?></th>
            <td><?= h($page->image_list) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Tag') ?></th>
            <td><?= h($page->tag) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Id') ?></th>
            <td><?= $this->Number->format($page->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'View Count') ?></th>
            <td><?= $this->Number->format($page->view_count) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Comment Count') ?></th>
            <td><?= $this->Number->format($page->comment_count) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Allow Comment') ?></th>
            <td><?= $this->Number->format($page->allow_comment) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Order') ?></th>
            <td><?= $this->Number->format($page->sort) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Created') ?></th>
            <td><?= h($page->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Modified') ?></th>
            <td><?= h($page->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Status') ?></th>
            <td><?= $page->status ? __d('acp', 'Yes') : __d('acp', 'No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Home') ?></th>
            <td><?= $page->home ? __d('acp', 'Yes') : __d('acp', 'No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Featured') ?></th>
            <td><?= $page->featured ? __d('acp', 'Yes') : __d('acp', 'No'); ?></td>
        </tr>
    </table>
</div>
