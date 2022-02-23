<style>
    .medical-records__body .body-wrapper .wrapper-item .wrapper-item__icon {
        padding-bottom: 70%
    }
    .medical-records__body .body-wrapper .wrapper-item .wrapper-item__icon img {
        position: absolute;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>
<div class="card1">
    <div class="card1__body">
        <div class="medical_new">
            <div class="medical_new__container records-group" id="records-group">
                <div class="__title __title_button flex justify-between item-center records-head" id="records-head">
                    <span><?= $record->title ?></span>
                    <svg class="icon icon-arrow-down">
                        <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-arrow-down"></use>
                    </svg>
                </div>

                <div class="medical_form__container">
                    <div class="medical-records records-tags" id="records-tags" style="display: none;">
                        <div class="medical-records__head">
                            <?= $this->Form->create($record, ['url' => ['action'=> 'edit', $record->id], 'class' => 'js-activity-tags grid grid-col-2 sm:grid-col-1']) ?>
                            <div class="medical_form_group flex flex-col">
                                <div class="medical_form_group__title">
                                    <?= $this->Form->label('record_category_id', null,['class' => 'field-label']) ?>
                                </div>
                                <?= $this->Form->select('record_category_id', $recordCategories, ['class' => 'field__input', 'empty' => true]) ?>
                            </div>

                            <div class="medical_form_group">
                                <div class="medical_form_group__title"><?= $this->Form->label('title') ?></div>
                                <?= $this->Form->text('title', ['class' => 'field__input']) ?>
                            </div>
                            <div class="medical_form_group flex">
                                <div class="medical_form_group__title"><?= $this->Form->label('date_of_record') ?></div>
                                <div class="medical-form__subgroup flex gap-2 date-form">
                                    <div class="subgroup-item flex-1 flex flex-col">
                                        <div class="medical_form_subgroup__title"><?= $this->Form->label('date_of_record.month') ?></div>
                                        <?= $this->Form->date('date_of_record', [
                                            'month' => [
                                                'class' => 'field__input'
                                            ], 
                                            'monthNames' => true,
                                            'day' => false, 
                                            'year' => false
                                        ]) ?>
                                    </div>
                                    <div class="subgroup-item flex-1 flex flex-col">
                                        <div class="medical_form_subgroup__title"><?= $this->Form->label('date_of_record.date') ?></div>
                                        <?= $this->Form->date('date_of_record', [
                                            'day' => [
                                                'class' => 'field__input'
                                            ],
                                            'month' => false, 
                                            'year' => false
                                        ]) ?>
                                    </div>
                                    <div class="subgroup-item flex-1 flex flex-col">
                                        <div class="medical_form_subgroup__title"><?= $this->Form->label('date_of_record.year') ?></div>
                                        <?= $this->Form->date('date_of_record', [
                                            'year' => [
                                                'class' => 'field__input'
                                            ],
                                            'month' => false, 
                                            'day' => false
                                        ]) ?>
                                    </div>
                                </div>
                            </div>

                            <div class="medical_form_group">
                                <div class="medical_form_group__title"><?= $this->Form->label('description') ?></div>
                                <?= $this->Form->textarea('description', ['class' => 'form__group__fullwidth field__textarea']) ?>
                            </div>
                            <?= $this->Form->button('Edit', ['class' => 'button button-primary button-sm']) ?>
                            <?= $this->Form->end() ?>
                        </div>

                        <div class="medical-records__body">
                            <div class="body-title flex justify-between item-center">
                                <span class="body-title__text"><?= __('Record attachments') ?></span>
                            </div>
                            <div class="body-title flex justify-between item-center">
                                <div class="body-title__controls" style="width: 100%">
                                    <?php 
                                        echo $this->Form->create($record, ['url' => ['action' => 'jedit', $record->id, '_ext' => 'json'], 'class' => 'dropzone', 'id' => 'dropzoneFrom' . $record->id]);
                                        echo $this->Form->end();
                                    ?>
                                    <button type="button" class="button button-primary button-sm submit<?= $record->id?>" style="margin: 15px 0 20px">Upload</button>
                                </div>
                            </div>
                            
                            <div class="body-wrapper grid grid-col-5" id="preview<?= $record->id ?>">
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
                            </div>
                        </div>
                        <div class="medical-records__footer">
                            <div class="footer-row">
                                <div class="footer-row__status">
                                    <svg class="icon icon-eye">
                                        <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-eye"></use>
                                    </svg>
                                    <span>This record is visible to providers. <a href="#" class="btn-a btn-a-sublink">Hide Record</a></span>
                                </div>
                                <div class="footer-row__controls flex justify-between">
                                    <button class="button button-primary button-sm">Delete this record</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    Dropzone.autoDiscover = false;
    $(document).ready(function(){
        var myDropzone<?= $record->id?> = new Dropzone("#dropzoneFrom<?= $record->id?>", { 
          autoProcessQueue: false,
          maxFiles: 1,
          init: function() {
            var submitButton<?= $record->id?> = document.querySelector('.submit<?= $record->id?>');
                myDropzone<?= $record->id?> = this;
                submitButton<?= $record->id?>.addEventListener("click", function(){
                myDropzone<?= $record->id?>.processQueue();
                });
            this.on('complete', function(){
              if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
              {
               var _this = this;
               _this.removeAllFiles();
              }

              list_image();
          });
          }
        });

        function list_image()
        {
            $('#preview<?= $record->id ?>').load('<?= $this->Url->build(['action' => 'listImage', $record->id, '_ext' => 'json']); ?>', function() {
                remove_image();
            });
        }

        remove_image();
        function remove_image(){
            $('.remove_image').click(function(){
                var name = $(this).attr('name');
                $.ajax({
                   url:"<?= $this->Url->build(['action'=> 'removeImage', $record->id]) ?>",
                   method:"POST",
                   data:{name:name},
                   success:function(data)
                    {
                        list_image();
                    }
                });
            });
        }
    });
  
</script>
