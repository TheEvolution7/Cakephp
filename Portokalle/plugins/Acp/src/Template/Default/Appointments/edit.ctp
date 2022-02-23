<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">
        <div class="kt-grid__item kt-grid__item--fluid kt-app__content">
            <div class="kt-portlet kt-portlet--tabs">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-toolbar">
                        <ul class="nav nav-tabs nav-tabs-space-xl nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#kt_apps_user_edit_tab_1" role="tab">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon id="Bound" points="0 0 24 0 24 24 0 24" />
                                            <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" id="Shape" fill="#000000" fill-rule="nonzero" />
                                            <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" id="Path" fill="#000000" opacity="0.3" />
                                        </g>
                                    </svg> Edit appointment
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="row">
                        <div class="col-lg-12">
                        <?= $this->Form->create($appointment, [
                            'type' => 'file'
                        ])
                        ?>
                        <div class="tab-content">
                            <div class="tab-pane active" id="kt_apps_user_edit_tab_1" role="tabpanel">
                                <div class="kt-form kt-form--label-right">
                                    <div class="kt-form__body">
                                        <div class="kt-section kt-section--first">
                                            <div class="kt-section__body">
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label"><?= $this->Form->label('practitioner_id') ?></label>
                                                    <?php
                                                    $myTemplates = [
                                                        'select' => '<select name="{{name}}" {{attrs}}>{{content}}</select>'
                                                    ];
                                                    $this->Form->setTemplates($myTemplates);
                                                    ?>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <?= $this->Form->select('practitioner_id', $practitioners, ['empty' => 'Select Practitioner', 'class' => 'form-control']); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label"><?= $this->Form->label('patient_id') ?></label>
                                                    <?php
                                                    $myTemplates = [
                                                        'select' => '<select name="{{name}}" {{attrs}}>{{content}}</select>'
                                                    ];
                                                    $this->Form->setTemplates($myTemplates);
                                                    ?>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <?= $this->Form->select('patient_id', $patients, ['empty' => 'Select Patient', 'class' => 'form-control']); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label"><?= $this->Form->label('status') ?></label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <?= $this->Form->select('status', ['Confirmed', 'Booked', 'Waiting list'], ['empty' => 'Select status', 'class' => 'form-control']); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label"><?= $this->Form->label('location') ?></label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <?= $this->Form->select('location', ['Online Consultation' => 'Online Consultation', 'Phone Consultation' => 'Phone Consultation'], ['empty' => 'Select location', 'class' => 'form-control']); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label"><?= $this->Form->label('duration') ?></label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <div class="input-group">
                                                            <?= $this->Form->number('duration', ['class' => 'form-control']); ?>
                                                            <div class="input-group-append"><span class="input-group-text" id="basic-addon2">minutes</span></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label"><?= $this->Form->label('date') ?></label>
                                                    <?php
                                                    $myTemplates = [
                                                        'select' => '<div class="col-md-4"><select name="{{name}}" {{attrs}}>{{content}}</select></div>'
                                                    ];
                                                    $this->Form->setTemplates($myTemplates);
                                                    ?>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <div class="row">
                                                            <?= $this->Form->date('date', [
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
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label"><?= $this->Form->label('start_time') ?></label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <div class="row">
                                                            <?= $this->Form->time('start_time', [
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
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label"><?= $this->Form->label('comments') ?></label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <?= $this->Form->textarea('comments', ['class' => 'form-control']); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="kt-separator kt-separator--space-lg kt-separator--fit kt-separator--border-solid"></div>
                        <div class="kt-form__actions">
                            <div class="row">
                                <div class="col-xl-3"></div>
                                <div class="col-lg-9 col-xl-6">
                                    <button type="submit" class="btn btn-label-brand btn-bold">Save changes</button>
                                    <a href="#" class="btn btn-clean btn-bold">Cancel</a>
                                </div>
                            </div>
                        </div>
                        <?= $this->Form->end() ?>
                        </div>
                        <div class="col-lg-12">
                            <div id="kt_calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Begin:: App Content-->
        

        <!--End:: App Content-->
    </div>
    
</div>

<?php $this->start('calendar'); ?>
<script src="<?= $webrootAcp ?>/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>

<script>
    "use strict";

var KTCalendarBasic = function() {

    return {
        //main function to initiate the module
        init: function() {
            var todayDate = moment().startOf('day');
            var YM = todayDate.format('YYYY-MM');
            var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
            var TODAY = todayDate.format('YYYY-MM-DD');
            var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');

            var calendarEl = document.getElementById('kt_calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],

                isRTL: KTUtil.isRTL(),
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },

                nowIndicator: true,

                views: {
                    dayGridMonth: { buttonText: 'month' },
                    timeGridWeek: { buttonText: 'week' },
                    timeGridDay: { buttonText: 'day' }
                },

                defaultView: 'timeGridDay',
                initialDate: new Date(),
                events: <?= json_encode($dateCalendar) ?>
            });

            calendar.render();
        }
    };
}();

jQuery(document).ready(function() {
    KTCalendarBasic.init();
});
</script>
<?php $this->end(); ?>