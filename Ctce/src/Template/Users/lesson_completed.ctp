<div class="page-title-section section">
    <div class="page-title">
        <div class="container">
            <h1 class="title">Congratulations - All sections inside Introduction to the Course have been completed</h1>
        </div>
    </div>
    <div class="page-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="<?= $this->Url->build('/') ?>">Home</a></li>
                <li class="current"><?= $course->title ?></li>
            </ul>
        </div>
    </div>
</div>
<div class="section section-padding-bottom-80">
    <div class="container">
        <div class="row max-mb-n50">

            <div class="col-lg-8 col-12 order-lg-1 max-mb-50">
                <!-- Course Details Wrapper Start -->
                <div class="learn-wrapper">
                    <span class="icon">
                        <i class="far fa-trophy-alt"></i>
                    </span>
                    <div class="progress">
                        <div class="progress-fill" style="width: 100%;">100%</div>
                        <!-- <span class="progress-text"></span> -->
                        
                    </div>
                    <div class="chapter-course">
                        <ul class="chapter-sections">
                            <li class="single-chapter-section">
                                <div class="section-header">
                                    <div class="section-left">
                                        <h5 class="title">Section</h5>
                                    </div>
                                </div>
                                <ul class="section-content complete-learn">
                                    <?php foreach ($course->lessons as $key => $les): ?>
                                        <li class="course-item">
                                            <a class="section-item-link lesson" href="<?= $this->Url->build([$course->id, '?' => ['pageid' => $les->id]]) ?>">
                                                <span class="item-name"><span><?= sprintf("%02d", $key + 1) ?></span>  <?= $les->title ?></span>
                                                <div class="course-item-meta">
                                                    <span class="item-meta duration">100%</span>
                                                </div>
                                            </a>
                                            
                                        </li>
                                    <?php endforeach ?>
                                </ul>
                            </li>
                            <li class="single-chapter-section">
                                <div class="input-group justify-content-center max-mb-30  max-mt-30">
                                    <?= $this->Form->postButton('Continue to next activity', ['action' => 'courseView', $course->id], ['data' => ['next' => true], 'class' => 'btn btn-primary btn-hover-secondary btn-width-180 text-center']) ?>
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