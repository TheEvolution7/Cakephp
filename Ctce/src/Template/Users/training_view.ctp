<div class="page-title-section section">
    <div class="page-title">
        <div class="container">
            <h1 class="title"><?= $product->title ?></h1>
        </div>
    </div>
    <div class="page-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="<?= $this->Url->build('/') ?>">Home</a></li>
                <li class="current"><?= $product->title ?></li>
            </ul>
        </div>
    </div>
</div>
<!-- Page Title Section End -->

<!-- Course Details Section Start -->
<div class="section">
    <div class="container">
        <div class="row max-mb-n50">

            <div class="offset-lg-2 col-lg-8 col-12 max-mb-50">
                <!-- Course Details Wrapper Start -->
                <div class="course-details-wrapper">
                    <div class="course-nav-tab">
                        <ul class="nav justify-content-center">
                            <li><a class="active" data-bs-toggle="tab" href="#curriculum">Curriculum</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div id="curriculum" class="tab-pane fade show active">
                            <div class="course-curriculum">
                                <ul class="curriculum-sections">
                                    <li class="single-curriculum-section">
                                        <div class="section-header">
                                            <div class="section-left">

                                                <!-- <h5 class="title">Change simplification</h5>
                                                <p class="section-desc">General introduction to customer-centric strategies</p>
 -->
                                            </div>
                                        </div>
                                        <ul class="section-content">
                                            <?php $next = true; ?>
                                            <?php foreach ($product->courses as $key => $course): ?>
                                                <?php
                                                $str = '';
                                                if ($key > 0) {
                                                    !empty($product->courses[$key - 1]->users) ? $next = 1 : $next = false;
                                                    $last = $product->courses[$key - 1];
                                                    switch ($last->type) {
                                                        case 'lesson':
                                                            $t = 0; 
                                                            foreach ($last->lessons as $l) {
                                                                if (!empty($l->users)) {
                                                                    $t += $l->percent; 
                                                                }
                                                            }

                                                            $t < $last->rule ? $next = false : $next = true;
                                                            $str = 'You cannot access <strong> ' . $course->title. ' </strong> until you achieve a grade of at least <strong>' . $last->rule. '%</strong> in <strong>' . $last->title. '</strong>. Your current grade in <strong>' . $last->title. '</strong> is <strong>' . $t . '%</strong>.';
                                                            break;

                                                        case 'quiz':
                                                            $t = count($countTrueAnswers) / count($product->courses[$key - 1]->quiz->quiz_questions) * 100;
                                                            $t < $last->rule ? $next = false : $next = true;
                                                            $str = 'You cannot access <strong> ' . $course->title. ' </strong> until you achieve a grade of at least <strong>' . $last->rule. '%</strong> in <strong>' . $last->title. '</strong>. Your current grade in <strong>' . $last->title. '</strong> is <strong>' . $t. '%</strong>.';

                                                            break;
                                                        
                                                        default:
                                                            // code...
                                                            break;
                                                    }
                                                } 
                                                ?>
                                                
                                                <?php if ($course->type == 'quiz'): ?>
                                                    <li class="course-item">
                                                        <a class="section-item-link" href="<?= $next ? $this->Url->build(['action' => 'courseView', $course->id]) : 'javascript:;' ?>">
                                                            <span class="item-name"><?= ucfirst($course->type) . ':' . $course->title ?></span>
                                                            <div class="course-item-meta">
                                                                <span class="item-meta count-questions"><?= isset($course->quiz->quiz_questions) ? count($course->quiz->quiz_questions) : 0 ?> questions</span>
                                                                <?php if (!$next): ?>
                                                                    <span class="item-meta item-meta-icon" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true" title="<?= $str ?>">
                                                                        <i class="fas fa-lock-alt"></i>
                                                                    </span>
                                                                <?php endif ?>
                                                            </div>
                                                        </a>
                                                    </li>
                                                <?php else: ?>
                                                    <li class="course-item">
                                                        <a class="section-item-link lesson" href="<?= $next ? $this->Url->build(['action' => 'courseView', $course->id]) : 'javascript:;' ?>">
                                                            <span class="item-name"><?= ucfirst($course->type) . ': ' . $course->title ?></span>
                                                            <div class="course-item-meta">
                                                                <?php if (!$next): ?>
                                                                    <span class="item-meta item-meta-icon" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true" title="<?= $str ?>">
                                                                        <i class="fas fa-lock-alt"></i>
                                                                    </span>
                                                                <?php endif ?>
                                                            </div>
                                                        </a>
                                                    </li>
                                                <?php endif ?>
                                            <?php endforeach ?> 
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Course Details Wrapper End -->
            </div>
            <div class="offset-lg-2 col-lg-8 col-12 max-mb-50">
            </div>

        </div>
    </div>
</div>
