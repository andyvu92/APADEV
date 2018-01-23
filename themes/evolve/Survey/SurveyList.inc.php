<?php
/* Survey Group List */

// to get Group array;
$GroupList = array();

include('SurveyFunction.inc.php');

$GroupList = GetGroupList();

//start frame
////// frame goes here
echo "<button> Create New </button>";
echo "<div class='SurveyList'><ul class='Row'>";
// need to put header of table here
echo "<li><div class='ColSection ColHeader'><ul class='Col'>";
echo "<li>ID</li><li>Name</li><li>Description</li><li>Start Date</li><li>End Date</li>";
echo "<li>User number Limit</li><li>User type Limit</li><li>Publish status</li><li>Tools</li>";
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
echo "<p>Think out loud: Description of each survey will go under and 'click to expand' form.</p>";
echo "<p>Think out loud: Will have sort function here along with a pagination.</p>";
echo "<p>Think out loud: Combine limits and display together";

?>