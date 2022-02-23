<?php 
	$languages = $this->getConfigure('Core.languages');
?>
<div class="d-inline-block">
	<?php foreach ($languages as $key => $language): ?>
		<?php if ($language->id != $configs['language']): ?>
			<a href="<?= $this->Url->build([
				'plugin' => $requestParams['plugin'],
				'controller' => $requestParams['controller'],
				'action' => 'edit',$id,
				'?' => ['language_id' => ($language->id != $configs['language']) ? $language->id : null]
				])?>">
			<button type="button" class="btn btn-bold btn-sm btn-font-sm btn-label-info mb-2"><?php echo $language->id ?></button></a>
		<?php endif ?>
		<?php endforeach ?>
</div>