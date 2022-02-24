<?php 
    use Cake\Cache\Cache;


	$menus = [
        __d('acp', 'A') => [
            'icon' => '<i class="kt-menu__link-icon flaticon-dashboard"></i>',
            'title' => __d('acp', 'Dashboard'),
            'url' => ['plugin' => 'Acp', 'controller' => 'Pages', 'action' => 'dashboard'],
        ],
		__d('acp', 'Banners') => [
            'icon' => '<i class="kt-menu__link-icon flaticon2-menu-2"></i>',
            'title' => __d('acp', 'Banners'),
            'url' => ['plugin' => 'Acp', 'controller' => 'Banners', 'action' => 'index'],
            'submenu' => [
            	[
                    'url' => ['plugin' => 'Acp', 'controller' => 'Banners', 'action' => 'index'],
                    'title' => __d('acp', 'All Banner')
                ],
                [
                    'url' => ['plugin' => 'Acp', 'controller' => 'Banners', 'action' => 'add'],
                    'title' => __d('acp', 'Add Banner')
                ],
                [
                    'url' => ['plugin' => 'Acp', 'controller' => 'BannerCategories', 'action' => 'index'],
                    'title' => __d('acp', 'All Category')
                ],
                [
                    'url' => ['plugin' => 'Acp', 'controller' => 'BannerCategories', 'action' => 'add'],
                    'title' => __d('acp', 'Add Category')
                ]
            ]
        ],
        __d('acp', 'Albums') => [
            'icon' => '<i class="kt-menu__link-icon flaticon2-image-file"></i>',
            'title' => __d('acp', 'Albums'),
            'url' => ['plugin' => 'Acp', 'controller' => 'Albums', 'action' => 'index'],
            'submenu' => [
            	[
                    'url' => ['plugin' => 'Acp', 'controller' => 'Albums', 'action' => 'index'],
                    'title' => __d('acp', 'All Album')
                ],
                [
                    'url' => ['plugin' => 'Acp', 'controller' => 'Albums', 'action' => 'add'],
                    'title' => __d('acp', 'Add Album')
                ],
                [
                    'url' => ['plugin' => 'Acp', 'controller' => 'AlbumCategories', 'action' => 'index'],
                    'title' => __d('acp', 'All Category')
                ],
                [
                    'url' => ['plugin' => 'Acp', 'controller' => 'AlbumCategories', 'action' => 'add'],
                    'title' => __d('acp', 'Add Category')
                ]
            ]
        ],
        // __d('acp', 'Documents') => [
        //     'icon' => '<i class="kt-menu__link-icon flaticon2-expand"></i>',
        //     'title' => __d('acp', 'Documents'),
        //     'url' => ['plugin' => 'Acp', 'controller' => 'Documents', 'action' => 'index'],
        //     'submenu' => [
        //     	[
        //             'url' => ['plugin' => 'Acp', 'controller' => 'Documents', 'action' => 'index'],
        //             'title' => __d('acp', 'All Document')
        //         ],
        //         [
        //             'url' => ['plugin' => 'Acp', 'controller' => 'Documents', 'action' => 'add'],
        //             'title' => __d('acp', 'Add Document')
        //         ],
        //         [
        //             'url' => ['plugin' => 'Acp', 'controller' => 'DocumentCategories', 'action' => 'index'],
        //             'title' => __d('acp', 'All Category')
        //         ],
        //         [
        //             'url' => ['plugin' => 'Acp', 'controller' => 'DocumentCategories', 'action' => 'add'],
        //             'title' => __d('acp', 'Add Category')
        //         ]
        //     ]
        // ],
        __d('acp', 'Articles') => [
            'icon' => '<i class="kt-menu__link-icon flaticon2-file"></i>',
            'title' => __d('acp', 'Articles'),
            'url' => ['plugin' => 'Acp', 'controller' => 'Articles', 'action' => 'index'],
            'submenu' => [
            	[
                    'url' => ['plugin' => 'Acp', 'controller' => 'Articles', 'action' => 'index'],
                    'title' => __d('acp', 'All Article')
                ],
                [
                    'url' => ['plugin' => 'Acp', 'controller' => 'Articles', 'action' => 'add'],
                    'title' => __d('acp', 'Add Article')
                ],
                [
                    'url' => ['plugin' => 'Acp', 'controller' => 'ArticleCategories', 'action' => 'index'],
                    'title' => __d('acp', 'All Category')
                ],
                [
                    'url' => ['plugin' => 'Acp', 'controller' => 'ArticleCategories', 'action' => 'add'],
                    'title' => __d('acp', 'Add Category')
                ]
            ]
        ],
        __d('acp', 'Courses') => [
            'icon' => '<i class="kt-menu__link-icon flaticon2-file"></i>',
            'title' => __d('acp', 'Courses'),
            'url' => ['plugin' => 'Acp', 'controller' => 'Courses', 'action' => 'index'],
            'submenu' => [
                [
                    'url' => ['plugin' => 'Acp', 'controller' => 'Courses', 'action' => 'index'],
                    'title' => __d('acp', 'Courses')
                ],
                [
                    'url' => ['plugin' => 'Acp', 'controller' => 'Lessons', 'action' => 'index'],
                    'title' => __d('acp', 'Lessons')
                ],
                [
                    'url' => ['plugin' => 'Acp', 'controller' => 'Quizzes', 'action' => 'index'],
                    'title' => __d('acp', 'Quizzes')
                ],
                [
                    'url' => ['plugin' => 'Acp', 'controller' => 'QuizQuestions', 'action' => 'index'],
                    'title' => __d('acp', 'Quiz Questions')
                ],
                [
                    'url' => ['plugin' => 'Acp', 'controller' => 'QuizAnswers', 'action' => 'index'],
                    'title' => __d('acp', 'Quiz Answers')
                ],
                [
                    'url' => ['plugin' => 'Acp', 'controller' => 'Takes', 'action' => 'index'],
                    'title' => __d('acp', 'Takes')
                ],
                [
                    'url' => ['plugin' => 'Acp', 'controller' => 'TakeAnswers', 'action' => 'index'],
                    'title' => __d('acp', 'Take Answers')
                ]
            ]
        ],
        __d('acp', 'Pages') => [
            'icon' => '<i class="kt-menu__link-icon flaticon2-google-drive-file"></i>',
            'title' => __d('acp', 'Pages'),
            'url' => ['plugin' => 'Acp', 'controller' => 'Pages', 'action' => 'index'],
            'submenu' => [
            	[
                    'url' => ['plugin' => 'Acp', 'controller' => 'Pages', 'action' => 'index'],
                    'title' => __d('acp', 'All Page')
                ],
                [
                    'url' => ['plugin' => 'Acp', 'controller' => 'Pages', 'action' => 'add'],
                    'title' => __d('acp', 'Add Page')
                ],
                [
                    'url' => ['plugin' => 'Acp', 'controller' => 'PageCategories', 'action' => 'index'],
                    'title' => __d('acp', 'All Category')
                ],
                [
                    'url' => ['plugin' => 'Acp', 'controller' => 'PageCategories', 'action' => 'add'],
                    'title' => __d('acp', 'Add Category')
                ]
            ]
        ],
        __d('acp', 'Products') => [
            'icon' => '<i class="kt-menu__link-icon flaticon2-box-1"></i>',
            'title' => __d('acp', 'Products'),
            'url' => ['plugin' => 'Acp', 'controller' => 'Products', 'action' => 'index'],
            'submenu' => [
            	[
                    'url' => ['plugin' => 'Acp', 'controller' => 'Products', 'action' => 'index'],
                    'title' => __d('acp', 'All Product')
                ],
                [
                    'url' => ['plugin' => 'Acp', 'controller' => 'Products', 'action' => 'add'],
                    'title' => __d('acp', 'Add Product')
                ],
                [
                    'url' => ['plugin' => 'Acp', 'controller' => 'ProductCategories', 'action' => 'index'],
                    'title' => __d('acp', 'All Category')
                ],
                [
                    'url' => ['plugin' => 'Acp', 'controller' => 'ProductCategories', 'action' => 'add'],
                    'title' => __d('acp', 'Add Category')
                ],
                [
                    'url' => ['plugin' => 'Acp', 'controller' => 'Brands', 'action' => 'index'],
                    'title' => __d('acp', 'All Brands')
                ],
                [
                    'url' => ['plugin' => 'Acp', 'controller' => 'Attributes', 'action' => 'index'],
                    'title' => __d('acp', 'All Attributes')
                ]
            ]
        ],
        // __d('acp', 'Faqs') => [
        //     'icon' => '<i class="kt-menu__link-icon flaticon2-information"></i>',
        //     'title' => __d('acp', 'Faqs'),
        //     'url' => ['plugin' => 'Acp', 'controller' => 'Faqs', 'action' => 'index'],
        //     'submenu' => [
        //     	[
        //             'url' => ['plugin' => 'Acp', 'controller' => 'Faqs', 'action' => 'index'],
        //             'title' => __d('acp', 'All Faq')
        //         ],
        //         [
        //             'url' => ['plugin' => 'Acp', 'controller' => 'Faqs', 'action' => 'add'],
        //             'title' => __d('acp', 'Add Faq')
        //         ],
        //         [
        //             'url' => ['plugin' => 'Acp', 'controller' => 'FaqCategories', 'action' => 'index'],
        //             'title' => __d('acp', 'All Category')
        //         ],
        //         [
        //             'url' => ['plugin' => 'Acp', 'controller' => 'FaqCategories', 'action' => 'add'],
        //             'title' => __d('acp', 'Add Category')
        //         ]
        //     ]
        // ],
        // __d('acp', 'Mails') => [
        //     'icon' => '<i class="kt-menu__link-icon flaticon-multimedia"></i>',
        //     'title' => __d('acp', 'Mails'),
        //     'url' => ['plugin' => 'Acp', 'controller' => 'Mails', 'action' => 'index'],
        //     'submenu' => [
        //     	[
        //             'url' => ['plugin' => 'Acp', 'controller' => 'Mails', 'action' => 'index'],
        //             'title' => __d('acp', 'All Mail')
        //         ],
        //         [
        //             'url' => ['plugin' => 'Acp', 'controller' => 'Mails', 'action' => 'add'],
        //             'title' => __d('acp', 'Add Mail')
        //         ],
        //         [
        //             'url' => ['plugin' => 'Acp', 'controller' => 'MailCategories', 'action' => 'index'],
        //             'title' => __d('acp', 'All Category')
        //         ],
        //         [
        //             'url' => ['plugin' => 'Acp', 'controller' => 'MailCategories', 'action' => 'add'],
        //             'title' => __d('acp', 'Add Category')
        //         ]
        //     ]
        // ],
        // __d('acp', 'Newsletters') => [
        //     'icon' => '<i class="kt-menu__link-icon flaticon2-mail"></i>',
        //     'url' => ['plugin' => 'Acp', 'controller' => 'Newsletters', 'action' => 'index'],
        //     'title' => __d('acp', 'Newsletters'),
        //     'count' => $countNewslettersMenu > 0?$countNewslettersMenu:null
        // ],
        __d('acp', 'Contacts') => [
            'icon' => '<i class="kt-menu__link-icon flaticon2-mail-1"></i>',
            'url' => ['plugin' => 'Acp', 'controller' => 'Contacts', 'action' => 'index'],
            'title' => __d('acp', 'Contacts'),
            'count' => $countContactsMenu > 0?$countContactsMenu:null
        ],
        __d('acp', 'Tasks') => [
            'icon' => '<i class="kt-menu__link-icon flaticon-layer"></i>',
            'url' => ['plugin' => 'Acp', 'controller' => 'Tasks', 'action' => 'index'],
            'title' => __d('acp', 'Tasks'),
            'count' => $countTasksMenu > 0?$countTasksMenu:null
        ],
        __d('acp', 'Orders') => [
            'icon' => '<i class="kt-menu__link-icon flaticon-notepad"></i>',
            'url' => ['plugin' => 'Acp', 'controller' => 'Orders', 'action' => 'index'],
            'title' => __d('acp', 'Orders'),
            'count' => $countOrdersMenu > 0?$countOrdersMenu:null,
            'submenu' => [
                [
                    'url' => ['plugin' => 'Acp', 'controller' => 'Orders', 'action' => 'index'],
                    'title' => __d('acp', 'All Order')
                ]
            ]
        ],
        // __d('acp', 'Coupons') => [
        //     'icon' => '<i class="kt-menu__link-icon flaticon2-gift"></i>',
        //     'title' => __d('acp', 'Coupons'),
        //     'url' => ['plugin' => 'Acp', 'controller' => 'Coupons', 'action' => 'index'],
        //     'submenu' => [
        //         [
        //             'url' => ['plugin' => 'Acp', 'controller' => 'Coupons', 'action' => 'index'],
        //             'title' => __d('acp', 'All Coupon')
        //         ],
        //         [
        //             'url' => ['plugin' => 'Acp', 'controller' => 'Coupons', 'action' => 'add'],
        //             'title' => __d('acp', 'Add Coupon')
        //         ]
        //     ]
        // ],
        __d('acp', 'Users') => [
            'icon' => '<i class="kt-menu__link-icon flaticon-users-1"></i>',
            'title' => __d('acp', 'Users'),
            'url' => ['plugin' => 'Acp', 'controller' => 'Users', 'action' => 'index'],
            'submenu' => [
            	[
                    'url' => ['plugin' => 'Acp', 'controller' => 'Users', 'action' => 'index'],
                    'title' => __d('acp', 'All User')
                ],
                [
                    'url' => ['plugin' => 'Acp', 'controller' => 'Users', 'action' => 'add'],
                    'title' => __d('acp', 'Add User')
                ],
                [
                    'url' => ['plugin' => 'Acp', 'controller' => 'Roles', 'action' => 'index'],
                    'title' => __d('acp', 'All Roles')
                ],
                [
                    'url' => ['plugin' => 'Acp', 'controller' => 'Roles', 'action' => 'add'],
                    'title' => __d('acp', 'Add Roles')
                ]
            ]
        ],
        __d('acp', 'Settings') => [
            'icon' => '<i class="kt-menu__link-icon flaticon2-settings"></i>',
            'title' => __d('acp', 'Settings'),
            'url' => ['plugin' => 'Acp', 'controller' => 'Settings', 'action' => 'index'],
            'submenu' => [
                [
                    'url' => ['plugin' => 'Acp', 'controller' => 'Settings', 'action' => 'edit',1],
                    'title' => __d('acp', 'General Settings')
                ],
                [
                    'url' => ['plugin' => 'Acp', 'controller' => 'Languages', 'action' => 'index'],
                    'title' => __d('acp', 'Manage Languages')
                ],
                [
                    'url' => ['plugin' => 'Acp', 'controller' => 'Languages', 'action' => 'translates'],
                    'title' => __d('acp', 'Translates languages')
                ],
                [
                    'url' => ['plugin' => 'Acp', 'controller' => 'Languages', 'action' => 'add'],
                    'title' => __d('acp', 'Add Languages')
                ],
                [
                    'url' => ['plugin' => 'Acp', 'controller' => 'Currencies', 'action' => 'index'],
                    'title' => __d('acp', 'All Currencies')
                ]
            ]
        ],
	];
?>

<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
    <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
        <ul class="kt-menu__nav ">

            <?php ksort($menus) ?>
            <?php foreach ($menus as $menu): ?>
            	<?php 
		        	$showMenu = false;
		        	if (isset($menu['submenu'])) {
		        		foreach ($menu['submenu'] as $key => $sub) {
			                $showLink = false;
			                if ($this->AuthUser->hasAccess($sub['url'])) {
			                    $showMenu = true;
			                    $showLink = true;
			                }
			                $menu['submenu'][$key]['show'] = $showLink;
			            }
		        	}else{
		        		if ($this->AuthUser->hasAccess($menu['url'])) {
		                    $showMenu = true;
		                    $showLink = true;
		                }
		        	}
            	?>
                <?php 
                    $controllers = array();
                    if (isset($menu['submenu'])) {
                        foreach ($menu['submenu'] as $sub) {
                            if (!in_array($sub['url']['controller'],$controllers)) {
                                $controllers[] = $sub['url']['controller'];
                            }
                        }
                    }
                ?>
            	<?php if ($showMenu): ?>
            		<?php if (
                        ($this->request->getParam('action') == 'dashboard' && $menu['url']['action'] == 'dashboard') ||
                        ($this->request->getParam('controller') == $menu['url']['controller'] && $this->request->getParam('action') != 'dashboard') || 
                        ($this->request->getParam('controller') != $menu['url']['controller'] && in_array($this->request->getParam('controller'),$controllers))
                    ): ?>
            			<?php if (isset($menu['submenu'])): ?>
							<li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--open kt-menu__item--here" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><?= $menu['icon'] ?><span class="kt-menu__link-text"><?= $menu['title'] ?></span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
								<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
									<ul class="kt-menu__subnav">
										<li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text"><?= $menu['title'] ?></span></span></li>
										<?php foreach ($menu['submenu'] as $sub): ?>
				                        	<?php if ($sub['show']): ?>
				                        		<?php if ($this->request->getParam('controller') == $sub['url']['controller'] && $this->request->getParam('action') == $sub['url']['action']): ?>
				                        			<li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true"><a href="<?= $this->Url->build($sub['url'])?>" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text"><?= $sub['title']?></span></a></li>
				                        		<?php else: ?>
				                        			<li class="kt-menu__item " aria-haspopup="true"><a href="<?= $this->Url->build($sub['url'])?>" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text"><?= $sub['title']?></span></a></li>
				                        		<?php endif ?>
				                        	<?php endif ?>
				                        <?php endforeach ?>
									</ul>
								</div>
							</li>    
            			<?php else: ?>
            				<li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true"><a href="<?= $this->Url->build($menu['url'])?>" class="kt-menu__link "><?= $menu['icon'] ?><span class="kt-menu__link-text"><?= $menu['title'] ?></span><?= isset($menu['count'])?'<span class="kt-menu__link-badge"><span class="kt-badge kt-badge--rounded kt-badge--brand">'.$menu['count'].'</span></span>':'' ?></a></li>
            			<?php endif ?>        		
            		<?php else: ?>
            			<?php if (isset($menu['submenu'])): ?>
            				<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><?= $menu['icon'] ?><span class="kt-menu__link-text"><?= $menu['title'] ?></span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
				                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
				                    <ul class="kt-menu__subnav">
				                        <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text"><?= $menu['title'] ?></span></span></li>
				                        <?php foreach ($menu['submenu'] as $sub): ?>
				                        	<?php if ($sub['show']): ?>
				                        		<li class="kt-menu__item " aria-haspopup="true"><a href="<?= $this->Url->build($sub['url'])?>" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text"><?= $sub['title']?></span></a></li>
				                        	<?php endif ?>
				                        <?php endforeach ?>
				                    </ul>
				                </div>
				            </li>
            			<?php else: ?>
            				<li class="kt-menu__item " aria-haspopup="true"><a href="<?= $this->Url->build($menu['url'])?>" class="kt-menu__link "><?= $menu['icon'] ?><span class="kt-menu__link-text"><?= $menu['title'] ?></span><?= isset($menu['count'])?'<span class="kt-menu__link-badge"><span class="kt-badge kt-badge--rounded kt-badge--brand">'.$menu['count'].'</span></span>':'' ?></a></li>
            			<?php endif ?>

            		<?php endif ?>
            	<?php endif ?>
            <?php endforeach ?>
        </ul>
    </div>
</div>