<?php
use \Cake\Core\Configure;
$this->assign('title', (isset($title)) ? h(ucwords(strtolower($title))) : Configure::read('Core.setting.site_title'));
$image = (isset($image) && file_exists($image)) ? h($image) : '/uploads/settings/1/' . Configure::read('Core.setting.image');
$this->start('meta');
/**
 * Basic tags.
 */
	echo $this->Html->meta(['name' => 'author', 'content' => (isset($author)) ? h($author) : Configure::read('Core.setting.author')]);
	echo $this->Html->meta(['name' => 'copyright', 'content' => (isset($copyright)) ? h($copyright) : Configure::read('Core.setting.copyright')]);
	echo $this->Html->meta(['name', 'keyword', 'content' => (isset($keyword)) ? h($keyword) : Configure::read('Core.setting.meta_keyword')]);
	
	echo $this->Html->meta(['name', 'image', 'content' => $this->Url->build(DS . $image,true)]);
	echo $this->Html->meta(['name', 'title', 'content' => (isset($title)) ? h($title) : Configure::read('Core.setting.site_title')]);
	echo $this->Html->meta('description', (isset($description)) ? $this->Text->truncate(
		h($description),
		250,
		[
			'ellipsis' => '...',
			'exact' => false
		]
	) : Configure::read('Core.setting.meta_description'));

	echo $this->Html->meta(['property' => 'itemprop:name', 'content' => (isset($title)) ? h($title) : Configure::read('Core.setting.site_title')]);
	echo $this->Html->meta(['property' => 'itemprop:image', 'content' => $this->Url->build(DS . $image,true)]);
	echo $this->Html->meta(['property' => 'itemprop:description', 'content' => (isset($description)) ? $this->Text->truncate(
		h($description),
		250,
		[
			'ellipsis' => '...',
			'exact' => false
		]
	) : Configure::read('Core.setting.meta_description')]);
/**
 * Facebook tags.
 */
	echo $this->Html->meta(['property' => 'og:site_name', 'content' => Configure::read('Core.setting.site_title')]);
	echo $this->Html->meta(['property' => 'og:title', 'content' => (isset($title)) ? h($title) : Configure::read('Core.setting.site_title')]);
	echo $this->Html->meta(['property' => 'og:url', 'content' => $this->Url->build(null, true)]);
	echo $this->Html->meta(['property' => 'og:image', 'content' => $this->Url->build(DS . $image,true)]);
	echo $this->Html->meta(['property' => 'og:description', 'content' => (isset($description)) ? $this->Text->truncate(
		h($description),
		250,
		[
			'ellipsis' => '...',
			'exact' => false
		]
	) : Configure::read('Core.setting.meta_description')]);
	echo $this->Html->meta(['property' => 'og:width', 400]);
	echo $this->Html->meta(['property' => 'og:height', 400]);

/**
 * Twitter tags.
 */
	echo $this->Html->meta(['name' => 'twitter:site', 'content' => Configure::read('Core.setting.site_title')]);
	echo $this->Html->meta(['name' => 'twitter:title', 'content' => (isset($title)) ? h($title) : Configure::read('Core.setting.site_title')]);
	echo $this->Html->meta(['name' => 'twitter:url', 'content' => $this->Url->build(null, true)]);
	echo $this->Html->meta(['name' => 'twitter:image', 'content' => $this->Url->build(DS . $image,true)]);
	echo $this->Html->meta(['name' => 'twitter:description', 'content' => (isset($description)) ? $this->Text->truncate(
		h($description),
		250,
		[
			'ellipsis' => '...',
			'exact' => false
		]
	) : Configure::read('Core.setting.meta_description')]);
$this->end();
