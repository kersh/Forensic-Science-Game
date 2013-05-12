<?php

// variables to hold object name
$object = array();

$query = sprintf("SELECT * 
				  FROM objects 
				  WHERE object_name='%s'",
				  mysql_real_escape_string($_GET["object_name"]));

$receivedObject = mysql_query($query);

while($row = mysql_fetch_array($receivedObject)) {
	$object[0] = $row['object_id'];
	$object[1] = $row['object_name'];
	$object[2] = $row['object_image_link'];
	$object[3] = $row['object_price'];
}

echo json_encode($object);

?>