<?php
// Do not display every error and warning to user, the most important error script will catch by try/catch block below
// error_reporting(0);

// Start user session
session_start();

include('classes/db.class.php');

try {

	// Get DB data from file. For secure reason it's in separate file.
	$dbFileName = "dbSecuredData.txt";
	$dataFromFile = file($dbFileName, FILE_IGNORE_NEW_LINES);

	// check file and find DB data.
	foreach ($dataFromFile as $key => &$value) {
		$arr = explode("\t", $value);
	}
	$dbHost = $arr[0];
	$dbUser = $arr[1];
	$dbPassword = $arr[2];
	$dbDb = $arr[3];

	// Create DB connection
	$db = new db($dbHost, $dbUser, $dbPassword, $dbDb);

	// default action authorization
	$action = !isset($_GET['action']) ? 'login' : $_GET['action'];

	// by default user is on log in page and don't see log out button.
	$userBtn = !isset($_GET['userBtn']) ? 'loginBtn' : $_GET['userBtn'];

	// fetch all errors from user input form.
	$error = !isset($_GET['error']) ? 'ok' : $_GET['error'];
	$student_number = (!isset($_GET['student_number'])) ? '' : $_GET['student_number'];

	// Lowercase
	$action = strtolower($action);

	// Getting data
	$action_file = sprintf("actions/%s.php", $action);

	if(file_exists($action_file)) {
		include($action_file);
	} else {
		throw new Exception('Page not found');
	}

	$db->close_connection();
} catch(Exception $e) {
	// Found some error
	$action = 'error';
	var_dump($e->getMessage());
}

// Render templates
include("templates/header.html.php");
include(sprintf("templates/%s.html.php", $action));
include("templates/footer.html.php");

?>