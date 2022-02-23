<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta') 
?> 
<div class="outer__container">
    <div class="vacancy">
        <div class="vacancy__center center">
        <div class="vacancy__details">
            <h4 class="vacancy__title h4" data-aos="animation-scale-top"><?= $career->excerpt ?></h4>
            <div class="vacancy__note" data-aos="animation-scale-top"><?= $career->title ?> - <?= $career->description ?></div>
            <a href="#form-resume" class="vacancy__btn btn btn_blue" data-aos="animation-scale-top">Apply Now</a>
        </div>
        <div class="vacancy__content content" data-aos="animation-scale-top">
                <?= $career->content ?>
            </div>
        </div>
    </div>
    <div class="message bg" id="form-resume">
        <div class="message__center center">
        <h2 class="message__title h2" data-aos="animation-scale-top">Ready to apply?</h2>
        <?= $this->Form->create(null, ['type' => 'file','class' => 'message__form','data-aos' => 'animation-scale-top'])?>
            <div class="message__fieldset">
            <div class="message__line">
                <div class="field">
                <div class="field__label">Full Name</div>
                <div class="field__wrap">
                    <input class="field__input" type="text" name="name" required>
                </div>
                </div>
                <div class="field">
                <div class="field__label">Email Adress</div>
                <div class="field__wrap">
                    <input class="field__input" type="email" name="email" required>
                </div>
                </div>
            </div>
            <div class="message__resume">
                <div class="message__file">
                <div class="field field_file">
                    <div class="field__label">Attach Resume</div>
                    <div class="field__wrap">
                    <input class="field__file" type="file" id="file-resume" name="file" accept=".pdf,.doc">
                    <div class="field__add">Choose file</div>
                    </div>
                </div>
                </div>
                <label for="file-resume" class="message__btn btn btn_blue richText-btn">Browse</label>
            </div>
            <div class="field field_textarea">
                <div class="field__label">Why do you want to work here?</div>
                <div class="field__wrap">
                <textarea class="field__textarea" placeholder="Type here" name="content"></textarea>
                </div>
            </div>
            </div>
            <div class="message__control">
            <label class="checkbox">
                <input class="checkbox__input" type="checkbox" checked required><span class="checkbox__in"><span class="checkbox__tick"></span><span class="checkbox__text">I agree to the Terms & Conditions</span></span>
            </label>
            <button type="submit" class="message__btn btn btn_blue">Submit application</button>
            </div>
        <?= $this->Form->end() ?>
        </div>
    </div>
</div>