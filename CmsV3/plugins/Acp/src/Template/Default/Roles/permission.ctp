<?php 
    $arr = [
        'kt-widget2__item--primary',
        'kt-widget2__item--warning',
        'kt-widget2__item--success',
        'kt-widget2__item--danger'
    ]; ?>
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet--tabs">
        <div class="kt-portlet__body">
            <div class="tab-content">
                <?= $this->Form->create($role,[
                    'templates' => [
                        'checkbox' => '<input type="checkbox" name="{{name}}" value="{{value}}"{{attrs}}>',
                        'nestingLabel' =>   '<div class="kt-widget2__checkbox">
                                                <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single" {{attrs}}>
                                                    {{hidden}}{{input}}
                                                    <span></span>
                                                </label>
                                            </div>
                                            <div class="kt-widget2__info">
                                                <a href="javascript:;" class="kt-widget2__title">{{text}}</a>
                                            </div>',

                        'inputContainer'  => '{{content}}',
                        'inputContainerError' => '<div class="form-group row">{{content}}{{error}}</div>',
                        'error' => '<div class="col-md-3"></div><div class="col-sm-9"><span class="help-block">{{content}}</span></div>',

                        'inputSubmit' => '<input type="{{type}}" class="btn btn-primary" {{attrs}}/>',
                        'submitContainer' => '{{content}}',
                    ]
                ])?>

                    <?php 
                        $permissions = json_decode($role->permissions, true);
                    ?>
                    <div class="row form-group">
                        <?php foreach ($getControllers as $key => $controller): ?>
                            <div class="col-xl-3 col-lg-6 order-lg-3 order-xl-1">
                                <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid" style="height: auto;">
                                    <div class="kt-portlet__head">
                                        <div class="kt-portlet__head-label">
                                            <h3 class="kt-portlet__head-title">
                                                <?= $controller['name'] ?>
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="kt-portlet__body">
                                        <div class="tab-content">
                                            <div class="kt-widget2">
                                                <?php foreach ($controller['actions'] as $keyAction => $action): ?>
                                                    <div class="kt-widget2__item  justify-content-start <?= $arr[rand(0,3)] ?>">
                                                    <?= $this->Form->control('permissions.' . $key .'.'. $keyAction, [
                                                        'type' => 'checkbox', 
                                                        'label' => ['text' => $action], 
                                                        'div' => false,
                                                        'checked' => isset($permissions[$key][$keyAction]) ? $permissions[$key][$keyAction] : false,
                                                    ]);?>
                                                </div>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                    <div class="form-group row kt-portlet ">
                        <div class="col-12">
                            <div class="kt-portlet__foot ta-foot">
                                <div class="kt-form__actions text-center">
                                    <?= $this->Form->submit(__d('acp', 'Submit')) ?>
                                    <button type="reset" class="btn btn-secondary"><?php echo __d('acp', 'Cancel') ?></button>
                                </div>
                            </div>
                        </div>
                    </div>

                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>