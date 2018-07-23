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
		unset($_SESSION['stateComp']);
		unset($_SESSION['suburbComp']);
		unset($_SESSION['postcodeComp']);
		unset($_SESSION['UserLocationHere']);
	}
	
	if(isset($_SESSION['language']) && $_SESSION['language'] != "") {
		unset($_SESSION['language']);
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
	
	if(isset($_POST['lat'])) {
		$_SESSION['lat'] = $_POST['lat'];
	}
	
	if(isset($_POST['lng'])) {
		$_SESSION['lng'] = $_POST['lng'];
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
<div id="FindAPhysio" class="container">
				<h1>Find a physio today</h1>
				<div id="currentLocation" class="checkbox">
					<label><input class="currentLocation" type="checkbox" value=""><h2 class="LocationNo">Using current location</h2></label>
				</div>
				<div class="orState"><p>or</p><h2>Enter a location below</h2></div>
				<form id="FindForm" action="find-result" method="POST">
					<div id="find">
					<?php /*<input id="geocomplete" placeholder="Enter location" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter location'" type="text" name="name" size="40" >*/ ?>
					<div id="bloodhound">
					<input class="typeahead" type="text" placeholder="Enter location">
					</div>
					<!--  style="display: none;" -->
					<input class="stateComp" type="text" name="stateComp" placeholder="state" style="display: none;">
					<input class="suburbComp" type="text" name="suburbComp" placeholder="suburb" style="display: none;">
					<input class="postcodeComp" type="text" name="postcodeComp" placeholder="postcode" style="display: none;">
					<input id="UserLocationHere" type="text" name="UserLocationHere" style="display: none;">
					<select id="distance" name="distance">
						<option value="0" selected disabled>Distance (5 km)</option>
						<option value="5"> Distance - 5 km </option>
						<option value="10"> Distance - 10 km </option>
						<option value="20"> Distance - 20 km </option>
						<option value="50"> Distance - 50 km </option>
						<option value="100"> Distance - 100 km </option>
					</select>
					<input id="lat" type="text" name="lat" value="-37.81361100000001" style="display: none;" hidden>
					<input id="lng" type="text" name="lng" value="144.96305600000005" hidden style="display: none;">
					<input id="latCurrent" type="text" name="latCurrent" value="-" style="display: none;" hidden>
					<input id="lngCurrent" type="text" name="lngCurrent" value="-" hidden style="display: none;">
					<div class="filterArea">
					<div class="filterTitle">
					<a class="event1"><div class="filter">Refine your search <i class="fa fa-chevron-down" aria-hidden="true"></i> </div></a>
					</div>
					<div class="center down1" >
					<?php 
					/*
					<select id="treatment" name="treatment">
						<option value="0" selected disabled>Treatment area</option>
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
						</select>
						*/?>
					<span>Search for: </span>
<ul class="nav nav-pills">
  <li class="active"><a data-toggle="pill" href="#menu1">Practice</a></li>
  <li><a data-toggle="pill" href="#menu2">Physiotherapist</a></li>
</ul>

<div class="tab-content">
  <div id="menu1" class="tab-pane fade in active">
<input id="practiceName" placeholder="Name of Practice" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Name of Practice'" type="text" name="practiceName" size="40">
  </div>
  <div id="menu2" class="tab-pane fade">
    <input id="userName" placeholder="Name of Physio" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Name of Physio'" type="text" name="userName" size="40">
  </div>
</div>
					
					<select id="state" name="state">
						<option value="0" selected disabled> State </option>
						<option value="ACT"> Australian Capital Territory </option>
						<option value="NSW"> New South Wales </option>
						<option value="NT"> Northern Territory </option>
						<option value="QLD"> Queensland </option>
						<option value="SA"> South Australia </option>
						<option value="TAS"> Tasmania </option>
						<option value="VIC"> Victoria </option>
						<option value="WA"> Western Australia </option>
						<option value="NW"> National Wides </option>
					</select>
					<select id="language" name="language">
						<option value="0" selected disabled>Language</option>
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
						<option value="POL"> Poland </option>
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
						</select>
					</div>
					</div>
					<input class="submit" type="submit" value="Search" disabled></br>
					</div>
					<!-- Buttons initialisation -->	
					</form>
					
			</div><!-- end of #content -->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBooZHR_M33b8q226HIf1rHAAoRzdc3tTo&libraries=places"></script>