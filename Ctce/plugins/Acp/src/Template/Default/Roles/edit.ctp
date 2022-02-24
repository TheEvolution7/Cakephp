<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <!--Begin::Dashboard 1-->
    <!--Begin::Row-->
    <div class="kt-portlet kt-portlet--tabs">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-toolbar">
                <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-brand nav-tabs-line-2x nav-tabs-line-right nav-tabs-bold" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tab_1" role="tab">
                            <i class="flaticon2-heart-rate-monitor" aria-hidden="true"></i>General
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="kt-portlet__body">
            <div class="tab-content">
                <div class="row">
                    <div class="col-lg-8">
                        <?= $this->Form->create($role, [
                            'type' => 'file',
                            'templates' => [
                                'input' => '<div class="col-md-7 col-sm-9 col-12"><input type="{{type}}" name="{{name}}" {{attrs}}/></div>',
                                
                                'textarea' => '<div class="col-md-7 col-sm-9 col-12"><textarea type="{{type}}" name="{{name}}" {{attrs}}>{{value}}</textarea></div>',

                                'select' => '<div class="col-md-7 col-sm-9 col-12"><select name="{{name}}" {{attrs}}>{{content}}</select></div>',

                                'checkbox' => '<input type="checkbox" name="{{name}}" value="{{value}}"{{attrs}}>',
                                'nestingLabel' => '<label class="col-form-label col-md-3 col-sm-3 col-12">Status</label><div class="col-md-7 col-sm-9 col-12"><div class="kt-checkbox-inline"><label{{attrs}}>{{hidden}}{{input}}{{text}}<span></span></label></div></div>',

                                'inputContainer'  => '<div class="form-group row">{{content}}</div>',
                                'inputContainerError' => '<div class="form-group row">{{content}}{{error}}</div>',
                                'error' => '<div class="col-md-3"></div><div class="col-sm-9"><span class="help-block">{{content}}</span></div>',

                                'inputSubmit' => '<input type="{{type}}" class="btn btn-primary" {{attrs}}/>',
                                'submitContainer' => '{{content}}',
                            ]])
                        ?>
                            <div class="tab-pane active" id="tab_1" role="tabpanel">
                                <?php $this->Form->unlockField('files'); ?>

                                <?= $this->Form->control('title', ['class' => 'form-control', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
                                <?= $this->Form->control('color', ['class' => 'form-control', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
                                <?= $this->Form->control('description', ['type' => 'textarea', 'class' => 'form-control', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>

                                <?= $this->Form->control('status', [
                                    'type' => 'checkbox', 
                                    'label' => ['class' => 'kt-checkbox ta-checkbox'], 
                                    'div' => false,
                                    'checked' => true,
                                ]);?>
                                
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
                            </div>
                        <?= $this->Form->end() ?>
                    </div>     
                </div>
                
                
            </div>
        </div>
    </div>
    <!--End::Row-->
    <!--End::Dashboard 1-->
</div>