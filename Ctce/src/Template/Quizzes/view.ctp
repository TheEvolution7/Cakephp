<div class="page-title-section section">
    <div class="page-title">
        <div class="container">
            <h5 class="title"><?= $quiz->title ?></h5>
        </div>
    </div>
    <div class="page-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="<?= $this->Url->build('/') ?>">Home</a></li>
                <li class="current"><?= $quiz->title ?></li>
            </ul>
        </div>
    </div>
</div>
<!-- Page Title Section End -->

<!-- Test Section Start -->
<div class="section section-padding-bottom">
    <div class="container">
        <div class="list-question">
            <?php foreach ($quiz->quiz_questions as $question): ?>
                <div class="question">
                    <h6 class="title">
                        <?= $question->content ?>
                    </h6>
                    <div class="answer">
                        <?php foreach ($question->quiz_answers as $answer): ?>
                            <label>
                                <input type="radio" class="question-input" name="<?= $question->id ?>" value="<?= $answer->id ?>" required>
                                <span class="span">
                                    <?= $answer->content ?>
                                </span>
                            </label>
                        <?php endforeach ?>
                    </div>
                </div>
            <?php endforeach ?>
        </div>

        <div class="d-flex justify-content-center">
            <button class="btn btn-primary btn-hover-secondary btn-width-180 text-center" type="submit"
                id="quizSubmit" value="done">Submit</button>
        </div>

        <div class="result">
            <h2 class="title">
                Result
            </h2>
            <div class="box-result">
                <h3 id="allQuestions"></h3>
                <h3 id="rightQuestions" class="green"></h3>
                <h3 id="wrongQuestions" class="red"></h3>
            </div>
            <h3 id="percentQuestions"></h3>
            <progress max="100" value="0" id="quizProgress"></progress>
            <div class="progressRate"></div>
        </div>
    </div>
</div>