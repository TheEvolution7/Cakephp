<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <?= $this->Form->create($practice_hour)?>
    <div class="row">
        <div class="col-lg-12">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Booking Preferences
                        </h3>
                    </div>
                </div>
                <div class="kt-form">
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label"><?= $this->Form->label('user_id') ?></label>
                                <div class="col-lg-9 col-xl-6">
                                    <?= $this->Form->select('user_id', $practitioners, ['class' => 'form-control', 'empty' => true]); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label"><?= $this->Form->label('user_id') ?></label>
                                <div class="col-lg-9 col-xl-6">
                                    <?= $this->Form->select('personal_id', $personals, ['class' => 'form-control', 'empty' => true]); ?>
                                </div>
                            </div>
                            <?php
                                $myTemplates = [
                                    'select' => '<div class="col-md-4"><select name="{{name}}" {{attrs}}>{{content}}</select></div>'
                                ];
                                $this->Form->setTemplates($myTemplates);
                                ?>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label"><?= $this->Form->label('start_date') ?></label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="row">
                                        <?= $this->Form->date('start_date', [
                                                'year' => [
                                                    'class' => 'form-control'
                                                ],
                                                'month' => [
                                                    'class' => 'form-control'
                                                ],
                                                'day' => [
                                                    'class' => 'form-control'
                                                ],
                                                'value' => new DateTime()
                                            ]); 
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label"><?= $this->Form->label('end_date') ?></label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="row">
                                        <?= $this->Form->date('end_date', [
                                                'year' => [
                                                    'class' => 'form-control'
                                                ],
                                                'month' => [
                                                    'class' => 'form-control'
                                                ],
                                                'day' => [
                                                    'class' => 'form-control'
                                                ]
                                            ]); 
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                                $myTemplates = [
                                    'select' => '<div class="col-md-6"><select name="{{name}}" {{attrs}}>{{content}}</select></div>'
                                ];
                                $this->Form->setTemplates($myTemplates);
                                ?>
                            <div id="kt_repeater_1">
                                <div class="form-group form-group-last row" id="kt_repeater_1">
                                    <label class="col-lg-3 col-form-label"></label>
                                    <div class="col-lg-9">
                                        <div class="row">
                                            <div class="col-md-3">Day of Week</div>
                                            <div class="col-md-3">Open Time</div>
                                            <div class="col-md-4">Close Time</div>
                                            <div class="col-md-2"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <br>
                                    </div>
                                    <label class="col-lg-3 col-form-label"><?= $this->Form->label('hours') ?></label>
                                    <div data-repeater-list="repeater" class="col-lg-9">
                                        <?php if (!empty($practice_hour->hours)): ?>
                                            <?php foreach ($practice_hour->hours as $key => $value): ?>
                                                <div data-repeater-item class="form-group row align-items-center">
                                                    <?= $this->Form->control('hours.'.$key.'.id', ['type' => 'hidden']) ?>
                                                    <div class="col-md-2">
                                                        <?= $this->Form->control('hours.'.$key.'.week_hours_one', [
                                                            'options' => [
                                                                'Sunday' => __('Sunday'),
                                                                'Monday' => __('Monday'),
                                                                'Tuesday' => __('Tuesday'),
                                                                'Wednesday' => __('Wednesday'),
                                                                'Thursday' => __('Thursday'),
                                                                'Friday' => __('Friday'),
                                                                'Saturday' => __('Saturday')
                                                            ],
                                                            'empty' => true,
                                                            'class' => 'form-control', 
                                                            'div' => false,
                                                            'label' => false,
                                                            'templates' => [
                                                                'select' => '<select name="{{name}}" {{attrs}}>{{content}}</select>'
                                                            ],
                                                        ]); ?>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="row">
                                                            <?= $this->Form->form('hours.'.$key.'.open_time', [
                                                                    'type' => 'time',
                                                                    'class' => 'form-control'
                                                                ]); 
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="row">
                                                            <?= $this->Form->form('hours.'.$key.'.close_time', [
                                                                    'type' => 'time',
                                                                    'class' => 'form-control'
                                                                ]); 
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a href="javascript:;" data-repeater-delete="" class="btn-sm btn btn-label-danger btn-bold">
                                                            <i class="la la-trash-o"></i>
                                                            Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                        <?php else: ?>
                                            <div data-repeater-item class="form-group row align-items-center">
                                                <div class="col-md-2">
                                                    <?= $this->Form->control('week_hours_one', [
                                                        'options' => [
                                                            'Sunday' => __('Sunday'),
                                                            'Monday' => __('Monday'),
                                                            'Tuesday' => __('Tuesday'),
                                                            'Wednesday' => __('Wednesday'),
                                                            'Thursday' => __('Thursday'),
                                                            'Friday' => __('Friday'),
                                                            'Saturday' => __('Saturday')
                                                        ],
                                                        'empty' => true,
                                                        'class' => 'form-control', 
                                                        'div' => false,
                                                        'label' => false,
                                                        'templates' => [
                                                            'select' => '<select name="{{name}}" {{attrs}}>{{content}}</select>'
                                                        ]
                                                    ]); ?>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="row">
                                                        <?= $this->Form->time('open_time', [
                                                                'hour' => [
                                                                    'class' => 'form-control'
                                                                ],
                                                                'minute' => [
                                                                    'class' => 'form-control'
                                                                ]
                                                            ]); 
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="row">
                                                        <?= $this->Form->time('close_time', [
                                                                'hour' => [
                                                                    'class' => 'form-control'
                                                                ],
                                                                'minute' => [
                                                                    'class' => 'form-control'
                                                                ]
                                                            ]); 
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <a href="javascript:;" data-repeater-delete="" class="btn-sm btn btn-label-danger btn-bold">
                                                        <i class="la la-trash-o"></i>
                                                        Delete
                                                    </a>
                                                </div>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div class="form-group form-group-last row">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-6">
                                        <a href="javascript:;" data-repeater-create="" class="btn btn-bold btn-sm btn-label-brand">
                                            <i class="la la-plus"></i> Add Professional
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="kt-form__actions kt-form__actions--right" style="text-align: right;">
        <button type="submit" class="btn btn-brand">Save</button>
        <button type="reset" class="btn btn-secondary">Cancel</button>
    </div>
    <?= $this->Form->end() ?>

</div>


<script>
    // Class definition
var KTFormRepeater = function() {

    // Private functions
    var demo1 = function() {
        $('#kt_repeater_1').repeater({
            initEmpty: true,
             
            show: function () {
                $(this).slideDown();
            },

            hide: function (deleteElement) {                
                if(confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }                  
            }   
        });
    }

    return {
        // public functions
        init: function() {
            demo1();
        }
    };
}();

jQuery(document).ready(function() {
    KTFormRepeater.init();
});

    
</script>
