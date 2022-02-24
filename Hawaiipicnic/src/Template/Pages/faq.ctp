<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta') 
?>
<!-- Banner Title -->
<div class="banner-container">
    <div class="banner-img"> <img class="banner-img-width" src="<?= $this->Url->build('/uploads/banners/' . $banners[29][0]->id . DS . $banners[29][0]->image ) ?>" alt="<?= $banners[29][0]->title ?>"> </div>
    <div class="banner-head">
        <div class="banner-head-padding banner-head-margin">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12"> <span class="heading-meta"><?= $banners[29][0]->title ?></span>
                        <h2 class="pwe-heading animate-box" data-animate-effect="fadeInLeft"><?= $banners[29][0]->description ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Faq -->

<div class="faq-section">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <!-- <h2>Search</h2> -->
                <input class="animate-box" data-animate-effect="fadeInLeft" type="text" id="myInput" onkeyup="myFunction()" placeholder="<?= __('Search for faqs..') ?>">
                <ul id="faq-box">
                    <?php foreach($faqs as $faq): ?>
                        <li>
                            <div class="content-faq animate-box" data-animate-effect="fadeInLeft">
                                <h3><?= $faq->title ?></h3>
                                <?= $faq->description ?>
                            </div>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
    </div>
    
    <script>
        function myFunction() {
            var input, filter, ul, li, h3, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            ul = document.getElementById("faq-box");
            li = ul.getElementsByTagName("li");
            for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByTagName("h3")[0];
                txtValue = a.textContent || a.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
                }
            }
        }
    </script>
</div>