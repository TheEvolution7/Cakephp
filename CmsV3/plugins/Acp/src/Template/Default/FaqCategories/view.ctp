<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $faqCategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __d('acp', 'Actions') ?></li>
        <li><?= $this->Html->link(__d('acp', 'Edit Faq Category'), ['action' => 'edit', $faqCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__d('acp', 'Delete Faq Category'), ['action' => 'delete', $faqCategory->id], ['confirm' => __d('acp', 'Are you sure you want to delete # {0}?', $faqCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'List Faq Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'New Faq Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'List Parent Faq Categories'), ['controller' => 'FaqCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'New Parent Faq Category'), ['controller' => 'FaqCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'List Child Faq Categories'), ['controller' => 'FaqCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'New Child Faq Category'), ['controller' => 'FaqCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'List Faqs'), ['controller' => 'Faqs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'New Faq'), ['controller' => 'Faqs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="faqCategories view large-9 medium-8 columns content">
    <h3><?= h($faqCategory->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __d('acp', 'Parent Faq Category') ?></th>
            <td><?= $faqCategory->has('parent_faq_category') ? $this->Html->link($faqCategory->parent_faq_category->id, ['controller' => 'FaqCategories', 'action' => 'view', $faqCategory->parent_faq_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Type') ?></th>
            <td><?= h($faqCategory->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Image') ?></th>
            <td><?= h($faqCategory->image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Id') ?></th>
            <td><?= $this->Number->format($faqCategory->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Order') ?></th>
            <td><?= $this->Number->format($faqCategory->order) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Lft') ?></th>
            <td><?= $this->Number->format($faqCategory->lft) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Rght') ?></th>
            <td><?= $this->Number->format($faqCategory->rght) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Created') ?></th>
            <td><?= h($faqCategory->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Modified') ?></th>
            <td><?= h($faqCategory->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Status') ?></th>
            <td><?= $faqCategory->status ? __d('acp', 'Yes') : __d('acp', 'No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __d('acp', 'Allowed Fields') ?></h4>
        <?= $this->Text->autoParagraph(h($faqCategory->allowed_fields)); ?>
    </div>
    <div class="related">
        <h4><?= __d('acp', 'Related Faq Categories') ?></h4>
        <?php if (!empty($faqCategory->child_faq_categories)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __d('acp', 'Id') ?></th>
                <th scope="col"><?= __d('acp', 'Parent Id') ?></th>
                <th scope="col"><?= __d('acp', 'Type') ?></th>
                <th scope="col"><?= __d('acp', 'Image') ?></th>
                <th scope="col"><?= __d('acp', 'Order') ?></th>
                <th scope="col"><?= __d('acp', 'Status') ?></th>
                <th scope="col"><?= __d('acp', 'Lft') ?></th>
                <th scope="col"><?= __d('acp', 'Rght') ?></th>
                <th scope="col"><?= __d('acp', 'Created') ?></th>
                <th scope="col"><?= __d('acp', 'Modified') ?></th>
                <th scope="col"><?= __d('acp', 'Allowed Fields') ?></th>
                <th scope="col" class="actions"><?= __d('acp', 'Actions') ?></th>
            </tr>
            <?php foreach ($faqCategory->child_faq_categories as $childFaqCategories): ?>
            <tr>
                <td><?= h($childFaqCategories->id) ?></td>
                <td><?= h($childFaqCategories->parent_id) ?></td>
                <td><?= h($childFaqCategories->type) ?></td>
                <td><?= h($childFaqCategories->image) ?></td>
                <td><?= h($childFaqCategories->order) ?></td>
                <td><?= h($childFaqCategories->status) ?></td>
                <td><?= h($childFaqCategories->lft) ?></td>
                <td><?= h($childFaqCategories->rght) ?></td>
                <td><?= h($childFaqCategories->created) ?></td>
                <td><?= h($childFaqCategories->modified) ?></td>
                <td><?= h($childFaqCategories->allowed_fields) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__d('acp', 'View'), ['controller' => 'FaqCategories', 'action' => 'view', $childFaqCategories->id]) ?>
                    <?= $this->Html->link(__d('acp', 'Edit'), ['controller' => 'FaqCategories', 'action' => 'edit', $childFaqCategories->id]) ?>
                    <?= $this->Form->postLink(__d('acp', 'Delete'), ['controller' => 'FaqCategories', 'action' => 'delete', $childFaqCategories->id], ['confirm' => __d('acp', 'Are you sure you want to delete # {0}?', $childFaqCategories->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __d('acp', 'Related Faqs') ?></h4>
        <?php if (!empty($faqCategory->faqs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __d('acp', 'Id') ?></th>
                <th scope="col"><?= __d('acp', 'Faq Category Id') ?></th>
                <th scope="col"><?= __d('acp', 'User Id') ?></th>
                <th scope="col"><?= __d('acp', 'Image') ?></th>
                <th scope="col"><?= __d('acp', 'Image List') ?></th>
                <th scope="col"><?= __d('acp', 'View Count') ?></th>
                <th scope="col"><?= __d('acp', 'Comment Count') ?></th>
                <th scope="col"><?= __d('acp', 'Allow Comment') ?></th>
                <th scope="col"><?= __d('acp', 'Order') ?></th>
                <th scope="col"><?= __d('acp', 'Status') ?></th>
                <th scope="col"><?= __d('acp', 'Home') ?></th>
                <th scope="col"><?= __d('acp', 'Featured') ?></th>
                <th scope="col"><?= __d('acp', 'Tag') ?></th>
                <th scope="col"><?= __d('acp', 'Created') ?></th>
                <th scope="col"><?= __d('acp', 'Modified') ?></th>
                <th scope="col" class="actions"><?= __d('acp', 'Actions') ?></th>
            </tr>
            <?php foreach ($faqCategory->faqs as $faqs): ?>
            <tr>
                <td><?= h($faqs->id) ?></td>
                <td><?= h($faqs->faq_category_id) ?></td>
                <td><?= h($faqs->user_id) ?></td>
                <td><?= h($faqs->image) ?></td>
                <td><?= h($faqs->image_list) ?></td>
                <td><?= h($faqs->view_count) ?></td>
                <td><?= h($faqs->comment_count) ?></td>
                <td><?= h($faqs->allow_comment) ?></td>
                <td><?= h($faqs->order) ?></td>
                <td><?= h($faqs->status) ?></td>
                <td><?= h($faqs->home) ?></td>
                <td><?= h($faqs->featured) ?></td>
                <td><?= h($faqs->tag) ?></td>
                <td><?= h($faqs->created) ?></td>
                <td><?= h($faqs->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__d('acp', 'View'), ['controller' => 'Faqs', 'action' => 'view', $faqs->id]) ?>
                    <?= $this->Html->link(__d('acp', 'Edit'), ['controller' => 'Faqs', 'action' => 'edit', $faqs->id]) ?>
                    <?= $this->Form->postLink(__d('acp', 'Delete'), ['controller' => 'Faqs', 'action' => 'delete', $faqs->id], ['confirm' => __d('acp', 'Are you sure you want to delete # {0}?', $faqs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
