<?php

// Check, if student_number session is NOT set then this page will jump to login page
if (!isset($_SESSION['student_number'])) {
	header('Location: index.php?action=login&error=ok&userBtn=loginBtn');
}

$userBtn="logoutBtn";

$budget_spent = $_GET['budget_spent'];
$room_name = str_replace("_", " ", $_GET['room_name']);
// convert received item list with item array
$itemList = $_GET['items'];
$object_names = explode("::", $itemList);

// array to hold data for each item
$each_item_data = array();
$dna_found = false;

// Save spent budget into database
$saveBudgetQuery = "UPDATE room_user 
					SET spent_budget='$budget_spent'
					WHERE user_id=$_SESSION[student_number]
					AND room_name='$room_name'";

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