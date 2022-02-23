<?php 
use Cake\I18n\Number; ?>

<div class="wrapper flex flex-col lg:flex-row">
    <div class="field flex-1 m-6 m-sm-0">
        <h3 class="field__title" style="margin-top: 20px;">Select a provider</h3>
        <div class="field1 js-field">
            <div class="field1__label">Search</div>
            <div class="field1__wrap __input-search">
                <?php 
                    echo $this->Form->create(null, ['url' => ['action' => 'listPractitioner', '_ext' => 'json'], 'type' => 'get', 'class' => 'ajax-form']);
                    echo $this->Form->text('keyword', ['class' => 'field1__input js-field-input', 'placeholder' => __('Search Practitioner')]);
                    echo $this->Form->end();
                 ?>
            </div>
        </div>
        <br>
        <?php echo $this->Form->create(); ?>
        <div class="box-scroll radio-doctor">
            <div class="item-doctor">
                <input type="radio" id="doctor-0" class="hidden" name="practitioner_id" value="" />
                <label for="doctor-0" class="find-doc-minicard flex flex-col item-center lg:flex-row">
                    <div class="friends__pic">
                        <svg class="icon icon-minus">
                            <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-plus"></use>
                        </svg>
                    </div>
                    <div class="find-doc-minicard-info flex flex-col item-center md:item-start">
                        <div class="title">
                            No preference
                        </div>
                        <div class="description">A doctor will be automatically selected for you</div>
                    </div>
                </label>
            </div>
        </div>
        
        <div class="box-scroll radio-doctor" id="list-practitioner">
        </div>
        
    </div>
</div>

<div class="flex justify-center btn-step">
    <?= $this->Html->link(__('Back'), $param, ['class' => 'btn btn_blue __back']) ?>
    <?= $this->Form->button(__('Continue'), ['class' => 'btn btn_blue __next']) ?>
</div>
<?php echo $this->Form->end(); ?>
<script>

    $(function() {
        //listPractitioner();

        function listPractitioner()
        {
            $('#list-practitioner').load('<?= $this->Url->build(['action' => 'listPractitioner', '_ext' => 'json']); ?>', function() {
                $(this).fadeTo(200, 1);
            });
        }

        $(document).on('change', '.ajax-form', function(event) {
            var form = $(this);
            $.ajax({
                type: form.attr('method'),
                url: form.attr('action'),
                data: form.serialize(),
                dataType: "html"
            }).done(function(msg) {
                $('#list-practitioner').html(msg);
            }).fail(function(response) {

            });
            event.preventDefault();
        });
    });
</script>
