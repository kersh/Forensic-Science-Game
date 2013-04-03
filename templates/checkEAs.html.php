<div class="container_for_header">
	<div class="objects_wrapper_icon"><i class="icon-list-alt"></i></div>
	<div class="objects_wrapper_h3"><h3>Your result for EAs:</h3></div>
	<div class="clearAll"></div>
</div>

<div id="ea_results">
	<p class="your_result">
		Your value of EA1:
		<strong><?php echo $EA1_user; ?></strong>
	</p>
	<p class="your_answer">
		<?php if($EA1_check) : ?>
			<span class="correct">Correct</span>
		<?php else : ?>
			<span class="wrong">Incorrect</span>
		<?php endif; ?>
	</p>

	<p class="your_result">
		Your value of EA3:
		<strong><?php echo $EA3_user; ?></strong>
	</p>
	<p class="your_answer">
		<?php if($EA3_check) : ?>
			<span class="correct">Correct</span>
		<?php else : ?>
			<span class="wrong">Incorrect</span>
		<?php endif; ?>
	</p>
	
	<p class="your_result">
		Your value of EA4:
		<strong><?php echo $EA4_user; ?></strong>
	</p>
	<p class="your_answer">
		<?php if($EA4_check) : ?>
			<span class="correct">Correct</span>
		<?php else : ?>
			<span class="wrong">Incorrect</span>
		<?php endif; ?>
	</p>

	<a href="index.php?action=chooseRoom&userBtn=logoutBtn&error=ok" class="btn btn-primary">Back to main menu</a>
</div>