<?php 
    $banners = $this->getCache('banners_' . $configs['language']);
    echo $this->element('meta') 
?>
<main class="page-content" data-barba="container" data-barba-namespace="inner-en-contacts">
<div data-page-title="Contacts"></div>
    <div class="flex pl_19 pr_19 pt_10 pb_10" data-scroll-section>
        <div class="w_75">
            <div class="fz36 mb_14">Contact us!</div>
            <div class="flex_ac mb_1">
                <div class="w_10">E-mail</div><a class="td_uh fz54"
                    href="mailto:info@delmic.com">info@delmic.com</a>
            </div>
            <div class="flex_ac">
                <div class="w_10">Phone</div><a class="td_uh fz54" href="tel:123456789">1234 45 667 901</a>
            </div>
        </div>
        <div class="w_25">
            <div class="fz24 mb_4">
                ABC Building <br>
                Floor 11 <br>
                3 Hawaii  </div>
            <div class="fz24">
                Opening hours <br>
                Mon–Fri 8:00 a.m.–17:00 p.m. </div>
            <div class="mt_2">
                Sat by appointment </div>
        </div>
    </div>
    <div class="contacts-map h_80vh" data-scroll-section>

    </div>
</main>