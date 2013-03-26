<?php

include('classes/dnaProfile.class.php');

try {
	$locuses;

	$dnaProfile = new dnaProfile();

	$locuses[0][0] = $dnaProfile->getAlleleD3();
	$locuses[0][1] = $dnaProfile->getAlleleD3();

	$locuses[1][0] = $dnaProfile->getAlleleVWA();
	$locuses[1][1] = $dnaProfile->getAlleleVWA();

	$locuses[2][0] = $dnaProfile->getAlleleD16();
	$locuses[2][1] = $dnaProfile->getAlleleD16();

	$locuses[3][0] = $dnaProfile->getAlleleD2();
	$locuses[3][1] = $dnaProfile->getAlleleD2();

	$locuses[4][0] = $dnaProfile->getAlleleD8();
	$locuses[4][1] = $dnaProfile->getAlleleD8();

	$locuses[5][0] = $dnaProfile->getAlleleD21();
	$locuses[5][1] = $dnaProfile->getAlleleD21();

	$locuses[6][0] = $dnaProfile->getAlleleD18();
	$locuses[6][1] = $dnaProfile->getAlleleD18();

	$locuses[7][0] = $dnaProfile->getAlleleD19();
	$locuses[7][1] = $dnaProfile->getAlleleD19();

	$locuses[8][0] = $dnaProfile->getAlleleTHO1();
	$locuses[8][1] = $dnaProfile->getAlleleTHO1();

	$locuses[9][0] = $dnaProfile->getAlleleFGA();
	$locuses[9][1] = $dnaProfile->getAlleleFGA();

	$sum_caucasian = $dnaProfile->countByRace($locuses, 'race_caucasian');
	$sum_afrocarib = $dnaProfile->countByRace($locuses, 'race_afrocarib');
	$sum_asian = $dnaProfile->countByRace($locuses, 'race_asian');

	$test = '1.73326809679E-16';
	$testFloat = 1.73326809679E-16;
	$test20Percent = (float) $test * 0.20;
	$test80Percent = (float) $test * 0.80;
	$test120Percent = (float) $test * 1.20;
	$difference80 = $test - $test20Percent;
	$difference120 = $test + $test20Percent;
	
	echo '20Percent: ';
	echo $test20Percent;
	echo '<br/>';

	echo '<br/>';
	echo '80Percent: ';
	echo $test80Percent;
	echo '<br/>';

	echo '<br/>';
	echo 'Difference: ';
	echo $difference80;
	echo '<br/>';

	echo '<br/>';
	echo '120Percent: ';
	echo $test120Percent;
	echo '<br/>';

	echo '<br/>';
	echo 'Difference: ';
	echo $difference120;
	echo '<br/>';

	if ($test120Percent == $difference120)
		echo "true","\n";
	else
		echo "false";

} catch(Exception $e) {
	// Found some error
	var_dump($e->getMessage());
}

?>