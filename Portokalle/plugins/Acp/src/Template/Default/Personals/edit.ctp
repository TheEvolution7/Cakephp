<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <?= $this->Form->create($personal, ['type' => 'file'])?>
    <div class="row">
        <div class="col-lg-12">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            PERSONAL DETAILS
                        </h3>
                    </div>
                </div>
                <div class="kt-form">
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div class="row">
                                <div class="col-lg-8">
                                    <!-- <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Name</label>
                                        <div class="col-lg-2">
                                            <?= $this->Form->text('title', ['class' => 'form-control', 'placeholder' => __('Title')]); ?>
                                        </div>
                                        <div class="col-lg-2">
                                            <?= $this->Form->text('forename', ['class' => 'form-control', 'placeholder' => __('Full Name')]); ?>
                                        </div>
                                        <div class="col-lg-2">
                                            <?= $this->Form->text('surname', ['class' => 'form-control', 'placeholder' => __('Surname')]); ?>
                                        </div>
                                    </div> -->
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label"><?= $this->Form->label('full_name') ?></label>
                                        <div class="col-lg-9 col-xl-6">
                                            <?= $this->Form->text('full_name', ['class' => 'form-control']); ?>
                                        </div>
                                    </div>
                                    <?php
                                        $width = 0;
                                        $height = 0;
                                        $extension = 0;

                                        $imagePath = 'img/no_thumb.png';
                                        if (!empty($personal->image)) {
                                            
                                            $imagePath = 'uploads' . DS . 'personals' . DS . $personal->id . DS . $personal->image;

                                            if (file_exists($imagePath)) {
                                                list($width, $height, $type, $attr) = getimagesize(WWW_ROOT . $imagePath);
                                                $extension = pathinfo(WWW_ROOT . $imagePath, PATHINFO_EXTENSION);
                                            } else {

                                                $personal->image = NULL;
                                            }
                                            if ($width > 500) {
                                                $imagePath = 'uploads' . DS . 'personals' . DS . $personal->id . DS . 'thumbnail' . DS . $personal->image;
                                            }
                                        }
                                    ?>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label"><?= $this->Form->label('image') ?></label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="kt-avatar kt-avatar--outline kt-avatar--circle--">
                                    <div class="kt-avatar__holder h-auto">  <!-- style="background-image: url(img/img.png);" -->
                                        <div class="thumbnail-1" style="">
                                            <img id="review_img_featured" class="span12" src="<?= $this->Url->build(DS . $imagePath) ?>" data-skin="dark" data-toggle="kt-tooltip" title="" data-html="true" data-original-title="<?= "File Information <br>Width: " . $width . "px <br>Height: " . $height . "px <br>Extension: ". $extension ?>">
                                        </div>
                                    </div>
                                </div>
                                            <?= $this->Form->file('image', ['class' => 'form-control', 'accept'    => 'image/*',]); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label"><?= $this->Form->label('gender') ?></label>
                                        <div class="col-lg-9 col-xl-6">
                                            <?= $this->Form->select('gender', ['Male' => 'Male', 'Female' => 'Female', 'Other' => 'Other'], ['class' => 'form-control']); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label"><?= $this->Form->label('email') ?></label>
                                        <div class="col-lg-9 col-xl-6">
                                            <?= $this->Form->text('email', ['class' => 'form-control', 'type' => 'email']); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label"><?= $this->Form->label('phone_number') ?></label>
                                        <div class="col-lg-9 col-xl-6">
                                            <?= $this->Form->text('phone_number', ['class' => 'form-control']); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label"><?= $this->Form->label('description') ?></label>
                                        <div class="col-lg-9 col-xl-6">
                                            <?= $this->Form->textArea('description', ['class' => 'form-control']); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label"><?= $this->Form->label('user_id') ?></label>
                                        <div class="col-lg-9 col-xl-6">
                                            <?= $this->Form->select('user_id', $practitioners, ['class' => 'form-control']); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label"><?= $this->Form->label('services') ?></label>
                                        <div class="col-lg-9 col-xl-6">
                                            <?= $this->Form->select('services._ids', $services, [
                                                'class' => 'form-control kt-select2 select2 d-block', 
                                                'multiple' => true
                                            ]); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label"><?= $this->Form->label('specialities') ?></label>
                                        <div class="col-lg-9 col-xl-6">
                                            <?= $this->Form->select('specialities._ids', $specialities, [
                                                'class' => 'form-control kt-select2 select2 d-block', 
                                                'multiple' => true
                                            ]); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <h3>Request data</h3>
                                    <div class="form-group row">
                                        <?php if (!empty($personal->data_save)): ?>
                                            <?php foreach (unserialize($personal->data_save) as $key => $value): ?>
                                                <label class="col-xl-3 col-lg-3 col-form-label"><?= Cake\Utility\Inflector::humanize($key) ?></label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <span class="form-control-plaintext kt-font-bolder">
                                                        <?php 
                                                        if (!is_array($value)) {
                                                            echo h($value);
                                                        }else{
                                                            foreach ($value as $k => $v) {
                                                                echo $v . ($k < count($value) - 1 ? ',' : null);
                                                            }
                                                        }
                                                        ?>
                                                    </span>
                                                </div>
                                            <?php endforeach ?>
                                        <?php else: ?>
                                            <div class="col-lg-12 col-xl-12">
                                                <span class="form-control-plaintext kt-font-bolder">
                                                    Not Found
                                                </span>
                                            </div>
                                        <?php endif ?>
                                        
                                    </div>
                                </div>
                                <!-- <div class="col-lg-12">
                                    <div class="kt-portlet__head-label">
                                        <h3 class="kt-portlet__head-title">
                                            Edit Availability
                                        </h3>
                                    </div>
                                    <hr>
                                    <h4>Regular hours every week</h4><br>
                                    <?php $arr = ['sunday', 'monday', 'tuesday', 'webnesday', 'thursday', 'friday', 'saturday'] ?>
                                    <?php foreach ($arr as $value): ?>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label"><?= $this->Form->label($value) ?></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <?= $this->Form->text('availability.' . $value, ['class' => 'form-control', 'placeholder' => 'Closed — Enter availability like: 9:00am-12:30pm, 1:30pm-6pm']); ?>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                                <div class="col-lg-12">
                                    <h4>Override Hours for Specific Days</h4><br>
                                    <div id="kt_calendar"></div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
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
                    right: ''
                },

                height: 800,
                contentHeight: 780,
                aspectRatio: 3,

                defaultView: 'dayGridMonth',
                defaultDate: TODAY,

                editable: true,
                businessHours: true,

                events: [
                    {
                        title: 'All Day Event',
                        start: YM + '-01',
                        description: 'Toto lorem ipsum dolor sit incid idunt ut',
                        className: "fc-event-danger fc-event-solid-warning",
                        color: KTApp.getStateColor('info'),
                        rendering: 'background',
                    },
                    {
                        title: 'Reporting',
                        start: YM + '-14T13:30:00',
                        description: 'Lorem ipsum dolor incid idunt ut labore',
                        end: YM + '-14',
                        className: "fc-event-success"
                    },
                    {
                        title: 'Company Trip',
                        start: YM + '-02',
                        description: 'Lorem ipsum dolor sit tempor incid',
                        end: YM + '-03',
                        className: "fc-event-primary"
                    },
                    {
                        title: 'ICT Expo 2017 - Product Release',
                        start: YM + '-03',
                        description: 'Lorem ipsum dolor sit tempor inci',
                        end: YM + '-05',
                        className: "fc-event-light fc-event-solid-primary"
                    },
                    {
                        title: 'Dinner',
                        start: YM + '-12',
                        description: 'sssss',
                        end: YM + '-10',
                        color: KTApp.getStateColor('info'),
                        rendering: 'background' 
                    },
                    {
                        id: 999,
                        title: 'Repeating Event',
                        start: YM + '-09T16:00:00',
                        description: 'Lorem ipsum dolor sit ncididunt ut labore',
                        className: "fc-event-danger"
                    },
                    {
                        id: 1000,
                        title: 'Repeating Event',
                        description: 'Lorem ipsum dolor sit amet, labore',
                        start: YM + '-16T16:00:00',
                        color: KTApp.getStateColor('warning'),
                        rendering: 'background' 
                    },
                    {
                        title: 'Conference',
                        start: YESTERDAY,
                        end: TOMORROW,
                        description: 'Lorem ipsum dolor eius mod tempor labore',
                        className: "fc-event-brand"
                    },
                    {
                        title: 'Meeting',
                        start: TODAY + 'T10:30:00',
                        end: TODAY + 'T12:30:00',
                        description: 'Lorem ipsum dolor eiu idunt ut labore',
                        color: KTApp.getStateColor('danger'),
                        rendering: 'background' 
                    },
                    {
                        title: 'Lunch',
                        start: TODAY + 'T12:00:00',
                        end: TODAY + 'T20:30:00',
                        className: "fc-event-info",
                        description: 'Lorem ipsum dolor sit amet, ut labore'
                    },
                    {
                        title: 'Meeting',
                        start: TODAY + 'T14:30:00',
                        className: "fc-event-warning",
                        description: 'Lorem ipsum conse ctetur adipi scing'
                    },
                    {
                        title: 'Happy Hour',
                        start: TODAY + 'T17:30:00',
                        className: "fc-event-info",
                        description: 'Lorem ipsum dolor sit amet, conse ctetur',
                        color: KTApp.getStateColor('danger'),
                        rendering: 'background' 
                    },
                    {
                        title: 'Dinner',
                        start: TOMORROW + 'T05:00:00',
                        className: "fc-event-solid-danger fc-event-light",
                        description: 'aas'
                    },
                    {
                        title: 'Birthday Party',
                        start: TOMORROW + 'T07:00:00',
                        className: "fc-event-primary",
                        description: 'Lorem ipsum dolor sit amet, scing',
                        color: KTApp.getStateColor('danger'),
                        rendering: 'background' 
                    },
                    {
                        title: 'Click for Google',
                        url: 'http://google.com/',
                        start: YM + '-28',
                        className: "fc-event-solid-info fc-event-light",
                        description: 'Lorem ipsum dolor sit amet, labore',
                        color: KTApp.getStateColor('success'),
                        rendering: 'background' 
                    }
                ],

                eventClick: function(info) {
                    alert('Event: ' + info.event.title);
                    alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
                    alert('View: ' + info.view.type);

                    // change the border color just for fun
                    info.el.style.borderColor = 'red';
                },
                eventRender: function(info) {
                    var element = $(info.el);

                    if (info.event.extendedProps && info.event.extendedProps.description) {
                        if (element.hasClass('fc-day-grid-event')) {
                            element.data('content', info.event.extendedProps.description);
                            element.data('placement', 'top');
                            KTApp.initPopover(element);
                        } else if (element.hasClass('fc-time-grid-event')) {
                            element.find('.fc-title').append('<div class="fc-description">' + info.event.extendedProps.description + '</div>'); 
                        } else if (element.find('.fc-list-item-title').lenght !== 0) {
                            element.find('.fc-list-item-title').append('<div class="fc-description">' + info.event.extendedProps.description + '</div>'); 
                        }
                    } 
                }
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
        <!-- <div class="col-lg-6">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            QUALIFICATIONS & CREDENTIALS
                        </h3>
                    </div>
                </div>
                <div class="kt-form">
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div id="kt_repeater_1">
                                <div class="form-group form-group-last row" id="kt_repeater_1">
                                    <label class="col-lg-3 col-form-label"><?= $this->Form->label('professional_registration_number') ?></label>
                                    <div data-repeater-list="repeater" class="col-lg-9">
                                        <?php if (!empty($personal->professional_registration_number)): ?>
                                            <?php foreach ($personal->professional_registration_number as $key => $value): ?>
                                                <div data-repeater-item class="form-group row align-items-center">
                                                    <div class="col-md-8">
                                                        <?= $this->Form->text('professional_registration_number', ['value' => $value, 'class' => 'form-control']); ?>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <a href="javascript:;" data-repeater-delete="" class="btn-sm btn btn-label-danger btn-bold">
                                                            <i class="la la-trash-o"></i>
                                                            Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                        <div data-repeater-item class="form-group row align-items-center">
                                            <div class="col-md-8">
                                                <?= $this->Form->text('professional_registration_number', ['value' => false, 'class' => 'form-control']); ?>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="javascript:;" data-repeater-delete="" class="btn-sm btn btn-label-danger btn-bold">
                                                    <i class="la la-trash-o"></i>
                                                    Delete
                                                </a>
                                            </div>
                                        </div>
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
                            <br>
                            <div id="kt_repeater_2">
                                <div class="form-group form-group-last row" id="kt_repeater_2">
                                    <label class="col-lg-3 col-form-label"><?= $this->Form->label('qualifications') ?></label>
                                    <div data-repeater-list="repeater" class="col-lg-9">
                                        <?php if (!empty($personal->qualifications)): ?>
                                            <?php foreach ($personal->qualifications as $key => $value): ?>
                                                <div data-repeater-item class="form-group row align-items-center">
                                                    <div class="col-md-8">
                                                        <?= $this->Form->text('qualifications', ['value' => $value, 'class' => 'form-control']); ?>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <a href="javascript:;" data-repeater-delete="" class="btn-sm btn btn-label-danger btn-bold">
                                                            <i class="la la-trash-o"></i>
                                                            Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                        <div data-repeater-item class="form-group row align-items-center">
                                            <div class="col-md-8">
                                                <?= $this->Form->text('qualifications', ['value' => '','class' => 'form-control']); ?>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="javascript:;" data-repeater-delete="" class="btn-sm btn btn-label-danger btn-bold">
                                                    <i class="la la-trash-o"></i>
                                                    Delete
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-group-last row">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-6">
                                        <a href="javascript:;" data-repeater-create="" class="btn btn-bold btn-sm btn-label-brand">
                                            <i class="la la-plus"></i> Add Qualifications
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label"><?= $this->Form->label('professional_description') ?></label>
                                <div class="col-lg-9 col-xl-6">
                                    <?= $this->Form->textArea('professional_description', ['class' => 'form-control']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            EXPERTISE & LANGUAGES
                        </h3>
                    </div>
                </div>
                <div class="kt-form">
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label"><?= $this->Form->label('expertise') ?></label>
                                <div class="col-lg-9 col-xl-6">
                                    <?= $this->Form->text('expertise', ['class' => 'form-control']); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label"><?= $this->Form->label('languages') ?></label>
                                <div class="col-lg-9 col-xl-6">
                                    <?= $this->Form->text('languages', ['class' => 'form-control']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            OTHER CLINICAL CREDENTIALS & PREFERENCES
                        </h3>
                    </div>
                </div>
                <div class="kt-form">
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div id="kt_repeater_3">
                                <div class="form-group form-group-last row" id="kt_repeater_3">
                                    <label class="col-lg-3 col-form-label"><?= $this->Form->label('accreditations') ?></label>
                                    <div data-repeater-list="repeater" class="col-lg-9">
                                        <?php if (!empty($personal->accreditations)): ?>
                                            <?php foreach ($personal->accreditations as $key => $value): ?>
                                                <div data-repeater-item class="form-group row align-items-center">
                                                    <div class="col-md-8">
                                                        <?= $this->Form->text('accreditations', ['value' => $value, 'class' => 'form-control']); ?>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <a href="javascript:;" data-repeater-delete="" class="btn-sm btn btn-label-danger btn-bold">
                                                            <i class="la la-trash-o"></i>
                                                            Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                        <div data-repeater-item class="form-group row align-items-center">
                                            <div class="col-md-8">
                                                <?= $this->Form->text('accreditations', ['value' => '','class' => 'form-control']); ?>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="javascript:;" data-repeater-delete="" class="btn-sm btn btn-label-danger btn-bold">
                                                    <i class="la la-trash-o"></i>
                                                    Delete
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-group-last row">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-6">
                                        <a href="javascript:;" data-repeater-create="" class="btn btn-bold btn-sm btn-label-brand">
                                            <i class="la la-plus"></i> Add Accreditations
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label"><?= $this->Form->label('patient_focus') ?></label>
                                <div class="col-lg-9 col-xl-6">
                                    <?= $this->Form->text('patient_focus', ['class' => 'form-control']); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label"><?= $this->Form->label('other_services') ?></label>
                                <div class="col-lg-9 col-xl-6">
                                    <?= $this->Form->text('other_services', ['class' => 'form-control']); ?>
                                </div>
                            </div>
                            <div id="kt_repeater_4">
                                <div class="form-group form-group-last row" id="kt_repeater_4">
                                    <label class="col-lg-3 col-form-label"><?= $this->Form->label('certifications') ?></label>
                                    <div data-repeater-list="repeater" class="col-lg-9">
                                        <?php if (!empty($personal->certifications)): ?>
                                            <?php foreach ($personal->certifications as $key => $value): ?>
                                                <div data-repeater-item class="form-group row align-items-center">
                                                    <div class="col-md-8">
                                                        <?= $this->Form->text('certifications', ['value' => $value, 'class' => 'form-control']); ?>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <a href="javascript:;" data-repeater-delete="" class="btn-sm btn btn-label-danger btn-bold">
                                                            <i class="la la-trash-o"></i>
                                                            Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                        <div data-repeater-item class="form-group row align-items-center">
                                            <div class="col-md-8">
                                                <?= $this->Form->text('certifications', ['value' => '', 'class' => 'form-control']); ?>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="javascript:;" data-repeater-delete="" class="btn-sm btn btn-label-danger btn-bold">
                                                    <i class="la la-trash-o"></i>
                                                    Delete
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-group-last row">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-6">
                                        <a href="javascript:;" data-repeater-create="" class="btn btn-bold btn-sm btn-label-brand">
                                            <i class="la la-plus"></i> Add Certifications
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
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
            initEmpty: false,
             
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

    var demo2 = function() {
        $('#kt_repeater_2').repeater({
            initEmpty: false,
             
            show: function() {
                $(this).slideDown();                               
            },

            hide: function(deleteElement) {                 
                if(confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }                                
            }      
        });
    }


    var demo3 = function() {
        $('#kt_repeater_3').repeater({
            initEmpty: false,
             
            show: function() {
                $(this).slideDown();                               
            },

            hide: function(deleteElement) {                 
                if(confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }                                  
            }      
        });
    }

    var demo4 = function() {
        $('#kt_repeater_4').repeater({
            initEmpty: false,
             
            show: function() {
                $(this).slideDown();                               
            },

            hide: function(deleteElement) {              
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
            demo2();
            demo3();
            demo4();
        }
    };
}();

jQuery(document).ready(function() {
    KTFormRepeater.init();
});

    
</script>
