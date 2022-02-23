<div class="page2__container">
    <div class="notifications">
      <div class="sorting1">
        <div class="sorting1__row">
          <h1 class="sorting1__title title"><?= __('Notifications') ?></h1>
        </div>
      </div>
      <div class="notifications__list">
        
        <?php if(!empty($notifications)): ?>
            <?php foreach($notifications as $notification):?>
                <a href="<?= $notification->link ?>" class="notifications__item">
                    <div class="ava"><img class="ava__pic" src="<?= $notification->photo ?>"></div>
                      <div class="notifications__details">
                        <div class="notifications__text">
                            <strong><?= $notification->text ?></strong>
                        </div>
                        <div class="notifications__time"><?= $notification->time ?></div>

                      </div>
                </a>
            <?php endforeach;?>

            <div class="pagination-centered">
                <ul class="pagination">
                    <?php if ($this->Paginator->hasPrev()): ?>
                        <?= $this->Paginator->prev('«'); ?>
                    <?php endif; ?>
                    <?= $this->Paginator->numbers(['modulus' => 5]); ?>
                    <?php if ($this->Paginator->hasNext()): ?>
                        <?= $this->Paginator->next('»'); ?>
                    <?php endif; ?>
                </ul>
            </div>
        <?php else: ?>
            <h5>
                <?= __("You don't have any notification yet."); ?>
            </h5>
        <?php endif; ?>
        
      </div>
    </div>
</div>
