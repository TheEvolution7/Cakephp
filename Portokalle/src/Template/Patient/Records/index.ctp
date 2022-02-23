<div class="page2__container">
    <div class="page2__row">
        <div class="page2__col page2__col_w65">
            <div class="sorting js-sorting">
                <h1 class="sorting__title title"><?= __('Medical Records') ?></h1>
            </div>
            <?php foreach ($patients as $key => $patient): ?>
                <div class="patient-tab-content <?= $key == 0 ? 'active' : null ?>" id="patient-tab-<?= $key ?>-content">
                    <div class="card1">
                        <div class="card1__body">
                            <?= $this->cell('Record::add', [$patient->id]) ?>
                        </div>
                    </div>
                    <div class="section">
                        <div class="__head">
                            <div class="__title">
                                <?= __('Medical Conditions') ?>
                                
                            </div>
                        </div>
                        <?php foreach ($patient->records as $record): ?>
                            <?= $this->cell('Record::edit', [$record]) ?>
                        <?php endforeach ?>
                    </div>
                </div>
            <?php endforeach ?>
        </div>

        <div class="page2__col page2__col_w35">
            <div class="section">
                <div class="__head">
                    <div class="__title"></div>
                </div>

                <div class="__body">
                    <div class="patient_sidecard">
                        <?php foreach ($patients as $key => $patient): ?>
                            <div class="__container <?= $key == 0 ? 'active' : null ?>" id="patient-tab-<?= $key ?>">
                                <div class="image">
                                    <?php $image = $this->Html->image('/uploads/patients/' . $patient->id . DS . $patient->image) ?>
                                    <?php if (!file_exists($image)): ?>
                                        <div class="no-img">
                                            <?php 
                                                $str = explode(' ', $patient->full_name);
                                                $arr = '';
                                                foreach ($str as $s) {
                                                    $arr .= substr($s, 0, 1);
                                                }
                                                echo $arr;
                                            ?>
                                        </div>
                                    <?php else: ?>
                                        <?php echo $image ?>
                                    <?php endif ?>
                                </div>
                                <div class="patient_name">
                                    <?= $patient->full_name ?>
                                </div>
                            </div>
                        <?php endforeach ?>
                        <div class="__footer">
                            <div class="__control">
                                <?= $this->Html->link(__('Add patient'), ['controller' => 'Patients', 'action' => 'add'], ['class' => 'button button_outlined button_small']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
