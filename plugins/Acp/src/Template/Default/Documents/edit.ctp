<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="template-demo">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-custom">
                        <li class="breadcrumb-item"><a href="<?php echo $this->Url->build(['plugin' => 'Acp', 'controller' => 'Pages', 'action' => 'dashboard']) ?>"><?php echo __d('acp', 'Home') ?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo $this->Url->build(['plugin' => 'Acp', 'controller' => 'Documents', 'action' => 'index']) ?>"><?php echo __d('acp', 'Document') ?></a></li>
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
            <h4 class="card-title"><?php echo __d('acp', 'Document') ?></h4>
            <div>
                <p class="card-description d-inline-block">
                    <?php echo __d('acp', 'Edit Document') ?> 
                </p>
                <div class="d-inline-block">
                    <?= $this->Form->postLink(__d('acp', 'Delete'), 
                        ['action' => 'delete', $document->id],    
                        ['confirm' => __d('acp', 'Are you sure you want to delete # {0}?', $document->id)]
                    ) ?>
                </div>
            </div>
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

                    'inputSubmit' => '<input type="{{type}}" class="btn btn-primary" {{attrs}}/>',
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
                    ]);
                ?>


                <?php
                    $filePath = 'img/no_thumb.png';
                    if (!empty($document->file)) {
                        
                        $filePath = 'uploads' . DS . 'documents' . DS . $document->uuid . DS . 'file' . DS . $document->file;

                        if (file_exists($filePath)) {

                            $size = filesize(WWW_ROOT . $filePath);
                            $extension = pathinfo(WWW_ROOT . $filePath, PATHINFO_EXTENSION);
                        } else {

                            $document->file = NULL;
                        }
                    }
                ?>
                <div class="row justify-content-between">
                    <div class="col-md-6">
                        <?= $this->Form->control('file', [
                            'type'      => 'file',
                            // 'accept'    => 'file/*',

                            'class'     => 'dropify',
                            // 'data-default-file' => $this->Url->build(DS . $filePath),


                            'label'     => ['class' => 'control-label col-md-6'], 
                            'templates' => [
                                'file'  => '<div class="col-md-6"><input type="file" name="{{name}}" {{attrs}}/></div>'
                            ]]);
                        ?>
                    </div>
                    <?php if (!empty($document->file)): ?>
                    <div class="col-md-3">

                    <?php 
                        function formatSizeUnits($bytes)
                        {
                            if ($bytes >= 1073741824)
                            {
                                $bytes = number_format($bytes / 1073741824, 2) . ' GB';
                            }
                            elseif ($bytes >= 1048576)
                            {
                                $bytes = number_format($bytes / 1048576, 2) . ' MB';
                            }
                            elseif ($bytes >= 1024)
                            {
                                $bytes = number_format($bytes / 1024, 2) . ' KB';
                            }
                            elseif ($bytes > 1)
                            {
                                $bytes = $bytes . ' bytes';
                            }
                            elseif ($bytes == 1)
                            {
                                $bytes = $bytes . ' byte';
                            }
                            else
                            {
                                $bytes = '0 bytes';
                            }

                            return $bytes;
                        }
                    ?>
                        <a href="<?= $this->Url->build(DS . $filePath) ?>" download alt="" data-toggle="tooltip" data-placement="right" data-html="true" data-custom-class="tooltip-success" title="<?= "File Information <br>Size: " . formatSizeUnits($size) . " <br>Extension: ". $extension ?>"><?= __d('acp', 'Download File') ?></a>
                    </div>
                <?php endif; ?>
                </div>

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
                        <?= $this->Form->button(__d('acp', 'Cancel'), ['type' => 'reset', 'class' => 'btn btn-secondary']) ?>
                    </div>
                </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>