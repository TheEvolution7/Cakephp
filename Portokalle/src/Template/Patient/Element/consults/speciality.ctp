<?php 
use Cake\I18n\Number;
echo $this->Form->create(null, ['id' => 'form-speciality']); 
?>
<div class="form-container">
    <div class="field">
        <h3 class="field__title ta-left">
            <?= __('What type of provider would you like to see?') ?>
        </h3>
        <div class="package-container speciality-container">
            <?php foreach ($specialities as $speciality): ?>
                <div class="col-pack">
                    <input type="radio" id="package-<?= $speciality->id ?>" class="" name="speciality_id" value="<?= $speciality->id ?>"/>
                    <label for="package-<?= $speciality->id ?>" class="history__card <?= $speciality->available == 1 ? 'show-model' : 'hide-model' ?>" data-value="<?= $speciality->id ?>" data-available="<?= $speciality->available ?>" data-price="<?= $speciality->price ?>">
                        <div class="history__logo">
                            <?php
                                $image = '/img/no_thumb.png';
                                if (file_exists(WWW_ROOT . '/uploads/specialities/' . $speciality->id . DS . $speciality->image)) {
                                    $image = '/uploads/specialities/' . $speciality->id . DS . $speciality->image;
                                }
                            ?>
                            <img class="history__pic" src="<?= $this->Url->build($image) ?>" alt="" />
                            <div class="check-box-custom"></div>
                        </div>
                        <div class="history__title"><?= $speciality->title ?></div>
                        <div class="history__details">
                            <span class="history__company">
                            <?php 
                            echo $this->Text->truncate(
                                $speciality->description,
                                100,
                                [
                                    'ellipsis' => '...',
                                    'exact' => false
                                ]
                            ); ?></span>
                        </div>
                        <div class="history__line">
                            <div class="history__time"><?php echo $speciality->price > 0 ? $this->Number->currency($speciality->price, 'USD'): ''; ?>
                                <!-- <?php if ($speciality->available): ?>
                                    <div class="history__status">
                                        <div class="tooltip icon" title="Available by appointment">
                                        </div>
                                    </div>
                                <?php endif ?> -->
                            </div>
                            <?php if (!empty($speciality->content)): ?>
                                <div class="history__status">
                                    <div class="tooltip icon" title="<?= $speciality->content ?>">
                                        <svg class="icon icon-dots">
                                            <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-dots"></use>
                                        </svg>
                                    </div>
                                </div>
                            <?php endif ?>
                        </div>
                    </label>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <div class="flex justify-center btn-step">
        <?= $this->Html->link(__('Back'), $param, ['class' => 'btn btn_blue __back']) ?>
        <?= $this->Form->button(__('Continue'), ['class' => 'btn btn_blue __next']) ?>
    </div>
</div>
<?php echo $this->Form->end(); ?>

<div id="modal-choose-ap" class="mfp-hide white-popup-block">
    <div class="box-content edit-form choose-form">
        <a class="popup-modal-dismiss" href="javascript:;">
            <svg class="icon icon-close">
                <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-close"></use>
            </svg>
        </a>
        <p><?= __('Online consultations available by appointment.') ?></p>
        <h2><?= __('When do you want to see a General Practitioner?') ?></h2>
        <?php echo $this->Form->create(null); ?>
            <?= $this->Form->hidden('speciality_id', ['class' => 'input-model']) ?>
            <div class="box-option-modal">
                <!-- <div class="col-auto" id="price-hide">
                    <button type="submit" class="box-ap" name="type_booking" value="as_soon_as_possible">
                        <img src="<?= $webroot ?>img/user/6.png" alt="" />
                        <div class="content">
                            <?= __('As soon as possible') ?>
                        </div>
                    </button>
                </div> -->
                <div class="col-auto" id="available-hide">
                    <button type="submit" class="box-ap" name="type_booking" value="book_appointment">
                        <img src="<?= $webroot ?>img/user/7.png" alt="" />
                        <div class="content">
                            <?= __('Book appointment') ?>
                        </div>
                    </button>
                </div>
            </div>
            <button type="button" class="btn btn_blue close-popup __back"><?= __('Cancel') ?></button>
        <?php echo $this->Form->end(); ?>
    </div>
</div>

<script>
    $('.__next').attr('disabled','disabled');

    $('.speciality-container .hide-model').on('click', function() {
        $('.__next').removeAttr('disabled');
    })

    $('.speciality-container .show-model').on('click', function() {
        var data = $(this).attr('data-value');
        $('input[class="input-model"]').val(data);

        if ($(this).attr('data-price') == 0) {
            $('#price-hide').css('display', 'none');
        }else{
            $('#price-hide').removeAttr('style');
        }

        $.magnificPopup.open({
            items: {
                src: '#modal-choose-ap',
                type:'inline'
            },
            modal: true
        });
    })

    $('#modal-choose-ap').on('hidden.bs.modal', function () {
      $('.__next').attr('disabled','disabled');
    })
  </script>
  <script>
    $('#box-text-spec').hide()
    $('.speciality-container input').on('change', function(){
      if ($(this).is(':checked')) {
        var a = $(this).val()
        $('#box-text-spec').show()
        $('#box-text-spec').html(a)
      }
    })
</script>
