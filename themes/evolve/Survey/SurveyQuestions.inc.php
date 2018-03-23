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
				array_push($optionArrT, $_POST[$a."Answer1"]);
				if(isset($_POST[$a."OID1"])) {
					array_push($optionArrT, $_POST[$a."OID1"]);
				} else {
					array_push($optionArrT, "-");
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
				array_push($optionArrF, $_POST[$a."Answer2"]);
				if(isset($_POST[$a."OID2"])) {
					array_push($optionArrF, $_POST[$a."OID2"]);
				} else {
					array_push($optionArrF, "-");
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
					array_push($optionArrOn, $_POST[$a."Answer1"]);
					if(isset($_POST[$a."OID1"])) {
						array_push($optionArrOn, $_POST[$a."OID1"]);
					} else {
						array_push($optionArrOn, "-");
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
					array_push($optionArrTw, $_POST[$a."Answer2"]);
					if(isset($_POST[$a."OID2"])) {
						array_push($optionArrTw, $_POST[$a."OID2"]);
					} else {
						array_push($optionArrTw, "-");
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
					array_push($optionArrTr, $_POST[$a."Answer3"]);
					if(isset($_POST[$a."OID3"])) {
						array_push($optionArrTr, $_POST[$a."OID3"]);
					} else {
						array_push($optionArrTr, "-");
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
					array_push($optionArrFo, $_POST[$a."Answer4"]);
					if(isset($_POST[$a."OID4"])) {
						array_push($optionArrFo, $_POST[$a."OID4"]);
					} else {
						array_push($optionArrFo, "-");
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
					array_push($optionArrFi, $_POST[$a."Answer5"]);
					if(isset($_POST[$a."OID5"])) {
						array_push($optionArrFi, $_POST[$a."OID5"]);
					} else {
						array_push($optionArrFi, "-");
					}
					array_push($optionArr, $optionArrFi);
				}
			}
			array_push($ListArray, $optionArr);
			array_push($ListArray, $_POST["qType".$a]);
			array_push($ListArray, $_POST["qMandatory".$a]);
			if(isset($_POST["QID".$a])) {
				array_push($ListArray, $_POST["QID".$a]);
			} else {
				array_push($ListArray, "-");
			}
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
            <label for="">HAS GID - Please select one survey group:</label>
			<select class="form-control" id="groupTitle" name="GID">
				<?php $SelectedC = 0;
					foreach($GroupList as $lines) {
					  $counter = 0;
					  foreach($lines as $cols) {
						  $counter++;
						  if($counter == 1){
							if(intval($cols) == $_GET["GID"]) {
								echo '<option value="'.$cols.'" selected>';
							} else {
								echo '<option value="'.$cols.'">';
							}
						}
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
<?php /* Survey(Group) Selection done */ ?>

<?php $QuestionList = ListQuestions($_GET["GID"]); 
if($QuestionList == null): ?>
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
<?php /* we use this for next time */
/*
<div id="Lists" style="display: none;">
	<input type="hidden" value="" id="Plist" name="Plist">
	<input type="hidden" value="" id="Qlist" name="Qlist">
</div>
*/ 
$size = sizeof($QuestionList);
print_r($QuestionList);
?>
<input type="hidden" value="<?php echo $size; ?>" id="qnumber" name="qNum">
<?php  for($i=0; $i<$size; $i++):  ?>
<?php /* variables */
$QID = $QuestionList[$i][0]; 
$NthQuestion = $i + 1; ?>


<div id="Q<?php echo $NthQuestion; ?>" class="questions">
	<input type="hidden" value="<?php echo $QID; ?>" id="QID<?php echo $NthQuestion; ?>" name="QID<?php echo $NthQuestion; ?>">
	<div class="row">
		 <div class="col-lg-6">
			<label for="">Question<?php echo $NthQuestion; ?>'s title</label>
			<input type="text" value="<?php echo $QuestionList[$i][1]; ?>" placeholder="<?php echo $QuestionList[$i][1]; ?>" class="form-control" name="qTitle<?php echo $NthQuestion; ?>">
		</div>
		<div class="col-lg-6">
			<label for="">Question<?php echo $NthQuestion; ?>'s Description</label>
			<input type="text" value="<?php echo $QuestionList[$i][2]; ?>" placeholder="<?php echo $QuestionList[$i][2]; ?>" class="form-control" name="qDescription<?php echo $NthQuestion; ?>">
		</div>
	</div>
	<div class="row">
		 <div class="col-lg-6">
			<label for="">Question<?php echo $NthQuestion; ?> Type</label>
			 <select class="form-control" id="qType<?php echo $NthQuestion; ?>" name="qType<?php echo $NthQuestion; ?>">
				  <option value="" disabled>Question Type</option>
				  <option value="1" <?php if($QuestionList[$i][4] == 1) echo 'selected="selected"'; ?>>T/F</option>
				  <option value="2" <?php if($QuestionList[$i][4] == 2) echo 'selected="selected"'; ?>>Multiple Choice & Signle Answer</option>
				  <option value="3" <?php if($QuestionList[$i][4] == 3) echo 'selected="selected"'; ?>>Multiple Choice & Multiple Answers</option>
				  <option value="4" <?php if($QuestionList[$i][4] == 4) echo 'selected="selected"'; ?>>Open & End</option>
			</select>
		</div>
		<br>
	</div>
	<div class="row options" id="optionSettings<?php echo $NthQuestion; ?>">
		<?php if($QuestionList[$i][4] == 2): // if multiSingle ?>
		<div class="col-lg-6">
			<label id="OptionsMCSA<?php echo $NthQuestion; ?>">Question<?php echo $NthQuestion; ?>'s Option Settings</label>
			<?php $OptionSize = sizeof($QuestionList[$i][3]) - 1; ?>
			<?php $optionMax = $size - $i; ?>
			<?php  for($t=0; $t< 5; $t++):  ?>
				<?php if($OptionSize < $t): // out of range, for additional options ?>
					<input type="text" id="<?php echo $NthQuestion; ?>OptionCount<?php echo ($t + 1); ?>" class="form-control" name="<?php echo $NthQuestion; ?>oValue<?php echo ($t + 1); ?>" placeholder="OptionValue">
				<?php else: // within range, for existing options ?>
					<input type="text" id="<?php echo $NthQuestion; ?>OptionCount<?php echo ($t + 1); ?>" class="form-control" name="<?php echo $NthQuestion; ?>oValue<?php echo ($t + 1); ?>" value="<?php echo $QuestionList[$i][3][$t][1]; ?>" placeholder="<?php echo $QuestionList[$i][3][$t][1]; ?>">
				<?php endif; ?>
				<div style="height: 34px; text-align: right; position: inherit">Answer:</div>
			<?php endfor;?>
		</div>
		<div class="col-lg-6">
			<div class="SequenceQDorp<?php echo $NthQuestion; ?>">
				<label for="">Question<?php echo $NthQuestion; ?>'s next</label>
				<?php  for($t=0; $t< 5; $t++):  ?>
					<select class="form-control" id="<?php echo $NthQuestion; ?>qNext<?php echo ($t + 1);?>" name="<?php echo $NthQuestion; ?>qNext<?php echo ($t + 1);?>">
						<option value="0">No further options</option>
						<?php if($OptionSize < $t): // out of range, for additional options ?>
							<?php  for($z= $NthQuestion ; $z <= $size; $z++):  ?>
								<option value="<?php echo $z; ?>"><?php echo $z; ?></option>
							<?php endfor;?>
						<?php else: // within range, for existing options ?>
							<?php  for($z = ($NthQuestion + 1) ; $z <= $size; $z++):  ?>
								<?php if($z == $QuestionList[$i][3][$t][4]): // selected ?>
									<option value="<?php echo $z; ?>" selected="selected"><?php echo $z; ?></option>
								<?php else: ?>
									<option value="<?php echo $z; ?>"><?php echo $z; ?></option>
								<?php endif; ?>
							<?php endfor;?>
						<?php endif; ?>
					</select>
					<?php if($OptionSize < $t): // out of range, for additional options ?>
						<input type="text" id="<?php echo $NthQuestion; ?>Answer<?php echo ($t + 1); ?>" class="form-control" name="<?php echo $NthQuestion; ?>Answer<?php echo ($t + 1); ?>" placeholder="Type answer">
					<?php else: // within range, for existing options ?>
						<?php if($QuestionList[$i][3][$t][3] != "" || $QuestionList[$i][3][$t][3] != null): ?>
						<input type="text" id="<?php echo $NthQuestion; ?>Answer<?php echo ($t + 1); ?>" value="<?php echo $QuestionList[$i][3][$t][3]; ?>" class="form-control" name="<?php echo $NthQuestion; ?>Answer<?php echo ($t + 1); ?>" placeholder="<?php echo $QuestionList[$i][3][$t][3]; ?>">
						<?php else: ?>
						<input type="text" id="<?php echo $NthQuestion; ?>Answer<?php echo ($t + 1); ?>" class="form-control" name="<?php echo $NthQuestion; ?>Answer<?php echo ($t + 1); ?>" placeholder="Type answer">
						<?php endif; ?>
						<input type="hidden" value="<?php echo $QuestionList[$i][3][$t][0]; ?>" id="<?php echo $NthQuestion; ?>OID<?php echo $t; ?>" name="<?php echo $NthQuestion; ?>OID<?php echo $t; ?>">
					<?php endif; ?>
				<?php endfor;?>
			</div>
		</div>
		<?php else: // if TF ?>
		<div class="col-lg-6">
			<label id="OptionsTF<?php echo $NthQuestion; ?>">Question<?php echo $NthQuestion; ?>'s Option</label>
			<input type="text" id="<?php echo $NthQuestion; ?>OptionCount1" class="form-control" name="<?php echo $NthQuestion; ?>oValue1" placeholder="OptionValue" value="True">
			<div style="height: 34px; text-align: right; position: inherit">Answer:</div>
			<input type="text" id="<?php echo $NthQuestion; ?>OptionCount2" class="form-control" name="<?php echo $NthQuestion; ?>oValue2" placeholder="OptionValue" value="False">
			<div style="height: 34px; text-align: right; position: inherit">Answer:</div>
		</div>
		<div class="col-lg-6">
			<div class="SequenceQDorp<?php echo $NthQuestion; ?>">
				<label for="">Question<?php echo $NthQuestion; ?>'s next</label>
				<select class="form-control" id="<?php echo $NthQuestion; ?>qNext1" name="<?php echo $NthQuestion; ?>qNext1">
					<option value="0">No further options</option>
					<?php  for($z= ($NthQuestion + 1) ; $z <= $size; $z++):  ?>
						<?php if($z == $QuestionList[$i][3][0][4]): // selected ?>
							<option value="<?php echo $z; ?>" selected="selected"><?php echo $z; ?></option>
						<?php else: ?>
							<option value="<?php echo $z; ?>"><?php echo $z; ?></option>
						<?php endif; ?>
					<?php endfor;?>
				</select>
				<?php if($QuestionList[$i][3][0][3] != "" || $QuestionList[$i][3][0][3] != null): ?>
				<input type="text" id="<?php echo $NthQuestion; ?>Answer1" value="<?php echo $QuestionList[$i][3][0][3]; ?>" class="form-control" name="<?php echo $NthQuestion; ?>Answer1" placeholder="<?php echo $QuestionList[$i][3][0][3]; ?>">
				<?php else: ?>
				<input type="text" id="<?php echo $NthQuestion; ?>Answer1" class="form-control" name="<?php echo $NthQuestion; ?>Answer1" placeholder="Type answer">
				<?php endif; ?>
				<input type="hidden" value="<?php echo $QuestionList[$i][3][0][0]; ?>" id="<?php echo $NthQuestion; ?>OID1" name="<?php echo $NthQuestion; ?>OID1">
				<select class="form-control" id="<?php echo $NthQuestion; ?>qNext2" name="<?php echo $NthQuestion; ?>qNext2">
					<option value="0">No further options</option>
					<?php  for($z= ($NthQuestion + 1) ; $z <= $size; $z++):  ?>
						<?php if($z == $QuestionList[$i][3][1][4]): // selected ?>
							<option value="<?php echo $z; ?>" selected="selected"><?php echo $z; ?></option>
						<?php else: ?>
							<option value="<?php echo $z; ?>"><?php echo $z; ?></option>
						<?php endif; ?>
					<?php endfor;?>
				</select>
				<?php if($QuestionList[$i][3][1][3] != "" || $QuestionList[$i][3][1][3] != null): ?>
				<input type="text" id="<?php echo $NthQuestion; ?>Answer2" value="<?php echo $QuestionList[$i][3][1][3]; ?>" class="form-control" name="<?php echo $NthQuestion; ?>Answer2" placeholder="<?php echo $QuestionList[$i][3][1][3]; ?>">
				<?php else: ?>
				<input type="text" id="<?php echo $NthQuestion; ?>Answer2" class="form-control" name="<?php echo $NthQuestion; ?>Answer2" placeholder="Type answer">
				<?php endif; ?>
				<input type="hidden" value="<?php echo $QuestionList[$i][3][1][0]; ?>" id="<?php echo $NthQuestion; ?>OID2" name="<?php echo $NthQuestion; ?>OID2">
			</div>
		</div>
		<?php endif; ?>
		<div class="row">
			<div class="col-lg-6"><a class="button<?php echo $NthQuestion; ?>" id="AddOption<?php echo $NthQuestion; ?>">AddOption</a></div>
		</div>
		<div class="<?php echo $NthQuestion; ?>optionAdd"></div>
	</div>
	<div class="row toggles">
		<div class="col-lg-6">
			<label for="">Is it mandatory?</label>
			<select class="form-control" name="qMandatory<?php echo $NthQuestion; ?>">
				<option value="1" <?php if($QuestionList[$i][5] == 1) echo "selected"; ?>>YES</option>
				<option value="0" <?php if($QuestionList[$i][5] == 0) echo "selected"; ?>>NO</option>
			</select>
		</div>
		<div class="col-lg-6">
			<label for="">Question<?php echo $NthQuestion; ?> Is Sequence?</label>
			<select class="form-control IsSequence<?php echo $NthQuestion; ?>" id="IsSequence<?php echo $NthQuestion; ?>">
				<option value="1">YES</option>
				<option value="0" selected="">NO</option>
			</select>
		</div>
	</div>	
</div>
<?php endfor;?>
	<div class="row">
		<div class="col-lg-6"><button type="submit">Save</button></div>
		<div class="col-lg-6">
			<a class="button" id="addQuestion">Add Question</a>&nbsp;&nbsp;<a class="button" id="deleteQuestion">Delete Question</a><br />
			<label for="">Sequence?</label><select class="form-control" id="IsSequenceTotal"><option value="1">YES</option><option value="0" selected="">NO</option></select>
		</div>
	</div>
</form>
<?php endif;?>
 
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