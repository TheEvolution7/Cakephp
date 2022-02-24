<?php $banners = $this->getCache('banners_' . $configs['language']); ?>    
<div id="site-main-mobile-menu" class="site-main-mobile-menu">
    <div class="site-main-mobile-menu-inner">
        <div class="mobile-menu-header">
            <div class="mobile-menu-logo">
                <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'home']) ?>"><img src="<?= $this->Url->build('/uploads/banners/'.$banners[2][0]->id .DS.$banners[2][0]->image) ?>" alt="<?= $banners[2][0]->title ?>"></a>
            </div>
            <div class="mobile-menu-close">
                <button class="toggle">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-menu-content">
            <nav class="site-mobile-menu">
                <ul>
                    <?php foreach($category_parent as $cat_parent): ?>
                        <li class="has-children">
                            <a href="#"><span class="menu-text"><?= $cat_parent->title ?></span></a>
                            <span class="menu-toggle"><i class="far fa-angle-down"></i></span>
                                <ul class="mega-menu mega-menu-small">
                                <?php foreach($categories as $cat): ?>
                                    <?php if($cat->parent_id == $cat_parent->id): ?>
                                        <li class="menu-item-33"><a href="<?= $this->Url->build(['controller' => 'Products','action' => 'category',$cat->slug,$cat->id]) ?>"><span class="menu-text"><?= $cat->title ?></span></a></li>
                                    <?php endif ?>
                                <?php endforeach ?>    
                                </ul>
                        </li>
                    <?php endforeach ?>
                </ul>
            </nav>
        </div>
    </div>
</div>