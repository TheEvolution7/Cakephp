<?php 
    $core = $this->getConfigure('Core');
    $user = $this->Session->read('Auth.User');
?>

<div class="kt-header__topbar">

    <!--begin: Search -->

    <!--begin: Search -->
    <div class="kt-header__topbar-item kt-header__topbar-item--search dropdown" id="kt_quick_search_toggle">
        <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
            <span class="kt-header__topbar-icon">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect id="bound" x="0" y="0" width="24" height="24" />
                        <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" id="Path-2" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                        <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" id="Path" fill="#000000" fill-rule="nonzero" />
                    </g>
                </svg> </span>
        </div>
        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-lg">
            <div class="kt-quick-search kt-quick-search--inline" id="kt_quick_search_inline">
                <form method="get" class="kt-quick-search__form" action="<?= $this->Url->build(['controller' => 'Pages','action' => 'search']) ?>" id="form-search">
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-search-1"></i></span></div>
                        <?= $this->Form->input('keyword', [
                            'class' => 'form-control', 
                            'placeholder' => __d('acp', 'Search by title or id') . '...', 
                            'label' => false, 
                            'value' => $this->request->getQuery('keyword') && $this->request->getQuery('keyword') != ''?$this->request->getQuery('keyword'):null
                        ]) ?>
                        <script>
                        $(document).ready(function(){
                            $('#keyword').keyup(function(event) {
                                if (event.which === 13) {
                                    event.preventDefault();
                                    $('#form-search').submit();
                                }
                            });
                        });
                        </script>
                       <!--  <input type="text" class="form-control kt-quick-search__input" placeholder="Search..." name="keyword"> -->
                        <div class="input-group-append"><span class="input-group-text"><i class="la la-close kt-quick-search__close"></i></span></div>
                    </div>
                </form>
                <div class="kt-quick-search__wrapper kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
                </div>
            </div>
        </div>
    </div>

    <!--end: Search -->

    <!--end: Search -->

    <!--end: Quick panel toggler -->
    <div class="kt-header__topbar-item kt-header__topbar-item--search dropdown" title="<?= __d('acp', 'Home') ?>" data-placement="right">
        <div class="kt-header__topbar-wrapper" data-offset="10px,0px">
            <span class="kt-header__topbar-icon">
                <a href="<?= $this->Url->build(['plugin' => false, 'controller' => 'Pages', 'action' => 'home']) ?>" target="_blank">
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 27.02 27.02" style="enable-background:new 0 0 27.02 27.02;" xml:space="preserve">
                        <g>
                            <path style="fill:#5d78ff;" d="M3.674,24.876c0,0-0.024,0.604,0.566,0.604c0.734,0,6.811-0.008,6.811-0.008l0.01-5.581
                                c0,0-0.096-0.92,0.797-0.92h2.826c1.056,0,0.991,0.92,0.991,0.92l-0.012,5.563c0,0,5.762,0,6.667,0
                                c0.749,0,0.715-0.752,0.715-0.752V14.413l-9.396-8.358l-9.975,8.358C3.674,14.413,3.674,24.876,3.674,24.876z"/>
                            <path style="fill:#5d78ff;" d="M0,13.635c0,0,0.847,1.561,2.694,0l11.038-9.338l10.349,9.28c2.138,1.542,2.939,0,2.939,0
                                L13.732,1.54L0,13.635z"/>
                            <polygon style="fill:#5d78ff;" points="23.83,4.275 21.168,4.275 21.179,7.503 23.83,9.752    "/>
                        </g>
                    </svg>
                </a>
            </span>
        </div>
    </div>
    <div class="kt-header__topbar-item kt-header__topbar-item--search dropdown" title="<?= __d('acp', 'Cache') ?>" data-placement="right">
        <div class="kt-header__topbar-wrapper" data-offset="10px,0px">
            <span class="kt-header__topbar-icon">
                <a href="<?= $this->Url->build(['plugin' => $requestParams['plugin'], 'controller' => $requestParams['controller'], 'action' => 'clearCache']) ?>">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 286.052 286.052" style="enable-background:new 0 0 286.052 286.052;" xml:space="preserve">
                        <g>
                            <path style="fill:#5d78ff;" d="M78.493,143.181H62.832v-0.125c0-43.623,34.809-80.328,79.201-80.122
                                c21.642,0.098,41.523,8.841,55.691,23.135l25.843-24.931c-20.864-21.043-49.693-34.049-81.534-34.049
                                c-63.629,0-115.208,51.955-115.298,116.075h-15.84c-9.708,0-13.677,6.49-8.823,14.437l33.799,33.504
                                c6.704,6.704,10.736,6.91,17.646,0l33.799-33.504C92.17,149.662,88.192,143.181,78.493,143.181z M283.978,129.236l-33.799-33.433
                                c-6.892-6.892-11.156-6.481-17.637,0l-33.799,33.433c-4.854,7.929-0.894,14.419,8.814,14.419h15.635
                                c-0.25,43.337-34.943,79.72-79.183,79.514c-21.633-0.089-41.505-8.814-55.691-23.099l-25.843,24.896
                                c20.873,21.007,49.702,33.996,81.534,33.996c63.432,0,114.869-51.579,115.28-115.298h15.867
                                C284.872,143.655,288.832,137.156,283.978,129.236z"/>
                        </g>
                    </svg>
                </a>
            </span>
        </div>
    </div>
    <!--begin: Language bar -->
    <div class="kt-header__topbar-item kt-header__topbar-item--langs">
        <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
            <span class="kt-header__topbar-icon">
                <!-- <img class="" src="<?= $webrootAcp ?>media/flags/020-flag.svg" alt="" /> -->
                <?php $currentLanguage = $this->getConfigure('Core')['languages'][$configs['language']];?>
                <?php echo strtoupper($currentLanguage->id) ?>
                <!-- <img class="" src="<?= $this->Url->build('/uploads/languages/'.$currentLanguage->uuid.'/image/'.$currentLanguage->image) ?>"/> -->
            </span>
        </div>
        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround">
            <ul class="kt-nav kt-margin-t-10 kt-margin-b-10">
                <?php foreach ($this->getConfigure('Core')['languages'] as $lang): ?>
                    <li class="kt-nav__item">
                        <a href="<?= $this->Url->build(array_merge(['lang' => ($core['setting']['language_site'] != $lang->id) ? $lang->id : false], $this->getRequest()->getParam('pass'), $this->getRequest()->getQuery())); ?>" title="<?= $lang->title ?>" class="kt-nav__link">
                            <span class="kt-nav__link-text"><?= $lang['title'] ?></span>
                        </a>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>

    <!--end: Language bar -->

    <!--begin: User Bar -->
    <div class="kt-header__topbar-item kt-header__topbar-item--user">
        <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
            <div class="kt-header__topbar-user">
                <span class="kt-header__topbar-welcome kt-hidden-mobile"><?= __d('acp','Hi') ?>,</span>
                <span class="kt-header__topbar-username kt-hidden-mobile"><?= $user['email'] ?></span>
                <?php if ($user['image'] != "" ): ?>
                    <img class="" src="<?= $this->Url->build('/uploads/users/'.$user['id'].'/'.$user['image']) ?>" />
                <?php else: ?>
                    <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">S</span>
                <?php endif ?>

                <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                <!-- <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">S</span> -->
            </div>
        </div>
        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">

            <!--begin: Head -->
            <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url(<?= $webrootAcp ?>media/misc/bg-1.jpg)">
                <div class="kt-user-card__avatar">
                    <?php if ($user['image'] != ""): ?>
                        <img class="" src="<?= $this->Url->build('/uploads/users/'.$user['id'].'/'.$user['image']) ?>" />
                    <?php else: ?>
                        <span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">S</span>
                    <?php endif ?>

                    <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                    <!-- <span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">S</span> -->
                </div>
                <div class="kt-user-card__name">
                    <?= $user['email'] ?>
                </div>
                <!-- <div class="kt-user-card__badge">
                    <span class="btn btn-success btn-sm btn-bold btn-font-md">23 messages</span>
                </div> -->
            </div>

            <!--end: Head -->

            <!--begin: Navigation -->
            <div class="kt-notification">
                <a href="<?= $this->Url->build(['controller' => 'Users','action' => 'edit',$user['id']]) ?>" class="kt-notification__item">
                    <div class="kt-notification__item-icon">
                        <i class="flaticon2-calendar-3 kt-font-success"></i>
                    </div>
                    <div class="kt-notification__item-details">
                        <div class="kt-notification__item-title kt-font-bold">
                            <?= __d('acp','My Profile') ?>
                        </div>
                        <div class="kt-notification__item-time">
                            Account settings and more
                        </div>
                    </div>
                </a>
                <div class="kt-notification__custom kt-space-between">
                    <a href="<?= $this->Url->build(['_name' => 'Acp.logout']) ?>" class="btn btn-label btn-label-brand btn-sm btn-bold"><?= __d('acp','Sign Out') ?></a>
                    <!-- <a href="demo1/custom/user/login-v2.html" target="_blank" class="btn btn-clean btn-sm btn-bold">Upgrade Plan</a> -->
                </div>
            </div>

            <!--end: Navigation -->
        </div>
    </div>

    <!--end: User Bar -->
</div>
