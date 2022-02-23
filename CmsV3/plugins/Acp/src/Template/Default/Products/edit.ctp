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
                        <a class="nav-link" data-toggle="tab" href="#tab_4" role="tab">
                            <i class="flaticon2-image-file" aria-hidden="true"></i><?= __d('acp','Attributes') ?>
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
             <?= $this->Form->create($product, [
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
                                
                                <?= $this->Form->control('product_categories._ids', [
                                    'options'       => $productCategories,
                                    'class'         => 'form-control kt-select2 select2 d-block',
                                    'label'         => ['class' => 'col-form-label col-md-3 col-sm-3 col-12'],
                                    'hiddenField'   => false,
                                    'empty'         => false,
                                    'multiple',
                                ]); ?>

                                <?= $this->Form->control('brand_id', [
                                    'options'       => $brands,
                                    'class'         => 'form-control kt-select2 select2 d-block',
                                    'label'         => ['class' => 'col-form-label col-md-3 col-sm-3 col-12'],
                                    'hiddenField'   => false,
                                    'empty'         => false,
                                ]); ?>
                                <?php
                                    $width = 0;
                                    $height = 0;
                                    $extension = 0;
                                    $imagePath = 'img/no_thumb.png';
                                    if (!empty($product->image)) {
                                        
                                        $imagePath = 'uploads' . DS . 'products' . DS . $product->id . DS . $product->image;

                                        if (file_exists($imagePath)) {
                                            list($width, $height, $type, $attr) = getimagesize(WWW_ROOT . $imagePath);
                                            $extension = pathinfo(WWW_ROOT . $imagePath, PATHINFO_EXTENSION);
                                        } else {

                                            $product->image = NULL;
                                        }
                                        if ($width > 500) {
                                            $imagePath = 'uploads' . DS . 'products' . DS . $product->id . DS . 'thumbnail' . DS . $product->image;
                                        }
                                    }
                                ?>
                                <?= $this->Form->control('title', ['class' => 'form-control', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
                                <?= $this->Form->control('currency', ['type' => 'hidden','value' => $this->getConfigure('Core')['setting']['currency']]); ?>
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
                                <?= $this->Form->control('link_video', ['class' => 'form-control', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
                                <?= $this->Form->control('price', ['class' => 'form-control', 'label' => ['text' => 'Price ('.$this->getConfigure('Core')['setting']['currency'].')','class' => 'col-form-label col-md-3 col-sm-3 col-12'],'value' => $this->Cms->price_translate($product->price,$product->currency,$this->getConfigure('Core')['setting']['currency'])]); ?>
                                <?= $this->Form->control('sort', ['class' => 'form-control', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 col-12"><?= __d('acp','Status') ?></label>
                                    <div class="col-md-9 col-sm-9 col-12">
                                        <div class="kt-checkbox-inline">
                                            <?= $this->Form->control('status', [
                                                'type' => 'checkbox', 
                                                'label' => ['class' => 'kt-checkbox ta-checkbox'], 
                                                'div' => false,
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
                                <?php $images = explode('|',$product->images) ?>
                                <?php foreach ($images as $key => $image): ?>
                                    <?php if ($key < count($images) -1 ): ?>
                                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 d-flex flex-row mb-3">
                                            <figure class="effect-text-in position-relative w-100 align-self-stretch hover-figure">
                                                <?php 
                                                    if (!empty($product->image)) {
                                                        $imagePath = 'uploads' . DS . 'products' . DS . $product->id . DS .$image;

                                                        if (file_exists($imagePath)) {
                                                            $width = 0;
                                                            $height = 0;
                                                            $extension = 0;
                                                            list($width, $height, $type, $attr) = getimagesize(WWW_ROOT . $imagePath);
                                                            $extension = pathinfo(WWW_ROOT . $imagePath, PATHINFO_EXTENSION);
                                                        } 

                                                        if ($width > 500) {
                                                            $imagePath = 'uploads' . DS . 'products' . DS . $product->id . DS . 'thumbnail' . DS . $image;
                                                        }
                                                        echo '<img src="'.$this->Url->build(DS . $imagePath).'" class="w-100 h-100" style="object-fit: contain" data-skin="dark" data-toggle="kt-tooltip" title="" data-html="true" data-original-title="File Information <br>Width:'. $width . 'px <br>Height:'. $height .'px <br>Extension:'. $extension.'">';

                                                    } else {
                                                        $imagePath = 'img/no_thumb.png';
                                                    }
                                                ?>
                                                <figcaption>
                                                    <?php if ($product->image == $image): ?>
                                                        <h4 class="choose-default position-absolute w-100 h-100 fixed-top d-flex justify-content-center align-items-center"><button class="btn btn-primary"><?= __d('acp','Default') ?></button></h4>
                                                    <?php endif ?>
                                                    <p class="mb-0 d-flex justify-content-between position-absolute fixed-bottom w-100 p-3 bg-primary hide-el">
                                                        <button type="button" class="btn btn-inverse-dark btn-choose-default" data-url="<?php echo $this->Url->build(DS . $imagePath) ?>"><i class="fa fa-check"></i></button>
                                                        <button type="button" data-url="<?php echo $this->Url->build(DS . $imagePath) ?>" class="btn btn-inverse-dark btn-remove"><i class="fa fa-trash"></i></button>
                                                    </p>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <!-- <button type="button" class="btn btn-success btn-icon-text"><?php echo __d('acp', 'Select file') ?></button>
                        <button type="button" class="btn btn-danger btn-icon-text"><?php echo __d('acp', 'Remove All') ?></button> -->
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
                                    <button type="button" onclick="location.href='<?= $this->Url->build(['controller' => 'Products', 'action' => 'reorderImage', $product->id]) ?>';" class="btn btn-success btn-icon-text"><?php echo __d('acp', 'Sort List Image') ?></button>
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
                    <div class="tab-pane" id="tab_4" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-8">
                                <?php foreach ($list_attribute as $list): ?>
                                    <?= $this->Form->control('attribute_values._ids', [
                                        'options'       => $list['list'],
                                        'class'         => 'form-control multi-select2 select-attribute-'.$list['id'],
                                        'style'         => 'width: 100%;',
                                        'label'         => ['text' =>  $list['title'],'class' => 'col-sm-3 col-form-label'],
                                        'hiddenField'   => false,
                                        'empty'         => false,
                                        'multiple'
                                    ]); ?>
                                <?php endforeach ?>
                            </div>
                            <div class="col-lg-4">
                                <?php foreach ($list_attribute as $list): ?>
                                    <div class="form-group row">
                                        <button type="button" data-url="<?= $this->Url->build(['controller' => 'Products','action' => 'jGetAmount',$list['id']]) ?>" data-product="<?= $product->id ?>" data-attribute-id="<?= $list['id'] ?>" class="btn btn-bold btn-sm btn-font-sm btn-label-success mb-2 btn-edit-amount" data-toggle="modal" data-target="#image-modal"><i class="fa fa-edit"></i><?= __d('acp','Edit Amount') ?></button>
                                    </div>
                                <?php endforeach ?>
                            </div>      
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id_product" value="<?php echo $product->id ?>">
                <input type="hidden" name="image" value="<?php echo $product->image ?>">
                <input type="hidden" name="image_fix" value="<?php echo $product->image ?>">
                <input type="hidden" name="images" value="<?php echo $product->images ?>">
                <input type="hidden" name="images_delete">
                <input type="hidden" name="id_dir" value="<?php echo isset($product->id)?$product->id:0 ?>">
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

<div class="modal fade" id="image-modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel"><?php echo __d('acp', 'Edit Amount') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <?= $this->Form->create(null,[
                    'id' => 'form-save-attribute-values-amount',
                    'url' => ['controller' => 'Products','action' => 'jSaveAmount']
                ])?>
                <?= $this->Form->end() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btn-save-attribute-values-amount"><?php echo __d('acp', 'Save change') ?></button>
                <button type="button" class="btn btn-light" data-dismiss="modal"><?php echo __d('acp', 'Close') ?></button>
            </div>
            
        </div>
    </div>
</div>

