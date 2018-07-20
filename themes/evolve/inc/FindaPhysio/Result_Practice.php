<?php
	/*******************************************************************
	 *         LibrarySwitch($inputString, $type)                     *
	 ******************************************************************* 
	 *  input:
	 *  inputString - input
	 *  type - type of input
	 *  output:
	 *  Converted string
	 */
	function LibrarySwitch($inputString, $type) {
		switch ($type) {
			case "L": { // language 
				switch($inputString) {
					case 'AF':
						return "Afrikaans";
					case 'AR':
						return "Arabic";
					case 'BO':
						return "Bosnian";
					case 'CA':
						return "Cantonese";
					case 'CHZ':
						return "Chzech";
					case 'CR':
						return "Croation";
					case 'DA':
						return "Danish";
					case 'DU':
						return "Dutch";
					case 'EG':
						return "Egyptian";
					case 'ENG':
						return "English";
					case 'FL':
						return "Filipino";
					case 'FR':
						return "French";
					case 'GE':
						return "German";
					case 'GR':
						return "Greek";
					case 'HE':
						return "Hebrew";
					case 'HI':
						return "Hindi";
					case 'HO':
						return "Hokkien";
					case 'HU':
						return "Hungarian";
					case 'IND':
						return "Indonesian";
					case 'IT':
						return "Italian";
					case 'JP':
						return "Japanese";
					case 'KO':
						return "Korean";
					case 'LAT':
						return "Latvian";
					case 'LE':
						return "Lebanese";
					case 'M':
						return "Marathi";
					case 'MA':
						return "Macedonian";
					case 'MALT':
						return "Maltese";
					case 'MAN':
						return "Mandarin";
					case 'MAV':
						return "Mavathi";
					case 'ML':
						return "Malay";
					case 'NOR':
						return "Norwegian";
					case 'POL':
						return "Polish";
					case 'POR':
						return "Portuguese";
					case 'PU':
						return "Punjabi";
					case 'RU':
						return "Russian";
					case 'S':
						return "Slovak";
					case 'SERB':
						return "Serbian";
					case 'SL':
						return "Sign Language";
					case 'SP':
						return "Spanish";
					case 'SW':
						return "Swedish";
					case 'SWI':
						return "Swiss";
					case 'TA':
						return "Tamil";
					case 'TAW':
						return "Taiwanese";
					case 'TE':
						return "Teo-Chew";
					case 'TEL':
						return "Telugu";
					case 'TH':
						return "Thai";
					case 'TURK':
						return "Turkish";
					case 'UK':
						return "Ukrainian";
					case 'UR':
						return "Urdu";
					case 'VI':
						return "Vietnamese";
					case 'YI':
						return "Yiddish";
					case 'YU':
						return "Yugoslav";
					default:
						//echo "->".$inputString."<-";
						return "---";
				}
			}
			case "I": { // Interest 
				switch($inputString) {
					case 'ACU':
						return "Acupuncture and dry needling";
					case 'ADO':
						return "Adolescents";
					case 'AGE':
						return "Ageing well";
					case 'AMP':
						return "Amputees";
					case 'ART':
						return "Arthritis";
					case 'CHILD':
						return "Babies and children";
					case 'BAN':
						return "Back and neck";
					case 'BAB':
						return "Bowel and Bladder Health";
					case 'BRAIN':
						return "Brain and spinal cord";
					case 'LYM':
						return "Cancer and lympheodema";
					case 'PAIN':
						return "Chronic pain";
					case 'DIS':
						return "Disability";
					case 'DIA':
						return "Diabetes";
					case 'HAF':
						return "Head and face";
					case 'HAW':
						return "Health at work";
					case 'HEART':
						return "Heart and lung health";
					case 'HYDRO':
						return "Hydrotherapy";
					case 'LLI':
						return "Lower limbs (leg, from hip to foot)";
					case 'MEN':
						return "Men's health";
					case 'NEU':
						return "Neurological conditions";
					case 'ORTHO':
						return "Orthopaedics";
					case 'PAL':
						return "Palliative care";
					case 'PIL':
						return "Pilates";
					case 'NATAL':
						return "Pre and post-natal";
					case 'SURG':
						return "Pre and post-surgery";
					case 'STROK':
						return "Stroke recovery";
					case 'SEX':
						return "Sexual health";
					case 'SPT':
						return "Sports injuries";
					case 'ULI':
						return "Upper limbs (arm, from shoulder to hand)";
					case 'WOM':
						return "Women's health";
					case 'YOGA':
						return "Yoga";
					default:
						//echo "->".$inputString."<-";
						return "---";
				}
			}
			case "IR": { // Interest Reverse
				switch($inputString) {
					case 'Acupuncture and dry needling':
						return "ACU";
					case 'Adolescents':
						return "ADO";
					case 'Ageing well':
						return "AGE";
					case 'Amputees':
						return "AMP";
					case 'Arthritis':
						return "ART";
					case 'Babies and children':
						return "CHILD";
					case 'Back and neck':
						return "BAN";
					case 'Bowel and Bladder Health':
						return "BAB";
					case 'Brain and spinal cord':
						return "BRAIN";
					case 'Cancer and lympheodema':
						return "LYM";
					case 'Chronic pain':
						return "PAIN";
					case 'Disability':
						return "DIS";
					case 'Diabetes':
						return "DIA";
					case 'Head and face':
						return "HAF";
					case 'Health at work':
						return "HAW";
					case 'Heart and lung health':
						return "HEART";
					case 'Hydrotherapy':
						return "HYDRO";
					case 'Lower limbs (leg, from hip to foot)':
						return "LLI";
					case "Men's health":
						return "MEN";
					case 'Neurological conditions':
						return "NEU";
					case 'Orthopaedics':
						return "ORTHO";
					case 'Palliative care':
						return "PAL";
					case 'Pilates':
						return "PIL";
					case 'Pre and post-natal':
						return "NATAL";
					case 'Pre and post-surgery':
						return "SURG";
					case 'Stroke recovery':
						return "STROK";
					case 'Sexual health':
						return "SEX";
					case 'Sports injuries':
						return "SPT";
					case 'Upper limbs (arm, from shoulder to hand)':
						return "ULI";
					case "Women's health":
						return "WOM";
					case 'Yoga':
						return "YOGA";
					default:
						//echo "->".$inputString."<-";
						break;
				}
			}
		}
	}
	
	/*******************************************************************
	 *              DecoderIMIS($inputString)                          *
	 ******************************************************************* 
	 *  This is only used for iMIS extraction.
	 *  input:
	 *  inputString - string that should be converted at the end
	 *  output:
	 *  list of string that has been changed.
	 */
	function DecoderIMIS($inputString) {
		$Finder = explode(",", $inputString);
		$output = "";
		foreach($Finder as $variables) {
			if($variables != "" && $variables != " " && $variables != "\n") {
				if(preg_match("/[a-zA-Z0-9]+/", $variables)) {
					if($variables == "Upper limbs (arm") {
						$variables = "Upper limbs (arm, from shoulder to hand)";
					} else if($variables == " from shoulder to hand)") {
						$variables = "Upper limbs (arm, from shoulder to hand)";
					} else if($variables == "Lower limbs (leg") {
						$variables = "Lower limbs (leg, from hip to foot)";
					} else if($variables == " from hip to foot)") {
						$variables = "Lower limbs (leg, from hip to foot)";
					} 
					if($output == "") {
						$output .= LibrarySwitch($variables, "IR");
					} else {
						$converted = LibrarySwitch($variables, "IR");
						if(strpos($output, $converted) === false) {
							//echo " **".$converted."** ";
							$output .= ",".$converted;
						}
					}
				}
			}
		}
		return $output;
	}
	
	/*******************************************************************
	 *         addStrings(inputString, resultString)                   *
	 *******************************************************************
	 *  This is to combine all language & interest area into a string
	 *  seperated by commas. Filter all duplicates.
	 *  input:
	 *  inputString - a string or a list splited by commas(',')
	 *  resultString - a string to return. Updating this
	 *  output:
	 *  result - final string that combines all list
	 */
	function addStrings($inputString, $resultString) {
		$result = $resultString;
		$InputSplit = explode(",", $inputString);
		if(count($InputSplit) != 1) { // means it's got more than one
			foreach($InputSplit as $texts) {
				// check if output string has any variables
				if($texts != "" && $texts != " " && $texts != "\n") {
					if(preg_match("/[a-zA-Z0-9]+/", $texts)) {
						//echo " |_".$texts."_| ";
						if($result == "") { // if output string is empty
							$result .= $texts;
						} else { // if output string is not empty
							//echo "YYYYYYY".$result."YYYYYYY<br>";
							if(strpos($result, $texts) === false) {
								//echo " **".$texts."** ";
								$result .= ",".$texts;
							}
						}
					}
				}
			}
		} else { // means it's got only one
			if($inputString != "" && $inputString != " " && $inputString != "\n") {
				if(hasCharactor($inputString) != NULL) {
					if($result == "") { $result .= $inputString;
					} else { 
						if(strpos($result, $inputString) === false) {
							$result .= ",".$inputString; 
						}
					}
				}
			}
		}
		return $result;
	}
	
	/*******************************************************************
	 *                returnArray(inputString)                         *
	 *******************************************************************
	 *  This is to convert list of string that is splited by commas(',')
	 *  into an array of string
	 *  input:
	 *  inputString - a string or a list splited by commas(',')
	 *  output:
	 *  result - Array of string
	 */
	function returnArray($inputString) {
		$result = array();
		$InputSplit = explode(",", $inputString);
		if(count($InputSplit) != 1) { // means it's got more than one
			foreach($InputSplit as $texts) {
				if($texts != "" && $texts != " " && $texts != "\n") {
					//echo "->".$texts."<-<br>";
					if(preg_match("/[a-zA-Z0-9]+/", $texts)) {
						// check if output string has any variables
						if($result != "") {
							array_push($result, $texts);
						}
					}
				}
			}
		} else { // means it's got only one
			if($inputString != "") {
				array_push($result, $InputSplit[0]);
			}
		}
		return $result;
	}
	
	/*******************************************************************
	 *                hasCharactor(inputString)                        *
	 *******************************************************************
	 *  This is to check if input has a charactor
	 *  input:
	 *  inputString - a string
	 *  output:
	 *  return string itself / if it's have no charactors, return null.
	 */
	function hasCharactor($inputString) {
		if(preg_match("/[a-zA-Z0-9]+/", $inputString)) {
			return $inputString;
		} else {
			return NULL;
		}
	}

	/*******************************************************************
	 *         distance(FromLat, FromLng, ToLat, ToLng, Unit)          *
	 *******************************************************************
	 *  This is to get the distance in given unit.
	 *  input:
	 *  FromLat, FromLng (lat1, lon1) - geolocaiton of where it begins
	 *  ToLat, ToLng (lat2, lon2) - geolocaiton of destination
	 *  Unit - K or N as Kilometer or Mile
	 *  output:
	 *  distance in given unit
	 */
	function distance($lat1, $lon1, $lat2, $lon2, $unit) {
		$theta = $lon1 - $lon2;
		$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
		$dist = acos($dist);
		$dist = rad2deg($dist);
		$miles = $dist * 60 * 1.1515;
		$unit = strtoupper($unit);

		if ($unit == "K") {
			return ($miles * 1.609344);
		} else if ($unit == "N") {
			  return ($miles * 0.8684);
		} else {
				return $miles;
		}
	}

	/**
	  *  This is exclusive function for find-result page
	  *  $pageNum (current page number) will be considered to be here in this page
	  */
	function loopPageNumber($pageStart, $pageEnd, $pageNums, $optionStrings) {
		for($i = $pageStart; $i <= $pageEnd; $i++) {
			if($i == $pageNums) {echo '<div class="PagebuttonHighlight">'.$i.'</div>';}
			else {echo '<a href="'.$url.'?'.$optionStrings.'page='.$i.'"><div class="Pagebutton">'.$i.'</div></a>';}
		}
	}
?>
<?php
	// if session is empty (came here without values)
	// since lat is always set in anytime,
	// empty in SESSION['lat'] means session is not there.
	if(strpos($_SERVER['REQUEST_URI'], 'finda')) {
		unset($_SESSION['practiceName']);
		unset($_SESSION['state']);
		unset($_SESSION['treatment']);
		unset($_SESSION['language']);
		unset($_SESSION['distance']);
		unset($_SESSION['lat']);
		unset($_SESSION['lng']);
		unset($_SESSION['latCurrent']);
		unset($_SESSION['lngCurrent']);
		unset($_SESSION['userName']);
		unset($_SESSION['CurrentLocation']);
		unset($_SESSION['NumItem']);
		unset($_SESSION['ASCDESC']);
		unset($_SESSION['CrData']);
		unset($_SESSION['page']);
	}

	if(isset($_POST['userName'])) {
		$_SESSION['userName'] = $_POST['userName'];
	}
	
	if(isset($_POST['practiceName'])) {
		$_SESSION['practiceName'] = $_POST['practiceName'];
	}
	
	if(isset($_POST['state'])) {
		$_SESSION['state'] = $_POST['state'];
	}

	if(isset($_POST['stateComp'])) {
		$_SESSION['stateComp'] = $_POST['stateComp'];
	}if(isset($_GET['stateComp'])) {
		$_SESSION['stateComp'] = $_GET['stateComp'];
	}
	if(isset($_POST['suburbComp'])) {
		$_SESSION['suburbComp'] = $_POST['suburbComp'];
	}if(isset($_GET['suburbComp'])) {
		$_SESSION['suburbComp'] = $_GET['suburbComp'];
	}
	if(isset($_POST['postcodeComp'])) {
		$_SESSION['postcodeComp'] = $_POST['postcodeComp'];
	}if(isset($_GET['postcodeComp'])) {
		$_SESSION['postcodeComp'] = $_GET['postcodeComp'];
	}
	if(isset($_POST['UserLocationHere'])) {
		$_SESSION['UserLocationHere'] = $_POST['UserLocationHere'];
	}

	if(isset($_POST['stateComp'])) {
		if($_POST['stateComp'] != "" || $_POST['stateComp'] != "undefined") {
			$latsCom = "";
			$lngsCom = "";
			try {
                //$dbt = new PDO('mysql:host=localhost;dbname=c0FindPhysio', 'c0FindAPhysio', 'jc4X2ERLpn_');
                $dbt = new PDO('mysql:host=localhost;dbname=findaphysio', 'c0DefaultMain', 'Apa2017Config');
				$latlng = $dbt->prepare('SELECT * FROM locSearch WHERE Suburb = :suburbC AND State = :stateC AND Pcode = :pCodeC');
				$latlng->bindValue(':stateC', $_POST['stateComp']);
				$latlng->bindValue(':suburbC', $_POST['suburbComp']);
				$latlng->bindValue(':pCodeC', $_POST['postcodeComp']);
				$latlng->execute();
				foreach ($latlng as $row) {
					$lngsCom = $row['Lat'];
					$latsCom = $row['Lng'];
					break;
				}
				$latlng->closeCursor(); // this is not even required
				$latlng = null; // doing this is mandatory for connection to get closed
				$dbt = null;
			} catch (PDOException $e) {
				print "Error!: " . $e->getMessage() . "<br/>";
				die();
			}
			if($latsCom == "") {
				if(isset($_POST['lat'])) {
					$_SESSION['lat'] = $_POST['lat'];
				}
				if(isset($_POST['lng'])) {
					$_SESSION['lng'] = $_POST['lng'];
				}				
			} else {
				$_SESSION['lat'] = $latsCom;
				$_SESSION['lng'] = $lngsCom;
			}
		} else {
			if(isset($_POST['lat'])) {
				$_SESSION['lat'] = $_POST['lat'];
			}
			if(isset($_POST['lng'])) {
				$_SESSION['lng'] = $_POST['lng'];
			}
		}
	} else {
		if(isset($_POST['lat'])) {
			$_SESSION['lat'] = $_POST['lat'];
		}
		if(isset($_POST['lng'])) {
			$_SESSION['lng'] = $_POST['lng'];
		}
	}
	
	if(isset($_POST['lngCurrent'])) {
		$_SESSION['lngCurrent'] = $_POST['lngCurrent'];
	}
	
	if(isset($_POST['distance'])) {
		$_SESSION['distance'] = $_POST['distance'];
	}
	if(isset($_GET['distance'])) {
		$_SESSION['distance'] = $_GET['distance'];
	}
	if(isset($_GET['NumItem'])) {
		$_SESSION['NumItem'] = $_GET['NumItem'];
	}
	if(isset($_GET['ASCDESC'])) {
		$_SESSION['ASCDESC'] = $_GET['ASCDESC'];
	}
	if(isset($_GET['CrData'])) {
		$_SESSION['CrData'] = $_GET['CrData'];
	}
	if(isset($_GET['page'])) {
		$_SESSION['page'] = $_GET['page'];
	}
	if(isset($_POST['latCurrent'])) {
		$_SESSION['latCurrent'] = $_POST['latCurrent'];
		if($_POST['latCurrent'] == $_POST['lat']) {
			$_SESSION['CurrentLocation'] = true;
		} else {
			$_SESSION['CurrentLocation'] = false;
		}
	}
	
	if(isset($_POST['language'])) {
		$_SESSION['language'] = $_POST['language'];
		$_SESSION['hasOption'] = TRUE;
	} else {
		$_SESSION['hasOption'] = FALSE;
	}
	if(isset($_GET['language'])) {
		$_SESSION['language'] = $_GET['language'];
		$_SESSION['hasOption'] = TRUE;
		if($_GET['language'] == "00") {
			unset($_SESSION["language"]);
		}
	} else {
		$_SESSION['hasOption'] = FALSE;
	}
	
	if(isset($_POST['treatment'])) {
		$_SESSION['treatment'] = $_POST['treatment'];
		$_SESSION['hasOption'] = true;
	} else {
		$_SESSION['hasOption'] = FALSE;
	}
	if(isset($_GET['treatment'])) {
		$_SESSION['treatment'] = $_GET['treatment'];
		$_SESSION['hasOption'] = true;
		if($_GET['treatment'] == "00") {
			unset($_SESSION["treatment"]);
		}
	} else {
		$_SESSION['hasOption'] = FALSE;
	}
  ?>
	<?php
		
		function array_msort($array, $cols) {
			$colarr = array();
			foreach ($cols as $col => $order) {
				$colarr[$col] = array();
				foreach ($array as $k => $row) { $colarr[$col]['_'.$k] = strtolower($row[$col]); }
			}
			$eval = 'array_multisort(';
			foreach ($cols as $col => $order) {
				$eval .= '$colarr[\''.$col.'\'],'.$order.',';
			}
			$eval = substr($eval,0,-1).');';
			eval($eval);
			$ret = array();
			/* custom code */
			$countHere = 0;
			/* custom code */
			foreach ($colarr as $col => $arr) {
				foreach ($arr as $k => $v) {
					$countHere += 1;
					$k = substr($k,1);
					if (!isset($ret[$k])) $ret[$k] = $array[$k];
					$ret[$k][$col] = $array[$k][$col];
					if($countHere == 80) break;
				}
			}
			return $ret;
		}
		
		function arraySort($array, $value, $ASCDESC) {
			$resultArray = $array;
			$ordering = SORT_ASC;
			if($ASCDESC != 'ASC') { $ordering = SORT_DESC; }
			$pagers = array_msort($array, array($value =>$ordering));
			return $pagers;
		}
	?>
<div id="LATvalue" style="display: none;"><?php echo $_SESSION["lat"]; ?></div>
<div id="LNGvalue" style="display: none;"><?php echo $_SESSION["lng"]; ?></div>
<!-- Container for image -->
			<div id="banner">					
				<div id="map-canvas" style="width: 100%; height: 400px" ></div>
			</div><!-- end of #sidebar -->
			
			<!-- Container for content (overall layout) -->
			<div id="page" class="container">
			
			<!-- Content of the page -->	
			<div id="content">
<?php if(isset($_SESSION['CurrentLocation'])) echo '<div style="display:none">yes!</div>'; ?>
<?php if(isset($_SESSION['CurrentLocation'])) echo '<div style="display:none">latCu: '.$_SESSION['latCurrent'].'</div>'; ?>
<?php if(isset($_SESSION['CurrentLocation'])) echo '<div style="display:none">LngCu: '.$_SESSION['lngCurrent'].'</div>'; ?>
				<a href="/findaphysio"><div class="backButton">< GO BACK</div></a>
				<div class="clearfix-FAP"></div>
				<h2 style="font-size: 38px; margin: 0 25px 15px 0;">Search results</h2>
				<div class="clearfix-FAP"></div>
				<?php 
				/// need to combine this with park
					$array = array();
					$numResult = 0;
					try {
                        $db = new PDO('mysql:host=localhost;dbname=findaphysio', 'c0DefaultMain', 'Apa2017Config');
						//$db = new PDO('mysql:host=localhost;dbname=c0FindPhysio', 'c0FindAPhysio', 'jc4X2ERLpn_');
						
						$distSet = true;
						if(isset($_SESSION['practiceName'])) {
							if($_SESSION['practiceName'] != "") {
								$distSet = false;
								if(isset($_SESSION['state'])) { // Find practice with 'name' in 'state'
									$stmt = $db->prepare('SELECT * FROM practicesearch WHERE PracticeName LIKE :practicenamepre AND State LIKE :practicettatepre');
									$stmt->bindValue(':practicenamepre', "%".$_SESSION['practiceName']."%");
									$stmt->bindValue(':practicettatepre', "%".$_SESSION['state']."%");
									$stmt->execute();
								} else { // Find practice with 'name' in national wise
									$stmt = $db->prepare('SELECT * FROM practicesearch WHERE PracticeName LIKE :practicenamepre');
									$stmt->bindValue(':practicenamepre', "%".$_SESSION['practiceName']."%");
									$stmt->execute();
								}
							} elseif($_SESSION['userName'] != "" && isset($_SESSION['userName'])) {
								$distSet = false;
								if(isset($_SESSION['state'])) { // Find practice with 'name' in 'state'
									$userNameArray = explode( ' ', $_SESSION['userName'] );
									if(sizeof($userNameArray) == 2) {
										$userS = $db->prepare('SELECT * FROM physio WHERE FirstName LIKE :firstname AND LastName LIKE :lastname');
										$userS->bindValue(':firstname', "%".$userNameArray[0]."%");
										$userS->bindValue(':lastname', "%".$userNameArray[1]."%");
									} else if(sizeof($userNameArray) > 2) {
										$userS = $db->prepare('SELECT * FROM physio WHERE FirstName LIKE :firstname OR LastName LIKE :lastname OR LastName LIKE :lastnameTwo');
										$userS->bindValue(':firstname', "%".$userNameArray[0]."%");
										$userS->bindValue(':lastname', "%".$userNameArray[1]."%");
										$userS->bindValue(':lastnameTwo', "%".$userNameArray[2]."%");
									} else {
										$userS = $db->prepare('SELECT * FROM physio WHERE FirstName LIKE :firstname OR LastName LIKE :lastname');
										$userS->bindValue(':firstname', "%".$_SESSION['userName']."%");
										$userS->bindValue(':lastname', "%".$_SESSION['userName']."%");
									}
									$userS->execute();
									$userList = array();
									foreach ($userS as $row) {
										array_push($userList,$row['UserID']);
									}
									$stmt = $db->prepare('Select * from practicesearch WHERE  State LIKE :practicettatepre');
									$stmt ->bindValue(':practicettatepre', "%".$_SESSION['state']."%");
									$stmt->execute();
									/**
									 *  for each 'practiceSearch', match UID and output data
									 *  in array. ($array)
									 */
									if(isset($_SESSION['language'])) {
										foreach ($stmt as $row) {
											$arrayUser = array();
											$distanceV = number_format(distance($_SESSION["lat"],$_SESSION["lng"], $row['Lat'], $row['Lng'], "k"), 2, '.', '');
											//echo $distanceV."<br/>";
											$arr = returnArray($row['Language']);
											if(in_array($_SESSION['language'],$arr)) { // to filter matching words (ex> "M" from "MA")
												$arrayUser = returnArray($row['UIDSet']);
												foreach($arrayUser as $users) {
													if(in_array($users, $userList)) {
														$arrayM = array('PracticeID' => $row['PID'], 'PracticeName' => $row['PracticeName'], 'Address1' => $row['Address1'], 'Address2' => $row['Address2'], 'Address3' => $row['Address3'], 'City' => $row['City'], 'State' => $row['State'], 'Postcode' => $row['Postcode'], 'Phone' => $row['Phone'], 'Email' => $row['Email'], 'Website' => $row['Website'], 'distance' => $distanceV, 'Lat' => $row['Lat'], 'Lon' => $row['Lng']  );
														array_push($array, $arrayM);
													}
												}
											}
										}
									} else {
										foreach ($stmt as $row) {
											$arrayUser = array();
											$distanceV = number_format(distance($_SESSION["lat"],$_SESSION["lng"], $row['Lat'], $row['Lng'], "k"), 2, '.', '');
											//echo $distanceV."<br/>";
											$arrayUser = returnArray($row['UIDSet']);
											foreach($arrayUser as $users) {
												if(in_array($users, $userList)) {
													$arrayM = array('PracticeID' => $row['PID'], 'PracticeName' => $row['PracticeName'], 'Address1' => $row['Address1'], 'Address2' => $row['Address2'], 'Address3' => $row['Address3'], 'City' => $row['City'], 'State' => $row['State'], 'Postcode' => $row['Postcode'], 'Phone' => $row['Phone'], 'Email' => $row['Email'], 'Website' => $row['Website'], 'distance' => $distanceV, 'Lat' => $row['Lat'], 'Lon' => $row['Lng']  );
													array_push($array, $arrayM);
												}
											}
										}	
									}
								} else { // Find practice with 'name' in national wise
									$userNameArray = explode( ' ', $_SESSION['userName'] );
									if(sizeof($userNameArray) == 2) {
										$userS = $db->prepare('SELECT * FROM physio WHERE FirstName LIKE :firstname AND LastName LIKE :lastname');
										$userS->bindValue(':firstname', "%".$userNameArray[0]."%");
										$userS->bindValue(':lastname', "%".$userNameArray[1]."%");
									} else if(sizeof($userNameArray) > 2) {
										$userS = $db->prepare('SELECT * FROM physio WHERE FirstName LIKE :firstname OR LastName LIKE :lastname OR LastName LIKE :lastnameTwo');
										$userS->bindValue(':firstname', "%".$userNameArray[0]."%");
										$userS->bindValue(':lastname', "%".$userNameArray[1]."%");
										$userS->bindValue(':lastnameTwo', "%".$userNameArray[2]."%");
									} else {
										$userS = $db->prepare('SELECT * FROM physio WHERE FirstName LIKE :firstname OR LastName LIKE :lastname');
										$userS->bindValue(':firstname', "%".$_SESSION['userName']."%");
										$userS->bindValue(':lastname', "%".$_SESSION['userName']."%");
									}
									$userS->execute();
									$userList = array();
									foreach ($userS as $row) {
										array_push($userList,$row['UserID']);
									}
									$stmt = $db->prepare('Select * from practicesearch');
									$stmt->execute();
									/**
									 *  for each 'practiceSearch', match UID and output data
									 *  in array. ($array)
									 */
									if(isset($_SESSION['language'])) {
										foreach ($stmt as $row) {
											$arrayUser = array();
											$distanceV = number_format(distance($_SESSION["lat"],$_SESSION["lng"], $row['Lat'], $row['Lng'], "k"), 2, '.', '');
											//echo $distanceV."<br/>";
											$arr = returnArray($row['Language']);
											if(in_array($_SESSION['language'],$arr)) { // to filter matching words (ex> "M" from "MA")
												$arrayUser = returnArray($row['UIDSet']);
												foreach($arrayUser as $users) {
													if(in_array($users, $userList)) {
														$arrayM = array('PracticeID' => $row['PID'], 'PracticeName' => $row['PracticeName'], 'Address1' => $row['Address1'], 'Address2' => $row['Address2'], 'Address3' => $row['Address3'], 'City' => $row['City'], 'State' => $row['State'], 'Postcode' => $row['Postcode'], 'Phone' => $row['Phone'], 'Email' => $row['Email'], 'Website' => $row['Website'], 'distance' => $distanceV, 'Lat' => $row['Lat'], 'Lon' => $row['Lng']  );
														array_push($array, $arrayM);
													}
												}
											}
										}
									} else {
										foreach ($stmt as $row) {
											$arrayUser = array();
											$distanceV = number_format(distance($_SESSION["lat"],$_SESSION["lng"], $row['Lat'], $row['Lng'], "k"), 2, '.', '');
											//echo $distanceV."<br/>";
											$arrayUser = returnArray($row['UIDSet']);
											foreach($arrayUser as $users) {
												if(in_array($users, $userList)) {
													$arrayM = array('PracticeID' => $row['PID'], 'PracticeName' => $row['PracticeName'], 'Address1' => $row['Address1'], 'Address2' => $row['Address2'], 'Address3' => $row['Address3'], 'City' => $row['City'], 'State' => $row['State'], 'Postcode' => $row['Postcode'], 'Phone' => $row['Phone'], 'Email' => $row['Email'], 'Website' => $row['Website'], 'distance' => $distanceV, 'Lat' => $row['Lat'], 'Lon' => $row['Lng']  );
													array_push($array, $arrayM);
												}
											}
										}	
									}
								}
							} else {
								if(isset($_SESSION['state'])) { // This will be 'static state' page
									header("Location: Error.php");
									exit;
								} elseif(isset($_SESSION['language']) || isset($_SESSION['treatment'])) { // when options are selected
									if(!isset($_SESSION['language'])) { // for treatment only
										$stmt = $db->prepare('Select * from practicesearch WHERE Interest LIKE :interest');
										$stmt->bindValue(':interest', "%".$_SESSION['treatment']."%");
									} elseif(!isset($_SESSION['treatment'])) { // for language only
										$stmt = $db->prepare('Select * from practicesearch WHERE Language LIKE :language');
										$stmt->bindValue(':language', "%".$_SESSION['language']."%");
									} else { // for when both options are selected
										$stmt = $db->prepare('Select * from practicesearch WHERE Interest LIKE :interest AND Language LIKE :language');
										$stmt->bindValue(':interest', "%".$_SESSION['treatment']."%");
										$stmt->bindValue(':language', "%".$_SESSION['language']."%");
									}
									$stmt->execute();
								} else { // when nothing is selected (use location)
									echo "<div style='display: none;'>Yo</div>";
									$stmt = $db->prepare('Select * from practicesearch');
									$stmt->execute();
								}
							}
						} elseif(isset($_SESSION['userName'])) {
							if($_SESSION['userName'] != "") {
								$distSet = false;
								if(isset($_SESSION['state'])) { // Find practice with 'name' in 'state'
									$userS = $db->prepare('SELECT * FROM physio WHERE (FirstName LIKE :firstname OR LastName LIKE :lastname) AND State LIKE :practicettatepre');
									$userS->bindValue(':firstname', "%".$_SESSION['userName']."%");
									$userS->bindValue(':lastname', "%".$_SESSION['userName']."%");
									$userS->bindValue(':practicettatepre', "%".$_SESSION['state']."%");
									$userS->execute();
									$userList = array();
									foreach ($userS as $row) {
										array_push($userList,$row['UserID']);
									}
									$stmt = $db->prepare('Select * from practicesearch');
									$stmt->execute();
									/**
									 *  for each 'practiceSearch', match UID and output data
									 *  in array. ($array)
									 */
									if(isset($_SESSION['language'])) {
										foreach ($stmt as $row) {
											$arrayUser = array();
											$distanceV = number_format(distance($_SESSION["lat"],$_SESSION["lng"], $row['Lat'], $row['Lng'], "k"), 2, '.', '');
											//echo $distanceV."<br/>";
											$arr = returnArray($row['Language']);
											if(in_array($_SESSION['language'],$arr)) { // to filter matching words (ex> "M" from "MA")
												$arrayUser = returnArray($row['UIDSet']);
												foreach($arrayUser as $users) {
													if(in_array($users, $userList)) {
														$arrayM = array('PracticeID' => $row['PID'], 'PracticeName' => $row['PracticeName'], 'Address1' => $row['Address1'], 'Address2' => $row['Address2'], 'Address3' => $row['Address3'], 'City' => $row['City'], 'State' => $row['State'], 'Postcode' => $row['Postcode'], 'Phone' => $row['Phone'], 'Email' => $row['Email'], 'Website' => $row['Website'], 'distance' => $distanceV, 'Lat' => $row['Lat'], 'Lon' => $row['Lng']  );
														array_push($array, $arrayM);
													}
												}
											}
										}
									} else {
										foreach ($stmt as $row) {
											$arrayUser = array();
											$distanceV = number_format(distance($_SESSION["lat"],$_SESSION["lng"], $row['Lat'], $row['Lng'], "k"), 2, '.', '');
											//echo $distanceV."<br/>";
											$arrayUser = returnArray($row['UIDSet']);
											foreach($arrayUser as $users) {
												if(in_array($users, $userList)) {
													$arrayM = array('PracticeID' => $row['PID'], 'PracticeName' => $row['PracticeName'], 'Address1' => $row['Address1'], 'Address2' => $row['Address2'], 'Address3' => $row['Address3'], 'City' => $row['City'], 'State' => $row['State'], 'Postcode' => $row['Postcode'], 'Phone' => $row['Phone'], 'Email' => $row['Email'], 'Website' => $row['Website'], 'distance' => $distanceV, 'Lat' => $row['Lat'], 'Lon' => $row['Lng']  );
													array_push($array, $arrayM);
												}
											}
										}	
									}
								} else { // Find practice with 'name' in national wise
									$userS = $db->prepare('SELECT * FROM physio WHERE FirstName LIKE :firstname OR LastName LIKE :lastname');
									$userS->bindValue(':firstname', "%".$_SESSION['userName']."%");
									$userS->bindValue(':lastname', "%".$_SESSION['userName']."%");
									$userS->execute();
									$userList = array();
									foreach ($userS as $row) {
										array_push($userList,$row['UserID']);
									}
									$stmt = $db->prepare('Select * from practicesearch');
									$stmt->execute();
									/**
									 *  for each 'practiceSearch', match UID and output data
									 *  in array. ($array)
									 */
									if(isset($_SESSION['language'])) {
										foreach ($stmt as $row) {
											$arrayUser = array();
											$distanceV = number_format(distance($_SESSION["lat"],$_SESSION["lng"], $row['Lat'], $row['Lng'], "k"), 2, '.', '');
											//echo $distanceV."<br/>";
											$arr = returnArray($row['Language']);
											if(in_array($_SESSION['language'],$arr)) { // to filter matching words (ex> "M" from "MA")
												$arrayUser = returnArray($row['UIDSet']);
												foreach($arrayUser as $users) {
													if(in_array($users, $userList)) {
														$arrayM = array('PracticeID' => $row['PID'], 'PracticeName' => $row['PracticeName'], 'Address1' => $row['Address1'], 'Address2' => $row['Address2'], 'Address3' => $row['Address3'], 'City' => $row['City'], 'State' => $row['State'], 'Postcode' => $row['Postcode'], 'Phone' => $row['Phone'], 'Email' => $row['Email'], 'Website' => $row['Website'], 'distance' => $distanceV, 'Lat' => $row['Lat'], 'Lon' => $row['Lng']  );
														array_push($array, $arrayM);
													}
												}
											}
										}
									} else {
										foreach ($stmt as $row) {
											$arrayUser = array();
											$distanceV = number_format(distance($_SESSION["lat"],$_SESSION["lng"], $row['Lat'], $row['Lng'], "k"), 2, '.', '');
											//echo $distanceV."<br/>";
											$arrayUser = returnArray($row['UIDSet']);
											foreach($arrayUser as $users) {
												if(in_array($users, $userList)) {
													$arrayM = array('PracticeID' => $row['PID'], 'PracticeName' => $row['PracticeName'], 'Address1' => $row['Address1'], 'Address2' => $row['Address2'], 'Address3' => $row['Address3'], 'City' => $row['City'], 'State' => $row['State'], 'Postcode' => $row['Postcode'], 'Phone' => $row['Phone'], 'Email' => $row['Email'], 'Website' => $row['Website'], 'distance' => $distanceV, 'Lat' => $row['Lat'], 'Lon' => $row['Lng']  );
													array_push($array, $arrayM);
												}
											}
										}	
									}
								}
							} else {
								if(isset($_SESSION['state'])) { // This will be 'static state' page
									header("Location: Error.php");
									exit;
								} elseif(isset($_SESSION['language']) || isset($_SESSION['treatment'])) { // when options are selected
									if(!isset($_SESSION['language'])) { // for treatment only
										$stmt = $db->prepare('Select * from practicesearch WHERE Interest LIKE :interest');
										$stmt->bindValue(':interest', "%".$_SESSION['treatment']."%");
									} elseif(!isset($_SESSION['treatment'])) { // for language only
										$stmt = $db->prepare('Select * from practicesearch WHERE Language LIKE :language');
										$stmt->bindValue(':language', "%".$_SESSION['language']."%");
									} else { // for when both options are selected
										$stmt = $db->prepare('Select * from practicesearch WHERE Interest LIKE :interest AND Language LIKE :language');
										$stmt->bindValue(':interest', "%".$_SESSION['treatment']."%");
										$stmt->bindValue(':language', "%".$_SESSION['language']."%");
									}
									$stmt->execute();
								} else { // when nothing is selected (use location)
									$stmt = $db->prepare('Select * from practicesearch');
									$stmt->execute();
								}
							}
						} elseif(isset($_SESSION['state'])) { // This will be 'static state' page
							header("Location: Error.php");
							exit;
						} elseif(isset($_SESSION['language']) || isset($_SESSION['treatment'])) { // when options are selected
							/*
							$stmt = $db->prepare('Select * from practicesearch WHERE Interest LIKE :interest OR Language LIKE :language');
							$stmt->bindValue(':interest', "%".$_SESSION['treatment']."%");
							$stmt->bindValue(':language', "%".$_SESSION['language']."%");
							*/
							$stmt = $db->prepare('Select * from practicesearch');
							$stmt->execute();
						} else { // when nothing is selected & no options
							$stmt = $db->prepare('Select * from practicesearch');
							$stmt->execute();
						}
						///echo "<b>row processed through database count:</b> ".$stmt->rowCount()."<br/>";
						$numResult = $stmt->rowCount();
						$latPoint = $_SESSION["lat"];
						$lngPoint = $_SESSION["lng"];
						$CrData = "";
						$arrayEM = array();
						if($distSet) {
							if(isset($_SESSION['language'])) { 
								foreach ($stmt as $row) {
									$distanceV = number_format(distance($latPoint,$lngPoint, $row['Lat'], $row['Lng'], "k"), 2, '.', '');
									//echo $distanceV."<br/>";
									$arr = returnArray($row['Language']);
									if(in_array($_SESSION['language'],$arr)) { // to filter matching words (ex> "M" from "MA")
										if(isset($_SESSION["distance"])) {
											if((int)$_SESSION["distance"] >= (int)$distanceV) {
												$arrayM = array('PracticeID' => $row['PID'], 'PracticeName' => $row['PracticeName'], 'Address1' => $row['Address1'], 'Address2' => $row['Address2'], 'Address3' => $row['Address3'], 'City' => $row['City'], 'State' => $row['State'], 'Postcode' => $row['Postcode'], 'Phone' => $row['Phone'], 'Email' => $row['Email'], 'Website' => $row['Website'], 'distance' => $distanceV, 'Lat' => $row['Lat'], 'Lon' => $row['Lng']  );
												array_push($arrayEM, $arrayM);
											}
										} else {
											if((int)$distanceV <= 5) {
												$arrayM = array('PracticeID' => $row['PID'], 'PracticeName' => $row['PracticeName'], 'Address1' => $row['Address1'], 'Address2' => $row['Address2'], 'Address3' => $row['Address3'], 'City' => $row['City'], 'State' => $row['State'], 'Postcode' => $row['Postcode'], 'Phone' => $row['Phone'], 'Email' => $row['Email'], 'Website' => $row['Website'], 'distance' => $distanceV, 'Lat' => $row['Lat'], 'Lon' => $row['Lng']  );
												array_push($arrayEM, $arrayM);
											}
										}
									}
								}
							} else {
								foreach ($stmt as $row) {
									$distanceV = number_format(distance($latPoint,$lngPoint, $row['Lat'], $row['Lng'], "k"), 2, '.', '');
									//echo $distanceV."<br/>";
									if(isset($_SESSION["distance"])) {
										if((int)$_SESSION["distance"] >= (int)$distanceV) {
											$arrayM = array('PracticeID' => $row['PID'], 'PracticeName' => $row['PracticeName'], 'Address1' => $row['Address1'], 'Address2' => $row['Address2'], 'Address3' => $row['Address3'], 'City' => $row['City'], 'State' => $row['State'], 'Postcode' => $row['Postcode'], 'Phone' => $row['Phone'], 'Email' => $row['Email'], 'Website' => $row['Website'], 'distance' => $distanceV, 'Lat' => $row['Lat'], 'Lon' => $row['Lng']  );
											array_push($arrayEM, $arrayM);
										}
									} else {
										if((int)$distanceV <= 5) {
											$arrayM = array('PracticeID' => $row['PID'], 'PracticeName' => $row['PracticeName'], 'Address1' => $row['Address1'], 'Address2' => $row['Address2'], 'Address3' => $row['Address3'], 'City' => $row['City'], 'State' => $row['State'], 'Postcode' => $row['Postcode'], 'Phone' => $row['Phone'], 'Email' => $row['Email'], 'Website' => $row['Website'], 'distance' => $distanceV, 'Lat' => $row['Lat'], 'Lon' => $row['Lng']  );
											array_push($arrayEM, $arrayM);
										}
									}
								}

							}
						} else {
							if(isset($_SESSION['language'])) { 
								foreach ($stmt as $row) {
									$distanceV = number_format(distance($latPoint,$lngPoint, $row['Lat'], $row['Lng'], "k"), 2, '.', '');
									//echo $distanceV."<br/>";
									$arr = returnArray($row['Language']);
									if(in_array($_SESSION['language'],$arr)) { // to filter matching words (ex> "M" from "MA")
										$arrayM = array('PracticeID' => $row['PID'], 'PracticeName' => $row['PracticeName'], 'Address1' => $row['Address1'], 'Address2' => $row['Address2'], 'Address3' => $row['Address3'], 'City' => $row['City'], 'State' => $row['State'], 'Postcode' => $row['Postcode'], 'Phone' => $row['Phone'], 'Email' => $row['Email'], 'Website' => $row['Website'], 'distance' => $distanceV, 'Lat' => $row['Lat'], 'Lon' => $row['Lng']  );
										array_push($arrayEM, $arrayM);
									}
								}
							} else {
								foreach ($stmt as $row) {
									$distanceV = number_format(distance($latPoint,$lngPoint, $row['Lat'], $row['Lng'], "k"), 2, '.', '');
									//echo $distanceV."<br/>";
									$arrayM = array('PracticeID' => $row['PID'], 'PracticeName' => $row['PracticeName'], 'Address1' => $row['Address1'], 'Address2' => $row['Address2'], 'Address3' => $row['Address3'], 'City' => $row['City'], 'State' => $row['State'], 'Postcode' => $row['Postcode'], 'Phone' => $row['Phone'], 'Email' => $row['Email'], 'Website' => $row['Website'], 'distance' => $distanceV, 'Lat' => $row['Lat'], 'Lon' => $row['Lng']  );
									array_push($arrayEM, $arrayM);
								}
							}
						}
						if(isset($_GET["CrData"]) && $_GET["CrData"] == "y") {
							if(isset($_SESSION['CurrentLocation'])) {
								$latPoint = $_SESSION['latCurrent'];
								$lngPoint = $_SESSION['lngCurrent'];
							}
							$CrData = "y";
						}
						foreach ($arrayEM as $row) {
							$distanceV = number_format(distance($latPoint,$lngPoint, $row['Lat'], $row['Lon'], "k"), 2, '.', '');
							$arrayM = array('PracticeID' => $row['PracticeID'], 'PracticeName' => $row['PracticeName'], 'Address1' => $row['Address1'], 'Address2' => $row['Address2'], 'Address3' => $row['Address3'], 'City' => $row['City'], 'State' => $row['State'], 'Postcode' => $row['Postcode'], 'Phone' => $row['Phone'], 'Email' => $row['Email'], 'Website' => $row['Website'], 'distance' => $distanceV, 'Lat' => $row['Lat'], 'Lon' => $row['Lon']  );
							array_push($array, $arrayM);
						}
						$stmt->closeCursor(); // this is not even required
						$stmt = null; // doing this is mandatory for connection to get closed
						$db = null;
						
						////echo '<div style="margin: 15px 0;"><b>After within distance:</b> '.sizeof($array).'</div>';
						
						/*
						$pre = $db->prepare('SELECT * FROM Practice WHERE PracticeName = :practicenamepre AND Address1= :address1pre');
						$pre->bindParam(':practicenamepre', $practicenamepre);
						$pre->bindParam(':address1pre', $address1pre);
						foreach($result as $outp) {
							$practicenamepre = $outp[0];
							$address1pre = $outp[1];
							$pre->execute();
							if($pre->rowCount() <= 0) {
								$practicename = $outp[0];
								$address1 = $outp[1];
								$address2 = $outp[2];
								$address3 = $outp[3];
								$city = $outp[4];
								$state = $outp[5];
								$postcode = $outp[6];
								$email = $outp[7];
								$website = $outp[8];
								$phone = $outp[9];
								$lat = $outp[11];
								$language = $outp[10];
								$lon = $outp[12];
								$qep = $outp[13];
								$interest = $outp[14];
								$epc = $outp[15];
								$rebate = $outp[16];
								$dva = $outp[17];
								$comp = $outp[18];
								$motor = $outp[19];
								$hicaps = $outp[20];
								$healthpoint = $outp[21];
								$painportal = $outp[22];
								$stmt->execute();
							}
						}
						*/
					} catch (PDOException $e) {
						print "Error!: " . $e->getMessage() . "<br/>";
						die();
					}
				/// */

					$url =  "//{$_SERVER['HTTP_HOST']}/find-result";
					$order_set = "";
					$ItemNumber_set = "";
					
					/* sort items */
					if(isset($_GET["ASCDESC"])) {
						if($_GET["ASCDESC"] != null) {
							$pagers = arraySort($array, 'PracticeName' ,$_GET["ASCDESC"]);
							if($_GET["ASCDESC"] == "ASC") { $order_set = "AS";
							} else { $order_set = "DS"; }
						}
					} else {
						$pagers = array_msort($array, array('distance'=>SORT_ASC));
					}

					$numContent = sizeof($pagers);
					///echo '<div style="margin: 15px 0;"><b>After Ordered by distance:</b> '.$numContent.'</div>';
					echo '<h4 style="color: rgb(0,66,80); font-weight: 500;">Results total: '.$numContent.'</h4>';
					echo '<div class="resultWrapper">';
					
					/* pager variables */
					$BeginPoint = 0;
					if(isset($_GET["NumItem"])) {
						if($_GET["NumItem"] == "12") {
							$BeginPoint = 12;
							$ItemNumber_set = $_GET["NumItem"]."";
							$Value_max = 12;
							$Value_start = 1;
							if($numContent <= 12) {
								$PageItem = 1;
							} else {
								$PageItem = ($numContent / 12) + 1;
							}
						} else {
							$BeginPoint = 6;
							$ItemNumber_set = $_GET["NumItem"]."";
							$Value_max = 6;
							$Value_start = 1;
							if($numContent <= 6) {
								$PageItem = 1;
							} else {
								$PageItem = ($numContent / 6) + 1;
							}
						}
						
					} else {
						$BeginPoint = 6;
						$Value_max = 6;
						$Value_start = 1;
						if($numContent <= 6) {
							$PageItem = 1;
						} else {
							$PageItem = ($numContent / 6) + 1;
						}
					}
					$PageItem = (int)($PageItem);
					
					if(isset($_GET["page"])) { 
						$pageNums = $_GET["page"];
						$Value_start = ($Value_max * ($_GET["page"]-1)) + 1;
						$Value_max = $Value_max * $_GET["page"];
					} else {
						$pageNums = 1;
					}
					
					/* page construct */
					echo '<div class="clearfix-FAP"></div>';
					$counter = 0;
					$MapCounter = 0;
					
					///////////////////////////////////////////////
					$NameOrderVal = 0;
					$NumOptionVal = true;
					if(isset($_GET['ASCDESC'])){if($_GET["ASCDESC"] == "ASC") $NameOrderVal = 1; else $NameOrderVal = 2;}
					if(isset($_GET['NumItem'])){if($_GET["NumItem"] == "6") $NumOptionVal = true; else $NumOptionVal = false;}
					///////////////////////////////////////////////
					echo '<div class="optiontools"><div class="optionValue options"><h3>Filter by:</h3>';
					$distSett = "5";
					if(!isset($_SESSION['practiceName']) || $_SESSION['practiceName'] == "") {
						if(isset($_SESSION['distance'])) {
							$distSett = $_SESSION['distance'];
						}
						$distOption = "";
						$distOption .= '<select id="distanceT" name="distanceT">
							<option value="0" disabled>Distance</option>
							<option value="1"';
						if($distSett == "1") $distOption .= ' selected ';
						$distOption .= '> 1 Km </option>
							<option value="5"';
						if($distSett == "5") $distOption .= ' selected ';
						$distOption .= '> 5 Km </option>
							<option value="10"';
						if($distSett == "10") $distOption .= ' selected ';
						$distOption .= '> 10 Km </option>
							<option value="50"';
						if($distSett == "50") $distOption .= ' selected ';
						$distOption .= '> 50 Km </option>
							<option value="100"';
						if($distSett == "100") $distOption .= ' selected ';
						$distOption .= '> 100 Km </option>
						</select>';
						echo $distOption;
					}
					/*
					echo '<select id="treatmentT" name="treatmentT">
						<option value="0" selected disabled>Treatment area</option>
						<option value="00"> Exclude treatment option </option>
						<option value="ACU"> Acupuncture and dry needling </option>
						<option value="ADO"> Adolescents </option>
						<option value="AGE"> Ageing well </option>
						<option value="AMP"> Amputees </option>
						<option value="ART"> Arthritis </option>
						<option value="CHILD"> Babies and children </option>
						<option value="BAN"> Back and neck </option>
						<option value="BAB"> Bowel and bladder health </option>
						<option value="BRAIN"> Brain and spinal cord </option>
						<option value="LYM"> Cancer and lympheodema </option>
						<option value="PAIN"> Chronic pain </option>
						<option value="DIS"> Disability </option>
						<option value="DIA"> Diabetes </option>
						<option value="HAF"> Head and face </option>
						<option value="HAW"> Health at work </option>
						<option value="HEART"> Heart and lung health </option>
						<option value="HYDRO"> Hydrotherapy </option>
						<option value="LLI"> Lower limbs (leg, from hip to foot) </option>
						<option value="MEN"> Men’s health </option>
						<option value="NEU"> Neurological conditions </option>
						<option value="ORTHO"> Orthopaedics </option>
						<option value="PAL"> Palliative care </option>
						<option value="PIL"> Pilates </option>
						<option value="NATAL"> Pre and post-natal </option>
						<option value="SURG"> Pre and post-surgery </option>
						<option value="STROK"> Stroke recovery </option>
						<option value="SEX"> Sexual health </option>
						<option value="SPT"> Sport injuries </option>
						<option value="ULI"> Upper limbs (arm, from shoulder to hand) </option>
						<option value="WOM"> Women’s health </option>
						<option value="YOGA"> Yoga </option>
						<!-- 
							Feldenkrais
							Hand therapy
						-->
						</select>*/
					$langSett = "0";
					if(isset($_SESSION['language'])) {
						$langSett = $_SESSION['language'];
					}
					$langOption = "";
					$langOption .= '<select id="languageT" name="languageT">
						<option value="0"';
					if($langSett == "0") $langOption .= ' selected ';
					$langOption .= 'disabled>Language</option>
						<option value="00"> exclude language option </option>
						<option value="AF"';
					if($langSett == "AF") $langOption .= ' selected ';
					$langOption .= '>Afrikaans </option>
						<option value="AR"';
					if($langSett == "AR") $langOption .= ' selected ';
					$langOption .= '> Arabic </option>
						<option value="BO"';
					if($langSett == "BO") $langOption .= ' selected ';
					$langOption .= '> Bosnian </option>
						<option value="CA"';
					if($langSett == "CA") $langOption .= ' selected ';
					$langOption .= '> Cantonese </option>
						<option value="CHZ';
					if($langSett == "CHZ") $langOption .= ' selected ';
					$langOption .= '"> Chzech </option>
						<option value="CR"';
					if($langSett == "CR") $langOption .= ' selected ';
					$langOption .= '> Croation </option>
						<option value="DA"';
					if($langSett == "DA") $langOption .= ' selected ';
					$langOption .= '> Danish </option>
						<option value="DU"';
					if($langSett == "DU") $langOption .= ' selected ';
					$langOption .= '> Dutch </option>
						<option value="EG"';
					if($langSett == "EG") $langOption .= ' selected ';
					$langOption .= '> Egyptian </option>
						<option value="ENG"';
					if($langSett == "ENG") $langOption .= ' selected ';
					$langOption .= '> English </option>
						<option value="FL"';
					if($langSett == "FL") $langOption .= ' selected ';
					$langOption .= '> Filipino </option>
						<option value="FR"';
					if($langSett == "FR") $langOption .= ' selected ';
					$langOption .= '> French </option>
						<option value="GE"';
					if($langSett == "GE") $langOption .= ' selected ';
					$langOption .= '> German </option>
						<option value="GR"';
					if($langSett == "GR") $langOption .= ' selected ';
					$langOption .= '> Greek </option>
						<option value="HE"';
					if($langSett == "HE") $langOption .= ' selected ';
					$langOption .= '> Hebrew </option>
						<option value="HI"';
					if($langSett == "HI") $langOption .= ' selected ';
					$langOption .= '> Hindi </option>
						<option value="HO"';
					if($langSett == "HO") $langOption .= ' selected ';
					$langOption .= '> Hokkien </option>
						<option value="HU"';
					if($langSett == "HU") $langOption .= ' selected ';
					$langOption .= '> Hungarian </option>
						<option value="IND"';
					if($langSett == "IND") $langOption .= ' selected ';
					$langOption .= '> Indonesian </option>
						<option value="IT"';
					if($langSett == "IT") $langOption .= ' selected ';
					$langOption .= '> Italian </option>
						<option value="JP"';
					if($langSett == "JP") $langOption .= ' selected ';
					$langOption .= '> Japanese </option>
						<option value="KO"';
					if($langSett == "KO") $langOption .= ' selected ';
					$langOption .= '> Korean </option>
						<option value="LAT"';
					if($langSett == "LAT") $langOption .= ' selected ';
					$langOption .= '> Latvian </option>
						<option value="LE"';
					if($langSett == "LE") $langOption .= ' selected ';
					$langOption .= '> Lebanese </option>
						<option value="M"';
					if($langSett == "M") $langOption .= ' selected ';
					$langOption .= '> Marathi </option>
						<option value="MA"';
					if($langSett == "MA") $langOption .= ' selected ';
					$langOption .= '> Macedonian </option>
						<option value="MALT"';
					if($langSett == "MALT") $langOption .= ' selected ';
					$langOption .= '> Maltese </option>
						<option value="MAN"';
					if($langSett == "MAN") $langOption .= ' selected ';
					$langOption .= '> Mandarin </option>
						<option value="MAV"';
					if($langSett == "MAV") $langOption .= ' selected ';
					$langOption .= '> Mavathi </option>
						<option value="ML"';
					if($langSett == "ML") $langOption .= ' selected ';
					$langOption .= '> Malay </option>
						<option value="NOR"';
					if($langSett == "NOR") $langOption .= ' selected ';
					$langOption .= '> Norwegian </option>
						<option value="POL"';
					if($langSett == "POL") $langOption .= ' selected ';
					$langOption .= '> Polish </option>
						<option value="POR"';
					if($langSett == "POR") $langOption .= ' selected ';
					$langOption .= '> Portuguese </option>
						<option value="PU"';
					if($langSett == "PU") $langOption .= ' selected ';
					$langOption .= '> Punjabi </option>
						<option value="RU"';
					if($langSett == "RU") $langOption .= ' selected ';
					$langOption .= '> Russian </option>
						<option value="S"';
					if($langSett == "S") $langOption .= ' selected ';
					$langOption .= '> Slovak </option>
						<option value="SERB"';
					if($langSett == "SERB") $langOption .= ' selected ';
					$langOption .= '> Serbian </option>
						<option value="SL"';
					if($langSett == "SL") $langOption .= ' selected ';
					$langOption .= '> Sign Language </option>
						<option value="SP"';
					if($langSett == "SP") $langOption .= ' selected ';
					$langOption .= '> Spanish </option>
						<option value="SW"';
					if($langSett == "SW") $langOption .= ' selected ';
					$langOption .= '> Swedish </option>
						<option value="SWI"';
					if($langSett == "SWI") $langOption .= ' selected ';
					$langOption .= '> Swiss </option>
						<option value="TA"';
					if($langSett == "TA") $langOption .= ' selected ';
					$langOption .= '> Tamil </option>
						<option value="TAW"';
					if($langSett == "TAW") $langOption .= ' selected ';
					$langOption .= '> Taiwanese </option>
						<option value="TE"';
					if($langSett == "TE") $langOption .= ' selected ';
					$langOption .= '> Teo-Chew </option>
						<option value="TEL"';
					if($langSett == "TEL") $langOption .= ' selected ';
					$langOption .= '> Telugu </option>
						<option value="TH"';
					if($langSett == "TH") $langOption .= ' selected ';
					$langOption .= '> Thai </option>
						<option value="TURK"';
					if($langSett == "TURK") $langOption .= ' selected ';
					$langOption .= '> Turkish </option>
						<option value="UK"';
					if($langSett == "UK") $langOption .= ' selected ';
					$langOption .= '> Ukrainian </option>
						<option value="UR"';
					if($langSett == "UR") $langOption .= ' selected ';
					$langOption .= '> Urdu </option>
						<option value="VI"';
					if($langSett == "VI") $langOption .= ' selected ';
					$langOption .= '> Vietnamese </option>
						<option value="YI"';
					if($langSett == "YI") $langOption .= ' selected ';
					$langOption .= '> Yiddish </option>
						<option value="YU"> Yugoslav </option>
					</select></div>';
					echo $langOption;

					/*echo '<select id="languageT" name="languageT">
						<option value="0" selected disabled>Language</option>
						<option value="00"> exclude language option </option>
						<option value="AF"> Afrikaans </option>
						<option value="AR"> Arabic </option>
						<option value="BO"> Bosnian </option>
						<option value="CA"> Cantonese </option>
						<option value="CHZ"> Chzech </option>
						<option value="CR"> Croation </option>
						<option value="DA"> Danish </option>
						<option value="DU"> Dutch </option>
						<option value="EG"> Egyptian </option>
						<option value="ENG"> English </option>
						<option value="FL"> Filipino </option>
						<option value="FR"> French </option>
						<option value="GE"> German </option>
						<option value="GR"> Greek </option>
						<option value="HE"> Hebrew </option>
						<option value="HI"> Hindi </option>
						<option value="HO"> Hokkien </option>
						<option value="HU"> Hungarian </option>
						<option value="IND"> Indonesian </option>
						<option value="IT"> Italian </option>
						<option value="JP"> Japanese </option>
						<option value="KO"> Korean </option>
						<option value="LAT"> Latvian </option>
						<option value="LE"> Lebanese </option>
						<option value="M"> Marathi </option>
						<option value="MA"> Macedonian </option>
						<option value="MALT"> Maltese </option>
						<option value="MAN"> Mandarin </option>
						<option value="MAV"> Mavathi </option>
						<option value="ML"> Malay </option>
						<option value="NOR"> Norwegian </option>
						<option value="POL"> Polish </option>
						<option value="POR"> Portuguese </option>
						<option value="PU"> Punjabi </option>
						<option value="RU"> Russian </option>
						<option value="S"> Slovak </option>
						<option value="SERB"> Serbian </option>
						<option value="SL"> Sign Language </option>
						<option value="SP"> Spanish </option>
						<option value="SW"> Swedish </option>
						<option value="SWI"> Swiss </option>
						<option value="TA"> Tamil </option>
						<option value="TAW"> Taiwanese </option>
						<option value="TE"> Teo-Chew </option>
						<option value="TEL"> Telugu </option>
						<option value="TH"> Thai </option>
						<option value="TURK"> Turkish </option>
						<option value="UK"> Ukrainian </option>
						<option value="UR"> Urdu </option>
						<option value="VI"> Vietnamese </option>
						<option value="YI"> Yiddish </option>
						<option value="YU"> Yugoslav </option>
						</select></div>';*/
					echo '<div class="options">';
					echo '<h3>Sort by:</h3><select id="sortOption" name="sortOption" onchange="SortOption(value)">';
					if($NameOrderVal == 0) {
						echo '<option value="0" selected> Distance </option><option value="1"> Name &uarr; </option><option value="2"> Name &darr; </option>
						</select>';
					} elseif($NameOrderVal == 1) {
						echo '<option value="0"> Distance </option><option value="1" selected> Name &uarr; </option><option value="2"> Name &darr; </option>
						</select>';
					} else {
						echo '<option value="0"> Distance </option><option value="1"> Name &uarr; </option><option value="2" selected> Name &darr; </option>
						</select>';
					}
					echo '<h3>Items:</h3><select id="NumItemOption" name="NumItemOption" onchange="NumItemOption(value)">
						';
					if($NumOptionVal) {
						echo '<option value="1" selected> 6 </option><option value="2"> 12 </option>
						</select>';
					} else {
						echo '<option value="1"> 6 </option><option value="2" selected> 12 </option>
						</select>';
					}	
					echo '</div></div><div class="clearfix-FAP"></div>';
					$checkboxCurrent = '<div class="checkbox" id="currentTickbox"';
					if(isset($_SESSION['suburbComp']) && $_SESSION['suburbComp'] != "") {
						if(isset($_GET["CrData"]) && $_GET["CrData"] == "y") {
							$checkboxCurrent .= '><label><input id="useCurrent" name="useCurrent" type="checkbox" value="" checked />';
						} else {
							$checkboxCurrent .= '><label><input id="useCurrent" name="useCurrent" type="checkbox" value="" />';						
						} 
						/*
						if(isset($_SESSION['UserLocationHere'])) {
							echo $checkboxCurrent.'Sort practices closest to me within a '.$distSett.'km radius of '.$_SESSION['UserLocationHere'].'</label></div>';
						} else {
						*/
							echo $checkboxCurrent.'Sort practices closest to me within a '.$distSett.'km radius of '.$_SESSION['suburbComp'].'</label></div>';
						/* } */
					/* echo $checkboxCurrent.'Sort the practices by distance using my current location</label></div>'; */
					} else {
						echo $checkboxCurrent.'style="display: none;"></div>';
					}
					echo '<div class="clearfix-FAP"></div>';
					/* when result has no data */
					if($numResult == 0 || sizeof($array) == 0) {
						echo "<h2>There is no result, please refine your search</h2>";
					}
					
					// for dots in map
					echo '<div class="Featured">';
					foreach ($pagers as $items) {
						$MapCounter += 1;
						echo '<a class="event'.$MapCounter.'" style="display: none;">&nbsp;</a>';
						$oo = "<div id='features' style='display: none;' class='down".$MapCounter."' id='".$items['PracticeID']."'>";
						$oo .= '<div class="counter">&nbsp;'.$MapCounter.'&nbsp;</div><div class="left-content"><h3><span id="name'.$MapCounter.'">';
						$oo .= $items['PracticeName'].'</span></h3><p><strong>Distance:</strong> <span id="dist'.$MapCounter.'" name="dist'.$MapCounter.'">';
						$oo .= number_format(distance($_SESSION['lat'], $_SESSION['lng'], $items['Lat'], $items['Lon'], "k"), 3, '.', '').'</span> km</p><p id="address'.$MapCounter.'">';
						$oo .= $items['Address1'].'</br>';
						if(preg_match("/[a-zA-Z0-9]+/",$items['Address2'])) { $oo .= $items['Address2'].' '.$items['Address3'].'</br>'; }
						$oo .= $items['City'].' '.$items['State'].' '.$items['Postcode'].'</p>';
						$oo .= '<div id="val'.$MapCounter.'" name="val'.$MapCounter.'" style="display:none;">'.$items['Lat'].' '.$items['Lon'].'</div>';
						$oo .= '<p><a href="/find-detail?PracticeID='.$items['PracticeID'].'">'.'Find out more'.'</a></p></div>';
						$oo .= '<div id="mores'.$MapCounter.'" style="display:none;">'.'/find-detail?PracticeID='.$items['PracticeID'].'</div>'; 
						$oo .= '<div class="right-content results">';
						$oo .= '<div class="contacts">';
						if($items['Phone'] != '') {
							$phoneNumber = str_replace(' ', '', $items['Phone']);
							$oo .= '<a href="tel:'.$phoneNumber.'"><div class="contactInner"><div class="icon-box"><i class="phone"><div class="icon-inner"></div></i></div> '.$items['Phone'].'</div></a>';
							$oo .= '<div id="phone'.$MapCounter.'" style="display:none;">'.$items['Phone'].'</div>'; 
						} else {$oo .= '<a><div id="phone'.$MapCounter.'" style="display:none;"></div></a>';}
						if($items['Email'] != '' && strlen($items['Email']) > 5) {
							$oo .= '<a href="mailto:'.$items['Email'].'"><div class="contactInner">'.'<div class="icon-box"><i class="email"><div class="icon-inner"></div></i></div> Email</div></a>';
						} else {$oo .= '<a></a>';}
						if($items['Website'] && strlen($items['Website']) > 5) {
							$address = str_replace("http://", "", $items['Website']);
							$address = str_replace("https://", "", $address);
							$oo .= '<a href="http://'.$address.'" target="_blank"><div class="contactInner"><div class="icon-box"><i class="website"><div class="icon-inner"></div></i></div> Visit website</div></a>';
						} else {$oo .= '<a></a>';}
						$oo .= '<a href="https://maps.google.com?saddr=Current+Location&daddr='.$items['Lat'].','.$items['Lon'].'" target="_blank"><div class="contactInner">'.'<div class="icon-box"><i class="direction"><div class="icon-inner"></div></i></div> Get direction</div></a>';
						$oo .= '<div id="directions'.$MapCounter.'" style="display:none;">'.'https://maps.google.com?saddr=Current+Location&daddr='.$items['Lat'].','.$items['Lon'].'</div>'; 
						$oo .= '</div></div>';
						echo $oo. "</div>";
					}
					echo '</div><div class="clearfix-FAP"></div>';
					//$MapCounter = 0;
					foreach ($pagers as $items) {
						$counter += 1;
						//$MapCounter += 1;
						if($counter >= $Value_start) {
							if($counter > $Value_max) {break;}
							$outp = '<div class="results" id="result'.$MapCounter.'"><div class="resultInner" id="'.$items['PracticeID'].'">';
							if($counter < 10) {
								$outp .= '<div class="counter">&nbsp;'.$counter.'&nbsp;</div><h3>';
							} else { $outp .= '<div class="counter">'.$counter.'</div><h3>'; }
							$outp .= $items['PracticeName'].'</h3><p><strong>Distance:</strong> '.number_format(distance($_SESSION['lat'], $_SESSION['lng'], $items['Lat'], $items['Lon'], "k"), 3, '.', '').' km</p><p>';
							$outp .= $items['Address1'].'</br>';
							if(preg_match("/[a-zA-Z0-9]+/",$items['Address2'])) { $outp .= $items['Address2'].' '.$items['Address3'].'</br>'; }
							$outp .= $items['City'].' '.$items['State'].' '.$items['Postcode'].'</p>';
							$outp .= '<p class="Finalbutton"><a href="/find-detail?PracticeID='.$items['PracticeID'].'">'.'Find out more'.'</a></p><div class="contacts">';
							
							if($items['Phone'] != '') {
								$phoneNumber = str_replace(' ', '', $items['Phone']);
								$outp .= '<a href="tel:'.$phoneNumber.'"><div class="contactInner"><div class="icon-box"><i class="phone"><div class="icon-inner"></div></i></div> '.$items['Phone'].'</div></a>';
							} else {$outp .= '<a></a>';}
							if($items['Email'] && strlen($items['Email']) > 5) {
								$outp .= '<a href="mailto:'.$items['Email'].'"><div class="contactInner">'.'<div class="icon-box"><i class="email"><div class="icon-inner"></div></i></div> Email</div></a>';
							} else {$outp .= '<a></a>';}
							if($items['Website'] && strlen($items['Website']) > 5) {
								$address = str_replace("http://", "", $items['Website']);
								$address = str_replace("https://", "", $address);
								$outp .= '<a href="http://'.$address.'" target="_blank"><div class="contactInner"><div class="icon-box"><i class="website"><div class="icon-inner"></div></i></div> Visit website</div></a>';
							} else {$outp .= '<a></a>';}
							$outp .= '<a href="https://maps.google.com?saddr=Current+Location&daddr='.$items['Lat'].','.$items['Lon'].'" target="_blank"><div class="contactInner">'.'<div class="icon-box"><i class="direction"><div class="icon-inner"></div></i></div> Get direction</div></a>';
							$outp .= '</div></div>';
							//$outp .= '<div id="val'.$MapCounter.'" name="val'.$MapCounter.'" style="display:none;">'.$items['Lat'].' '.$items['Lon'].'</div>';
							echo $outp.'</div>';
							if($counter%3 == 0) {
								echo '<div class="clearfix-FAP"></div>';
							}
						}
						
					}
					//$MapCounter -= 1;
					//if($MapCounter > 6) $MapCounter = 6;
					
					echo '<script type="text/javascript">'
					   .'getNumberOfPoints('.$MapCounter.','.$BeginPoint.','.$pageNums.');'
					   //.'numberOfLawChange('.$count.');'
					   .'</script>';
					
					/* pager */
					/* when order is set by user */
					$optionString = "";
					if($order_set != "") {
						if($order_set == "AS") { $optionString .= "ASCDESC=ASC&";
						} else { $optionString .= "ASCDESC=DESC&"; }
					}
					/* when number of item is set by user */
					if($ItemNumber_set != "") {
						if($ItemNumber_set == "6") { $optionString .= "NumItem=6&";
						} else { $optionString .= "NumItem=12&"; }
					}
					/* sort by current location is set by user */
					if($CrData != "") {
						$optionString .= "CrData=y&";
					}
					if(isset($_SESSION["language"])) {
						$optionString .= "language=".$_SESSION["language"]."&";
					}
					if(isset($_SESSION["distance"])) {
						$optionString .= "distance=".$_SESSION["distance"]."&";
					}
					echo '<div class="clearfix-FAP"></div>';
					$page = 0;
$pageNum = 1;

if(isset($_GET["page"])) {
	$page = (int)$_GET["page"];
	$pageNum = (int)$page;
}

// page first
$maxNum = 10;
// PageItem = total number of page
$CalNum = $PageItem / 10;
if($CalNum >= 4) {
	$maxNum = 50;
} elseif($CalNum >= 3) {
	$maxNum = 40;
} elseif($CalNum >= 2) {
	$maxNum = 30;
} elseif($CalNum >= 1) {
	$maxNum = 20;
} else {
	$maxNum = 10;
}

if(0 <= $page && $page <= 10) {
	echo '<div class="pager"><a href="'.$url.'?'.$optionString.'page=1"><div class="Pagebutton"><<</div></a>';
} elseif(11 <= $page && $page <= 20) {
	echo '<div class="pager"><a href="'.$url.'?'.$optionString.'page=10"><div class="Pagebutton"><<</div></a>';
} elseif(21 <= $page && $page <= 30) {
	echo '<div class="pager"><a href="'.$url.'?'.$optionString.'page=20"><div class="Pagebutton"><<</div></a>';
} elseif(31 <= $page && $page <= 40) {
	echo '<div class="pager"><a href="'.$url.'?'.$optionString.'page=30"><div class="Pagebutton"><<</div></a>';
} else {
	echo '<div class="pager"><a href="'.$url.'?'.$optionString.'page=40"><div class="Pagebutton"><<</div></a>';
}

// previous page
if($page != 1 && $page != 0) {
	$prev = $pageNum - 1;
	echo '<a href="'.$url.'?'.$optionString.'page='.$prev.'"><div class="Pagebutton"><</div></a>';
}
// page array
if(0 <= $page && $page <= 10) {
	if($PageItem > 10) {
		loopPageNumber(1, 10, $pageNum, $optionString);
	} else {
		loopPageNumber(1, $PageItem, $pageNum, $optionString);
	}
} elseif(11 <= $page && $page <= 20) {
	if($PageItem > 20) {
		loopPageNumber(11, 20, $pageNum, $optionString);
	} else {
		loopPageNumber(11, $PageItem, $pageNum, $optionString);
	}
} elseif(21 <= $page && $page <= 30) {
	if($PageItem > 30) {
		loopPageNumber(21, 30, $pageNum, $optionString);
	} else {
		loopPageNumber(21, $PageItem, $pageNum, $optionString);
	}
} elseif(31 <= $page && $page <= 40) {
	if($PageItem > 40) {
		loopPageNumber(31, 40, $pageNum, $optionString);
	} else {
		loopPageNumber(31, $PageItem, $pageNum, $optionString);
	}
} else {
	loopPageNumber(1, $PageItem, $pageNum, $optionString);
} 

// next page
if($pageNum != $PageItem) { // if it is not total number of page (if not max)
	$pageNum += 1;
	echo '<a href="'.$url.'?'.$optionString.'page='.$pageNum.'"><div class="Pagebutton">></div></a>';
}
// page last
if(0 <= $page && $page <= 10) {
	if($PageItem > 10) {
		echo '<a href="'.$url.'?'.$optionString.'page=11"><div class="Pagebutton">>></div></a></div>';
	} else {
		echo '<a href="'.$url.'?'.$optionString.'page='.$PageItem.'"><div class="Pagebutton">>></div></a></div>';
	}
} elseif(11 <= $page && $page <= 20) {
	if($PageItem > 20) {
		echo '<a href="'.$url.'?'.$optionString.'page=21"><div class="Pagebutton">>></div></a></div>';
	} else {
		echo '<a href="'.$url.'?'.$optionString.'page='.$PageItem.'"><div class="Pagebutton">>></div></a></div>';
	}
} elseif(21 <= $page && $page <= 30) {
	if($PageItem > 30) {
		echo '<a href="'.$url.'?'.$optionString.'page=31"><div class="Pagebutton">>></div></a></div>';
	} else {
		echo '<a href="'.$url.'?'.$optionString.'page='.$PageItem.'"><div class="Pagebutton">>></div></a></div>';
	}
} elseif(31 <= $page && $page <= 40) {
	if($PageItem > 40) {
		echo '<a href="'.$url.'?'.$optionString.'page=41"><div class="Pagebutton">>></div></a></div>';
	} else {
		echo '<a href="'.$url.'?'.$optionString.'page='.$PageItem.'"><div class="Pagebutton">>></div></a></div>';
	}
} else {
	echo '<a href="'.$url.'?'.$optionString.'page='.$PageItem.'"><div class="Pagebutton">>></div></a></div>';
} 
					
					
				?>
			</div><!-- end of #content -->
		</div><!-- end of #page-->
		</div><!-- end of #wrapper -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBUXY9mb7uoQp8PtmLH8tNkLvr7Vdm6xAQ&libraries=places"></script>