<?php

// Check, if student_number session is NOT set then this page will jump to login page
if (!isset($_SESSION['student_number'])) {
	header('Location: index.php?action=login&error=ok&userBtn=loginBtn');
}

$userBtn="logoutBtn";

$student_number = $_SESSION['student_number'];
$room_name = $_GET['room_name'];

$EA1_user = $_GET['EA1'];
$EA3_user = $_GET['EA3'];
$EA4_user = $_GET['EA4'];

$receivedDNAs = mysql_query("SELECT * 
									 FROM alleles 
									 WHERE student_number='$student_number'
									 AND room_name='$room_name'");

$allelesArray = array();
while($allelesArray[] = mysql_fetch_array($receivedDNAs));

$suspectDNA; // this DNA profile will have missing alleles
$n = 0;
// loop to make suspect DNA from db as a separate array
for ($i = 26; $i < 29; $i++) {
	$suspectDNA[$n] = $allelesArray[1][$i];
	$n++;
}

$EA1_original = $suspectDNA[0];
$EA3_original = $suspectDNA[1];
$EA4_original = $suspectDNA[2];

// Check EA1
if ($EA1_user > ($EA1_original*0.20) && $EA1_user < ($EA1_original*1.20))
	$EA1_check = true;
else
	$EA1_check = false;


// Check EA3
if ($EA3_user > ($EA3_original*0.20) && $EA3_user < ($EA3_original*1.20))
	$EA3_check = true;
else
	$EA3_check = false;

// Check EA4
if ($EA4_user > ($EA4_original*0.20) && $EA4_user < ($EA4_original*1.20))
	$EA4_check = true;
else
	$EA4_check = false;

?>