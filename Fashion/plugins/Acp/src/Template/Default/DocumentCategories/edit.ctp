<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="template-demo">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-custom">
                        <li class="breadcrumb-item"><a href="<?php echo $this->Url->build(['plugin' => 'Acp', 'controller' => 'Pages', 'action' => 'dashboard']) ?>""><?php echo __d('acp', 'Home') ?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo $this->Url->build(['plugin' => 'Acp', 'controller' => 'DocumentCategories', 'action' => 'index']) ?>""><?php echo __d('acp', 'Category Document') ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><span>Edit</span></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?php echo __d('acp', 'Category Document') ?></h4>
            <div>
                <p class="card-description d-inline-block">
                    <?php echo __d('acp', 'Edit Category Document') ?> 
                </p>
                <div class="d-inline-block">
                    <?= $this->Form->postLink(__d('acp', 'Delete'), 
                        ['action' => 'delete', $documentCategory->id],    
                        ['confirm' => __d('acp', 'Are you sure you want to delete # {0}?', $documentCategory->id)]
                    ) ?>
                </div>
            </div>
            <?= $this->Form->create($documentCategory, [
                'type' => 'file',
                'templates' => [
                    'input' => '<div class="col-sm-9"><input type="{{type}}" name="{{name}}" {{attrs}}/></div>',
                    
                    'textarea' => '<div class="col-md-9"><textarea type="{{type}}" name="{{name}}" {{attrs}}>{{value}}</textarea></div>',

                    'select' => '<div class="col-md-9"><select name="{{name}}" {{attrs}}>{{content}}</select></div>',

                    'checkbox' => '<input type="checkbox" name="{{name}}" value="{{value}}"{{attrs}}>',
                    'nestingLabel' => '<div class="col-md-3"></div><div class="col-md-9"><div class="form-check form-check-flat form-check-primary"><label{{attrs}}>{{hidden}}{{input}}{{text}}</label></div></div>',

                    'inputContainer'  => '<div class="form-group row">{{content}}</div>',
                    'inputContainerError' => '<div class="form-group row">{{content}}{{error}}</div>',
                    'error' => '<div class="col-md-3"></div><div class="col-md-9"><span class="help-block">{{content}}</span></div>',

                    'inputSubmit' => '<input type="{{type}}" class="btn btn-primary" {{attrs}}/>',
                    'submitContainer' => '{{content}}',
                ]])
            ?>
                
                <?php $this->Form->unlockField('files'); ?>
                <?= $this->Form->control('parent_id', [
                    'options'       => $parentDocumentCategories,
                    'class'         => 'form-control select2',
                    'label'         => ['class' => 'col-sm-3 col-form-label'],
                    'hiddenField'   => false,
                    'empty'         => 'Select Category'
                    ]);
                ?>
                <?php
                     $imagePath = 'img/no_thumb.png';

                    if (!empty($documentCategory->image)) {
                        $imagePath = 'uploads' . DS . 'document_categories' . DS . $documentCategory->uuid . DS . 'image' . DS .  $documentCategory->image;

                        if (file_exists($imagePath)) {

                            list($width, $height, $type, $attr) = getimagesize(WWW_ROOT . $imagePath);
                            $extension = pathinfo(WWW_ROOT . $imagePath, PATHINFO_EXTENSION);
                        } else{

                            $documentCategory->image = NULL;
                        }
                    }
                ?>
                
                <div class="row justify-content-between">
                    <div class="col-md-6">
                        <?= $this->Form->control('image', [
                            'type'      => 'file',
                            'accept'    => 'image/*',

                            'class'     => 'dropify',
                            // 'data-default-file' => $this->Url->build(DS . $imagePath),


                            'label'     => ['class' => 'control-label col-md-6'], 
                            'templates' => [
                                'file'  => '<div class="col-md-6"><input type="file" name="{{name}}" {{attrs}}/></div>'
                            ]]);
                        ?>
                    </div>
                    <?php if (!empty($documentCategory->image)): ?>
                    <div class="col-md-3">
                        <img src="<?= $this->Url->build(DS . $imagePath) ?>" class="img-thumbnail" alt="" data-toggle="tooltip" data-placement="right" data-html="true" data-custom-class="tooltip-success" title="<?= "File Information <br>Width: " . $width . "px <br>Height: " . $height . "px <br>Extension: ". $extension ?>">
                    </div>
                <?php endif; ?>
                </div>

                <?= $this->Form->control('title', ['class' => 'form-control', 'label' => ['class' => 'col-sm-3 col-form-label']]); ?>
                <?= $this->Form->control('description', ['type' => 'textarea', 'class' => 'form-control', 'label' => ['class' => 'col-sm-3 col-form-label']]); ?>
                <?= $this->Form->control('status', ['type' => 'checkbox', 'class' => 'form-control', 'label' => ['class' => 'form-check-label'], 'div' => false]);?>
                
                <div class="form-group row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <?= $this->Form->submit(__d('acp', 'Submit')) ?>
                        <?= $this->Form->button(__d('acp', 'Cancel'), ['type' => 'reset', 'class' => 'btn btn-secondary']) ?>
                    </div>
                </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>