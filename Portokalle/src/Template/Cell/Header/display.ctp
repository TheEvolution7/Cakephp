<?php foreach ($specialities as $speciality): ?>
    <a class="header__link" href="<?= $this->Url->build(['controller' => 'Pages','action' => 'speciality', $speciality->slug]) ?>"><?= $speciality->title ?></a>
<?php endforeach ?>
