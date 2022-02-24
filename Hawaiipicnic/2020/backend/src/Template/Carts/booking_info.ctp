<?php  
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta');
    $user = $this->Session->read('Auth.User');
?> 
<!-- Banner Title -->
<div class="banner-container">
    <div class="banner-img"> <img class="banner-img-width" src="<?= $this->Url->build('/uploads/banners/'.$banners[31][0]->id . DS . $banners[31][0]->image) ?>" alt="<?= $banners[31][0]->title ?>"> </div>
    <div class="banner-head">
        <div class="banner-head-padding banner-head-margin">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 text-center"> <span class="heading-meta"><?= $banners[31][0]->title ?></span>
                        <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?= $banners[31][0]->description ?></h2>
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
               <!-- lala -->
                    <div class="booking-info">
                    <?= $this->Form->create(null,['id' => 'form-change']) ?>
                        <div class="booking-pack">
                            <table>
                                <thead>
                                    <th>Package</th>
                                    <th>Add Appointment</th>
                                    <th>Date time</th>
                                </thead>
                                <tbody>
                                <?php foreach ($carts as $key => $cart): ?>
                                    <tr>
                                        <td><?= $cart->title ?></td>
                                        <td><?= $cart->attribute_values[0]->title ?></td>
                                        <td><?= $cart->date ?></td>
                                    </tr>
                                <?php endforeach ?>
                                </tbody>
                                
                            </table>
                            <div class="btn-contact"><a onclick="document.getElementById('form-change').submit();"><span>Change Package</span></a></div>
                        </div>
                    <?= $this->Form->end(); ?>  
                    <?= $this->Form->create(null,['url' => ['controller' => 'Carts','action' => 'checkout'],'id' => 'form-checkout','type' => 'file']) ?>
                        <div class="booking-input">
                            <div class="row">
                                <div class="col-md-12"> <span class="heading-meta">form</span>
                                    <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft">Infomation</h2>
                                    <?php if(empty($user)): ?>
                                        <p>Already have an account? Already have an account? <a href="<?= $this->Url->build(['controller' => 'Users','action' => 'login']) ?>">Log in</a></p>
                                    <?php endif ?>
                                </div>
                                <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                                    <div class="form-group"> 
                                        <?= $this->Form->text('first_name', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'First Name','value' => $user['first_name']]); ?>
                                    </div>
                                </div>
                                <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                                    <div class="form-group">
                                    <?= $this->Form->text('last_name', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'First Name','value' => $user['last_name']]); ?>
                                    </div>
                                </div>
                                <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                                    <div class="form-group">
                                        <?= $this->Form->text('email', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'First Name','value' => $user['email']]); ?>
                                    </div>
                                </div>
                                <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                                    <div class="form-group">
                                    <?= $this->Form->text('phone', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'First Name','value' => $user['phone_number']]); ?> 
                                    </div>
                                </div>
                                <div class="col-md-12"> <span class="heading-meta">form</span>
                                    <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft">Picnic Location</h2>
                                    <p class="animate-box" data-animate-effect="fadeInLeft">Please list the location you would like your picnic to be held at. If it is not listed, a travel fee will incur (we will have to assess the location first and then contact you regarding the fee)</p>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="location">Where would you like to have your picnic? </label>
                                        <select name="location" class="form-control">
                                            <option value="-1">Select Location</option>
                                            <option value="Foster City Lagoon">Foster City Lagoon</option>
                                            <option value="Ryder Court Park (Water View/San Mateo)">Ryder Court
                                                Park (Water View/San Mateo)</option>
                                            <option value="Parkside Aquatic Park (Water View/ San Mateo)">
                                                Parkside Aquatic Park (Water View/ San Mateo)</option>
                                            <option
                                                value="Baker Beach ($65 beach fee will incur please make sure to select this as a add-on)">
                                                Baker Beach ($65 beach fee will incur please make sure to select
                                                this as a add-on)</option>
                                            <option value="In-House Call (submit your address below)">In-House
                                                Call (submit your address below)</option>
                                        </select>
                                    </div>
                                    
                                    
                                </div>
                                <div class="col-12 animate-box" data-animate-effect="fadeInLeft">
                                    <div class="form-group">
                                        <label for="">If your desired location is not listed, please let us know here.  </label>
                                        <textarea name="description" id="" cols="30" rows="6" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12"> <span class="heading-meta">form</span>
                                    <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft">Custom Message Board</h2>
                                    <p class="animate-box" data-animate-effect="fadeInLeft">What would you like on your custom message board? (happy birthday, happy anniversary, etc)  35 letters max. </p>
                                </div>
                                <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="birthday" placeholder=""> 
                                    </div>
                                </div>

                                <div class="col-md-12"> <span class="heading-meta">form</span>
                                    <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft">Add-On Details</h2>
                                    <p class="animate-box" data-animate-effect="fadeInLeft">If you selected any add-ons that requires more detail, please fill out the question that applies to your add-on.  </p>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">If you got "Picnic n Chill" Package or "Grandeur" Package which game of choice would you like? </label>
                                        <select name="city" class="form-control"><option value="-1">Select</option><option value="Uno">Uno</option><option value="Cards Against Humanity">Cards Against Humanity</option><option value="Monopoly Deal">Monopoly Deal</option><option value="Badminton">Badminton</option><option value="Love Language">Love Language</option><option value="Mancala">Mancala</option></select>
                                    </div>  
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">If you got "Grandeur" Package, which Hand-Crafted Arch would you like?  </label>
                                        <select name="address" class="form-control"><option value="-1">Select</option><option value="Floral Arch">Floral Arch</option><option value="Curtain Arch">Curtain Arch</option></select>
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
                                            name="image" 
                                            multiple 
                                            data-allow-reorder="true"
                                            data-max-file-size="3MB"
                                            data-max-files="3">
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">If you got a number balloon, please submit the numbers you would like. Max 2 balloons. </label>
                                        <input type="text" class="form-control" placeholder="" name="number"> 
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">If you got a balloon column/garland, which colors do you want (2 Colors + 1 Accent Color)   </label>
                                        <input type="text" class="form-control" placeholder="" name="state"> 
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
                                        <input type="checkbox" name="checked" id="check-term" class="widget-single-checkbox" value="1" required checked>
                                        <label for="check-term" class="control-label">I have read and agree to the <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'terms']) ?>">terms and conditions</a> listed above <span class="error">*</span> <span class="show-on-error">(required)</span></label> 
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="btn-contact"><a onclick="document.getElementById('form-checkout').submit();"><span>Checkout</span></a></div>
                                </div>
                            </div>
                            
                        </div>
                    <?= $this->Form->end(); ?>  
                    </div>
                <!-- lala -->
            </div>
        </div>
    </div>
</div>