<div class="d-inline-block">

	<?php if (!isset($except['edit'])): ?>
    <?= $this->Html->link('<i class="fa fa-pen"></i>'.__d('acp','Edit'), ['action' => 'edit', $id], ['class' => 'btn btn-sm btn-label-warning btn-bold mb-2', 'escape' => false]) ?>
	<?php endif; ?>

	<?php if (isset($except['view'])): ?>
    <?= $this->Html->link('<i class="fa fa-eye"></i>'.__d('acp','View'), ['action' => 'view', $id], ['class' => 'btn btn-sm btn-label-success btn-bold mb-2', 'escape' => false]) ?>
	<?php endif; ?>

	<?php if (!isset($except['delete'])): ?>
    <?= $this->Form->postLink('<i class="fa fa-trash-alt"></i>'.__d('acp','Delete'), ['action' => 'delete', $id], ['confirm' => __d('acp', 'Are you sure you want to delete # {0}?', $id), 'class' => 'btn btn-sm btn-label-danger btn-bold btn-remove mb-2', 'escape' => false]) ?>
    <?php endif; ?>
</div>