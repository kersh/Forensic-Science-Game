<?php

// Retrieve username and password from database according to user's input
$login = mysql_query("SELECT * FROM users WHERE (username = '" . mysql_real_escape_string($_POST['username']) . "') and (password = '" . mysql_real_escape_string($_POST['password']) . "')");

// Check username and password match
if (mysql_num_rows($login) == 1) {
	// Set username session variable
	$_SESSION['username'] = $_POST['username'];
	// Jump to secured page
	header('Location: index.php?action=chooseRoom&userBtn=logoutBtn&error=ok');
} else {
	// throw new Exception("Login or password is incorrect");
	// Jump to login page
	header('Location: index.php?action=login&error=incorrect_input&userBtn=loginBtn&username='.$_POST['username']);
}

?>