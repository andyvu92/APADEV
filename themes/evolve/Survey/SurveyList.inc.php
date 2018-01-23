<?php
/* Survey Group List */

// to get Group array;
$GroupList = array();

/*************** this part will be replaced with function *********/
$assumeReturn = array();
try {
	//$db = new PDO('mysql:host=10.1.1.35;dbname=apa_survey', 'c0DefaultMain', 'Apa2017Config');
	$db = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config');
	$Mcheck = $db->prepare('SELECT * FROM groups');
	if(!$Mcheck->execute()) {
		echo "<br />RunFail- Mcheck<br>";
		print_r($Mcheck->errorInfo());
	}
	// Tester!
	echo "<p>Number of raws: ".$Mcheck->rowCount()."</p>";
	$arrayReturn = array();
	foreach($Mcheck as $checks) {
		$arrayRaw = array();
		array_push($arrayRaw, $checks[0]);
		array_push($arrayRaw, $checks[1]);
		array_push($arrayRaw, $checks[2]);
		array_push($arrayRaw, $checks[3]);
		array_push($arrayRaw, $checks[4]);
		array_push($arrayRaw, $checks[5]);
		array_push($arrayRaw, $checks[6]);
		array_push($arrayRaw, $checks[7]);
		array_push($arrayRaw, $checks[8]);
		array_push($arrayReturn, $arrayRaw);
	}
	echo "<br/>Done!";
	$assumeReturn = $arrayReturn;
} catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/>";
	die();
}
/*************** this part will be replaced with function *********/

$GroupList = $assumeReturn;

//start frame
////// frame goes here
echo "<button> Create New </button>";
echo "<div class='SurveyList'><ul class='Row'>";
// need to put header of table here
echo "<li><div class='ColSection ColHeader'><ul class='Col'>";
echo "<li>ID</li><li>Name</li><li>Description</li><li>Start Date</li><li>End Date</li>";
echo "<li>Number of Users</li><li>User types Limit</li><li>Publish status</li><li>Tools</li>";
echo "</ul></div></li>";
foreach($GroupList as $lines) {
	echo "<li><div class='ColSection'><ul class='Col'>";
	$counter = 0;
	foreach($lines as $cols) {
		$counter++;
		if($counter != 2) {
			echo "<li>";
			if($counter == 5 || $counter == 6) {
				echo date("d-m-Y", strtotime($cols.""));
			} else {
				echo $cols."";
			}
			echo "</li>";
		}
	}
	// Menu
	echo "<li><button>Update</button><button>Delete</button></li>";
	echo "</ul></div></li>";
}
echo "</ul></div>";
// end frame
////// end frame goes here


?>