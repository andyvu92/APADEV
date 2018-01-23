<?php include('SurveyFunction.inc.php');
  if(isset($_POST["action"])) { $action=$_POST["action"]; UpdateGroupList($action); }
 ?>
<?php if(!isset($_GET["GID"])):?>
<form method="POST" action="surveydetail">
   <div class="row">
        <div class="col-lg-6">
            <label for="">Group Title</label>
            <input type="text" class="form-control" name="groupTitle">
			<input type="hidden" name="action" value="create">
        </div>
        <div class="col-lg-6">
            <label for="">Group Description</label>
            <input type="text" class="form-control" name="groupDescription">
        </div>
    </div>
	<div class="row">
        <div class="col-lg-6">
            <label for="">Group StartDate</label>
            <input type="date" class="form-control" name="groupStartDate">
        </div>
        <div class="col-lg-6">
            <label for="">Group EndDate</label>
            <input type="date" class="form-control" name="groupEndDate">
        </div>
    </div>
	<div class="row">
        <div class="col-lg-6">
            <label for="">User Number</label>
            <input type="text" class="form-control" name="userNumber">
        </div>
        <div class="col-lg-6">
            <label for="">User Type</label>
            <input type="text" class="form-control" name="userType">
        </div>
    </div>
	<div class="row">
        <div class="col-lg-6">
            <label for="">Published Status</label>
            <select class="form-control" id="publishStatus" name="publishStatus">
                              <option value="1">YES</option>
                              <option value="0">NO</option>
            </select>
        </div>
        <div class="col-lg-6"><button type="submit">Save</button></div>
    </div>
</form>
<?php endif;?>
<?php if(isset($_GET["GID"])):?>
 <?php   
	  if(isset($_GET["GID"])){ 
	   $GID = $_GET['GID'];
	   $groupArray = SingleGroup($GID);
	 
	  }
 ?>
 <form method="POST" action="surveydetail">
   <div class="row">
        <div class="col-lg-6">
            <label for="">Group Title</label>
			<input type="hidden" name="GID" value="<?php echo $GID;?>">
			<input type="hidden" name="action" value="edit">
            <input type="text" class="form-control" name="groupTitle" value="<?php echo $groupArray[0][1];?>">
        </div>
        <div class="col-lg-6">
            <label for="">Group Description</label>
            <input type="text" class="form-control" name="groupDescription" value="<?php echo $groupArray[0][2];?>">
        </div>
    </div>
	<div class="row">
        <div class="col-lg-6">
            <label for="">Group StartDate</label>
            <input type="date" class="form-control" name="groupStartDate" value="<?php echo $groupArray[0][3];?>">
        </div>
        <div class="col-lg-6">
            <label for="">Group EndDate</label>
            <input type="date" class="form-control" name="groupEndDate" value="<?php echo $groupArray[0][4];?>">
        </div>
    </div>
	<div class="row">
        <div class="col-lg-6">
            <label for="">User Number</label>
            <input type="text" class="form-control" name="userNumber" value="<?php echo $groupArray[0][5];?>">
        </div>
        <div class="col-lg-6">
            <label for="">User Type</label>
            <input type="text" class="form-control" name="userType" value="<?php echo $groupArray[0][6];?>">
        </div>
    </div>
	<div class="row">
        <div class="col-lg-6">
            <label for="">Published Status</label>
            <select class="form-control" id="publishStatus" name="publishStatus">
                              <option <?php if($groupArray[0][7] =="1") echo "selected";?> value="1">YES</option>
                              <option <?php if($groupArray[0][7] =="0") echo "selected";?> value="0">NO</option>
            </select>
        </div>
        <div class="col-lg-6"><button type="submit">Save</button></div>
    </div>
</form>
<?php endif;?>