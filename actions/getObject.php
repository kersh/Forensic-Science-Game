<?php

include('../classes/db.class.php');
// Get DB data from file. For secure reason it's in separate file.
$dbFileName = "../dbSecuredData.txt";
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




// variables to hold object name
$object = array();

$receivedObject = mysql_query("SELECT * 
							  FROM objects 
							  WHERE object_id=$_GET[object_id]");

while($row = mysql_fetch_array($receivedObject)) {
	$object[0] = $row['object_name'];
	$object[1] = $row['object_image_link'];
	$object[2] = $row['dna_piece'];
}

echo json_encode($object);


$db->close_connection();
?>