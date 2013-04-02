<?php
	
// Check, if student_number session is NOT set then this page will jump to login page
if (!isset($_SESSION['student_number'])) {
	header('Location: index.php?action=login&error=ok&userBtn=loginBtn');
}

$userBtn="logoutBtn";

$room_name = $_GET['room'];

$room_budget = $_GET['room_budget'];

?>