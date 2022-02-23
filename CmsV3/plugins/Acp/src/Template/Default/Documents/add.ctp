<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="template-demo">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-custom">
                        <li class="breadcrumb-item"><a href="<?php echo $this->Url->build(['plugin' => 'Acp', 'controller' => 'Pages', 'action' => 'dashboard']) ?>"><?php echo __d('acp', 'Home') ?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo $this->Url->build(['plugin' => 'Acp', 'controller' => 'Documents', 'action' => 'index']) ?>"><?php echo __d('acp', 'Document') ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><span><?php echo __d('acp', 'Add') ?></span></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?php echo __d('acp', 'Document') ?></h4>
            <p class="card-description">
                <?php echo __d('acp', 'Add Document') ?>
            </p>
            <?= $this->Form->create($document, [
                'type' => 'file',
                'templates' => [
                    'input' => '<div class="col-sm-9"><input type="{{type}}" name="{{name}}" {{attrs}}/></div>',
                    
                    'textarea' => '<div class="col-md-9"><textarea type="{{type}}" name="{{name}}" {{attrs}}>{{value}}</textarea></div>',

                    'select' => '<div class="col-md-9"><select name="{{name}}" {{attrs}}>{{content}}</select></div>',
                    'selectMultiple' => '<div class="col-md-9"><select name="{{name}}[]" multiple="multiple"{{attrs}}>{{content}}</select></div>',

                    'checkbox' => '<input type="checkbox" name="{{name}}" value="{{value}}"{{attrs}}>',
                    'nestingLabel' => '<div class="col-md-3"></div><div class="col-md-9"><div class="form-check form-check-flat form-check-primary"><label{{attrs}}>{{hidden}}{{input}}{{text}}</label></div></div>',

                    'inputContainer'  => '<div class="form-group row">{{content}}</div>',
                    'inputContainerError' => '<div class="form-group row">{{content}}{{error}}</div>',
                    'error' => '<div class="col-md-3"></div><div class="col-md-9"><span class="help-block">{{content}}</span></div>',



                    'inputSubmit' => '<input type="{{type}}" class="btn btn-primary mr-2" {{attrs}}/>',
                    'submitContainer' => '{{content}}',
                ]])
            ?>
                <?php $this->Form->unlockField('files'); ?>
                <?= $this->Form->control('document_category_id', [
                    'options'       => $documentCategories,
                    'class'         => 'form-control select2',
                    'label'         => ['class' => 'col-sm-3 col-form-label'],
                    'hiddenField'   => false,
                    'empty'         => 'Select Category'
                ]); ?>



                <?= $this->Form->control('file', [
                    'type'      => 'file',
                    // 'accept'    => 'image/*',
                    'class'     => 'dropify',
                    'label'     => ['class' => 'control-label col-md-3'], 
                    'templates' => [
                        'file'  => '<div class="col-md-3"><input type="file" name="{{name}}" {{attrs}}/></div>'
                    ]]);
                ?>
                <?= $this->Form->control('title', ['class' => 'form-control', 'label' => ['class' => 'col-sm-3 col-form-label']]); ?>
                <?= $this->Form->control('description', ['type' => 'textarea', 'class' => 'form-control', 'label' => ['class' => 'col-sm-3 col-form-label']]); ?>

                <?= $this->Form->control('roles._ids', [
                    'options'       => $roles,
                    'class'         => 'form-control multi-select2',
                    'label'         => ['class' => 'col-sm-3 col-form-label'],
                    'hiddenField'   => false,
                    'empty'         => false,
                    'multiple'
                ]); ?>


                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-2">
                        <?= $this->Form->control('status', [
                            'type' => 'checkbox', 
                            'class' => 'form-control', 
                            'label' => ['class' => 'form-check-label'], 
                            'div' => false,
                            'checked' => true,
                            'templates' => [
                                'nestingLabel' => '<div class="col-md-9"><div class="form-check form-check-flat form-check-primary"><label{{attrs}}>{{hidden}}{{input}}{{text}}</label></div></div>',
                            ]
                        ]);?>
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <?= $this->Form->submit(__d('acp', 'Submit')) ?>
                        <button class="btn btn-light" type="button"><?php echo __d('acp', 'Cancel') ?></button>
                    </div>
                </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>