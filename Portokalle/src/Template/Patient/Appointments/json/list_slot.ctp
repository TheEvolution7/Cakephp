<?php echo $this->Form->hidden('date', ['value' => $this->request->getQuery('date')]); ?>
<div class="form-container">
    
    <?php if (!empty($times)): ?>
        <div class="field">
            <div class="package-container speciality-container">
                <?php foreach ($times as $time): ?>
                    <div class="col-pack">
                        <input type="radio" id="package-<?= $time ?>" name="time" class="radio" value="<?= $time ?>" required/>
                        <label for="package-<?= $time ?>" class="history__card">
                            <div class="history__title"><?= $time ?></div>
                        </label>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    <?php else: ?>
        <h2 style="text-align: center;">Not Found</h2>
    <?php endif ?>
    
    <div class="flex justify-center btn-step">
        <?= $this->Html->link(__('Back'), $param, ['class' => 'btn btn_blue __back']) ?>
        <?= $this->Form->button(__('Continue'), ['class' => 'btn btn_blue __next']) ?>
    </div>
</div>

