<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta') 
?>
<!-- Banner Title -->
<div class="banner-container">
    <div class="banner-img"> <img class="banner-img-width" src="<?= $webroot ?>images/topbanner-1.jpeg" alt=""> </div>
    <div class="banner-head">
        <div class="banner-head-padding banner-head-margin">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 text-center"> <span class="heading-meta"><?= __('Booking') ?></span>
                        <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?= __('Your Infomation') ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Booking -->
<div class="booking-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form method="post">
                    <div class="booking-info">
                        <div class="booking-pack">
                            <table>
                                <thead>
                                    <th><?= __('Package') ?></th>
                                    <th><?= __('Add Appointment') ?></th>
                                    <th><?= __('Date time') ?></th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?= $service['title'] ?></td>
                                        <td><?=  !empty($appointment['title']) ? $appointment['title'] : null ?></td>
                                        <td><?= $booking['date'] ?></td>
                                    </tr>
                                </tbody>
                                
                            </table>
                            <div class="btn-contact"><a href="<?= $this->Url->build(['controller' => 'Carts','action' => 'booking']) ?>"><span><?= __('Change Package') ?></span></a></div>
                        </div>
                        <div class="booking-input">
                            <div class="row">
                                <div class="col-md-12"> <span class="heading-meta"><?= __('form') ?></span>
                                    <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?= __('Infomation') ?></h2>
                                </div>
                                <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="first_name" placeholder="First Name" required> 
                                    </div>
                                </div>
                                <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                                    <div class="form-group">
                                        <input type="text" class="form-control"  name="last_name" placeholder="Last Name" required> 
                                    </div>
                                </div>
                                <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="email" placeholder="Email" required> 
                                    </div>
                                </div>
                                <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="phone" placeholder="Phone" required> 
                                    </div>
                                </div>
                                <div class="col-md-12"> <span class="heading-meta">form</span>
                                    <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?= __('Picnic Location') ?></h2>
                                    <p class="animate-box" data-animate-effect="fadeInLeft">Please list the location you would like your picnic to be held at. If it is not listed, a travel fee will incur (we will have to assess the location first and then contact you regarding the fee)</p>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="location">Where would you like to have your picnic? </label>
                                        <?= $this->Form->select('location', $listArticleCategories, ['id' => 'select', 'class' => 'form-control', 'empty' => 'Select Location']) ?>
                                    </div>
                                    <div id="res">
                                        <?php foreach ($articleCategories as $articleCategory): ?>
                                            <ul id="articleCategory-<?= $articleCategory->id ?>" style="display: none;">
                                                <?php foreach ($articleCategory->articles as $article): ?>
                                                    <li>
                                                        <div class="content-faq animate-box fadeInLeft animated" data-animate-effect="fadeInLeft">
                                                            <a href="<?= $this->Url->build(['controller' => 'Articles', 'action' => 'details', $article->slug, $article->id]) ?>" target="_blank"><?= $article->title ?></a>
                                                            <p><?= $article->description ?></p>
                                                        </div>
                                                    </li>
                                                <?php endforeach ?>
                                            </ul>
                                        <?php endforeach ?>
                                    </div>
                                </div>

                                <div class="col-12 animate-box" data-animate-effect="fadeInLeft">
                                    <div class="form-group">
                                        <label for="">If your desired location is not listed, please let us know here.  </label>
                                        <textarea name="content" id="" cols="30" rows="6" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12"> <span class="heading-meta">form</span>
                                    <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft">Custom Message Board</h2>
                                    <p class="animate-box" data-animate-effect="fadeInLeft">What would you like on your custom message board? (happy birthday, happy anniversary, etc)  35 letters max. </p>
                                </div>
                                <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
                                    <div class="form-group">
                                        <input type="text" name="description" class="form-control" placeholder=""> 
                                    </div>
                                </div>

                                <div class="col-md-12"> <span class="heading-meta">form</span>
                                    <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft">Add-On Details</h2>
                                    <p class="animate-box" data-animate-effect="fadeInLeft">If you selected any add-ons that requires more detail, please fill out the question that applies to your add-on.  </p>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">If you got "Picnic n Chill" Package or "Grandeur" Package which game of choice would you like? </label>
                                        <select name="package" class="form-control"><option value="-1">Select</option><option value="Uno">Uno</option><option value="Cards Against Humanity">Cards Against Humanity</option><option value="Monopoly Deal">Monopoly Deal</option><option value="Badminton">Badminton</option><option value="Love Language">Love Language</option><option value="Mancala">Mancala</option></select>
                                    </div>  
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">If you got "Grandeur" Package, which Hand-Crafted Arch would you like?  </label>
                                        <select name="arch" class="form-control"><option value="-1">Select</option><option value="Floral Arch">Floral Arch</option><option value="Curtain Arch">Curtain Arch</option></select>
                                    </div>  
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">If you got a party favor, please submit your custom image here. </label> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <input type="file" 
                                            class="filepond"
                                            name="filepond" 
                                            multiple 
                                            data-allow-reorder="true"
                                            data-max-file-size="3MB"
                                            data-max-files="3">
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">If you got a number balloon, please submit the numbers you would like. Max 2 balloons. </label>
                                        <input type="text" name="number" class="form-control" placeholder=""> 
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">If you got a balloon column/garland, which colors do you want (2 Colors + 1 Accent Color)   </label>
                                        <input type="text" name="color" class="form-control" placeholder=""> 
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Where did you hear about us?  </label>
                                        <select name="social" class="form-control"><option value="-1">Select</option><option value="TikTok">TikTok</option><option value="Instagram">Instagram</option><option value="Business Insider">Business Insider</option><option value="Friend">Friend</option><option value="Walk-By">Walk-By</option></select>
                                    </div>  
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="checkbox" name="check-term" id="check-term" value="1" class="widget-single-checkbox" required>
                                        <label for="check-term" class="control-label">I have read and agree to the <a href="#">terms and conditions</a> listed above <span class="error">*</span> <span class="show-on-error">(required)</span></label> 
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="btn-contact"><button type="submit"><span><?= __('Checkout') ?></span></button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#select").on('change', function(){
    $('#res').find('ul').hide();
    $('#articleCategory-' + $(this).val()).show();
  });
});
</script>