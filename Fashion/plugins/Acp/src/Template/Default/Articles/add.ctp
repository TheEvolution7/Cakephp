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
                            <i class="flaticon2-heart-rate-monitor" aria-hidden="true"></i><?= __d('acp','General') ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab_2" role="tab">
                            <i class="flaticon2-image-file" aria-hidden="true"></i><?= __d('acp','Image') ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab_3" role="tab">
                            <i class="flaticon-more-1" aria-hidden="true"></i><?= __d('acp','More Info') ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="kt-portlet__body">
             <?= $this->Form->create($article, [
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
                                
                                <?= $this->Form->control('article_categories._ids', [
                                    'options'       => $articleCategories,
                                    'class'         => 'form-control kt-select2 select2 d-block',
                                    'label'         => ['class' => 'col-form-label col-md-3 col-sm-3 col-12'],
                                    'value'         => !empty($requestQuery['article_category_id']) ? $requestQuery['article_category_id'] : null,
                                    'hiddenField'   => false,
                                    'empty'         => false,
                                    'multiple',
                                ]); ?>
                                <?php
                                    $width = 0;
                                    $height = 0;
                                    $extension = 0;

                                    $imagePath = 'img/no_thumb.png';
                                    if (!empty($article->image)) {
                                        
                                        $imagePath = 'uploads' . DS . 'articles' . DS . $article->id . DS . $article->image;

                                        if (file_exists($imagePath)) {
                                            list($width, $height, $type, $attr) = getimagesize(WWW_ROOT . $imagePath);
                                            $extension = pathinfo(WWW_ROOT . $imagePath, PATHINFO_EXTENSION);
                                        } else {

                                            $article->image = NULL;
                                        }
                                    }
                                ?>
                                <?= $this->Form->control('title', ['class' => 'form-control', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
                                <?= $this->Form->control('slug', [
                                    'class' => 'form-control check-slug', 
                                    'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12'],
                                    'data-url' => $this->Url->build([
                                        'controller' => $this->request['controller'],
                                        'action' => 'jCheckSlug'
                                    ]),
                                    'data-model' => $this->request['controller']
                                ]); ?>
                                <?= $this->Form->control('description', ['type' => 'textarea', 'class' => 'form-control', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
                                <?= $this->Form->control('content', ['type' => 'textarea', 'class' => 'form-control editor', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
                                <?= $this->Form->control('sort', ['class' => 'form-control', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
                                <?= $this->Form->control('tags', ['id' => 'kt_tagify_1','class' => 'form-control', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 col-12"><?= __d('acp','Status') ?></label>
                                    <div class="col-md-9 col-sm-9 col-12">
                                        <div class="kt-checkbox-inline">
                                            <?= $this->Form->control('status', [
                                                'type' => 'checkbox', 
                                                'label' => ['class' => 'kt-checkbox ta-checkbox'], 
                                                'div' => false,
                                                'checked' => true,
                                                'templates' => [
                                                    'inputContainer'  => '{{content}}',
                                                ]
                                            ]); ?>
                                            <?= $this->Form->control('home', [
                                                'type' => 'checkbox', 
                                                'label' => ['class' => 'kt-checkbox ta-checkbox'], 
                                                'div' => false,
                                                'templates' => [
                                                    'inputContainer'  => '{{content}}',
                                                ]
                                            ]); ?>
                                            <?= $this->Form->control('featured', [
                                                'type' => 'checkbox', 
                                                'label' => ['class' => 'kt-checkbox ta-checkbox'], 
                                                'div' => false,
                                                'templates' => [
                                                    'inputContainer'  => '{{content}}',
                                                ]
                                            ]); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="kt-avatar kt-avatar--outline kt-avatar--circle--" id="kt_apps_user_add_avatar">
                                    <div class="kt-avatar__holder h-auto">  <!-- style="background-image: url(img/img.png);" -->
                                        <div class="thumbnail-1" style="">
                                            <img id="review_img_featured" class="span12" src="<?= $this->Url->build(DS . $imagePath) ?>" data-skin="dark" data-toggle="kt-tooltip" title="" data-html="true" data-original-title="<?= "File Information <br>Width: " . $width . "px <br>Height: " . $height . "px <br>Extension: ". $extension ?>">
                                        </div>
                                    </div>
                                    <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="<?= __d('acp','Remove') ?>">
                                        <i class="fas fa-times"></i>
                                        <input type="file" name="kt_apps_contacts_add_avatar">
                                    </label>
                                    <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel">
                                        <i class="fa fa-times"></i>
                                    </span>
                                </div>
                            </div>        
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_2" role="tabpanel">
                        <div class="col-12">
                            <div class="row portfolio-grid">
                            </div>
                        </div>
                        <div class="form-group" style="display:none;" id="imgProgress">
                            <div class="progress progress-md">
                                <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0% <?php echo __d('acp', 'Complete') ?></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="file" name="image_list[]" class="file-upload-default d-none" multiple="multiple" id="fileImage" data-url="<?php echo $this->Url->build('/acp/'.$this->request['controller'].'/upload_file') ?>">
                            <div class="input-group col-xs-12">
                                <span class="input-group-append">
                                    <label for="fileImage" class="file-upload-browse btn btn-primary mb-0"><?php echo __d('acp', 'Select file') ?></label>
                                    <button type="button" class="btn btn-danger btn-icon-text btn-remove-all"><?php echo __d('acp', 'Remove All') ?></button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_3" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-8">
                                <?= $this->Form->control('meta_title', ['class' => 'form-control', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
                                <?= $this->Form->control('meta_description', ['type' => 'textarea','class' => 'form-control', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
                                <?= $this->Form->control('meta_keyword', ['id' => 'kt_tagify_2','class' => 'form-control', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
                            </div>      
                        </div>
                    </div>
                </div>

                <input type="hidden" name="id_article">
                <input type="hidden" name="image">
                <input type="hidden" name="image_fix">
                <input type="hidden" name="images">
                <input type="hidden" name="images_delete">
                <input type="hidden" name="id_dir" value="0">

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
