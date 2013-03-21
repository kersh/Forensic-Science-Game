<?php

// variables to hold object name
$object = array();

$receivedObject = mysql_query("SELECT * 
							  FROM objects 
							  WHERE object_id=$_GET[object_id]");

while($row = mysql_fetch_array($receivedObject)) {
	$object[0] = $row['object_id'];
	$object[1] = $row['object_name'];
	$object[2] = $row['object_image_link'];
	$object[3] = $row['object_price'];
}

echo json_encode($object);

?>