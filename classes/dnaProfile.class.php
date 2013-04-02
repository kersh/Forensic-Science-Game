<?php
class dnaProfile {
	private $randNumber, $suspectDNA;

	function setSuspectDNA($suspectDNA) {
		$this->suspectDNA = $suspectDNA;
	}
	function getSuspectDNA() {
		return $this->suspectDNA;
	}

	// Put "F" on the place of missing piece in DNA profile
	function makeMissedSection() {
		$sectionNum = rand(0,21);
		// thes $sectionNum shouldn't match with index of Amelogenin in array
		// if( $sectionNum == 8 || $sectionNum == 9 )
		// 	$this->makeMissedSection();
		// the $sectionNum must not repeat and couldn't be Amelogenin
		if( $this->suspectDNA[$sectionNum] == "F" || $this->suspectDNA[$sectionNum] == "X" || $this->suspectDNA[$sectionNum] == "Y")
			$this->makeMissedSection();
		else
			$this->suspectDNA[$sectionNum] = "F";
	}

	function countByRace($locusesArray, $race) {
		$z = new XMLReader;
		$z->open('locuses.xml');
		$doc = new DOMDocument;
		// move to the first <locus /> node
		while ($z->read() && $z->name !== 'locus');
		$node = simplexml_import_dom($doc->importNode($z->expand(), true));

		$sum = 1;
		$i = 0;
		$n = 0;
		while ($i < 10) {
			if ($i != 4) { // exclude the Amelogenin [X, Y]
				$locus_id = 'locus_' . $i;
				$allele_id1 = 'allele_' . $locusesArray[$i][0];
				$allele_id2 = 'allele_' . $locusesArray[$i][1];

				$allele_0_value = (float)$node->$locus_id->$allele_id1->$race;
				$allele_1_value = (float)$node->$locus_id->$allele_id2->$race;

				if ($locusesArray[$i][0] != $locusesArray[$i][1]) {
					$tempSum = 2 * $allele_0_value * $allele_1_value;
				}

				if ($locusesArray[$i][0] == $locusesArray[$i][1]) {
					$tempSum = pow($allele_0_value, 2);
				}
				$sum = $sum * $tempSum;
			}
			$i++;
		}
		return $sum;
	}

	// Function return random number for D3S1358 allele.
	function getAlleleD3() {
		$randNumber = rand(0, 9999);

		// possibility sorted by incremental order.
		if ($randNumber >= 0 && $randNumber < 11)
			return 12;
		if ($randNumber >= 11 && $randNumber < 24)
			return 11;
		if ($randNumber >= 24 && $randNumber < 36)
			return 20;
		if ($randNumber >= 36 && $randNumber < 93)
			return 13;
		if ($randNumber >= 93 && $randNumber < 243)
			return 19;
		if ($randNumber >= 243 && $randNumber < 1412)
			return 14;
		if ($randNumber >= 1412 && $randNumber < 2905)
			return 18;
		if ($randNumber >= 2905 && $randNumber < 4838)
			return 17;
		if ($randNumber >= 4838 && $randNumber < 7083)
			return 16;
		if ($randNumber >= 7083 && $randNumber < 10000)
			return 15;
	}

	// Function return random number for VWA allele.
	function getAlleleVWA() {
		$randNumber = rand(0, 10034);

		// possibility sorted by incremental order.
		if ($randNumber >= 0 && $randNumber < 9)
			return 11;
		if ($randNumber >= 9 && $randNumber < 19)
			return 12;
		if ($randNumber >= 19 && $randNumber < 29)
			return 13;
		if ($randNumber >= 29 && $randNumber < 41)
			return 21;
		if ($randNumber >= 41 && $randNumber < 226)
			return 20;
		if ($randNumber >= 226 && $randNumber < 1059)
			return 19;
		if ($randNumber >= 1059 && $randNumber < 1985)
			return 14;
		if ($randNumber >= 1985 && $randNumber < 3181)
			return 15;
		if ($randNumber >= 3181 && $randNumber < 5195)
			return 18;
		if ($randNumber >= 5195 && $randNumber < 7417)
			return 16;
		if ($randNumber >= 7417 && $randNumber < 10035)
			return 17;
	}

	function getAlleleD16() {
		$randNumber = rand(0, 9999);

		// possibility sorted by incremental order.
		if ($randNumber >= 0 && $randNumber < 12)
			return 15;
		if ($randNumber >= 12 && $randNumber < 116)
			return 8;
		if ($randNumber >= 116 && $randNumber < 463)
			return 14;
		if ($randNumber >= 463 && $randNumber < 1053)
			return 10;
		if ($randNumber >= 1053 && $randNumber < 2407)
			return 9;
		if ($randNumber >= 2407 && $randNumber < 4166)
			return 13;
		if ($randNumber >= 4166 && $randNumber < 6944)
			return 11;
		if ($randNumber >= 6944 && $randNumber < 10000)
			return 12;
	}

	function getAlleleD2() {
		$randNumber = rand(0, 9980);

		// possibility sorted by incremental order.
		if ($randNumber >= 0 && $randNumber < 12)
			return 14;
		if ($randNumber >= 12 && $randNumber < 60)
			return 27;
		if ($randNumber >= 60 && $randNumber < 187)
			return 26;
		if ($randNumber >= 187 && $randNumber < 352)
			return 22;
		if ($randNumber >= 352 && $randNumber < 722)
			return 21;
		if ($randNumber >= 722 && $randNumber < 1104)
			return 16;
		if ($randNumber >= 1104 && $randNumber < 1798)
			return 18;
		if ($randNumber >= 1798 && $randNumber < 2770)
			return 23;
		if ($randNumber >= 2770 && $randNumber < 3800)
			return 25;
		if ($randNumber >= 3800 && $randNumber < 4969)
			return 19;
		if ($randNumber >= 4969 && $randNumber < 6150)
			return 24;
		if ($randNumber >= 6150 && $randNumber < 7817)
			return 20;
		if ($randNumber >= 7817 && $randNumber < 9981)
			return 17;
	}

	function getAlleleD8() {
		$randNumber = rand(0, 10020);

		// possibility sorted by incremental order.
		if ($randNumber >= 0 && $randNumber < 10)
			return 18;
		if ($randNumber >= 10 && $randNumber < 20)
			return 19;
		if ($randNumber >= 20 && $randNumber < 35)
			return 17;
		if ($randNumber >= 35 && $randNumber < 182)
			return 9;
		if ($randNumber >= 182 && $randNumber < 379)
			return 8;
		if ($randNumber >= 379 && $randNumber < 645)
			return 16;
		if ($randNumber >= 645 && $randNumber < 1513)
			return 11;
		if ($randNumber >= 1513 && $randNumber < 2451)
			return 15;
		if ($randNumber >= 2451 && $randNumber < 3481)
			return 10;
		if ($randNumber >= 3481 && $randNumber < 4847)
			return 12;
		if ($randNumber >= 4847 && $randNumber < 6803)
			return 14;
		if ($randNumber >= 6803 && $randNumber < 10021)
			return 13;
	}

	function getAlleleD21() {
		$randNumber = rand(0, 10022);

		// possibility sorted by incremental order.
		if ($randNumber >= 0 && $randNumber < 10)
			return 24;
		if ($randNumber >= 10 && $randNumber < 20)
			return 36;
		if ($randNumber >= 20 && $randNumber < 32)
			return 23.2;
		if ($randNumber >= 32 && $randNumber < 44)
			return 26.2;
		if ($randNumber >= 44 && $randNumber < 56)
			return 29.2;
		if ($randNumber >= 56 && $randNumber < 68)
			return 35;
		if ($randNumber >= 68 && $randNumber < 91)
			return 33;
		if ($randNumber >= 91 && $randNumber < 114)
			return 34.2;
		if ($randNumber >= 114 && $randNumber < 276)
			return 32;
		if ($randNumber >= 276 && $randNumber < 519)
			return 27;
		if ($randNumber >= 519 && $randNumber < 832)
			return 30.2;
		if ($randNumber >= 832 && $randNumber < 1168)
			return 33.2;
		if ($randNumber >= 1168 && $randNumber < 1724)
			return 31;
		if ($randNumber >= 1724 && $randNumber < 2604)
			return 32.2;
		if ($randNumber >= 2604 && $randNumber < 3646)
			return 31.2;
		if ($randNumber >= 3646 && $randNumber < 5255)
			return 28;
		if ($randNumber >= 5255 && $randNumber < 7315)
			return 29;
		if ($randNumber >= 7315 && $randNumber < 10023)
			return 30;
	}

	function getAlleleD18() {
		$randNumber = rand(0, 10034);

		// possibility sorted by incremental order.
		if ($randNumber >= 0 && $randNumber < 10)
			return 10.2;
		if ($randNumber >= 10 && $randNumber < 20)
			return 23;
		if ($randNumber >= 20 && $randNumber < 55)
			return 22;
		if ($randNumber >= 55 && $randNumber < 171)
			return 10;
		if ($randNumber >= 171 && $randNumber < 287)
			return 11;
		if ($randNumber >= 287 && $randNumber < 403)
			return 20;
		if ($randNumber >= 403 && $randNumber < 519)
			return 21;
		if ($randNumber >= 519 && $randNumber < 994)
			return 19;
		if ($randNumber >= 994 && $randNumber < 1781)
			return 18;
		if ($randNumber >= 1781 && $randNumber < 2962)
			return 17;
		if ($randNumber >= 2962 && $randNumber < 4247)
			return 13;
		if ($randNumber >= 4247 && $randNumber < 5590)
			return 16;
		if ($randNumber >= 5590 && $randNumber < 7014)
			return 15;
		if ($randNumber >= 7014 && $randNumber < 8449)
			return 12;
		if ($randNumber >= 8449 && $randNumber < 10035)
			return 14;
	}

	function getAlleleD19() {
		$randNumber = rand(0, 10011);

		// possibility sorted by incremental order.
		if ($randNumber >= 0 && $randNumber < 10)
			return 18;
		if ($randNumber >= 10 && $randNumber < 22)
			return 10;
		if ($randNumber >= 22 && $randNumber < 34)
			return 18.2;
		if ($randNumber >= 34 && $randNumber < 57)
			return 12.2;
		if ($randNumber >= 57 && $randNumber < 80)
			return 17.2;
		if ($randNumber >= 80 && $randNumber < 115)
			return 17;
		if ($randNumber >= 115 && $randNumber < 208)
			return 11;
		if ($randNumber >= 208 && $randNumber < 370)
			return 16.2;
		if ($randNumber >= 370 && $randNumber < 544)
			return 13.2;
		if ($randNumber >= 544 && $randNumber < 799)
			return 14.2;
		if ($randNumber >= 799 && $randNumber < 1146)
			return 15.2;
		if ($randNumber >= 1146 && $randNumber < 1632)
			return 16;
		if ($randNumber >= 1632 && $randNumber < 2350)
			return 12;
		if ($randNumber >= 2350 && $randNumber < 4144)
			return 15;
		if ($randNumber >= 4144 && $randNumber < 6679)
			return 13;
		if ($randNumber >= 6679 && $randNumber < 10012)
			return 14;
	}

	function getAlleleTHO1() {
		$randNumber = rand(0, 10001);

		// possibility sorted by incremental order.
		if ($randNumber >= 0 && $randNumber < 12)
			return 10.3;
		if ($randNumber >= 12 && $randNumber < 58)
			return 5;
		if ($randNumber >= 58 && $randNumber < 151)
			return 10;
		if ($randNumber >= 151 && $randNumber < 1378)
			return 8;
		if ($randNumber >= 1378 && $randNumber < 2733)
			return 9;
		if ($randNumber >= 2733 && $randNumber < 4782)
			return 7;
		if ($randNumber >= 4782 && $randNumber < 6970)
			return 6;
		if ($randNumber >= 6970 && $randNumber < 10002)
			return 9.3;
	}

	function getAlleleFGA() {
		$randNumber = rand(0, 10090);

		// possibility sorted by incremental order.
		if ($randNumber >= 0 && $randNumber < 10)
			return 26.2;
		if ($randNumber >= 10 && $randNumber < 22)
			return 17;
		if ($randNumber >= 22 && $randNumber < 34)
			return 18.2;
		if ($randNumber >= 34 && $randNumber < 46)
			return 19.2;
		if ($randNumber >= 46 && $randNumber < 58)
			return 22.1;
		if ($randNumber >= 58 && $randNumber < 70)
			return 24.2;
		if ($randNumber >= 70 && $randNumber < 82)
			return 28;
		if ($randNumber >= 82 && $randNumber < 105)
			return 20.2;
		if ($randNumber >= 105 && $randNumber < 128)
			return 21.2;
		if ($randNumber >= 128 && $randNumber < 151)
			return 23.2;
		if ($randNumber >= 151 && $randNumber < 197)
			return 27;
		if ($randNumber >= 197 && $randNumber < 278)
			return 18;
		if ($randNumber >= 278 && $randNumber < 462)
			return 22.2;
		if ($randNumber >= 462 && $randNumber < 832)
			return 26;
		if ($randNumber >= 832 && $randNumber < 1341)
			return 19;
		if ($randNumber >= 1341 && $randNumber < 2116)
			return 25;
		if ($randNumber >= 2116 && $randNumber < 3378)
			return 24;
		if ($randNumber >= 3378 && $randNumber < 4767)
			return 20;
		if ($randNumber >= 4767 && $randNumber < 6318)
			return 23;
		if ($randNumber >= 6318 && $randNumber < 8170)
			return 21;
		if ($randNumber >= 8170 && $randNumber < 100091)
			return 22;
	}
} // end of class
?>