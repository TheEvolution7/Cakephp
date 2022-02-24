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
                </ul>
            </div>
        </div>
        <div class="kt-portlet__body">
             <?= $this->Form->create($coupon, [
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
                                
                                <?= $this->Form->control('title', ['class' => 'form-control', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
                                <?= $this->Form->control('code', ['class' => 'form-control', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
                                <?= $this->Form->control('description', ['type' => 'textarea', 'class' => 'form-control', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
                                <?= $this->Form->control('price', ['class' => 'form-control', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
                                <?php $listUnit = [0 => __d('acp', '%'), 1 => __d('acp', 'Price')] ?>
                                <?= $this->Form->control('unit', ['type' => 'select', 'options' => $listUnit, 'class' => 'form-control', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>

                                <div class="form-group row">
                                    <?= $this->Form->label('limit_used_count', null, ['class' => 'col-form-label col-md-3 col-sm-3 col-12']) ?>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><?= $coupon->used_count ?>/</span>
                                            </div>
                                            <input type="number" class="form-control" name="limit_used_count", value="<?= $coupon->limit_used_count ?>">
                                        </div>
                                        <span class="form-text text-muted"><?= __d('acp','Enter 0 to set Unlimit') ?></span>
                                    </div>
                                    
                                </div>

                                <div class="form-group row">
                                    <?= $this->Form->label('limit_used_amount', null, ['class' => 'col-form-label col-md-3 col-sm-3 col-12', 'text' => __d('acp','Limit Used Amount'). ' (' . $this->getConfigure('Core')['setting']['currency'] . ') ']) ?>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><?= $coupon->used_count ?>/</span>
                                            </div>
                                            <input type="number" class="form-control" name="limit_used_amount", value="<?= $coupon->limit_used_amount ?>">
                                        </div>
                                        <span class="form-text text-muted"><?= __d('acp','Enter 0 to set Unlimit') ?></span>
                                    </div>
                                    
                                </div>
                                <style>
                                    .datepicker-1 {
                                        width: 100%
                                    }
                                </style>
                                <?php 
                                    $date_start = isset($coupon->date_start) ? $coupon->date_start->format('Y-m-d') : null;
                                    $date_end = isset($coupon->date_end) ? $coupon->date_end->format('Y-m-d') : null; ?>
                                <?= $this->Form->control('date_start', ['value' => $date_start, 'class' => 'form-control datepicker datepicker-1', 'type' => 'text', 'placeholder' => 'yyyy-mm-dd', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12', 'text' => __d('acp','Date Start') . '<span class="form-text text-muted">' . __d('acp','Leave empty to set unlimit') . '</span>', 'escape' => false]]); ?>
                                <?= $this->Form->control('date_end', ['value' => $date_end, 'class' => 'form-control datepicker datepicker-1', 'type' => 'text', 'placeholder' => 'yyyy-mm-dd', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12', 'text' => __d('acp','Date End') . '<span class="form-text text-muted">' . __d('acp','Leave empty to set unlimit') . '</span>', 'escape' => false]]); ?>

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
                                        </div>
                                    </div>
                                </div>
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
