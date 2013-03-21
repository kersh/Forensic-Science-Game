<?php

include('classes/dnaProfile.class.php');

try {
	$dnaProfile = new dnaProfile();

	$dnaProfile->getAlleleD3();
	echo " ";
	$dnaProfile->getAlleleD3();
	echo "<br/>";

	$dnaProfile->getAlleleVWA();
	echo " ";
	$dnaProfile->getAlleleVWA();
	echo "<br/>";

	$dnaProfile->getAlleleD16();
	echo " ";
	$dnaProfile->getAlleleD16();
	echo "<br/>";

	$dnaProfile->getAlleleD2();
	echo " ";
	$dnaProfile->getAlleleD2();
	echo "<br/>";

	$dnaProfile->getAlleleD8();
	echo " ";
	$dnaProfile->getAlleleD8();
	echo "<br/>";

	$dnaProfile->getAlleleD21();
	echo " ";
	$dnaProfile->getAlleleD21();
	echo "<br/>";

	$dnaProfile->getAlleleD18();
	echo " ";
	$dnaProfile->getAlleleD18();
	echo "<br/>";

	$dnaProfile->getAlleleD19();
	echo " ";
	$dnaProfile->getAlleleD19();
	echo "<br/>";

	$dnaProfile->getAlleleTHO1();
	echo " ";
	$dnaProfile->getAlleleTHO1();
	echo "<br/>";

	$dnaProfile->getAlleleFGA();
	echo " ";
	$dnaProfile->getAlleleFGA();
	echo "<br/>";

} catch(Exception $e) {
	// Found some error
	var_dump($e->getMessage());
}

?>