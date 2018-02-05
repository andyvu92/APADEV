<?php
/* Qeustions for survey List */
$GroupList = array();
//include('SurveyFunction.inc.php');
$GroupList = GetGroupList();
$OptionList = GetOptionList();
if(isset($_POST["qTitle1"])) { 
	$action=$_POST["qTitle1"];
	$testerNum = 1;
	if(isset($_POST["test".$testerNum])) {
		echo "Yo!";
		echo $_POST["test".$testerNum];
	} else {
		echo "Nay";
	}
	$QuestionArray = Array();
	if(isset($_POST["qNum"]) && isset($_GET['GID'])) {
		$qNum = $_POST["qNum"];
		array_push($QuestionArray, $_GET['GID']);
		array_push($QuestionArray, $qNum);
		for($a = 1; $a <= $qNum; $a++) {
			$ListArray = Array();
			array_push($ListArray, $_POST["qTitle".$a]);
			array_push($ListArray, $_POST["qDescription".$a]);
			$optionArr = Array();
			$num = $a + 1;
			if($_POST["qType".$a] == '1') {
				$optionArrT = Array();
				$optionArrF = Array();
				array_push($optionArrT, $_POST[$a."oValue1"]);
				if(isset($_POST[$a."qNext1"])) {
					array_push($optionArrT, $_POST[$a."qNext1"]);
				} else {
					// to do - Test
					if($a == $qNum) { // last question
						array_push($optionArrT, "0");
					} else {
						array_push($optionArrT, $num);
					}
				}
				array_push($optionArrF, $_POST[$a."oValue2"]);
				if(isset($_POST[$a."qNext2"])) {
					array_push($optionArrF, $_POST[$a."qNext2"]);
				} else {
					// to do - Test
					if($a == $qNum) { // last question
						array_push($optionArrF, "0");
					} else {
						array_push($optionArrF, $num);
					}
				}
				array_push($optionArr, $optionArrT);
				array_push($optionArr, $optionArrF);
			} elseif($_POST["qType".$a] == '2') {
				$optionArrOn = Array();
				$optionArrTw = Array();
				$optionArrTr = Array();
				$optionArrFo = Array();
				$optionArrFi = Array();
				if(isset($_POST[$a."oValue1"]) && $_POST[$a."oValue1"] != "") {
					array_push($optionArrOn, $_POST[$a."oValue1"]);
					if(isset($_POST[$a."qNext1"])) {
						array_push($optionArrOn, $_POST[$a."qNext1"]);
					} else {
						// to do - Test
						if($a == $qNum) { // last question
							array_push($optionArrOn, "0");
						} else {
							array_push($optionArrOn, $num);
						}
					}
					array_push($optionArr, $optionArrOn);
				}
				if(isset($_POST[$a."oValue2"]) && $_POST[$a."oValue2"] != "") {
					array_push($optionArrTw, $_POST[$a."oValue2"]);
					if(isset($_POST[$a."qNext2"])) {
						array_push($optionArrTw, $_POST[$a."qNext2"]);
					} else {
						// to do - Test
						if($a == $qNum) { // last question
							array_push($optionArrTw, "0");
						} else {
							array_push($optionArrTw, $num);
						}
					}
					array_push($optionArr, $optionArrTw);
				}
				if(isset($_POST[$a."oValue3"]) && $_POST[$a."oValue3"] != "") {
					array_push($optionArrTr, $_POST[$a."oValue3"]);
					if(isset($_POST[$a."qNext3"])) {
						array_push($optionArrTr, $_POST[$a."qNext3"]);
					} else {
						// to do - Test
						if($a == $qNum) { // last question
							array_push($optionArrTr, "0");
						} else {
							array_push($optionArrTr, $num);
						}
					}
					array_push($optionArr, $optionArrTr);
				}
				if(isset($_POST[$a."oValue4"]) && $_POST[$a."oValue4"] != "") {
					array_push($optionArrFo, $_POST[$a."oValue4"]);
					if(isset($_POST[$a."qNext4"])) {
						array_push($optionArrFo, $_POST[$a."qNext4"]);
					} else {
						// to do - Test
						if($a == $qNum) { // last question
							array_push($optionArrFo, "0");
						} else {
							array_push($optionArrFo, $num);
						}
					}
					array_push($optionArr, $optionArrFo);
				}
				if(isset($_POST[$a."oValue5"]) && $_POST[$a."oValue5"] != "") {
					array_push($optionArrFi, $_POST[$a."oValue5"]);
					if(isset($_POST[$a."qNext5"])) {
						array_push($optionArrFi, $_POST[$a."qNext5"]);
					} else {
						// to do - Test
						if($a == $qNum) { // last question
							array_push($optionArrFi, "0");
						} else {
							array_push($optionArrFi, $num);
						}
					}
					array_push($optionArr, $optionArrFi);
				}
			}
			array_push($ListArray, $optionArr);
			array_push($ListArray, $_POST["qType".$a]);
			array_push($ListArray, $_POST["qMandatory".$a]);
			array_push($QuestionArray, $ListArray);
		}
	}
	UpdateQustion($QuestionArray);
}
?>
<?php if(isset($_GET["GID"])):?>
<div class="testerText"><p></p></div>
<form method="GET" action="surveyquestions" id="surveyGForm">
   <div class="row">
        <div class="col-lg-6">
            <label for="">Please select one survey group:</label>
			<select class="form-control" id="groupTitle" name="GID">
				<?php foreach($GroupList as $lines) {
					  $counter = 0;
					  foreach($lines as $cols) {
						  $counter++;
						  if($counter == 1){
						  echo '<option value="'.$cols.'">';}
						  if($counter == 3){
						  echo $cols.'</option>';}
					 }
				}?>
            </select>
        </div>
    </div>
	<div class="row">
	  <div class="col-lg-6"><button type="submit">Load Survey Group</button></div>
	</div>
</form>
<?php else: ?>
<div class="testerText"><p></p></div>
<form method="GET" action="surveyquestions" id="surveyGForm">
   <div class="row">
        <div class="col-lg-6">
            <label for="">Please select one survey group:</label>
			<select class="form-control" id="groupTitle" name="GID">
				<?php foreach($GroupList as $lines) {
					  $counter = 0;
					  foreach($lines as $cols) {
						  $counter++;
						  if($counter == 1){
						  echo '<option value="'.$cols.'">';}
						  if($counter == 3){
						  echo $cols.'</option>';}
					 }
				}?>
            </select>
        </div>
    </div>
	<div class="row">
	  <div class="col-lg-6"><button type="submit">Load Survey Group</button></div>
	</div>
</form>
<?php endif ?>
<?php if(!isset($_GET["QID"])):?>
<form method="POST" action="surveyquestions?GID=<?php if(isset($_GET["GID"])) {echo $_GET["GID"];} ?>" id="surveyForm">
	<div id="Lists" style="display: none;">
		<input type="hidden" value="" id="Plist" name="Plist">
		<input type="hidden" value="" id="Qlist" name="Qlist">
	</div>
	<div id="Q1" class="questions">
	<div class="row">
	     <div class="col-lg-6">
            <label for="">Question1 Title</label>
            <input type="text" class="form-control" name="qTitle1">
			<input type="hidden" value="1" id="qnumber" name="qNum">
        </div>
		<div class="col-lg-6">
            <label for="">Question1 Description</label>
            <input type="text" class="form-control" name="qDescription1">
        </div>
	</div>
    <div class="row">
	     <div class="col-lg-6">
            <label for="">Question1 Type</label>
             <select class="form-control" id="qType1" name="qType1">
				  <option value="" selected disabled>Question Type</option>
				  <option value="1">T/F</option>
				  <option value="2">Multiple Choice & Signle Answer</option>
				  <option value="3">Multiple Choice & Multiple Answers</option>
				  <option value="4">Open & End</option>
            </select>
        </div>
		<br>
	</div>
	<div class="row options">
	</div>
	<div class="row toggles">
	</div>
	</div>
	
	<div class="row">
	  <div class="col-lg-6"><button type="submit">Save</button></div>
	  <div class="col-lg-6">
		<a class="button" id="addQuestion">Add Question</a>&nbsp;&nbsp;<a class="button" id="deleteQuestion">Delete Question</a><br />
		<label for="">Sequence?</label><select class="form-control" id="IsSequenceTotal"><option value="1">YES</option><option value="0" selected="">NO</option></select>
	  </div>
	</div>
</form>
<?php /* when GID is selected */ else: ?>
<form method="POST" action="surveyquestions?GID=<?php if(isset($_GET["GID"])) {echo $_GET["GID"];} ?>" id="surveyForm">
	<div id="Lists" style="display: none;">
		<input type="hidden" value="" id="Plist" name="Plist">
		<input type="hidden" value="" id="Qlist" name="Qlist">
	</div>
	<div id="Q1" class="questions">
	<div class="row">
	     <div class="col-lg-6">
            <label for="">Question1 Title</label>
            <input type="text" class="form-control" name="qTitle1">
			<input type="hidden" value="1" id="qnumber" name="qNum">
        </div>
		<div class="col-lg-6">
            <label for="">Question1 Description</label>
            <input type="text" class="form-control" name="qDescription1">
        </div>
	</div>
    <div class="row">
	     <div class="col-lg-6">
            <label for="">Question1 Type</label>
             <select class="form-control" id="qType1" name="qType1">
				  <option value="" selected disabled>Question Type</option>
				  <option value="1">T/F</option>
				  <option value="2">Multiple Choice & Signle Answer</option>
				  <option value="3">Multiple Choice & Multiple Answers</option>
				  <option value="4">Open & End</option>
            </select>
        </div>
		<br>
	</div>
	<div class="row options">
	</div>
	<div class="row toggles">
	</div>
	</div>
	
<?php 

?>
	
	<div class="row">
	  <div class="col-lg-6"><button type="submit">Save</button></div>
	  <div class="col-lg-6">
		<a class="button" id="addQuestion">Add Question</a>&nbsp;&nbsp;<a class="button" id="deleteQuestion">Delete Question</a><br />
		<label for="">Sequence?</label><select class="form-control" id="IsSequenceTotal"><option value="1">YES</option><option value="0" selected="">NO</option></select>
	  </div>
	</div>
</form>
<?php endif;?>
<?php if(!isset($_GET["QID"])) {
	
}
?>
 
<div class="forJS" style="display: none;">
<div id="Q0" class="questions">
	<div class="row">
	     <div class="col-lg-6">
            <label for="">Question1 Title</label>
            <input type="text" class="form-control" name="qTitle">
        </div>
		<div class="col-lg-6">
            <label for="">Question1 Description</label>
            <input type="text" class="form-control" name="qDescription">
        </div>
	</div>
    <div class="row">
	     <div class="col-lg-6">
            <label for="">Question1 Type</label>
            <select class="form-control" id="qType0" name="qType">
				<option value="" selected="" disabled="">Question Type</option>
				<option value="1">T/F</option>
				<option value="2">Multiple Choice &amp; Signle Answer</option>
				<option value="3">Multiple Choice &amp; Multiple Answers</option>
				<option value="4">Open &amp; End</option>
            </select>
        </div>
		<br>
	</div>
	<div class="row options" id="optionSettings0"><div class="col-lg-6"><label id="OptionsTF0">Options1 Settings</label><input type="text" id="0OptionCount1" class="form-control" name="oValue0" placeholder="OptionValue" value="TRUE"><input id="0OptionCount2" type="text" class="form-control" name="oValue0" placeholder="OptionValue" value="False"></div></div>
	<div class="row toggles"><div class="col-lg-6"><label for="">Is it mandatory?</label><select class="form-control" name="qMandatory"><option value="1">YES</option><option value="0" selected="">NO</option></select></div>
	<div class="col-lg-6"><label for="">Question1 Is Sequence?</label><select class="form-control IsSequence0" id="IsSequence0"><option value="1">YES</option><option value="0" selected="">NO</option></select></div></div>
	</div>
</div>