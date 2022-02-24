<?php 
use Cake\Collection\Collection;

if (isset($take->take_answers) && $listAnswers = $take->take_answers) {
    $combined = (new Collection($listAnswers))->combine('question_id', 'answer_id')->toArray();
};

?>
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <?php foreach ($take->quiz->quiz_questions as $question): ?>
    <div class="kt-portlet">
        <div class="kt-portlet__body kt-portlet__body--fit">
            <div class="row row-no-padding row-col-separator-xl">
                <div class="col-md-12 col-lg-12 col-xl-12">
                    <div class="kt-widget1">
                        <div class="kt-widget1__item">
                            <div class="kt-widget1__info">
                                <h3 class="kt-widget1__title"><?= $question->content ?></h3>
                            </div>
                        </div>
                        <?php foreach ($question->quiz_answers as $answer): ?>
                            <?php
                            $res = null;
                            $text = null;
                            if (isset($combined)) {
                                
                                if ($combined[$question->id] == $answer->id && $answer->correct) {
                                    $res = 'success';
                                    $text = 'True';
                                }

                                if ($combined[$question->id] == $answer->id && !$answer->correct) {
                                    $res = 'danger';
                                    $text = 'False';
                                }

                                if ($answer->correct) {
                                    $res = 'success';
                                    $text = 'True';
                                }
                            }
                            ?>
                            <div class="kt-widget1__item">
                                <div class="kt-widget1__info">
                                    <h3 class="kt-widget1__title"><?= $answer->content ?></h3>
                                </div>
                                <span class="kt-widget1__number kt-font-<?= $res ?>"><?= $text ?></span>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach ?>
</div>
