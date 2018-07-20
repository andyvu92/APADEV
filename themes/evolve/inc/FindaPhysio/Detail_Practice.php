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
?>
<?php
			// if session is empty (came here without values)
			// since lat is always set in anytime,
			// empty in SESSION['lat'] means session is not there.
/*			if(empty($_SESSION['lat'])) { 
				header("Location: Error.php");
				exit;
}
*/
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
					if($countHere == 60) break;
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
<?php
			if(empty($_GET['PracticeID']) && $_GET['PracticeID'] != 0) { 
				header("Location: Error.php");
				exit;
			} else {
				$id = $_GET['PracticeID'];
				$UserIDs = array();
				$UserDetail = array();
				$UserIncludes = array();
				try {
                    //$db = new PDO('mysql:host=localhost;dbname=c0FindPhysio', 'c0FindAPhysio', 'jc4X2ERLpn_');
                    $db = new PDO('mysql:host=localhost;dbname=findaphysio', 'c0DefaultMain', 'Apa2017Config');
					$stmt = $db->prepare('SELECT * FROM practicesearch WHERE PID = :pid');
					$stmt->bindValue(':pid', $id);
					$stmt->execute();
					if($stmt->rowCount() <= 0) {
						//header("Location: Error.php");
						echo $stmt->rowCount();
						exit;
					} else {
						foreach ($stmt as $row) {
							$Name = $row['PracticeName'];
							$Address = $row['Address1'].' '.$row['Address2'].' '.$row['Address3'];
							$Address2 = $row['City'].' '.$row['State'].' '.$row['Postcode'];
							$Website = $row['Website'];
							$Phone = $row['Phone'];
							$Email = $row['Email'];
							$QEP = $row['QEP'];
							$EPC = $row['EPC'];
							$REBATE = $row['REBATE'];
							$DVA = $row['DVA'];
							$COMP = $row['COMP'];
							$MOTOR = $row['MOTOR'];
							$HICAPS = $row['HICAPS'];
							$HEALTHPOINT = $row['HEALTHPOINT'];
							$PAINPORTAL = $row['PAINPORTAL'];
							$Destination = $row['Lat'].','.$row['Lng'];
							$Location = $row['Lat'].' '.$row['Lng'];
							$Distance = number_format(distance($_SESSION["lat"],$_SESSION["lng"], $row['Lat'], $row['Lng'], "k"), 2, '.', '');
							$UserIDs = returnArray($row['UIDSet']);
							break; // only one practice
						}
						/*
							$FAP = $row['FAP'];
							$Titled = $row['Titled'];
						
							This will combine all of their registed physios
							
						*/
						foreach($UserIDs as $sets) {
							$Users = $db->prepare('Select * from physio where UserID = :uid');
							$Users->bindValue(':uid', $sets);
							$Users->execute();
							////  $UserIncludes
							if($Users->rowCount() != 0) {
								foreach($Users as $row) {
									$UserData = array('UserName' => $row['FirstName'].' '.$row['LastName'] ,'FAP' => $row['FAP'], 
										'Titled' => $row['Titled'], 'Languages' => $row['Language'], 'Interest' => $row['Interest'], 'LastName' => $row['LastName']);

									if(isset($_SESSION['userName'])) {
										if(strtolower($_SESSION['userName']) == strtolower($row['FirstName'].' '.$row['LastName']) || strpos(strtolower($_SESSION['userName']), strtolower($row['FirstName'].' '.$row['LastName'])) === true || strpos(strtolower($_SESSION['userName']), strtolower($row['FirstName'])) === true || strpos(strtolower($_SESSION['userName']), strtolower($row['LastName'])) === true || strtolower($row['LastName']) == strtolower($_SESSION['userName']) || strtolower($row['FirstName']) == strtolower($_SESSION['userName'])) { // username selected & contain 'word'
											$UserData = array('UserName' => '<b>'.$row['FirstName'].' '.$row['LastName'].'</b>' ,'FAP' => $row['FAP'], 
													'Titled' => $row['Titled'], 'Languages' => $row['Language'], 'Interest' => $row['Interest']);
											if(isset($_SESSION['language'])) { // when language is selected
												$langSet = returnArray($row['Language']);
												if(in_array($_SESSION['language'],$langSet)) {
													array_push($UserIncludes, $UserData);
												} else {
													array_push($UserDetail, $UserData);
												}
											} else {
												array_push($UserIncludes, $UserData);
											}
										} else if($_SESSION['userName'] == "") { // username is null
											if(isset($_SESSION['language'])) { // when language is selected
												$langSet = returnArray($row['Language']);
												if(in_array($_SESSION['language'],$langSet)) {
													array_push($UserIncludes, $UserData);
												} else {
													array_push($UserDetail, $UserData);
												}
											} else {
												array_push($UserDetail, $UserData);
											}
										} else {
											if(isset($_SESSION['language'])) { // when language is selected
												$langSet = returnArray($row['Language']);
														if(in_array($_SESSION['language'],$langSet)) {
													array_push($UserIncludes, $UserData);
												} else {
													array_push($UserDetail, $UserData);
												}
											} else {
												array_push($UserDetail, $UserData);
											}
										}
									} else { // username is null || not given
										if(isset($_SESSION['language'])) { // when language is selected
											$langSet = returnArray($row['Language']);
											if(in_array($_SESSION['language'],$langSet)) {
												array_push($UserIncludes, $UserData);
											} else {
												array_push($UserDetail, $UserData);
											}
										} else {
											array_push($UserDetail, $UserData);
										}
									}
									break; // only one user
								}
							}
						}
						
						// data process done!
					}
					$stmt->closeCursor(); // this is not even required
					$stmt = null; // doing this is mandatory for connection to get closed
					//$Users->closeCursor(); // this is not even required
					$Users = null; // doing this is mandatory for connection to get closed
					$db = null;
				} catch (PDOException $e) {
					print "Error!: " . $e->getMessage() . "<br/>";
					die();
				}
			}
		?> 
			<div id="banner">					
				<div id="map-canvas" style="width: 100%; height: 400px" ></div>
			</div><!-- end of #sidebar -->
			<div id="page" class="container final">
			<div id="content">
			<?php 
				$counters = 0;
				$optionString = "";
				if(isset($_SESSION["CrData"])) {
					$optionString .= "CrData=".$_SESSION["CrData"];
					$counters++;
				}
				if(isset($_SESSION["page"])) {
					$optionString .= "&page=".$_SESSION["page"];
					$counters++;
				}
				if(isset($_SESSION["ASCDESC"])) {
					$optionString .= "&ASCDESC=".$_SESSION["ASCDESC"];
					$counters++;
				}
				if(isset($_SESSION["NumItem"])) {
					$optionString .= "&NumItem=".$_SESSION["NumItem"];
					$counters++;
				}
				if(isset($_SESSION["distance"])) {
					$optionString .= "&distance=".$_SESSION["distance"];
					$counters++;
				}
				if(isset($_SESSION["language"])) {
					$optionString .= "&language=".$_SESSION["language"];
					$counters++;
				}
				if($counters > 0) {
					$optionString = "?".$optionString;
				}
			?>
				<a href="/find-result<?php echo $optionString; ?>"><div class="backButton">< GO BACK</div></a>
<div class="clearfix"></div>
				<h2 id="name1" style="font-size: 38px;"><?php echo $Name; ?></h2>
				
				
				<?php
					// for dots.
					/*
					echo '<div class="Featured">';
					foreach ($pagers as $items) {
						$MapCounter += 1;
						echo '<a class="event'.$MapCounter.'" style="display: none;">&nbsp;</a>';
						$oo = "<div id='features' style='display: none;' class='down".$MapCounter."' id='".$items['PracticeID']."'>";
						$oo .= '<div class="left-content"><h3><span id="name'.$MapCounter.'">';
						$oo .= $items['PracticeName'].'</span></h3><p id="address'.$MapCounter.'">';
						$oo .= $items['Address1'].'</br>';
						if(preg_match("/[a-zA-Z0-9]+/",$items['Address2'])) { $oo .= $items['Address2'].' '.$items['Address3'].'</br>'; }
						$oo .= $items['City'].' '.$items['State'].' '.$items['Postcode'].'</p>';
						$oo .= '<div id="val'.$MapCounter.'" name="val'.$MapCounter.'" style="display:none;">'.$items['Lat'].' '.$items['Lon'].'</div>';
						$oo .= '<p><a href="#">'.'Find out more'.'</a></p></div>';
						$oo .= '<div class="right-content results">';
						$oo .= '<div class="contacts">';
						if($items['Phone'] != '' || $items['Phone'] != null || $items['Phone'] != " ") {
							$phoneNumber = str_replace(' ', '', $items['Phone']);
							$oo .= '<a href="tel:'.$phoneNumber.'"><div class="contactInner"><div class="icon-box"><i class="phone"><div class="icon-inner"></div></i></div> '.$items['Phone'].'</div></a>';
						} else {$oo .= '<a><div class="contactInner"></div></a>';}
						if($items['Email'] != '') {
							$oo .= '<a href="mailto:'.$items['Email'].'"><div class="contactInner">'.'<div class="icon-box"><i class="email"><div class="icon-inner"></div></i></div> Email</div></a>';
						} else {$oo .= '<a></a>';}
						if($items['Website'] != '') {
							$address = str_replace("http://", "", $items['Website']);
							$address = str_replace("https://", "", $address);
							$oo .= '<a href="http://'.$address.'"><div class="contactInner"><div class="icon-box"><i class="website"><div class="icon-inner"></div></i></div> Visit website</div></a>';
						} else {$oo .= '<a></a>';}
						$oo .= '<a><div class="contactInner">'.'<div class="icon-box"><i class="direction"><div class="icon-inner"></div></i></div> Get direction</div></a>';
						$oo .= '</div></div>';
						echo $oo. "</div>";
					}
					echo '</div>';
					*/



/*
$oo .= '<div id="mores'.$MapCounter.'" style="display:none;">'.'/find-detail?PracticeID='.$items['PracticeID'].'</div>'; 
$oo .= '<div id="phone'.$MapCounter.'" style="display:none;">'.$items['Phone'].'</div>'; 
$oo .= '<div id="directions'.$MapCounter.'" style="display:none;">'.'https://maps.google.com?saddr=Current+Location&daddr='.$items['Lat'].','.$items['Lon'].'</div>'; 

*/
				?>
			</div><!-- end of #content -->
			<div class="clearfix"></div>
			<div id="details">
					<div class="left-content results">
						<h3>Distance:</h3><p> <span id="dist1" name="dist1"><?php echo $Distance; ?></span> km</p>
						<p id="address1"><?php echo $Address ?><br><?php echo $Address2; ?></p>
						<p></p>
						<div class="contacts">
							<a href="tel:<?php echo $Phone; ?>">
								<?php if($Phone != '' && strlen($Phone) > 5): ?>
									<div class="contactInner">
										<div class="icon-box">
											<i class="phone"><div class="icon-inner"></div></i>
										</div> <?php echo $Phone; ?>
										<div id="phone1" style="display:none;"><?php echo $Phone; ?></div>
									</div>
								<?php else: ?>
									<div id="phone1" style="display:none;">-</div>
								<?php endif ?>
							</a>
							<?php if($Email != '' && strlen($Email) > 5): ?>
							<a href="mailto:<?php echo $Email; ?>">
								<div class="contactInner">
									<div class="icon-box">
										<i class="email"><div class="icon-inner"></div></i>
									</div> Email
								</div>
							</a>
							<?php endif ?>
							<?php
								$address = str_replace("http://", "", $Website);
								$address = str_replace("https://", "", $address);
							?>
							<?php if($address != '' && strlen($address) > 5): ?>
							<a href="http://<?php echo $address; ?>" target="_blank">
								<div class="contactInner">
									<div class="icon-box">
										<i class="website"><div class="icon-inner"></div></i>
									</div> Visit website
								</div>
							</a>
							<?php endif ?>
							<a href="https://maps.google.com?saddr=Current+Location&daddr=<?php echo $Destination; ?>" target="_blank">
								<div class="contactInner">
									<div class="icon-box">
										<i class="direction"><div class="icon-inner"></div></i>
									</div> Get direction
									<div id="directions1" style="display:none;">https://maps.google.com?saddr=Current+Location&daddr=<?php echo $Destination; ?></div> 
								</div>
							</a>
						</div>
						<div id="val1" name="val1" style="display:none;"><?php echo $Location; ?></div>
					</div>
					<div class="right-content">
							<h3 style="padding-left: 5px;">Services</h3>
							<ul>
								<?php //if($QEP == 1){ echo '<li>QEP</li>'; }?>
								<?php if($EPC == 1){ echo '<li>Medicare Chronic Disease Management</li>'; }?>
								<?php if($REBATE == 1){ echo '<li>REBATE</li>'; }?>
								<?php if($DVA == 1){ echo '<li>DVA</li>'; }?>
								<?php if($COMP == 1){ echo '<li>Workers Compensation</li>'; }?>
								<?php if($MOTOR == 1){ echo '<li>Motor Accident Compensation</li>'; }?>
								<?php if($HEALTHPOINT == 1 or HICAPS == 1){ echo '<li>Electronic claiming</li>'; }?>
							</ul>
						<?php //if(isset($_SESSION['language']) || isset($_SESSION['treatment'])): ?>
							<h3 style="padding-left: 5px;">Physios</h3>
							<div class="physios">
								<?php $sortNames = array_msort($UserIncludes , array('LastName'=>SORT_ASC)); ?>
								<?php foreach($sortNames as $users)://($i = 0; $i < $userCount; $i++): ?>
									<div class="physio">
										<div class="left">
											<h3 class="name"><?php echo $users['UserName'] ?></h3>
											<?php /*  //if(isset($_SESSION['treatment'])): ?>
												<h4 class="smallTitle">Accredited</h4>
												<ul>
												<?php if($users['FAP'] != null){ echo '<li>'.$users['FAP'].'</li>'; }?>
												<?php if($users['Titled'] != null){ 
													$arrays = returnArray($users['Titled']);
													if(sizeof($arrays) <= 1) {
														echo '<li>'.$users['Titled'].'</li>'; 
													} else {
														foreach($arrays as $titled) {
															echo '<li>'.$titled.'</li>'; 
														}
													}
												}?>
												</ul>
											<?php //endif */ ?>
											<?php /* if($users['Interest'] != null){ 
												echo '<h4 class="smallTitle">Services</h4><ul>';
												$arrays = returnArray($users['Interest']);
												if(sizeof($arrays) <= 1) {
													echo '<li>'.LibrarySwitch($users['Interest'], "I").'</li>'; 
												} else {
													foreach($arrays as $intst) {
														echo '<li>'.LibrarySwitch($intst,"I").'</li>'; 
													}
												}
												echo "</ul>";
											} */ ?>
										</div>
										<div class="right">
											<?php if($users['Languages'] != null && isset($_SESSION['language'])){ 
												echo '<h4 class="smallTitle">Languages spoken</h4><ul>';
												$arrays = returnArray($users['Languages']);
												if(sizeof($arrays) <= 1) {
													echo '<li>'.LibrarySwitch($users['Languages'],"L").'</li>'; 
												} else {
													foreach($arrays as $langs) {
														echo '<li>'.LibrarySwitch($langs,"L").'</li>'; 
													}
												}
												echo "</ul>";
											}?>
										</div>
										<div class="clearfix-FAP"></div>
									</div>
								<?php endforeach ?>
								<?php $sortNames = array_msort($UserDetail , array('LastName'=>SORT_ASC)); ?>
								<?php foreach($sortNames as $users)://($i = 0; $i < $userCount; $i++): ?>
									<div class="physio">
										<div class="left">
											<h3 class="name"><?php echo $users['UserName'] ?></h3>
											<?php if(isset($_SESSION['treatment'])): ?>
												<h4 class="smallTitle">Accredited</h4>
												<ul>
												<?php if($users['FAP'] != null){ echo '<li>'.$users['FAP'].'</li>'; }?>
												<?php if($users['Titled'] != null){ 
													$arrays = returnArray($users['Titled']);
													if(sizeof($arrays) <= 1) {
														echo '<li>'.$users['Titled'].'</li>'; 
													} else {
														foreach($arrays as $titled) {
															echo '<li>'.$titled.'</li>'; 
														}
													}
												}?>
												</ul>
											<?php endif ?>
										</div>
										<div class="right">
											<?php if($users['Interest'] != null && isset($_SESSION['treatment'])){ 
												echo '<h4 class="smallTitle">Services</h4><ul>';
												$arrays = returnArray($users['Interest']);
												if(sizeof($arrays) <= 1) {
													echo '<li>'.LibrarySwitch($users['Interest'], "I").'</li>'; 
												} else {
													foreach($arrays as $intst) {
														echo '<li>'.LibrarySwitch($intst,"I").'</li>'; 
													}
												}
												echo "</ul>";
											}?>
											<?php if($users['Languages'] != null && isset($_SESSION['language'])){ 
												echo '<h4 class="smallTitle">Languages spoken</h4><ul>';
												$arrays = returnArray($users['Languages']);
												if(sizeof($arrays) <= 1) {
													echo '<li>'.LibrarySwitch($users['Languages'],"L").'</li>'; 
												} else {
													foreach($arrays as $langs) {
														echo '<li>'.LibrarySwitch($langs,"L").'</li>'; 
													}
												}
												echo "</ul>";
											}?>
										</div>
									</div>
								<?php endforeach ?>
							</div>
						<?php //endif ?>
					</div>
<script>
			getNumberOfPoints(1,1,1);
		</script>
				</div>
</div>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBUXY9mb7uoQp8PtmLH8tNkLvr7Vdm6xAQ&libraries=places"></script>