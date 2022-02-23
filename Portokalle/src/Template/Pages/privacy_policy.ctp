<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta') 
?> 
<div class="outer__container">
   <h1 style="text-align: center;"><?= $banners[1][26]->title ?></h1>
  <div class="post">
    <div class="post__center center">
      <div class="post__content content">
          <?= $banners[1][26]->content ?>
      </div>
    </div>
  </div>
</div>