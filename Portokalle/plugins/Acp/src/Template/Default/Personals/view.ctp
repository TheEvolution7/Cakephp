<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            <?php echo $personal->title . ' ' . $personal->forename . ' ' . $personal->surname ?>
                        </h3>
                    </div>
                </div>
                <div class="kt-form">
                    <div class="kt-portlet__body kt-portlet__body--fit">
                        <div class="row row-no-padding row-col-separator-xl">
                            <div class="col-md-12 col-lg-12 col-xl-4">
                                <div class="kt-widget1">
                                    <div class="kt-widget1__item">
                                        <div class="kt-widget1__info">
                                            <h3 class="kt-widget1__title"><?= __('Practice Name') ?>:</h3>
                                            <span class="kt-widget1__desc"><b>test</b></span>
                                        </div>
                                    </div>
                                    <div class="kt-widget1__item">
                                        <div class="kt-widget1__info">
                                            <h3 class="kt-widget1__title"><?= __('Tax ID') ?>:</h3>
                                            <span class="kt-widget1__desc"><b>test</b></span>
                                        </div>
                                    </div>
                                    <div class="kt-widget1__item">
                                        <div class="kt-widget1__info">
                                            <h3 class="kt-widget1__title"><?= __('Address') ?>:</h3>
                                            <span class="kt-widget1__desc"><b>test</b></span>
                                        </div>
                                    </div>
                                    <div class="kt-widget1__item">
                                        <div class="kt-widget1__info">
                                            <h3 class="kt-widget1__title"><?= __('Website') ?>:</h3>
                                            <span class="kt-widget1__desc"><b>test</b></span>
                                        </div>
                                    </div>
                                    <div class="kt-widget1__item">
                                        <div class="kt-widget1__info">
                                            <h3 class="kt-widget1__title"><?= __('Phone Numbers') ?>:</h3>
                                            <span class="kt-widget1__desc"><b>test</b></span>
                                        </div>
                                    </div>
                                    <div class="kt-widget1__item">
                                        <div class="kt-widget1__info">
                                            <h3 class="kt-widget1__title"><?= __('Description') ?>:</h3>
                                            <span class="kt-widget1__desc"><b>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</b></span>
                                        </div>
                                    </div>
                                    <div class="kt-widget1__item">
                                        <div class="kt-widget1__info">
                                            <h3 class="kt-widget1__title"><?= __('Logo') ?>:</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12 col-xl-8">
                                <h2 style="text-align:center;">Hours Booking Preferences</h2>
                                <?php foreach ($personal->practice_hours as $practice_hour): ?>
                                    <?php 
                                        $start = !empty($practice_hour->start_date) ? $practice_hour->start_date : 'null';
                                        $end = !empty($practice_hour->end_date) ? $practice_hour->end_date : 'null'
                                    ?>
                                    <h3 style="text-align:center;"><?= __('{0}-{1}', $start, $end) ?></h3>
                                    <p style="text-align:center;"><?= $this->Html->link('Edit', ['controller' => 'PracticeHours', 'action' => 'edit', $practice_hour->id]) ?></p>
                                    <?php 
                                    $tableCells = [];
                                    foreach ($practice_hour->hours as $hour) {
                                        $tableCells[] = [
                                            $hour->week_hours_one,
                                            __('Form {0} until {1}', $hour->open_time, $hour->close_time),
                                        ];
                                    }
                                    ?>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr class="text-center">
                                                <?php echo $this->Html->tableHeaders(['Hour', 'Email']); ?>
                                            </tr>
                                        </thead>
                                        <tbody style="text-align: center;">
                                            <?php echo $this->Html->tableCells($tableCells); ?>
                                        </tbody>
                                    </table>
                                <?php endforeach ?>

                                <div style="text-align:center;"><?= $this->Html->link('Add', ['controller' => 'PracticeHours', 'action' => 'add'], ['class' => 'btn btn-bold btn-sm btn-label-brand']) ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
