<?php
	$class = 'flash-message';
	if (!empty($params['class'])) {
	    $class .= ' ' . $params['class'];
	}
	if (!isset($params['escape']) || $params['escape'] !== false) {
	    $message = h($message);
	}
?>

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="alert alert-danger" role="alert">
            <div class="alert-text"><?= $message ?></div>
        </div>
    </div>
</div>