<style>
    .hover-figure .hide-el{
        opacity: 0;
        transition: all .3s ease-in-out;
    }
    .hover-figure:hover .hide-el{
        opacity: 1;
    }
</style>
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <!--Begin::Dashboard 1-->
    <!--Begin::Row-->
    <div class="kt-portlet kt-portlet--tabs">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-toolbar">
                <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-brand nav-tabs-line-2x nav-tabs-line-right nav-tabs-bold" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tab_1" role="tab">
                            <?= __d('acp','General') ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab_2" role="tab">
                            <?= __d('acp','Contact') ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab_3" role="tab">
                            <?= __d('acp','Location') ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab_4" role="tab">
                            <?= __d('acp','SEO') ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab_5" role="tab">
                            <?= __d('acp','SMTP') ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="kt-portlet__body">
             <?= $this->Form->create($setting, [
                'type' => 'file',
                'templates' => [
                    'input' => '<div class="col-sm-9"><input type="{{type}}" name="{{name}}" {{attrs}}/></div>',
                    
                    'textarea' => '<div class="col-md-9"><textarea type="{{type}}" name="{{name}}" {{attrs}}>{{value}}</textarea></div>',

                    'select' => '<div class="col-md-9"><select name="{{name}}" {{attrs}}>{{content}}</select></div>',

                    'nestingLabel' => '<label{{attrs}}>{{hidden}}{{input}}{{text}}<span></span></label>',

                    'selectMultiple' => '<div class="col-md-9"><select name="{{name}}[]" multiple="multiple"{{attrs}}>{{content}}</select></div>',

                    'checkbox' => '<input type="checkbox" name="{{name}}" value="{{value}}"{{attrs}}>',
                    'inputContainer'  => '<div class="form-group row">{{content}}</div>',
                    'inputContainerError' => '<div class="form-group row">{{content}}{{error}}</div>',
                    'error' => '<div class="col-md-3"></div><div class="col-md-9"><span class="help-block">{{content}}</span></div>',



                    'inputSubmit' => '<input type="{{type}}" class="btn btn-primary mr-2" {{attrs}}/>',
                    'submitContainer' => '{{content}}',
                ]])
            ?>
                <div class="tab-content">
                
                    <div class="tab-pane active" id="tab_1" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-9">
                                <?php $this->Form->unlockField('files'); ?>
                                
                                <?= $this->Form->control('site_title', ['class' => 'form-control', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>

                                <?php
                                    $width = 0;
                                    $height = 0;
                                    $extension = 0;

                                    $imagePath = 'img/no_thumb.png';
                                    if (!empty($setting->image)) {
                                        
                                        $imagePath = 'uploads' . DS . 'settings' . DS . $setting->id . DS . $setting->image;

                                        if (file_exists($imagePath)) {

                                            list($width, $height, $type, $attr) = getimagesize(WWW_ROOT . $imagePath);
                                            $extension = pathinfo(WWW_ROOT . $imagePath, PATHINFO_EXTENSION);
                                        } else {

                                            $setting->image = NULL;
                                        }
                                    }
                                ?>
                                <?= $this->Form->control('image', [
                                    'type'      => 'file',
                                    'accept'    => 'image/*',
                                    'class'     => 'custom-file-input',
                                    'label'     => ['class' => 'col-form-label col-md-3 col-sm-3 col-12'], 
                                    'templates' => [
                                        'file'  => '<div class="col-md-9 col-sm-9 col-12 ">
                                                <div class="custom-file">
                                                <input type="file" name="{{name}}" {{attrs}}/>
                                                <label class="custom-file-label">Choose file</label>
                                                </div>
                                            </div>'
                                    ]]);
                                ?>
                                <?= $this->Form->control('ip_config', ['id' => 'kt_tagify_1','class' => 'form-control', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
                                <?= $this->Form->control('status_ip_config', [
                                    'type' => 'checkbox', 
                                    'label' => ['class' => 'kt-checkbox ta-checkbox','text' => __d('acp', 'Enable Ip Config')], 
                                    'div' => false,
                                    'templates' => [
                                        'nestingLabel' => '<label class="col-form-label col-md-3 col-sm-3 col-12">{{text}}</label><div class="col-md-7 col-sm-9 col-12"><div class="kt-checkbox-inline"><label{{attrs}}>{{hidden}}{{input}}' . __d('acp', 'Status') . '<span></span></label></div></div>',
                                    ]
                                ]);?>

                                <?= $this->Form->control('anysize', [
                                    'type' => 'checkbox', 
                                    'label' => ['class' => 'kt-checkbox ta-checkbox','text' => __d('acp', 'Anysize')], 
                                    'div' => false,
                                    'templates' => [
                                        'nestingLabel' => '<label class="col-form-label col-md-3 col-sm-3 col-12">{{text}}</label><div class="col-md-7 col-sm-9 col-12"><div class="kt-checkbox-inline"><label{{attrs}}>{{hidden}}{{input}}' . __d('acp', 'Status') . ' <b style="color:#fd397a">(' .  __d('acp', 'Check if you want use function Anysize') .')</b>' . '<span></span></label></div></div>',
                                    ]
                                ]);?>

                                <?= $this->Form->control('status_login_email', [
                                    'type' => 'checkbox', 
                                    'label' => ['class' => 'kt-checkbox ta-checkbox','text' => __d('acp', 'Login Email')], 
                                    'div' => false,
                                    'templates' => [
                                        'nestingLabel' => '<label class="col-form-label col-md-3 col-sm-3 col-12">{{text}}</label><div class="col-md-7 col-sm-9 col-12"><div class="kt-checkbox-inline"><label{{attrs}}>{{hidden}}{{input}}' . __d('acp', 'Status') . '<span></span></label></div></div>',
                                    ]
                                ]);?>

                                <?= $this->Form->control('status_logout_email', [
                                    'type' => 'checkbox', 
                                    'label' => ['class' => 'kt-checkbox ta-checkbox','text' => __d('acp', 'Status Logout Email')], 
                                    'div' => false,
                                    'templates' => [
                                        'nestingLabel' => '<label class="col-form-label col-md-3 col-sm-3 col-12">{{text}}</label><div class="col-md-7 col-sm-9 col-12"><div class="kt-checkbox-inline"><label{{attrs}}>{{hidden}}{{input}}' . __d('acp', 'Status') . ' <b style="color:#fd397a">(' .  __d('acp', 'Check if you want to logout the current account') .')</b>' . '<span></span></label></div></div>',
                                    ]
                                ]);?>

                                <hr>
                                <?= $this->Form->control('ftp_host', ['class' => 'form-control', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
                                <?= $this->Form->control('ftp_usr', ['class' => 'form-control', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
                                <?= $this->Form->control('ftp_pwd', ['class' => 'form-control', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
                                <?= $this->Form->control('ftp_link', ['class' => 'form-control', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>

                                <?= $this->Form->control('check_link', [
                                    'type' => 'checkbox', 
                                    'label' => ['class' => 'kt-checkbox ta-checkbox','text' => __d('acp', 'Process Image')], 
                                    'div' => false,
                                    'templates' => [
                                        'nestingLabel' => '<label class="col-form-label col-md-3 col-sm-3 col-12">{{text}}</label><div class="col-md-7 col-sm-9 col-12"><div class="kt-checkbox-inline"><label{{attrs}}>{{hidden}}{{input}}' . __d('acp', 'Status') . ' <b style="color:#fd397a">(' .  __d('acp', 'Check if you like process image') .')</b>' . '<span></span></label></div></div>',
                                    ]
                                ]);?>
                                <hr>
                                <?= $this->Form->control('language_site', ['options' => $languages, 'class' => 'form-control', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
                                <?= $this->Form->control('language_admin', ['options' => $languages, 'class' => 'form-control', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
                                <?= $this->Form->control('currency_id', ['options' => $currencies, 'class' => 'form-control', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
                            </div>
                            <div class="col-lg-3">
                                <div class="kt-avatar kt-avatar--outline kt-avatar--circle--" id="kt_apps_user_add_avatar">
                                    <div class="kt-avatar__holder h-auto">  <!-- style="background-image: url(img/img.png);" -->
                                        <div class="thumbnail-1" style="">
                                            <img id="review_img_featured" class="span12" src="<?= $this->Url->build(DS . $imagePath) ?>" data-skin="dark" data-toggle="kt-tooltip" title="" data-html="true" data-original-title="<?= "File Information <br>Width: " . $width . "px <br>Height: " . $height . "px <br>Extension: ". $extension ?>">
                                        </div>
                                    </div>
                                    <!-- <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="<?= __d('acp','Remove') ?>">
                                        <i class="fas fa-times"></i>
                                        <input type="file" name="kt_apps_contacts_add_avatar">
                                    </label>
                                    <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel">
                                        <i class="fa fa-times"></i>
                                    </span> -->
                                </div>
                            </div>       
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_2" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-9">
                                <?= $this->Form->control('owner', ['class' => 'form-control', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
                                <?= $this->Form->control('phone_number', ['class' => 'form-control', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
                                <?= $this->Form->control('fax_number', ['class' => 'form-control', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
                                <?= $this->Form->control('email', ['class' => 'form-control', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
                                <?= $this->Form->control('emailcc', ['class' => 'form-control', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_3" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-9">
                                <?= $this->Form->control('address', ['class' => 'form-control', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
                                <?= $this->Form->control('latitude', ['class' => 'form-control', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
                                <?= $this->Form->control('longitude', ['class' => 'form-control', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_4" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-9">
                                <?= $this->Form->control('author', ['class' => 'form-control', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
                                <?= $this->Form->control('copyright', ['class' => 'form-control', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
                                <?= $this->Form->control('meta_keyword', ['id' => 'kt_tagify_2','class' => 'form-control', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
                                <?= $this->Form->control('meta_description', ['type' => 'textarea', 'class' => 'form-control', 'label' => ['class' => 'col-sm-3 col-form-label']]); ?>
                                <?= $this->Form->control('facebook_url', ['class' => 'form-control', 'label' => ['class' => 'col-sm-3 col-form-label']]); ?>
                                <?= $this->Form->control('google_plus_url', ['class' => 'form-control', 'label' => ['class' => 'col-sm-3 col-form-label']]); ?>
                                <?= $this->Form->control('twitter_url', ['class' => 'form-control', 'label' => ['class' => 'col-sm-3 col-form-label']]); ?>
                                <?= $this->Form->control('google_analytic', ['type' => 'textarea', 'class' => 'form-control', 'label' => ['class' => 'col-sm-3 col-form-label']]); ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_5" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-9">
                                <?= $this->Form->control('email_emailsend', ['class' => 'form-control', 'label' => ['class' => 'col-sm-3 col-form-label']]); ?>
                                <?= $this->Form->control('email_user', ['class' => 'form-control', 'label' => ['class' => 'col-sm-3 col-form-label']]); ?>
                                <?= $this->Form->control('email_password', ['class' => 'form-control', 'label' => ['class' => 'col-sm-3 col-form-label']]); ?>
                                <?= $this->Form->control('email_host', ['class' => 'form-control', 'label' => ['class' => 'col-sm-3 col-form-label']]); ?>
                                <?= $this->Form->control('email_port', ['class' => 'form-control', 'label' => ['class' => 'col-sm-3 col-form-label']]); ?>
                                <?= $this->Form->control('email_smtpsecure', ['class' => 'form-control', 'label' => ['class' => 'col-sm-3 col-form-label']]); ?>
                                <?= $this->Form->control('status', [
                                    'type' => 'checkbox', 
                                    'label' => ['class' => 'kt-checkbox ta-checkbox'], 
                                    'div' => false,
                                    'templates' => [
                                        'nestingLabel' => '<label class="col-form-label col-md-3 col-sm-3 col-12">{{text}}</label><div class="col-md-7 col-sm-9 col-12"><div class="kt-checkbox-inline"><label{{attrs}}>{{hidden}}{{input}}{{text}}<span></span></label></div></div>',
                                    ]
                                ]);?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 col-12"></label>
                    <div class="col-md-7 col-sm-9 col-12">
                        <div class="kt-portlet__foot ta-foot">
                            <div class="kt-form__actions">
                                <?= $this->Form->submit(__d('acp', 'Submit')) ?>
                                <button type="reset" class="btn btn-secondary"><?php echo __d('acp', 'Cancel') ?></button>
                            </div>
                        </div>
                    </div>
                </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
    <!--End::Row-->
    <!--End::Dashboard 1-->
</div>
