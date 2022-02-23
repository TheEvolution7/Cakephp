<?php
	$class = 'flash-message';
	if (!empty($params['class'])) {
	    $class .= ' ' . $params['class'];
	}
	if (!isset($params['escape']) || $params['escape'] !== false) {
	    $message = h($message);
	}
?>
<div class="col-12 <?= $class ?>">
    <div class="alert alert-fill-warning" role="alert">
        <i class="ti-info-alt"></i>
        <?= $message ?>
    </div>
</div>