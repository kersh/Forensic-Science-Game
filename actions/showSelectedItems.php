<?php

// Check, if student_number session is NOT set then this page will jump to login page
if (!isset($_SESSION['student_number'])) {
	header('Location: index.php?action=login&error=ok&userBtn=loginBtn');
}

// convert received item list with item array
$itemList = $_GET['items'];
$object_names = explode("::", $itemList);

// array to hold data for each item
$each_item_data = array();
$dna_found = false;

// add all data about each room
for ($i=0; $i < count($object_names); $i++) {
	$query = "SELECT * FROM objects WHERE object_name='".$object_names[$i]."'";
	$getObject = mysql_query($query);
	while($row = mysql_fetch_array($getObject)) {
		$each_item_data[$i][0] = $row['object_name'];
		$each_item_data[$i][1] = $row['object_image_link'];
		$each_item_data[$i][2] = $row['dna_piece'];
		$each_item_data[$i][3] = $row['object_price'];
		if ($row['dna_piece'] = "positive")
			$dna_found = true;
	}
}

?>