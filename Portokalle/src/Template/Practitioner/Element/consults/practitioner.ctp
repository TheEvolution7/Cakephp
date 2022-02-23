<div class="form-container">
    <div class="field">
        <h3 class="field__title"><?= __('Choose Your Practitioner') ?></h3>
        <div class="field__wrap">
            <?php 
                echo $this->Form->create(null, ['url' => ['action' => 'listPractitioner', '_ext' => 'json'], 'type' => 'get', 'class' => 'ajax-form']);
                echo $this->Form->text('keyword', ['class' => 'field1__input js-field-input', 'placeholder' => __('Search Practitioner')]);
                echo $this->Form->end();
             ?>
             <?php echo $this->Form->create(); ?>
             <br>
             <!-- <h3 class="field__title" style="margin-top: 20px;">Search doctor</h3>
             <div class="field1 js-field">
                <div class="field1__label">Search</div>
                <div class="field1__wrap __input-search">
                    <input class="field1__input js-field-input" type="text" name="address" required="">
                    <button type="submit"><svg class="icon icon-search">
                        <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-search"></use>
                    </svg></button>
                </div>
            </div> -->
            <div class="box-scroll radio-doctor" id="list-practitioner">
                
            </div>
        </div>
    </div>
    <?= $this->Html->link(__('Back'), $param, ['class' => 'btn btn_blue']) ?>
    <?= $this->Form->button(__('Next'), ['class' => 'btn btn_blue']) ?>
</div>
<? echo $this->Form->end();?>

<script>

    $(function() {
        listPractitioner();

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
