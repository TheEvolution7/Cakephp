<?php 
    echo $this->element('meta'); 
?>  
       <?= $this->element('header_booking') ?>         
        <section class="booking-detail">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="blog-sidebar __booking-form">
                            <div class="sidebar-widget">
                                <h2><?= __('Book Online Now') ?></h2>
                                <div class="form-booking">
                                <?= $this->Form->create(null,['url' => ['controller' => 'Carts', 'action' => 'booking']]) ?>
                                    <div class="row">
                                        <div class="col-md-offset-2 col-md-8 col-xs-12">
                                            <div class="input-group">
                                                <div class="select-box-thumb" style="display: block;">
                                                    <label for=""><?= __('Choose Your Destination:') ?></label><br>
                                                    <select name="destination" id="select-location" class="select-2">
                                                        <?php foreach($select_services as $service): ?>
                                                            <option value="<?= $service->id ?>" data-price="<?= $service->price ?>" <?=  !empty($booking['destination']) && $booking['destination'] == $service->id ? 'selected'  : '' ?>><?= $service->title .' - '. $service->currency .$service->price ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-offset-2 col-md-8 col-xs-12">
                                            <div class="input-group">
                                                <label for=""><?= __('No. Of Passengers') ?><span>*</span></label>
                                                <div class="quantity">
                                                    <button type="button" class="minus"><i class="icon icon_minus-06"></i></button>
                                                    <input id="passenger" type="text"  name="quantity" step="1" value="<?= $booking['quantity'] ?>" min="1" title="Qty"  class="input-text qty text">
                                                    <button type="button" class="plus"><i class="icon icon_plus"></i></button>
                                                </div>
                                                <p class="sub-input"><strong>*ROUND-TRIP transportation*</strong>Pricing for 1-6 passengers. $25 per additional passenger thereafter.</p>

                                                <div class="price-total">
                                                    <?= __('Total price:') ?> <div><input class="money-icon" type="text" readonly value="$"><input type="text" id="price-number" name="price" value="100" readonly></div>
                                                </div>
                                                <ul class="js-event-log"></ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="group-btn">
                                        <button type="submit" class="btn btn-primary"><?= __('Next') ?></button>
                                    </div>
                                <?php $this->Form->end(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
        </section>
        <script>
        $(function() {

            $('.quantity button').click(function() {
                
                if ($('#passenger').val() > 6) {
                    var p = $('#select-location').find(':selected').data('price')
                    var b = $('#passenger').val() - 6
                    $('#price-number').val(p + b*25)
                }
                else {
                    $('#price-number').val($('#select-location').find(':selected').data('price'))
                }
                if ($('#passenger').val() == 0) {
                    $('#price-number').val(0)
                }
            });
            $(window).on('load', function(){
                var a = $('#select-location').find(':selected').data('price')

                if ($('#passenger').val() > 6) {
                    var b = $('#passenger').val() - 6
                    $('#price-number').val(a + b*25)
                }
                else {
                    $('#price-number').val(a)
                }
                if ($('#passenger').val() == 0) {
                    $('#price-number').val(0)
                }
                
            })

            $('#passenger').on('change', function() {
                if ($('#passenger').val() > 6) {
                    var p = $('#select-location').find(':selected').data('price')
                    var b = $('#passenger').val() - 6
                    $('#price-number').val(p + b*25)
                }
                else {
                    $('#price-number').val($('#select-location').find(':selected').data('price'))
                }
                if ($('#passenger').val() == 0) {
                    $('#price-number').val(0)
                }
                
            })

            $('#select-location').on('change', function() {
                var a = $(this).find(':selected').data('price')

                if ($('#passenger').val() > 6) {
                    var b = $('#passenger').val() - 6
                    $('#price-number').val(a + b*25)
                }
                else {
                    $('#price-number').val(a)
                }
                if ($('#passenger').val() == 0) {
                    $('#price-number').val(0)
                }
            })
        });

        

    </script>
        