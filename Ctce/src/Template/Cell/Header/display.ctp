<ul>
<?php foreach($categories as $category): ?>
    <li class="has-children">
        <a href="#"><span class="menu-text"><?= $category->title ?></span></a>
        <span class="menu-toggle"><i class="far fa-angle-down"></i></span>
            <ul class="mega-menu mega-menu-small">
            <?php foreach($category->children as $cat): ?>
                <li class="menu-item-33"><a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'category', $cat->id]) ?>"><span class="menu-text"><?= $cat->title ?></span></a></li>
            <?php endforeach ?>    
            </ul>
    </li>
<?php endforeach ?>
</ul>