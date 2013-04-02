<p>Your result for EAs:</p>

<p>
	<?php echo $EA1_user; ?>
	<?php if($EA1_check) : ?>
		<span>Correct</span>
	<?php else : ?>
		<span>Incorrect</span>
	<?php endif; ?>
</p>
<p>
	<?php echo $EA3_user; ?>
	<?php if($EA3_check) : ?>
		<span>Correct</span>
	<?php else : ?>
		<span>Incorrect</span>
	<?php endif; ?>
</p>
<p>
	<?php echo $EA4_user; ?>
	<?php if($EA4_check) : ?>
		<span>Correct</span>
	<?php else : ?>
		<span>Incorrect</span>
	<?php endif; ?>
</p>

<a href="index.php?action=chooseRoom&userBtn=logoutBtn&error=ok">Back to main menu</a>