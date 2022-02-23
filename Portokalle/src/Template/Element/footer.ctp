<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
?> 
<footer class="footer">
    <div class="footer__center center">
    <div class="footer__container">
        <div class="footer__wrap"><a class="footer__logo" href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>"><img class="some-icon"
            src="<?= $this->Url->build('/uploads/banners/' . $banners[14][1]->id . DS . $banners[14][1]->image ) ?>" alt="<?= $banners[14][1]->title ?>"></a>
        <div class="footer__text"><?= $banners[14][1]->title ?> 
        </div>
        <div class="footer__social">
            <a class="footer__link" href="<?= $banners[14][2]->url ?>">
            <svg class="icon icon-facebook">
                <use xlink:href="#icon-facebook"></use>
            </svg></a>
            <a class="footer__link" href="<?= $banners[14][3]->url ?>">
            <svg class="icon icon-twitter">
                <use xlink:href="#icon-twitter"></use>
            </svg></a>
            <a class="footer__link" href="<?= $banners[14][4]->url ?>">
            <svg class="icon icon-youtube">
                <use xlink:href="#icon-youtube"></use>
            </svg></a></div>
        </div>
        <div class="footer__row">   
        <div class="footer__col">
            <div class="footer__category"><?= __('Company') ?></div>
            <div class="footer__menu">
            <a class="footer__item" href="<?= $this->Url->build(['controller' => 'Pages','action' => 'about']) ?>"><?= __('About us') ?></a>
            <a class="footer__item" href="<?= $this->Url->build(['controller' => 'Pages','action' => 'ourDoctor']) ?>"> <?= __('Our Doctors') ?></a>
            <a class="footer__item" href="<?= $this->Url->build(['controller' => 'Pages','action' => 'pricing']) ?>"><?= __('Pricing') ?></a>
            <a class="footer__item" href="<?= $this->Url->build(['controller' => 'Articles','action' => 'career']) ?>"><?= __('Career') ?></a>
            <a class="footer__item" href="<?= $this->Url->build(['controller' => 'Pages','action' => 'termAndConditions']) ?>"><?= __('Term And Conditions') ?></a>
            <a class="footer__item" href="<?= $this->Url->build(['controller' => 'Pages','action' => 'privacyPolicy']) ?>"><?= __('Privacy Policy') ?></a>
            
            </div>
        </div>
        <div class="footer__col">
            <div class="footer__category"><?= __('Features') ?></div>
            <div class="footer__menu">
            <a class="footer__item" href="<?= $this->Url->build(['controller' => 'Pages','action' => 'howItWork']) ?>"><?= __('How it works') ?></a>
            <a class="footer__item" href="<?= $this->Url->build(['controller' => 'Pages','action' => 'features']) ?>"><?= __('Online prescriptions') ?></a>
            <a class="footer__item" href="<?= $this->Url->build(['controller' => 'Pages','action' => 'features']) ?>"><?= __('Sick notes') ?></a>
            <a class="footer__item" href="<?= $this->Url->build(['controller' => 'Pages','action' => 'features']) ?>"><?= __('Lab work') ?></a>
            </div>
        </div>
        
        <div class="footer__col">
            <div class="footer__category"><?= __('Specialities') ?></div>
            <div class="footer__menu">
                <a class="footer__item" href="<?= $this->Url->build(['controller' => 'Pages','action' => 'pediatric']) ?>"><?= __('Pediatric') ?></a>
                <a class="footer__item" href="<?= $this->Url->build(['controller' => 'Pages','action' => 'neurology']) ?>"><?= __('Neurology') ?></a>
                <a class="footer__item" href="<?= $this->Url->build(['controller' => 'Pages','action' => 'neuropediatrics']) ?>"><?= __('Neuropediatrics') ?></a>
                <a class="footer__item" href="<?= $this->Url->build(['controller' => 'Pages','action' => 'psychiatric']) ?>"><?= __('Dermatology') ?></a>
                <a class="footer__item" href="<?= $this->Url->build(['controller' => 'Pages','action' => 'specialities']) ?>"><?= __('See all') ?></a>
            </div>
        </div>
        <div class="footer__col">
            <div class="footer__category"><?= __('Work with us') ?></div>
            <div class="footer__menu">
            <a class="footer__item" href="#"><?= __('Learn more') ?></a>
            <a class="footer__item" href="<?= $this->Url->build(['controller' => 'Pages','action' => 'contact']) ?>"><?= __('Employers') ?></a>
            <a class="footer__item" href="<?= $this->Url->build(['controller' => 'Pages','action' => 'contact']) ?>"><?= __('Insurers') ?></a>
            <a class="footer__item" href="<?= $this->Url->build(['controller' => 'Pages','action' => 'contact']) ?>"><?= __('Hospital') ?></a>
            </div>
        </div>
        </div>
    </div>
    <div class="footer__copyright"><?= $banners[14][5]->title ?></div>
    
    </div>
</footer>