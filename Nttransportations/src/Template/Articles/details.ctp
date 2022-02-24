<?php 
    echo $this->element('meta'); 
?> 
<header class="title">
    <div class="background-image-holder parallax-background">
        <img class="background-image" alt="<?= $article->title ?>" src="<?= $this->Url->build('/uploads/articles/' . $article->id . DS . $article->image ) ?>">
    </div>

    <div class="container align-bottom">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="text-white"><?= $article->title ?></h1>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</header>

<section class="article-single">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-9">
                <div class="article-body">
                    <?= $article->content ?>
                </div>
            </div>
            <div class="col-sm-3 col-md-offset-1">
            <div class="blog-sidebar">
                <div class="sidebar-widget">
                    <h5><?= __('Recent Posts') ?></h5>
                    <ul>
                    <?php foreach($recent_post as $post): ?>
                        <li><a href="<?= $this->Url->build(['controller' => 'Articles','action' => 'details',$post->slug]) ?>"><?= $post->title ?> <i class="icon arrow_right"></i></a></li>
                    <?php endforeach ?>  
                    </ul>
                </div>
            </div>
            </div>
            </div>
            </div>

        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>