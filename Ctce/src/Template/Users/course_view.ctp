<?php 
use Cake\Collection\Collection;
use Cake\I18n\Number;

if (isset($course->quiz->take->take_answers) && $listAnswers = $course->quiz->take->take_answers) {
    $combined = (new Collection($listAnswers))->combine('question_id', 'answer_id')->toArray();
};
?>
<div class="page-title-section section">
    <div class="page-title">
        <div class="container">
            <h1 class="title"><?= isset($course->quiz) ? $course->quiz->content : $course->title ?></h1>
            <h2 class="title"><?= isset($lesson) ? $lesson->title : null ?></h2>
        </div>
    </div>
    <div class="page-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="<?= $this->Url->build('/') ?>">Home</a></li>
                <li><a href="<?= $this->Url->build(['action' => 'trainingView', $course->product_id]) ?>">Training</a></li>
                <li class="current"><?= $course->title ?></li>
            </ul>
        </div>
    </div>
</div>
<!-- Page Title Section End -->
<?php switch ($course->type) {
    case 'quiz': ?>
        <?= !isset($combined) ? $this->Form->create() : null ?>
        <div class="section section-padding-bottom-80">
            <div class="container">
                <div class="row max-mb-n50">

                    <div class="col-lg-8 col-12 order-lg-1 max-mb-50">
                        <!-- Course Details Wrapper Start -->
                        <div class="learn-wrapper">
                            <div class="chapter-course">
                                <ul class="chapter-sections quest-list <?= isset($combined) ? 'review-page' : null ?>">
                                    <?php if (isset($combined)): ?>
                                        <li class="single-chapter-section">
                                            <div class="section-header">
                                                <div class="section-left">

                                                    <h5 class="title">Review Quiz</h5>
                                                    <p class="section-desc">Infomation</p>

                                                </div>
                                            </div>
                                            <ul class="section-content box-info-list">

                                                <li class="course-item">
                                                    <div class="section-item-link no-icon">
                                                        <span class="item-name"><span>Started on</span><?= $course->quiz->take->created->nice() ?></span>
                                                    </div>
                                                </li>
                                                <li class="course-item">
                                                    <div class="section-item-link no-icon">
                                                        <span class="item-name"><span>State</span><?= $course->quiz->take->status ?></span>
                                                    </div>
                                                </li>
                                                <li class="course-item">
                                                    <div class="section-item-link no-icon">
                                                        <span class="item-name"><span>Completed on</span><?= $course->quiz->take->modified->nice() ?></span>
                                                    </div>
                                                </li>
                                                <li class="course-item">
                                                    <div class="section-item-link no-icon">
                                                        <?php
                                                        $date1 = $course->quiz->take->created;
                                                        $date2 = $course->quiz->take->modified;
                                                        $diff = abs(strtotime($date2) - strtotime($date1));
                                                        $years = floor($diff / (365*60*60*24));
                                                        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                                                        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24) / (60*60*24));
                                                        $hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60));
                                                        $minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60) / 60);
                                                        $seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60));

                                                        $time = $years ? $years . " years" : null;
                                                        $time .= $months ? $months . " months" : null;
                                                        $time .= $days ? $days . " days" : null;
                                                        $time .= $hours ? $hours . " hours" : null;
                                                        $time .= $minutes ? $minutes . " minutes" : null;
                                                        $time .= $seconds ? $seconds . " seconds" : null;
                                                        ?>
                                                        <span class="item-name"><span>Time taken</span> <?= $time ?></span>
                                                    </div>
                                                </li>
                                                <li class="course-item">
                                                    <div class="section-item-link no-icon">
                                                        <span class="item-name"><span>Marks</span><?= $this->Number->precision(count($countTrueAnswers), 2) . '/' . $this->Number->precision(count($course->quiz->quiz_questions), 2); ?></span>
                                                    </div>
                                                </li>
                                                <li class="course-item">
                                                    <div class="section-item-link no-icon">
                                                        <span class="item-name"><span>Grade</span><?= $this->Number->precision(count($countTrueAnswers) * 10, 2) . ' out of ' . $this->Number->precision(count($course->quiz->quiz_questions) * 10, 2); ?></span>
                                                    </div>
                                                </li>
                                                <li class="course-item">
                                                    <div class="section-item-link no-icon">
                                                        <span class="item-name">
                                                            <span>Feedback</span> 
                                                            <div class="content">
                                                                <p>
                                                                    <b><?= $course->quiz->take->content ?></b>
                                                                    
                                                                </p> 
                                                            </div>
                                                            
                                                        </span>
                                                    </div>
                                                </li>

                                            </ul>
                                        </li>
                                    <?php endif ?>
                                    
                                    <?php foreach ($course->quiz->quiz_questions as $key => $question): ?>
                                        <li class="single-chapter-section" id="quest-<?= $question->id ?>">
                                            <div class="section-header">
                                                <div class="section-left">
                                                    <p class="section-desc">Question <?= $key + 1 ?></p>
                                                    <h5 class="sub-title"><?= $question->content ?></h4>

                                                </div>
                                            </div>
                                            <ul class="section-content">
                                                <li class="course-item">
                                                    <div class="section-item-link __radio">
                                                        Select one
                                                    </div>
                                                </li>
                                                <?php $answerCorrect = null; ?>
                                                <?php foreach ($question->quiz_answers as $key => $answer): ?>
                                                    <?php
                                                    $res = null;
                                                    if (isset($combined)) {
                                                        
                                                        if ($combined[$question->id] == $answer->id && $answer->correct) {
                                                            $res = 'right-col';
                                                        }

                                                        if ($combined[$question->id] == $answer->id && !$answer->correct) {
                                                            $res = 'wrong-col';
                                                        }

                                                        if ($answer->correct) {
                                                            $res = 'right-col';
                                                        }
                                                    }

                                                    $alphas = range('A', 'Z');
                                                    ?>
                                                    <li class="course-item">
                                                        <div class="section-item-link __radio <?= $res ?>">
                                                            <input type="radio" name="<?= $question->id ?>" value="<?= $answer->id ?>" required <?= isset($combined) && $combined[$question->id] == $answer->id ? 'checked' : null ?> <?= isset($combined)?'disabled':null ?>>
                                                            <label><?= $alphas[$key] . '. ' . $answer->content ?> <?= isset($combined) && $combined[$question->id] == $answer->id && !empty($answer->feedback) ? '<span>' . $answer->feedback . '</span>' : null ?></label>
                                                        </div>
                                                    </li>
                                                <?php endforeach ?>
                                                
                                            </ul>
                                        </li>
                                    <?php endforeach ?>
                                    
                                    <li class="">
                                        <div class="input-group justify-content-center max-mb-30  max-mt-30">
                                            <?php if (!isset($combined)): ?>
                                                <button class="btn btn-primary btn-hover-secondary btn-width-180 text-center" type="submit">Submit</button>
                                            <?php else: ?>
                                                <?php if (empty($course->users)): ?>
                                                    <?= $this->Form->postButton('Next', [$course->id], ['data' => ['next' => true], 'class' => 'btn btn-primary btn-hover-secondary btn-width-180 text-center']) ?>
                                                <?php endif ?>
                                            <?php endif ?>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                        <!-- Course Details Wrapper End -->
                    </div>

                    <div class="col-lg-4 col-12 order-lg-2 max-mb-50" id="sticky-sidebar">
                        <div class="sidebar-widget-wrapper pr-0">
                            <div class="sidebar-widget">
                                <div class="sidebar-widget-content">
                                    <div class="sidebar-entry-course-info p-0">
                                        <div class="learn-wrapper">
                                            <div class="chapter-course __2">
                                                <ul class="chapter-sections">
                                                    <li class="single-chapter-section">
                                                        <div class="section-header">
                                                            <div class="section-left">
                
                                                                <h5 class="title">Quiz navigation</h5>
                                                                
                                                            </div>
                                                        </div>
                                                        <ul class="section-question">
                                                            <?php $res = 'active'; ?>
                                                            <?php foreach ($course->quiz->quiz_questions as $k => $question): ?>
                                                                <?php foreach ($question->quiz_answers as $key => $answer): ?>
                                                                    <?php
                                                                        if (isset($combined)) {
                                                                            
                                                                            if ($combined[$question->id] == $answer->id && $answer->correct) {
                                                                                $res = 'right-answer';
                                                                            }

                                                                            if ($combined[$question->id] == $answer->id && !$answer->correct) {
                                                                                $res = 'wrong-answer';
                                                                            }

                                                                            // if ($answer->correct) {
                                                                            //     $res = 'right-answer';
                                                                            // }
                                                                        } 
                                                                    ?>
                                                                <?php endforeach ?>
                                                                
                                                                <li class="<?= $res ?>"><a href="#quest-<?= $question->id ?>" data-name="quest-<?= $question->id ?>"><?= $k + 1 ?></a></li>
                                                            <?php endforeach ?>
                                                            
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        
        <?= !isset($combined) ? $this->Form->end() : null ?>    
    <?php break;
    
    default: ?>
        <div class="section section-padding-bottom-80">
            <div class="container">
                <div class="row max-mb-n50">

                    <div class="col-lg-8 col-12 order-lg-1 max-mb-50">
                        <?php if ($lesson->video): ?>
                            <div class="box-video">
                                <div class="thumb-video" id="lesson-youtube"></div>
                            </div>
                            <button class="btn btn-primary btn-hover-secondary btn-width-100" data-bs-toggle="modal" data-bs-target="#modal-transcript">Transcript</button>
                        <?php else: ?>
                            <div class="chapter-course __2 collapse-section">
                                <ul class="chapter-sections">
                                    <li class="single-chapter-section">
                                        <div class="section-header">
                                            <div class="section-left">
                                                <?= $lesson->content ?>
                                                <div class="input-group justify-content-center">
                                                    <?php if (empty($lesson->users)): ?>
                                                        <div class="d-flex justify-content-center">
                                                            <?= $this->Form->postButton('Next', [$course->id, '?' => ['pageid' => $lesson->id]], ['data' => ['next' => true, 'page' => true], 'class' => 'btn btn-primary btn-hover-secondary btn-width-180 text-center']) ?>
                                                        </div>
                                                    <?php endif ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </li>
                                </ul>
                            </div>
                            

                        <?php endif ?>
                        
                    </div>

                    <div class="col-lg-4 col-12 order-lg-2 max-mb-50" id="sticky-sidebar">
                        <div class="sidebar-widget-wrapper pr-0">
                            <div class="sidebar-widget">
                                <div class="sidebar-widget-content">
                                    <div class="sidebar-entry-course-info p-0">
                                        <div class="learn-wrapper">
                                            <div class="chapter-course __2">
                                                <ul class="chapter-sections">
                                                    <li class="single-chapter-section">
                                                        <div class="section-header">
                                                            <div class="section-left">
                                                                <?php
                                                                $t = 0; 
                                                                foreach ($course->lessons as $l) {
                                                                    if (!empty($l->users)) {
                                                                        $t += $l->percent; 
                                                                    }
                                                                } ?>
                    
                                                                <h5 class="title">Lesson Track</h5>
                                                                <p class="section-desc">Completed <?= $t ?>% of lesson.</p>
                                                                <div class="progress w-100 mb-0">
                                                                    <div class="progress-fill" style="width: <?= $t ?>%;"><?= $t ?>%</div>
                                                                    <!-- <span class="progress-text"></span> -->
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <ul class="section-content">
                                                            <?php $next = true; ?>
                                                            <?php foreach ($course->lessons as $key => $les): ?>
                                                                <?php
                                                                if ($key > 0) {
                                                                    !empty($course->lessons[$key - 1]->users) ? $next = 1 : $next = false;
                                                                }  
                                                                ?>
                                                                <li class="course-item">
                                                                    <a class="section-item-link <?= !$next?'no-active':null ?>" href="<?= $next ? $this->Url->build([$course->id, '?' => ['pageid' => $les->id]]): null ?>">
                                                                        <span class="item-name"><span><?= sprintf("%02d", $key + 1) ?></span><?= $les->title ?></span>
                                                                        <?php if ($course->lessons[$key]->users): ?>
                                                                            <div class="course-item-meta">
                                                                                <span class="item-meta item-meta-icon video">
                                                                                    <i class="fal fa-check"></i>
                                                                                </span>
                                                                            </div>
                                                                        <?php endif ?>
                                                                    </a>
                                                                </li>
                                                            <?php endforeach ?>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="modal modal-form-file fade" id="modal-transcript" tabindex="-1" aria-labelledby="modal-transcriptLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <form action="" id="contact-form" method="post"></form>
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modal-transcriptLabel"><?= $lesson->title ?></h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <?= $lesson->video_transcript ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary button-time" id="btn-time"></button>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>

        <script>
            // Load the IFrame Player API code asynchronously.
            var tag = document.createElement('script');
            tag.src = "https://www.youtube.com/player_api";
            var firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
          
            var player;
            function onYouTubePlayerAPIReady() {
              player = new YT.Player('lesson-youtube', {
                videoId: '<?= $lesson->video ?>'
              });
            }
        </script>
        
        <script>

            $(document).ready(function(){
                var intervalId = null;
                var timer = function() {
                    var count = $('#btn-time span').html();
                    if (count > 1) {
                        $('#btn-time span').html(count - 1);
                    } else {
                        clearInterval(timer);
                        $('#btn-time').html('<span><?= $this->Form->postButton('Next', [$course->id, '?' => ['pageid' => $lesson->id]], ['data' => ['next' => true, 'page' => true], 'class' => 'btn btn-primary btn-hover-secondary btn-width-180 text-center']) ?></span>')
                        $('#btn-time').addClass('done')
                    }
                };
                $('#modal-transcript').on('shown.bs.modal', function () {
                    $('#btn-time').removeClass('done')
                    $('#btn-time').html('<span><?= $lesson->transcript_timer ?></span>' + '&nbsp' + 'seconds')
                    intervalId = setInterval(timer, 1000);
                    
                    
                    
                });
                $('#modal-transcript').on('hide.bs.modal', function () {
                    clearInterval(intervalId);
                    $('#btn-time').html('<span><?= $lesson->transcript_timer ?></span>' + '&nbsp' + 'seconds')
                    
                    
                });

            });
            
        </script>
    <?php break;
} ?>
