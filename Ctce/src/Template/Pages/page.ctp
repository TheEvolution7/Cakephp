<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta') 
?> 
<!-- Page Title Section Start -->
<div class="page-title-section section">
        <div class="page-title">
            <div class="container">
                <h1 class="title"><?= $page->title ?></h1>
            </div>
        </div>
        <div class="page-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="current"><?= $page->title ?></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Title Section End -->

    <!-- Privacy Policy Section Start -->
    <div class="section section-padding-bottom">
        <div class="container">
            <!-- Privacy Policy Wrapper Start -->
            <div class="privacy-policy-wrapper">
                <div class="content">
                    <?= $page->content ?>
                </div>
            </div>
            <!-- Privacy Policy Wrapper End -->
        </div>
    </div>