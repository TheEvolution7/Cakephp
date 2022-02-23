<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $faq
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __d('acp', 'Actions') ?></li>
        <li><?= $this->Html->link(__d('acp', 'Edit Faq'), ['action' => 'edit', $faq->id]) ?> </li>
        <li><?= $this->Form->postLink(__d('acp', 'Delete Faq'), ['action' => 'delete', $faq->id], ['confirm' => __d('acp', 'Are you sure you want to delete # {0}?', $faq->id)]) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'List Faqs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'New Faq'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'List Faq Categories'), ['controller' => 'FaqCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'New Faq Category'), ['controller' => 'FaqCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="faqs view large-9 medium-8 columns content">
    <h3><?= h($faq->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __d('acp', 'Faq Category') ?></th>
            <td><?= $faq->has('faq_category') ? $this->Html->link($faq->faq_category->id, ['controller' => 'FaqCategories', 'action' => 'view', $faq->faq_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'User') ?></th>
            <td><?= $faq->has('user') ? $this->Html->link($faq->user->id, ['controller' => 'Users', 'action' => 'view', $faq->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Image') ?></th>
            <td><?= h($faq->image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Image List') ?></th>
            <td><?= h($faq->image_list) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Tag') ?></th>
            <td><?= h($faq->tag) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Id') ?></th>
            <td><?= $this->Number->format($faq->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'View Count') ?></th>
            <td><?= $this->Number->format($faq->view_count) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Comment Count') ?></th>
            <td><?= $this->Number->format($faq->comment_count) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Allow Comment') ?></th>
            <td><?= $this->Number->format($faq->allow_comment) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Order') ?></th>
            <td><?= $this->Number->format($faq->order) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Featured') ?></th>
            <td><?= $this->Number->format($faq->featured) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Created') ?></th>
            <td><?= h($faq->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Modified') ?></th>
            <td><?= h($faq->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Status') ?></th>
            <td><?= $faq->status ? __d('acp', 'Yes') : __d('acp', 'No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Home') ?></th>
            <td><?= $faq->home ? __d('acp', 'Yes') : __d('acp', 'No'); ?></td>
        </tr>
    </table>
</div>
