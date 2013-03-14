<section class="loginform cf">
	<form name="login" action="index.php?action=auth" method="post" accept-charset="utf-8">
		<ul>
			<li><label for="login">Username</label>
			<input type="text" name="student_number" placeholder="student number" value="<?php echo $student_number ?>" required></li>
			<li><label for="password">Password</label>
			<input type="password" name="password" placeholder="password" required></li>
			<li>
			<input type="submit" value="Login" class="button-submit"></li>
		</ul>
		<?php if($error != "ok") { ?>
		<p>Error: Incorrect login or password</p>
		<?php } ?>
	</form>
</section>