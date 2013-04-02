<?php

// Check, if student_number session is NOT set then this page will jump to login page
if (!isset($_SESSION['student_number'])) {
	header('Location: index.php?action=login&error=ok&userBtn=loginBtn');
}

$userBtn="logoutBtn";

include('classes/dnaProfile.class.php');

try {
	// retrieve data from previous page
	$dnaFound = $_GET['dnaFound'];
	$room_name = $_GET['room_name'];
	$student_number = $_SESSION['student_number'];
	
	// create an object of DNA profile to generate new DNA profile and count EAs.
	$dnaProfile = new dnaProfile();

	// array that hold the whole DNA with all block in it.
	$locuses;

	// if DNA was found on any object
	if ($dnaFound == true) {
		// check if DNA profile for this user has been gerenerated aleready.
		$receivedDNAs = mysql_query("SELECT * 
									 FROM alleles 
									 WHERE student_number='$student_number'
									 AND room_name='$room_name'");

		if (mysql_num_rows($receivedDNAs) < 1) { // generate DNA profile
			// First DNA profile is belonging to victim
			$belonging = "victim"; // default belonging
			for ($n = 0; $n < 2; $n++) {
				$locuses[0][0] = $dnaProfile->getAlleleD3();
				$locuses[0][1] = $dnaProfile->getAlleleD3();

				$locuses[1][0] = $dnaProfile->getAlleleVWA();
				$locuses[1][1] = $dnaProfile->getAlleleVWA();

				$locuses[2][0] = $dnaProfile->getAlleleD16();
				$locuses[2][1] = $dnaProfile->getAlleleD16();

				$locuses[3][0] = $dnaProfile->getAlleleD2();
				$locuses[3][1] = $dnaProfile->getAlleleD2();

				$locuses[4][0] = "X";
				$locuses[4][1] = "Y";

				$locuses[5][0] = $dnaProfile->getAlleleD8();
				$locuses[5][1] = $dnaProfile->getAlleleD8();

				$locuses[6][0] = $dnaProfile->getAlleleD21();
				$locuses[6][1] = $dnaProfile->getAlleleD21();

				$locuses[7][0] = $dnaProfile->getAlleleD18();
				$locuses[7][1] = $dnaProfile->getAlleleD18();

				$locuses[8][0] = $dnaProfile->getAlleleD19();
				$locuses[8][1] = $dnaProfile->getAlleleD19();

				$locuses[9][0] = $dnaProfile->getAlleleTHO1();
				$locuses[9][1] = $dnaProfile->getAlleleTHO1();

				$locuses[10][0] = $dnaProfile->getAlleleFGA();
				$locuses[10][1] = $dnaProfile->getAlleleFGA();

				$sum_caucasian = $dnaProfile->countByRace($locuses, 'race_caucasian');
				$sum_afrocarib = $dnaProfile->countByRace($locuses, 'race_afrocarib');
				$sum_asian = $dnaProfile->countByRace($locuses, 'race_asian');

				// SQL request to write new DNA profile into DB
				$sql = "INSERT INTO alleles (
											 allele_id,
											 student_number,
											 room_name,

											 belonging,

											 allele_D3_1,
											 allele_D3_2,

											 allele_VWA_1,
											 allele_VWA_2,

											 allele_D16_1,
											 allele_D16_2,

											 allele_D2_1,
											 allele_D2_2,

											 allele_amelogenin_1,
											 allele_amelogenin_2,

											 allele_D8_1,
											 allele_D8_2,

											 allele_D21_1,
											 allele_D21_2,

											 allele_D18_1,
											 allele_D18_2,

											 allele_D19_1,
											 allele_D19_2,

											 allele_THO1_1,
											 allele_THO1_2,

											 allele_FGA_1,
											 allele_FGA_2,

											 EA1,
											 EA3,
											 EA4)
									 VALUES (
											 NULL, 
											 '$student_number', 
											 '$room_name', 

											 '$belonging', 

											 '".$locuses[0][0]."',  
											 '".$locuses[0][1]."', 

											 '".$locuses[1][0]."', 
											 '".$locuses[1][1]."', 

											 '".$locuses[2][0]."', 
											 '".$locuses[2][1]."', 

											 '".$locuses[3][0]."', 
											 '".$locuses[3][1]."', 

											 '".$locuses[4][0]."', 
											 '".$locuses[4][1]."', 

											 '".$locuses[5][0]."', 
											 '".$locuses[5][1]."', 

											 '".$locuses[6][0]."', 
											 '".$locuses[6][1]."', 

											 '".$locuses[7][0]."', 
											 '".$locuses[7][1]."', 

											 '".$locuses[8][0]."', 
											 '".$locuses[8][1]."', 

											 '".$locuses[9][0]."', 
											 '".$locuses[9][1]."', 

											 '".$locuses[10][0]."', 
											 '".$locuses[10][1]."', 

											 '".$sum_caucasian."', 
											 '".$sum_afrocarib."',
											 '".$sum_asian."')";
				if (mysql_query($sql)) {
					// Second DNA profile is belonging to suspect
					$belonging = "suspect";
				}
			} // end for loop (victim / suspect iteration)
		}
	}

	// get all alleles for DNA profile of victim
	$allelesArray = array();
	while($allelesArray[] = mysql_fetch_array($receivedDNAs));

	$suspectDNA; // this DNA profile will have missing alleles
	$n = 0;
	// loop to make suspect DNA from db as a separate array
	for ($i = 4; $i < 26; $i++) {
		$suspectDNA[$n] = $allelesArray[1][$i];
		$n++;
	}

	$dnaProfile->setSuspectDNA($suspectDNA);

	// Determine how many missing piecec in DNA will be
	$numOfMisAlleles = rand(6, 10);
	for ($i = 0; $i < $numOfMisAlleles; $i++) {
		$dnaProfile->makeMissedSection();
	}
	$suspectDNA = $dnaProfile->getSuspectDNA();

} catch(Exception $e) {
	// Found some error
	var_dump($e->getMessage());
}

?>