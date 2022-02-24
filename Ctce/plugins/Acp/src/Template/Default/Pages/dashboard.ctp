<?php
use Cake\I18n\Time;
?>

<style type="text/css">
    .kt-timeline-v2:before{
        left: 5.85rem;
    }
</style>
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

    <!--Begin::Dashboard 1-->

    <!--Begin::Row-->
    <div class="row">
        <div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">

            <!--begin:: Widgets/Activity-->
            <div class="kt-portlet kt-portlet--fit kt-portlet--head-lg kt-portlet--head-overlay kt-portlet--skin-solid kt-portlet--height-fluid">
                <div class="kt-portlet__head kt-portlet__head--noborder kt-portlet__space-x">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Activity
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <a href="#" class="btn btn-label-light btn-sm btn-bold dropdown-toggle" data-toggle="dropdown">
                            Export
                        </a>
                        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                            <ul class="kt-nav">
                                <li class="kt-nav__section kt-nav__section--first">
                                    <span class="kt-nav__section-text">Finance</span>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-graph-1"></i>
                                        <span class="kt-nav__link-text">Statistics</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-calendar-4"></i>
                                        <span class="kt-nav__link-text">Events</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-layers-1"></i>
                                        <span class="kt-nav__link-text">Reports</span>
                                    </a>
                                </li>
                                <li class="kt-nav__section">
                                    <span class="kt-nav__section-text">Customers</span>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-calendar-4"></i>
                                        <span class="kt-nav__link-text">Notifications</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-file-1"></i>
                                        <span class="kt-nav__link-text">Files</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body kt-portlet__body--fit">
                    <div class="kt-widget17">
                        <div class="kt-widget17__visual kt-widget17__visual--chart kt-portlet-fit--top kt-portlet-fit--sides" style="background-color: #fd397a">
                            <div class="kt-widget17__chart" style="height:320px;">
                                <canvas id="kt_chart_activities"></canvas>
                            </div>
                        </div>
                        <div class="kt-widget17__stats">
                            <div class="kt-widget17__items">
                                <div class="kt-widget17__item">
                                    <span class="kt-widget17__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--brand">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect id="bound" x="0" y="0" width="24" height="24" />
                                                <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" id="Combined-Shape" fill="#000000" />
                                                <rect id="Rectangle-Copy-2" fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) " x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
                                            </g>
                                        </svg> </span>
                                    <span class="kt-widget17__subtitle">
                                        <?= __d('acp','Products') ?>
                                    </span>
                                    <span class="kt-widget17__desc">
                                        <?= $countProducts ?>
                                    </span>
                                </div>
                                <div class="kt-widget17__item">
                                    <span class="kt-widget17__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon id="Bound" points="0 0 24 0 24 24 0 24" />
                                                <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" id="Shape" fill="#000000" fill-rule="nonzero" />
                                                <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" id="Path" fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg> </span>
                                    <span class="kt-widget17__subtitle">
                                        <?= __d('acp','Orders') ?>
                                    </span>
                                    <span class="kt-widget17__desc">
                                        <?= $countOrders ?>
                                    </span>
                                </div>
                            </div>
                            <div class="kt-widget17__items">
                                <div class="kt-widget17__item">
                                    <span class="kt-widget17__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--warning">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect id="bound" x="0" y="0" width="24" height="24" />
                                                <path d="M12.7037037,14 L15.6666667,10 L13.4444444,10 L13.4444444,6 L9,12 L11.2222222,12 L11.2222222,14 L6,14 C5.44771525,14 5,13.5522847 5,13 L5,3 C5,2.44771525 5.44771525,2 6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,13 C19,13.5522847 18.5522847,14 18,14 L12.7037037,14 Z" id="Combined-Shape" fill="#000000" opacity="0.3" />
                                                <path d="M9.80428954,10.9142091 L9,12 L11.2222222,12 L11.2222222,16 L15.6666667,10 L15.4615385,10 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 L9.80428954,10.9142091 Z" id="Combined-Shape" fill="#000000" />
                                            </g>
                                        </svg> </span>
                                    <span class="kt-widget17__subtitle">
                                        <?= __d('acp','Articles') ?>
                                    </span>
                                    <span class="kt-widget17__desc">
                                        <?= $countArticles ?>
                                    </span>
                                </div>
                                <div class="kt-widget17__item">
                                    <span class="kt-widget17__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--danger">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect id="bound" x="0" y="0" width="24" height="24" />
                                                <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" id="Combined-Shape" fill="#000000" opacity="0.3" />
                                                <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" id="Rectangle-102-Copy" fill="#000000" />
                                            </g>
                                        </svg> </span>
                                    <span class="kt-widget17__subtitle">
                                        <?= __d('acp','Contacts') ?>
                                    </span>
                                    <span class="kt-widget17__desc">
                                        <?= $countContacts ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--end:: Widgets/Activity-->
        </div>
        <div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">

            <!--begin:: Widgets/Inbound Bandwidth-->
            <div class="kt-portlet kt-portlet--fit kt-portlet--head-noborder kt-portlet--height-fluid-half">
                <div class="kt-portlet__head kt-portlet__space-x">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            <?= __d('acp','Total products').' '.Time::now()->year;?>
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body kt-portlet__body--fluid">
                    <div class="kt-widget20">
                        <div class="kt-widget20__content kt-portlet__space-x">
                            <span class="kt-widget20__number kt-font-brand"><?= $count_data_products_year ?>+</span>
                        </div>
                        <div class="kt-widget20__chart" style="height:130px;">
                            <canvas id="kt_chart_bandwidth1"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!--end:: Widgets/Inbound Bandwidth-->
            <div class="kt-space-20"></div>

            <!--begin:: Widgets/Outbound Bandwidth-->
            <div class="kt-portlet kt-portlet--fit kt-portlet--head-noborder kt-portlet--height-fluid-half">
                <div class="kt-portlet__head kt-portlet__space-x">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            <?= __d('acp','Total articles').' '.Time::now()->year; ?>
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body kt-portlet__body--fluid">
                    <div class="kt-widget20">
                        <div class="kt-widget20__content kt-portlet__space-x">
                            <span class="kt-widget20__number kt-font-danger"><?= $count_data_articles_year ?>+</span>
                        </div>
                        <div class="kt-widget20__chart" style="height:130px;">
                            <canvas id="kt_chart_bandwidth2"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!--end:: Widgets/Outbound Bandwidth-->
        </div>
        <div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">

            <!--Begin::Portlet-->
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            <?= __d('acp', 'Recent Activities') ?>
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="dropdown dropdown-inline">
                            <?= $this->Html->link(
                                '<i class="flaticon-more-1"></i>',
                                ['controller' => 'UsersLogs', 'action' => 'index'],
                                ['escape' => false, 'class' => 'btn btn-clean btn-sm btn-icon btn-icon-md']
                            ); ?>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body">

                    <!--Begin::Timeline 3 -->
                    <div class="kt-timeline-v2">
                        <div class="kt-timeline-v2__items  kt-padding-top-25 kt-padding-bottom-30">
                            <?php $arr = ['success','danger','brand','warning','info']; ?>
                            <?php foreach ($logs_login as $log): ?>
                                <div class="kt-timeline-v2__item">
                                    <span class="kt-timeline-v2__item-time" style="font-size: 12px;">
                                        <?= date_format(date_create($log->created),"d/m/Y").'<br>'.date_format(date_create($log->created),"H:i:s");?>
                                    </span>
                                    <div class="kt-timeline-v2__item-cricle" style="left: 5.12rem;">
                                        <i class="fa fa-genderless kt-font-<?= $arr[rand(0,3)]  ?>"></i>
                                    </div>
                                    <div class="kt-timeline-v2__item-text  kt-padding-top-5" style="padding: 0.35rem 0 0 6rem;">
                                        <ul>
                                            <li><b><?= $log->email ?></b></li>
                                            <li><b><?= $log->user_ip ?></b></li>
                                            <li><?= $log->content ?> 
                                                <?= $this->Html->link(
                                                    __d('acp', 'View'),
                                                    ['controller' => 'UsersLogs', 'action' => 'view', $log->user_id, $log->id]
                                                ); ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>

                    <!--End::Timeline 3 -->
                </div>
            </div>

            <!--End::Portlet-->
        </div>
    </div>

    <!--End::Row-->

    <!--Begin::Row-->
    <div class="row">
        
        <div class="col-xl-4 col-lg-4 order-lg-2 order-xl-1">

            <!--begin:: Widgets/Daily Sales-->
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-widget14">
                    <div class="kt-widget14__header kt-margin-b-30">
                        <h3 class="kt-widget14__title">
                            <?= __d('acp','Total orders').' '.Time::now()->year; ?>
                        </h3>
                    </div>
                    <div class="kt-widget14__chart" style="height:120px;">
                        <canvas id="kt_chart_daily_sales"></canvas>
                    </div>
                </div>
            </div>

            <!--end:: Widgets/Daily Sales-->
        </div>
        <div class="col-xl-4 col-lg-4 order-lg-2 order-xl-1">

            <!--begin:: Widgets/Profit Share-->
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-widget14">
                    <div class="kt-widget14__header">
                        <h3 class="kt-widget14__title">
                            <?= __d('acp','User gender') ?>
                        </h3>
                    </div>
                    <div class="kt-widget14__content">
                        <div class="kt-widget14__chart">
                            <div class="kt-widget14__stat"><?= $count_data_users ?></div>
                            <canvas id="kt_chart_profit_share" style="height: 140px; width: 140px;"></canvas>
                        </div>
                        <div class="kt-widget14__legends">
                            <?php 
                                $genders = ['Undefined', 'Male', 'Female']; 
                                $arr = ['success','danger','brand']
                            ?>
                            <?php foreach ($data_users_gender as $gender => $user): ?>
                                <div class="kt-widget14__legend">
                                    <span class="kt-widget14__bullet kt-bg-<?= $arr[$gender]  ?>"></span>
                                    <span class="kt-widget14__stats"><?= $user/$count_data_users*100 ?>% <?= $genders[$gender] ?></span>
                                </div>
                            <?php endforeach ?>
                            <!-- <div class="kt-widget14__legend">
                                <span class="kt-widget14__bullet kt-bg-<?= $arr[rand(0,3)]  ?>"></span>
                                <span class="kt-widget14__stats">37% Sport Tickets</span>
                            </div>
                            <div class="kt-widget14__legend">
                                <span class="kt-widget14__bullet kt-bg-warning"></span>
                                <span class="kt-widget14__stats">47% Business Events</span>
                            </div>
                            <div class="kt-widget14__legend">
                                <span class="kt-widget14__bullet kt-bg-brand"></span>
                                <span class="kt-widget14__stats">19% Others</span>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>

            <!--end:: Widgets/Profit Share-->
        </div>
        <div class="col-xl-4 col-lg-4 order-lg-2 order-xl-1">

            <!--begin:: Widgets/Revenue Change-->
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-widget14">
                    <div class="kt-widget14__header">
                        <h3 class="kt-widget14__title">
                            <?= __d('acp','Revenue Change') ?>
                        </h3>
                    </div>
                    <div class="kt-widget14__content">
                        <div class="kt-widget14__chart">
                            <div id="kt_chart_revenue_change" style="height: 150px; width: 150px;"></div>
                        </div>
                        <div class="kt-widget14__legends">
                            <?php $arr = ['success','danger','brand','warning'] ?>
                            <?php foreach ($data_orders_country as $key => $value): ?>
                                <div class="kt-widget14__legend">
                                    <span class="kt-widget14__bullet kt-bg-<?= $arr[$key] ?>"></span>
                                    <span class="kt-widget14__stats">+<?= $value['value']/$countOrders*100 ?>% <?= $value['label'] ?></span>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>

            <!--end:: Widgets/Revenue Change-->
        </div>
        <div class="col-xl-8 col-lg-12 order-lg-3 order-xl-1">

            <!--begin:: Widgets/Best Sellers-->
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            <?= __d('acp','Best Sellers') ?>
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <ul class="nav nav-pills nav-pills-sm nav-pills-label nav-pills-bold" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#kt_widget5_tab1_content" role="tab">
                                    <?= __d('acp','Products') ?>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_widget5_tab2_content" role="tab">
                                    <?= __d('acp','Articles') ?>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_widget5_tab3_content" role="tab">
                                    <?= __d('acp','Orders') ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="kt_widget5_tab1_content" aria-expanded="true">
                            <div class="kt-widget5">
                                <?php foreach ($products as $product): ?>
                                    <div class="kt-widget5__item">
                                        <div class="kt-widget5__content">
                                            <div class="kt-widget5__pic">
                                                <?php 
                                                    if (!empty($product->image)) {
                                                        $imagePath = 'uploads' . DS . 'products' . DS . $product->id . DS .$product->image;
                                                    } else {
                                                        $imagePath = 'img/no_thumb.png';
                                                    }
                                                ?>
                                                <img class="kt-widget7__img thumbnail _cover" src="<?= $this->Url->build($imagePath) ?>">
                                            </div>
                                            <div class="kt-widget5__section">
                                                <a href="<?= $this->Url->build(['controller' => 'Products','action' => 'edit',$product->id]) ?>" class="kt-widget5__title">
                                                    <?= $product->title ?>
                                                </a>
                                                <div class="kt-widget5__info">
                                                    <span><?= __d('acp','Released') ?>:</span>
                                                    <span class="kt-font-info"><?= $product->modified ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="kt-widget5__content">
                                            <div class="kt-widget5__stats">
                                                <span class="kt-widget5__number"><?= number_format(count($product->order_details)) ?></span>
                                                <span class="kt-widget5__sales"><?= __d('acp','sales') ?></span>
                                            </div>
                                            <div class="kt-widget5__stats">
                                                <span class="kt-widget5__number"><?= number_format($product->view_count) ?></span>
                                                <span class="kt-widget5__votes"><?= __d('acp','views') ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <div class="tab-pane" id="kt_widget5_tab2_content">
                            <div class="kt-widget5">
                                <?php foreach ($articles as $article): ?>
                                    <div class="kt-widget5__item">
                                        <div class="kt-widget5__content">
                                            <div class="kt-widget5__pic">
                                                <?php 
                                                    if (!empty($article->image)) {
                                                        $imagePath = 'uploads' . DS . 'articles' . DS . $article->id . DS .$article->image;
                                                    } else {
                                                        $imagePath = 'img/no_thumb.png';
                                                    }
                                                ?>
                                                <img class="kt-widget7__img thumbnail _cover" src="<?= $this->Url->build($imagePath) ?>">
                                            </div>
                                            <div class="kt-widget5__section">
                                                <a href="<?= $this->Url->build(['controller' => 'Articles','action' => 'edit',$article->id]) ?>" class="kt-widget5__title">
                                                    <?= $article->title ?>
                                                </a>
                                                <div class="kt-widget5__info">
                                                    <span><?= __d('acp','Released') ?>:</span>
                                                    <span class="kt-font-info"><?= $article->modified ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="kt-widget5__content">
                                            <div class="kt-widget5__stats">
                                                <span class="kt-widget5__number"><?= number_format($article->count_view) ?></span>
                                                <span class="kt-widget5__votes"><?= __d('acp','views') ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <div class="tab-pane" id="kt_widget5_tab3_content">
                            <div class="kt-widget5">
                                <?php foreach ($orders as $order): ?>
                                    <div class="kt-widget5__item">
                                        <div class="kt-widget5__content">
                                            <div class="kt-widget5__pic">
                                                
                                            </div>
                                            <div class="kt-widget5__section">
                                                <a href="<?= $this->Url->build(['controller' => 'Orders','action' => 'view',$order->id]) ?>" class="kt-widget5__title">
                                                    #<?= $order->id ?>
                                                </a>
                                                <div class="kt-widget5__info">
                                                    <span><?= __d('acp','Released') ?>:</span>
                                                    <span class="kt-font-info"><?= $order->created ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="kt-widget5__content">
                                            <div class="kt-widget5__stats">
                                                <span class="kt-widget5__number"><?=$this->Cms->price_translate($order->amount,$order->currency,$this->getConfigure('Core')['setting']['currency']).' '.$this->getConfigure('Core')['setting']['currency'] ?></span>
                                                <span class="kt-widget5__votes"><?= __d('acp','total') ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--end:: Widgets/Best Sellers-->
        </div>
        <div class="col-xl-4 col-lg-6 order-lg-3 order-xl-1">

            <!--begin:: Widgets/New Users-->
            <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            <?= __d('acp','New Users') ?>
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="kt_widget4_tab1_content">
                            <div class="kt-widget4">
                                <?php foreach ($users as $user): ?>
                                    <div class="kt-widget4__item">
                                        <div class="kt-widget4__pic kt-widget4__pic--pic">
                                            <?php 
                                                if (!empty($user->image)) {
                                                    $imagePath = DS . 'uploads' . DS . 'users' . DS . $user->id . DS .$user->image;
                                                } else {
                                                    $imagePath = 'img/no_thumb.png';
                                                }
                                            ?>
                                            <img src="<?= $this->Url->build($imagePath) ?>">
                                        </div>
                                        <div class="kt-widget4__info">
                                            <a href="<?= $this->Url->build(['controller' => 'Users','action' => 'edit',$user->id])  ?>" class="kt-widget4__username">
                                                <?= $user->full_name ?>
                                            </a>
                                            <p class="kt-widget4__text">
                                                <?= $user->email ?>
                                            </p>
                                        </div>
                                        <a href="<?= $this->Url->build(['controller' => 'Users','action' => 'edit',$user->id])  ?>" class="btn btn-sm btn-label-brand btn-bold"><?= __d('acp','View') ?></a>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--end:: Widgets/New Users-->
        </div>
        <div class="col-xl-4 col-lg-6 order-lg-3 order-xl-1">

            <!--begin:: Widgets/Tasks -->
            <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            <?= __d('acp','Tasks') ?>
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-brand" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#kt_widget2_tab1_content" role="tab">
                                    <?= __d('acp','Today') ?>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_widget2_tab2_content" role="tab">
                                    <?= __d('acp','Month') ?>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_widget2_tab3_content" role="tab">
                                    <?= __d('acp','Year') ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="tab-content">
                        <?php 
                            $arr = ['primary','warning','brand','success','danger','info'] ;
                            $listStatus = [
                                0 => [
                                    'title' => __d('acp','New'),
                                    'class' => 'info'
                                ],
                                1 => [
                                    'title' => __d('acp','Pending...'),
                                    'class' => 'primary'
                                ],
                                2 => [
                                    'title' => __d('acp','Finished'),
                                    'class' => 'success'
                                ],
                                3 => [
                                    'title' => __d('acp','Expired'),
                                    'class' => 'danger'
                                ]
                            ];
                        ?>
                        <div class="tab-pane active" id="kt_widget2_tab1_content">
                            <div class="kt-widget2">
                                <?= $this->Form->create(null,['class' => 'form-update-status-tasks','url' => $this->Url->build([
                                    'controller' => 'Tasks',
                                    'action' => 'updateStatus']
                                )]); ?>
                                <?php foreach ($tasks_date as $task): ?>
                                    <div class="kt-widget2__item change-color-1-<?= $task->id?> kt-widget2__item--<?= $listStatus[$task->last_status]['class'] ?>">
                                        <div class="kt-widget2__checkbox">
                                            <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                                <?= $this->Form->checkbox('tasks', [
                                                    'data-id' => $task->id,
                                                    'class' => 'update-status-tasks',
                                                    'value' => $task->id,
                                                    'hiddenField' => false,
                                                    $task->last_status == 3?'disabled':'',
                                                    $task->last_status == 2?'checked':''
                                                ]); ?>
                                                <span></span>
                                            </label>
                                        </div>
                                        <div class="kt-widget2__info">
                                            <a class="kt-widget2__title">
                                                <?= $task->title . ' ' . ' <span class="kt-badge change-color-2-'. $task->id .' kt-badge--' . $listStatus[$task->last_status]['class'] . ' kt-badge--inline ">' . $listStatus[$task->last_status]['title'] . '</span>' ?>
                                            </a>
                                            <a class="kt-widget2__username">
                                                <?= $task->description . ' - ' . $task->date?>
                                            </a>
                                        </div>
                                        <div class="kt-widget2__actions">
                                            <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
                                                <i class="flaticon-more-1"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                                <ul class="kt-nav">
                                                    <li class="kt-nav__item">
                                                        <a href="<?= $this->url->build(['controller' => 'Tasks','action' => 'edit',$task->id]) ?>" class="kt-nav__link">
                                                            <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                            <span class="kt-nav__link-text"><?= __d('acp','Settings') ?></span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    
                                <?php endforeach ?>
                                <?= $this->Form->end()?>
                                
                            </div>
                        </div>
                        <div class="tab-pane" id="kt_widget2_tab2_content">
                            <div class="kt-widget2">
                                <?= $this->Form->create(null,['class' => 'form-update-status-tasks','url' => $this->Url->build([
                                    'controller' => 'Tasks',
                                    'action' => 'updateStatus']
                                )]); ?>
                                <?php foreach ($tasks_month as $task): ?>
                                    <div class="kt-widget2__item change-color-1-<?= $task->id?> kt-widget2__item--<?= $listStatus[$task->last_status]['class'] ?>">
                                        <div class="kt-widget2__checkbox">
                                            <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                                <?= $this->Form->checkbox('tasks', [
                                                    'data-id' => $task->id,
                                                    'class' => 'update-status-tasks',
                                                    'value' => $task->id,
                                                    'hiddenField' => false,
                                                    $task->last_status == 3?'disabled':'',
                                                    $task->last_status == 2?'checked':''
                                                ]); ?>
                                                <span></span>
                                            </label>
                                        </div>
                                        <div class="kt-widget2__info">
                                            <a class="kt-widget2__title">
                                                <?= $task->title . ' ' . ' <span class="kt-badge change-color-2-'. $task->id .' kt-badge--' . $listStatus[$task->last_status]['class'] . ' kt-badge--inline ">' . $listStatus[$task->last_status]['title'] . '</span>' ?>
                                            </a>
                                            <a class="kt-widget2__username">
                                                <?= $task->description . ' - ' . $task->date?>
                                            </a>
                                        </div>
                                        <div class="kt-widget2__actions">
                                            <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
                                                <i class="flaticon-more-1"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                                <ul class="kt-nav">
                                                    <li class="kt-nav__item">
                                                        <a href="<?= $this->url->build(['controller' => 'Tasks','action' => 'edit',$task->id]) ?>" class="kt-nav__link">
                                                            <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                            <span class="kt-nav__link-text"><?= __d('acp','Settings') ?></span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    
                                <?php endforeach ?>
                                <?= $this->Form->end()?>
                                
                            </div>
                        </div>
                        <div class="tab-pane" id="kt_widget2_tab3_content">
                            <div class="kt-widget2">
                                <?= $this->Form->create(null,['class' => 'form-update-status-tasks','url' => $this->Url->build([
                                    'controller' => 'Tasks',
                                    'action' => 'updateStatus']
                                )]); ?>
                                <?php foreach ($tasks_year as $task): ?>
                                    <div class="kt-widget2__item change-color-1-<?= $task->id?> kt-widget2__item--<?= $listStatus[$task->last_status]['class'] ?>">
                                        <div class="kt-widget2__checkbox">
                                            <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                                <?= $this->Form->checkbox('tasks', [
                                                    'data-id' => $task->id,
                                                    'class' => 'update-status-tasks',
                                                    'value' => $task->id,
                                                    'hiddenField' => false,
                                                    $task->last_status == 3?'disabled':'',
                                                    $task->last_status == 2?'checked':''
                                                ]); ?>
                                                <span></span>
                                            </label>
                                        </div>
                                        <div class="kt-widget2__info">
                                            <a class="kt-widget2__title">
                                                <?= $task->title . ' ' . ' <span class="kt-badge change-color-2-'. $task->id .' kt-badge--' . $listStatus[$task->last_status]['class'] . ' kt-badge--inline ">' . $listStatus[$task->last_status]['title'] . '</span>' ?>
                                            </a>
                                            <a class="kt-widget2__username">
                                                <?= $task->description . ' - ' . $task->date?>
                                            </a>
                                        </div>
                                        <div class="kt-widget2__actions">
                                            <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
                                                <i class="flaticon-more-1"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                                <ul class="kt-nav">
                                                    <li class="kt-nav__item">
                                                        <a href="<?= $this->url->build(['controller' => 'Tasks','action' => 'edit',$task->id]) ?>" class="kt-nav__link">
                                                            <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                            <span class="kt-nav__link-text"><?= __d('acp','Settings') ?></span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    
                                <?php endforeach ?>
                                <?= $this->Form->end()?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end:: Widgets/Tasks -->
        </div>
        <div class="col-xl-4 col-lg-6 order-lg-3 order-xl-1">

            <!--begin:: Widgets/Notifications-->
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            <?= __d('acp','History Activities') ?>
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="kt_widget6_tab1_content" aria-expanded="true">
                            <div class="kt-notification">
                                <?php foreach ($logs_action as $log): ?>
                                    <a href="<?= $log->content?>" class="kt-notification__item">
                                            <div class="kt-notification__item-icon">
                                                <?php
                                                    $str = null;
                                                    switch ($log->model) {
                                                        case 'Articles':
                                                            $str = '<i class="kt-menu__link-icon flaticon2-file"></i>';
                                                            break;

                                                        case 'Products':
                                                            $str = '<i class="kt-menu__link-icon flaticon2-box-1"></i>';
                                                            break;

                                                        case 'Albums':
                                                            $str = '<i class="kt-menu__link-icon flaticon2-image-file"></i>';
                                                            break;
                                                        
                                                        default:
                                                            $str = '<i class="kt-menu__link-icon flaticon2-file"></i>';
                                                            break;
                                                    }
                                                    echo $str;
                                                ?>
                                            </div>
                                            <div class="kt-notification__item-details">
                                                <div class="kt-notification__item-title">
                                                    <?= $log->email .' - '. $log->created?>
                                                </div>
                                                <div class="kt-notification__item-time">
                                                    <?= $log->action?>
                                                </div>
                                            </div>
                                        </a>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--end:: Widgets/Notifications-->
        </div>
        <div class="col-xl-4 col-lg-6 order-lg-3 order-xl-1">

            <!--begin:: Widgets/Support Tickets -->
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            <?= __('Contacts') ?>
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="kt-widget3">
                        <?php foreach ($contacts as $contact): ?>
                            <div class="kt-widget3__item">
                                <div class="kt-widget3__header">
                                    <div class="kt-widget3__text">
                                        <a href="<?= $this->Url->build(['controller' => 'Contacts','action' => 'view',$contact->id]) ?>" class="kt-widget3__username">
                                            <?= $contact->title ?>
                                        </a><br>
                                        <span class="kt-widget3__time">
                                            <?= $contact->email .' - '. $contact->created?>
                                        </span>
                                    </div>
                                    <span class="kt-widget3__status kt-font-<?= $contact->has_read == 1?'success':'info' ?>">
                                        <?= $contact->has_read == 1?__d('acp','Success'):__d('acp','Pending') ?>
                                    </span>
                                </div>
                                <div class="kt-widget3__body">
                                    <p class="kt-widget3__text">
                                        <?= h($contact->content) ?>
                                    </p>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>

            <!--end:: Widgets/Support Tickets -->
        </div>
    </div>

    <!--End::Row-->

    <!--End::Dashboard 1-->
</div>
<p id="listStatusTask" style="display: none;"><?= json_encode($listStatus) ?></p>
<p id="data_products_year" style="display: none;"><?= json_encode($data_products_year) ?></p>
<p id="data_aritlces_year" style="display: none;"><?= json_encode($data_aritlces_year) ?></p>
<p id="data_orders_final_year" style="display: none;"><?= json_encode($data_orders_final_year) ?></p>
<p id="data_orders_watting_year" style="display: none;"><?= json_encode($data_orders_watting_year) ?></p>
<p id="data_users_gender" style="display: none;"><?= json_encode($data_users_gender) ?></p>
<p id="data_orders_country" style="display: none;"><?= json_encode($data_orders_country) ?></p>

