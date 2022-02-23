<?php 
	$images = explode('|', $record->record_attachments);
	unset($images[count($images) - 1]);
?>
<?php foreach ($images as $image): ?>
	<div class="wrapper-item flex flex-col align-center">
        <div class="wrapper-item__icon relative">
            <?= $this->Html->image('/uploads/records/' . $record->id . DS . $image) ?>
            <a href="javascript:;" class="btn-stick-delete remove_image" name="<?= $image ?>">
                <svg class="icon icon-minus">
                    <use xlink:href="<?= $this->Url->build('/frontend/img/sprite.svg') ?>#icon-plus"></use>
                </svg>
            </a>
        </div>
        <span class="wrapper-item__filename"><?= $image ?></span>
    </div>
<?php endforeach ?>