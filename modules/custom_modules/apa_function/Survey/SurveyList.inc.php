<?php
/* Survey Group List */
if(isset($_POST["action"])) { $action=$_POST["action"]; UpdateGroupList($action); }
if(isset($_POST["delete"])) { $delete= $_POST["delete"]; DeleteGroup($delete); }//$action=$_POST["action"]; UpdateGroupList($action); }

// to get Group array;
$GroupList = array();

//include('SurveyFunction.inc.php');

$GroupList = GetGroupList();

//start frame
////// frame goes here
echo "<a href='surveydetail'> Create New </a>";
echo "<div class='SurveyList'><ul class='Row'>";
// need to put header of table here
echo "<li><div class='ColSection ColHeader'><ul class='Col'>";
echo "<li>ID</li><li>Name</li><li>Description</li><li>Start Date</li><li>End Date</li>";
echo "<li>User number Limit</li><li>User type Limit</li><li>Publish status</li><li>Tools</li>";
echo "</ul></div></li>";
foreach($GroupList as $lines) {
	echo "<li><div class='ColSection'><ul class='Col'>";
	$counter = 0;
	$id = "";
	foreach($lines as $cols) {
		$counter++;
		if($counter != 2) {
			if($counter == 1) { $id = $cols; }
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
	echo "<li><button><a href='surveyquestions?GID=".$id."'>Edit Questions</a></button><button><a href='surveydetail?GID=".$id."'>Update</a></button>
	<button class='deletebutton".$id."' type='button' data-toggle='modal' data-target='#deleteform'>Delete</button>
	</li>";
	echo "</ul></div></li>";
}
echo "</ul></div>";
?>
<div id="deleteform" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">pop-up test</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete?</p>
		<form method="POST" action="surveylist">
			<input type="hidden" name="delete" value="">
			<button type="submit">Delete</button>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<?php
// end frame
////// end frame goes here
echo "<p>Think out loud: Description of each survey will go under and 'click to expand' form.</p>";
echo "<p>Think out loud: Will have sort function here along with a pagination.</p>";
echo "<p>Think out loud: Combine limits and display together";

?>