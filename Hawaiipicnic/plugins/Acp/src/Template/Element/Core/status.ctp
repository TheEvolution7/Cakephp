<div class="update-status">
	<!-- Block status -->
	
	<?php if (isset($status['value'])): ?>

		<?php if ($status['value'] == 1): ?>

			<i class="<?= $status['class']['enable'] ?>" data-key="status" data-value="0" data-class="<?= $status['class']['disable'] ?>"></i>
		<?php else: ?>

		<i class="<?= $status['class']['disable'] ?>" data-key="status" data-value="1" data-class="<?= $status['class']['enable'] ?>"></i>
		<?php endif; ?>
	<?php endif; ?>


	<!-- Block home -->

	<?php if (isset($home['value'])): ?>

		<?php if ($home['value'] == 1): ?>

			<i class="<?= $home['class']['enable'] ?>" data-key="home" data-value="0" data-class="<?= $home['class']['disable'] ?>"></i>
		<?php else: ?>

		<i class="<?= $home['class']['disable'] ?>" data-key="home" data-value="1" data-class="<?= $home['class']['enable'] ?>"></i>
		<?php endif; ?>
	<?php endif; ?>



	<!-- Block featured -->
	<?php if (isset($featured['value'])): ?>

		<?php if ($featured['value'] == 1): ?>

			<i class="<?= $featured['class']['enable'] ?>" data-key="featured" data-value="0" data-class="<?= $featured['class']['disable'] ?>"></i>
		<?php else: ?>

		<i class="<?= $featured['class']['disable'] ?>" data-key="featured" data-value="1" data-class="<?= $featured['class']['enable'] ?>"></i>
		<?php endif; ?>
	<?php endif; ?>
</div>