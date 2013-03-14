<?php

// Retrieve student_number and password from database according to user's input
$login = mysql_query("SELECT * 
					  FROM users 
					  WHERE 
					  	(student_number = '" . mysql_real_escape_string($_POST['student_number']) . "') 
						and 
						(password = '" . mysql_real_escape_string($_POST['password']) . "')");

// Check student_number and password match
if (mysql_num_rows($login) == 1) {
	// Set student_number session variable
	$_SESSION['student_number'] = $_POST['student_number'];
	// Jump to secured page
	header('Location: index.php?action=chooseRoom&userBtn=logoutBtn&error=ok');
} else {
	// throw new Exception("Login or password is incorrect");
	// Jump to login page
	header('Location: index.php?action=login&error=incorrect_input&userBtn=loginBtn&student_number='.$_POST['student_number']);
}

?>