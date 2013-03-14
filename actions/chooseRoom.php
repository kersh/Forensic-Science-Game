<?php

// Check, if student_number session is NOT set then this page will jump to login page
if (!isset($_SESSION['student_number'])) {
	header('Location: index.php?action=login&error=ok&userBtn=loginBtn');
}

// variables to hold rooms data
$room_user_data = array();

// variables for each room
$each_room_data = array();

// retrieve all the data about rooms that are connected with current user.
$receivedRooms = mysql_query("SELECT * 
							  FROM room_user 
							  WHERE user_id=$_SESSION[student_number]");
$i = 0;
while($row = mysql_fetch_array($receivedRooms)) {
	$room_user_data[$i][0] = $row['room_user_id'];
	$room_user_data[$i][1] = $row['room_id'];
	$room_user_data[$i][2] = $row['room_status'];
	$room_user_data[$i][3] = $row['spent_budget'];

	$i++;
}

for ($i=0; isset($room_user_data[$i][1]); $i++) {
	$query = "SELECT * FROM rooms WHERE room_id='".$room_user_data[$i][1]."'";
	$getRoom = mysql_query($query);
	while($row = mysql_fetch_array($getRoom)) {
		$each_room_data[$i][0] = $row['room_name'];
		$each_room_data[$i][1] = $row['image_link'];
		$each_room_data[$i][2] = $row['budget'];
		$each_room_data[$i][3] = $row['description'];
	}
}

?>