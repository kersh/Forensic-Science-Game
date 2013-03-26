<?php
class dnaProfile {
private $randNumber;

private $D3 = array(
	11 => array(
		  'caucasian' => 0.0012,
		  'afro-carib' => 0.0012,
		  'asian' => 0.0012,
		  )
);

function countCaucasian() {
	$z = new XMLReader;
	$z->open('locuses.xml');

	$doc = new DOMDocument;

	// move to the first <locus /> node
	while ($z->read() && $z->name !== 'locus');

	// now that we're at the right depth, hop to the next <locus/> until the end of the tree
	// while ($z->name === 'locus')
	// {
		// either one should work
		//$node = new SimpleXMLElement($z->readOuterXML());
		$node = simplexml_import_dom($doc->importNode($z->expand(), true));

		// now you can use $node without going insane about parsing
		echo $node->allele_11->race_caucasian;

		// // go to next <locus />
		// $z->next('locus');
	// }
}

// Function return random number for D3S1358 allele.
function getAlleleD3() {
	$randNumber = rand(0, 9999);

	// possibility sorted by incremental order.
	if ($randNumber >= 0 && $randNumber < 11)
		echo 12;
	if ($randNumber >= 11 && $randNumber < 24)
		echo 11;
	if ($randNumber >= 24 && $randNumber < 36)
		echo 20;
	if ($randNumber >= 36 && $randNumber < 93)
		echo 13;
	if ($randNumber >= 93 && $randNumber < 243)
		echo 19;
	if ($randNumber >= 243 && $randNumber < 1412)
		echo 14;
	if ($randNumber >= 1412 && $randNumber < 2905)
		echo 18;
	if ($randNumber >= 2905 && $randNumber < 4838)
		echo 17;
	if ($randNumber >= 4838 && $randNumber < 7083)
		echo 16;
	if ($randNumber >= 7083 && $randNumber < 10000)
		echo 15;
}

// Function return random number for VWA allele.
function getAlleleVWA() {
	$randNumber = rand(0, 10034);

	// possibility sorted by incremental order.
	if ($randNumber >= 0 && $randNumber < 9)
		echo 11;
	if ($randNumber >= 9 && $randNumber < 19)
		echo 12;
	if ($randNumber >= 19 && $randNumber < 29)
		echo 13;
	if ($randNumber >= 29 && $randNumber < 41)
		echo 21;
	if ($randNumber >= 41 && $randNumber < 226)
		echo 20;
	if ($randNumber >= 226 && $randNumber < 1059)
		echo 19;
	if ($randNumber >= 1059 && $randNumber < 1985)
		echo 14;
	if ($randNumber >= 1985 && $randNumber < 3181)
		echo 15;
	if ($randNumber >= 3181 && $randNumber < 5195)
		echo 18;
	if ($randNumber >= 5195 && $randNumber < 7417)
		echo 16;
	if ($randNumber >= 7417 && $randNumber < 10035)
		echo 17;
}

function getAlleleD16() {
	$randNumber = rand(0, 9999);

	// possibility sorted by incremental order.
	if ($randNumber >= 0 && $randNumber < 12)
		echo 15;
	if ($randNumber >= 12 && $randNumber < 116)
		echo 8;
	if ($randNumber >= 116 && $randNumber < 463)
		echo 14;
	if ($randNumber >= 463 && $randNumber < 1053)
		echo 10;
	if ($randNumber >= 1053 && $randNumber < 2407)
		echo 9;
	if ($randNumber >= 2407 && $randNumber < 4166)
		echo 13;
	if ($randNumber >= 4166 && $randNumber < 6944)
		echo 11;
	if ($randNumber >= 6944 && $randNumber < 10000)
		echo 12;
}

function getAlleleD2() {
	$randNumber = rand(0, 9980);

	// possibility sorted by incremental order.
	if ($randNumber >= 0 && $randNumber < 12)
		echo 14;
	if ($randNumber >= 12 && $randNumber < 60)
		echo 27;
	if ($randNumber >= 60 && $randNumber < 187)
		echo 26;
	if ($randNumber >= 187 && $randNumber < 352)
		echo 22;
	if ($randNumber >= 352 && $randNumber < 722)
		echo 21;
	if ($randNumber >= 722 && $randNumber < 1104)
		echo 16;
	if ($randNumber >= 1104 && $randNumber < 1798)
		echo 18;
	if ($randNumber >= 1798 && $randNumber < 2770)
		echo 23;
	if ($randNumber >= 2770 && $randNumber < 3800)
		echo 25;
	if ($randNumber >= 3800 && $randNumber < 4969)
		echo 19;
	if ($randNumber >= 4969 && $randNumber < 6150)
		echo 24;
	if ($randNumber >= 6150 && $randNumber < 7817)
		echo 20;
	if ($randNumber >= 7817 && $randNumber < 9981)
		echo 17;
}

function getAlleleD8() {
	$randNumber = rand(0, 10020);

	// possibility sorted by incremental order.
	if ($randNumber >= 0 && $randNumber < 10)
		echo 18;
	if ($randNumber >= 10 && $randNumber < 20)
		echo 19;
	if ($randNumber >= 20 && $randNumber < 35)
		echo 17;
	if ($randNumber >= 35 && $randNumber < 182)
		echo 9;
	if ($randNumber >= 182 && $randNumber < 379)
		echo 8;
	if ($randNumber >= 379 && $randNumber < 645)
		echo 16;
	if ($randNumber >= 645 && $randNumber < 1513)
		echo 11;
	if ($randNumber >= 1513 && $randNumber < 2451)
		echo 15;
	if ($randNumber >= 2451 && $randNumber < 3481)
		echo 10;
	if ($randNumber >= 3481 && $randNumber < 4847)
		echo 12;
	if ($randNumber >= 4847 && $randNumber < 6803)
		echo 14;
	if ($randNumber >= 6803 && $randNumber < 10021)
		echo 13;
}

function getAlleleD21() {
	$randNumber = rand(0, 10022);

	// possibility sorted by incremental order.
	if ($randNumber >= 0 && $randNumber < 10)
		echo 24;
	if ($randNumber >= 10 && $randNumber < 20)
		echo 36;
	if ($randNumber >= 20 && $randNumber < 32)
		echo 23.2;
	if ($randNumber >= 32 && $randNumber < 44)
		echo 26.2;
	if ($randNumber >= 44 && $randNumber < 56)
		echo 29.2;
	if ($randNumber >= 56 && $randNumber < 68)
		echo 35;
	if ($randNumber >= 68 && $randNumber < 91)
		echo 33;
	if ($randNumber >= 91 && $randNumber < 114)
		echo 34.2;
	if ($randNumber >= 114 && $randNumber < 276)
		echo 32;
	if ($randNumber >= 276 && $randNumber < 519)
		echo 27;
	if ($randNumber >= 519 && $randNumber < 832)
		echo 30.2;
	if ($randNumber >= 832 && $randNumber < 1168)
		echo 33.2;
	if ($randNumber >= 1168 && $randNumber < 1724)
		echo 31;
	if ($randNumber >= 1724 && $randNumber < 2604)
		echo 32.2;
	if ($randNumber >= 2604 && $randNumber < 3646)
		echo 31.2;
	if ($randNumber >= 3646 && $randNumber < 5255)
		echo 28;
	if ($randNumber >= 5255 && $randNumber < 7315)
		echo 29;
	if ($randNumber >= 7315 && $randNumber < 10023)
		echo 30;
}

function getAlleleD18() {
	$randNumber = rand(0, 10034);

	// possibility sorted by incremental order.
	if ($randNumber >= 0 && $randNumber < 10)
		echo 10.2;
	if ($randNumber >= 10 && $randNumber < 20)
		echo 23;
	if ($randNumber >= 20 && $randNumber < 55)
		echo 22;
	if ($randNumber >= 55 && $randNumber < 171)
		echo 10;
	if ($randNumber >= 171 && $randNumber < 287)
		echo 11;
	if ($randNumber >= 287 && $randNumber < 403)
		echo 20;
	if ($randNumber >= 403 && $randNumber < 519)
		echo 21;
	if ($randNumber >= 519 && $randNumber < 994)
		echo 19;
	if ($randNumber >= 994 && $randNumber < 1781)
		echo 18;
	if ($randNumber >= 1781 && $randNumber < 2962)
		echo 17;
	if ($randNumber >= 2962 && $randNumber < 4247)
		echo 13;
	if ($randNumber >= 4247 && $randNumber < 5590)
		echo 16;
	if ($randNumber >= 5590 && $randNumber < 7014)
		echo 15;
	if ($randNumber >= 7014 && $randNumber < 8449)
		echo 12;
	if ($randNumber >= 8449 && $randNumber < 10035)
		echo 14;
}

function getAlleleD19() {
	$randNumber = rand(0, 10011);

	// possibility sorted by incremental order.
	if ($randNumber >= 0 && $randNumber < 10)
		echo 18;
	if ($randNumber >= 10 && $randNumber < 22)
		echo 10;
	if ($randNumber >= 22 && $randNumber < 34)
		echo 18.2;
	if ($randNumber >= 34 && $randNumber < 57)
		echo 12.2;
	if ($randNumber >= 57 && $randNumber < 80)
		echo 17.2;
	if ($randNumber >= 80 && $randNumber < 115)
		echo 17;
	if ($randNumber >= 115 && $randNumber < 208)
		echo 11;
	if ($randNumber >= 208 && $randNumber < 370)
		echo 16.2;
	if ($randNumber >= 370 && $randNumber < 544)
		echo 13.2;
	if ($randNumber >= 544 && $randNumber < 799)
		echo 14.2;
	if ($randNumber >= 799 && $randNumber < 1146)
		echo 15.2;
	if ($randNumber >= 1146 && $randNumber < 1632)
		echo 16;
	if ($randNumber >= 1632 && $randNumber < 2350)
		echo 12;
	if ($randNumber >= 2350 && $randNumber < 4144)
		echo 15;
	if ($randNumber >= 4144 && $randNumber < 6679)
		echo 13;
	if ($randNumber >= 6679 && $randNumber < 10012)
		echo 14;
}

function getAlleleTHO1() {
	$randNumber = rand(0, 10001);

	// possibility sorted by incremental order.
	if ($randNumber >= 0 && $randNumber < 12)
		echo 10.3;
	if ($randNumber >= 12 && $randNumber < 58)
		echo 5;
	if ($randNumber >= 58 && $randNumber < 151)
		echo 10;
	if ($randNumber >= 151 && $randNumber < 1378)
		echo 8;
	if ($randNumber >= 1378 && $randNumber < 2733)
		echo 9;
	if ($randNumber >= 2733 && $randNumber < 4782)
		echo 7;
	if ($randNumber >= 4782 && $randNumber < 6970)
		echo 6;
	if ($randNumber >= 6970 && $randNumber < 10002)
		echo 9.3;
}

function getAlleleFGA() {
	$randNumber = rand(0, 10090);

	// possibility sorted by incremental order.
	if ($randNumber >= 0 && $randNumber < 10)
		echo 26.2;
	if ($randNumber >= 10 && $randNumber < 22)
		echo 17;
	if ($randNumber >= 22 && $randNumber < 34)
		echo 18.2;
	if ($randNumber >= 34 && $randNumber < 46)
		echo 19.2;
	if ($randNumber >= 46 && $randNumber < 58)
		echo 22.1;
	if ($randNumber >= 58 && $randNumber < 70)
		echo 24.2;
	if ($randNumber >= 70 && $randNumber < 82)
		echo 28;
	if ($randNumber >= 82 && $randNumber < 105)
		echo 20.2;
	if ($randNumber >= 105 && $randNumber < 128)
		echo 21.2;
	if ($randNumber >= 128 && $randNumber < 151)
		echo 23.2;
	if ($randNumber >= 151 && $randNumber < 197)
		echo 27;
	if ($randNumber >= 197 && $randNumber < 278)
		echo 18;
	if ($randNumber >= 278 && $randNumber < 462)
		echo 22.2;
	if ($randNumber >= 462 && $randNumber < 832)
		echo 26;
	if ($randNumber >= 832 && $randNumber < 1341)
		echo 19;
	if ($randNumber >= 1341 && $randNumber < 2116)
		echo 25;
	if ($randNumber >= 2116 && $randNumber < 3378)
		echo 24;
	if ($randNumber >= 3378 && $randNumber < 4767)
		echo 20;
	if ($randNumber >= 4767 && $randNumber < 6318)
		echo 23;
	if ($randNumber >= 6318 && $randNumber < 8170)
		echo 21;
	if ($randNumber >= 8170 && $randNumber < 100091)
		echo 22;
}
} // end of class
?>