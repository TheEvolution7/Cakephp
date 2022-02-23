<?php foreach ($practitioners as $key => $practitioner): ?>
    <?php if (!empty($practitioner->personal)): ?>
        <div class="item-doctor">
            <input type="radio" id="practitioner-<?= $key ?>" class="hidden" name="practitioner_id" value="<?= $practitioner->id ?>" required/>
            <label for="practitioner-<?= $key ?>"  class="find-doc-minicard flex flex-col item-center lg:flex-row">
                <?php
                    $image = '/img/no_thumb.png';
                    if (file_exists(WWW_ROOT . 'uploads/personals/' . $practitioner->personal->id . DS . $practitioner->personal->image)) {
                        $image = '/uploads/personals/' . $practitioner->personal->id . DS . $practitioner->personal->image;
                    }
                ?>
                <?= $this->Html->image($image) ?>
                <div class="find-doc-minicard-info flex flex-col item-center md:item-start">
                    <div class="title">
                    <?= $practitioner->personal->full_name ?>
                    </div>
                    <div class="subtitle"><?= ucfirst($practitioner->personal->gender) ?></div>
                    <div class="description">
                        <?= $practitioner->personal->description ?>
                    </div>
                </div>
            </label>
        </div>
    <?php endif ?>
<?php endforeach ?>
