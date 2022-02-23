<?php
    use Cake\I18n\FrozenTime;

    $dayOfWeek = [
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday'
    ]; 
    if (!empty($personal->regular_hours)) {
        $regular_hours = unserialize($personal->regular_hours);
    }

    if (!empty($personal->override_hours)) {
        $override_hours = unserialize($personal->override_hours);
        $formatData = [];
        foreach ($override_hours as $key => $value) {
            $formatData[$key]['title'] = $value['title'];
            $formatData[$key]['start'] = new FrozenTime($value['start']);
            $formatData[$key]['end'] = new FrozenTime($value['end']);
        }
        $event = $formatData;
    }
?>
<link rel="stylesheet" href="<?= $webroot ?>vendor/fullcalendar-5/main.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice__display,
    .select2-results__option {
        font-size: 13px;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        line-height: 28px
    }
    .select2-container--default .select2-selection--multiple {
        border-color: #e2e2ea;
    }
    .account-container .form-item input {
        min-height: 43px
    }
    .select2-container .select2-search--inline .select2-search__field {
        heigth: 24px;
        margin-top: 0
    }
</style>
<div class="page2__container">
    <div class="schedule-container">
        <div class="account-container">
            <div class="account-row">       
                <div class="account-body">
                    <?php echo $this->Form->create($personal, ['type' => 'file']) ?>
                    <?php $this->Form->setTemplates([
                        'inputContainer' => '{{content}}',
                    ]) ?>
                    <h2>Personal Information</h2>
                    
                    <div class="form-group2">
                        <div class="form-item">
                            <?= $this->Form->control('full_name', ['required' => true]) ?>
                        </div>
                        <div class="form-item">
                            <?= $this->Form->control('email', ['type' => 'email', 'required' => true]) ?>
                        </div>
                        <div class="form-item">
                            <?= $this->Form->control('gender', ['required' => true, 'options' => ['Male' => 'Male', 'Female' => 'Female', 'Other' => 'Other']]) ?>
                        </div>
                    </div>
                    <div class="form-group2">
                        <div class="form-item">
                            <?= $this->Form->control('phone_number', ['required' => true]) ?>
                        </div>
                        <div class="form-item">
                            <?= $this->Form->control('image', ['type' => 'file', 'required' => false, 'accept' => 'image/png, image/jpeg']) ?>
                            <?php if ($personal->image): ?>
                                <p>
                                    <a href="<?= $this->Url->build('/uploads/personals/' . $personal->id . DS . $personal->image) ?>" target="_blank">View Image</a>
                                </p>
                                
                            <?php endif ?>
                            
                        </div>
                        <div class="form-item">
                            <?= $this->Form->control('description', ['required' => true]) ?>
                        </div>
                    </div>
                    <div class="form-group2">
                        <div class="form-item select-muti-2">
                            <?= $this->Form->control('specialities._ids', [
                                'options' => $specialities,
                                'class' => 'select-2-js',
                                'multiple' => true,
                                'empty' => __('Select Specialities')
                            ]); ?>
                            <script>
                                $("#specialities-ids").select2({
                                    placeholder: "Select Specialities",
                                    allowClear: true
                                });
                            </script>
                        </div>
                        
                        
                        <div class="form-item select-muti-2">
                            <?= $this->Form->control('services._ids', [
                                'options' => $services,
                                'class' => 'select-2-js',
                                'multiple' => true,
                                'empty' => __('Select Services')
                            ]); ?>
                            <script>
                                $("#services-ids").select2({
                                    placeholder: "Select Services",
                                    allowClear: true
                                });
                            </script>
                        </div>
                    </div>

                    <h2>Regular hours every week</h2>   
                    <div class="form-group2" style="width:29%">
                        <?php foreach ($dayOfWeek as $day): ?>
                        <div class="form-item">
                            <?= $this->Form->control('regular.' . $day, ['value' => isset($regular_hours[$day]) ? $regular_hours[$day] : null, 'type' => 'textarea', 'placeholder' => 'Closed — Enter availability like: 9:00-12:30,13:30-18:00']) ?>
                        </div>
                        <?php endforeach ?>
                    </div>
                    <div class="form-control">
                        <button type="submit" class="button button_primary"><?= __('Save Regular Hours') ?></button>
                    </div>
                    <?php echo $this->Form->end() ?>

                    <h2>Override Hours for Specific Days</h2>
                    <div class="calendar" id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.select-2-js').select2();
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var calendarEl = document.getElementById("calendar");
        var calendar = new FullCalendar.Calendar(calendarEl, {
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
            <?= !empty($event) ? 'events:' . json_encode($event) . ', ' : null ?>
            selectable: true,
            dateClick: function(info) {
                let title = prompt('Closed — Enter availability like: 9:00-12:30,13:30-18:00');
                if(title !== null){
                    const tArray = title.split(",");
                    for(i=0; i < tArray.length; i++){
                        tArr = tArray[i].split("-");
                        start = moment(info.dateStr + ' ' + tArr[0]).format("YYYY-MM-DD hh:mm:ss");
                        end = moment(info.dateStr + ' ' + tArr[1]).format("YYYY-MM-DD hh:mm:ss");
                        calendar.addEvent({
                          title: tArray[i],
                          start: start,
                          end: end,
                          allDay: true
                        });
                    }
                    $.ajax({
                       url:"<?= $this->Url->build(['action'=> 'saveOverrideHours', $personal->id]) ?>",
                       method:"POST",
                       data:{'title': title, 'date': info.dateStr},
                       success:function(data)
                        {
                            
                        }
                    });
                }
            }
        });

        calendar.render();
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?= $webroot ?>vendor/fullcalendar-5/main.min.js"></script>