
<?php $record_attachments = explode(',', $record->record_attachments); unset($record_attachments[count($record_attachments) - 1]) ?>
<?php foreach ($record_attachments as $attachment): ?>
    <div class="wrapper-item flex flex-col align-center">
        <div class="wrapper-item__icon relative">
            <?= $this->Html->image('/uploads/records/' . $record->id . DS . $attachment) ?>
            <a href="javascript:;" class="btn-stick-delete remove_image" name="<?= $image ?>">
                <svg class="icon icon-minus">
                    <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-plus"></use>
                </svg>
            </a>
        </div>
        <span class="wrapper-item__filename"><?= $attachment ?></span>
    </div>
<?php endforeach ?>
