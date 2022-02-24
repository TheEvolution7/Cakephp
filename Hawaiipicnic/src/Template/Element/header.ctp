<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
?> 
<aside id="pwe-aside">
    <!-- Logo -->
    <div class="logo">
        <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>"><img src="<?= $this->Url->build('/uploads/banners/' . $banners[2][0]->id . DS . $banners[2][0]->image ) ?>" alt="<?= $banners[2][0]->title ?>"></a>
    </div>
    <!-- Menu -->
    <nav id="pwe-main-menu">
        <ul>
            <li class="<?= $this->request->getParam('action') == 'home' ? 'pwe-active' : '' ?>"><a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>"><?= __('Home') ?></a></li>
            <li class="<?= $this->request->getParam('action') == 'about' ? 'pwe-active' : '' ?>"><a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'about']) ?>"><?= __('About Us') ?></a></li>
            <li class="<?= $this->request->getParam('controller') == 'Products' && $this->request->getParam('action') == 'service' || $this->request->getParam('controller') == 'Products' && $this->request->getParam('action') == 'serviceDetails' ? 'pwe-active' : '' ?>"><a href="<?= $this->Url->build(['controller' => 'Products','action' => 'service']) ?>"><?= __('Services') ?></a></li>
            <li class="<?= $this->request->getParam('action') == 'addOn' ? 'pwe-active' : '' ?>"><a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'addOn']) ?>"><?= __('Add-Ons') ?></a></li>
            <li class="<?= $this->request->getParam('action') == 'activities' ? 'pwe-active' : '' ?>"><a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'activities']) ?>"><?= __('Activities') ?></a></li>
            <li class="<?= $this->request->getParam('action') == 'partyfavors' ? 'pwe-active' : '' ?>"><a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'partyfavors']) ?>"><?= __('Partyfavors') ?></a></li>
            <li class="<?= $this->request->getParam('action') == 'index' ? 'pwe-active' : '' ?>"><a href="<?= $this->Url->build(['controller' => 'Albums','action' => 'index']) ?>"><?= __('Snippets') ?></a></li>
            <li class="<?= $this->request->getParam('controller') == 'Articles' && $this->request->getParam('action') == 'index' || $this->request->getParam('controller') == 'Articles' && $this->request->getParam('action') == 'details' || $this->request->getParam('controller') == 'Articles' && $this->request->getParam('action') == 'category' ? 'pwe-active' : '' ?>"><a href="<?= $this->Url->build(['controller' => 'Articles','action' => 'index']) ?>"><?= __('Our News') ?></a></li>
            <li class="<?= $this->request->getParam('action') == 'faq' ? 'pwe-active' : '' ?>"><a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'faq']) ?>"><?= __('FAQs') ?></a></li>
            <li class="<?= $this->request->getParam('action') == 'contact' ? 'pwe-active' : '' ?>"><a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'contact']) ?>"><?= __('Contact') ?></a></li>
            <br>
            <div class="separator"></div>
            <div class="btn-contact"><a href="<?= $this->Url->build(['controller' => 'Carts','action' => 'booking']) ?>" target="_blank"><span><?= __('Book Now') ?></span></a></div>
        </ul>   
    </nav>
    <!-- Sidebar Footer -->
    <div class="pwe-footer">
        <div class="social"> 
        <?php foreach($banners[3] as $banner): ?>
            <a href="<?= $banner->url ?>" target="_blank"><?= $banner->description ?></a> 
        <?php endforeach ?>  
    </div>
</aside>
