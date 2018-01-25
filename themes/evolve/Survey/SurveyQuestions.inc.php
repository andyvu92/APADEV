<?php
/* Qeustions for survey List */
$GroupList = array();
//include('SurveyFunction.inc.php');
$GroupList = GetGroupList();
$OptionList = GetOptionList();
if(isset($_POST["action"])) { $action=$_POST["action"]; UpdateQustion($action); }
?>
<?php if(!isset($_GET["QID"])):?>
<form method="POST" action="surveyquestion" id="surveyForm">
   <div class="row">
        <div class="col-lg-6">
            <label for="">Please select one survey group:</label>
           
			<input type="hidden" name="action" value="create">
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
	<div id="Q1">
	<div class="row">
	     <div class="col-lg-6">
            <label for="">Question1 Title</label>
            <input type="text" class="form-control" name="qTitle">
			<input type="hidden" value="1" id="qnumber">
        </div>
		<div class="col-lg-6">
            <label for="">Question1 Description</label>
            <input type="text" class="form-control" name="qDescription">
        </div>
	</div>
    <div class="row">
	     <div class="col-lg-6">
            <label for="">Question1 Type</label>
             <select class="form-control" id="qType1" name="qType">
			                  <option value="" selected disabled>Question Type</option>
                              <option value="1">T/F</option>
                              <option value="2">Multiple Choice & Signle Answer</option>
							  <option value="3">Multiple Choice & Multiple Answers</option>
							  <option value="4">Open & End</option>
            </select>
        </div>
		 <div class="col-lg-6">
            <label for="">Is it mandatory?</label>
            <select class="form-control" name="qMandatory">
                              <option value="1">YES</option>
                              <option value="0">NO</option>
		    </select>
        </div>
	</div>
	<div class="row">
	     <div class="col-lg-6">
            <label for="">Question1 Is Sequence?</label>
             <select class="form-control" id="IsSequence">
			                  <option value="1">YES</option>
                              <option value="0" selected>NO</option>
            </select>
        </div>
		 
	</div>
	    
	</div>
	
	<div class="row">
	  <div class="col-lg-6"><button type="submit">Save</button></div>
	  <div class="col-lg-6"><a class="button" id="addQuestion">Add Question</a></div>
	</div>
</form>
<?php endif;?>
 