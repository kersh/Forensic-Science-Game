<?php

// Retrieve student_number and password from database according to user's input
$sql = "SELECT password 
		FROM users 
			WHERE 	
				student_number = '" . mysql_real_escape_string($_POST['student_number']) . "'
		LIMIT 1
		;";

// get hash and store in a variable
$r = mysql_fetch_assoc(mysql_query($sql));
$salt = substr($r['password'], 0, 64);
$hash = $salt . $_POST['password'];

for ($i = 0; $i < 100000; $i++) {
	$hash = hash('sha256', $hash);
}
// resulted hash that generated after user typed data in
$hash = $salt . $hash;

// Check if student_number and password match with database data
if ($hash == $r['password']) {
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