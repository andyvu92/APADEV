<?php if(!isset($_GET["GID"])):?>
<form method="POST" action="../sites/all/themes/evolve/Survey/Surveydatabase.inc.php?action=create">
   <div class="row">
        <div class="col-lg-6">
            <label for="">Group Title</label>
            <input type="text" class="form-control" name="groupTitle">
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
 <?php    if(isset($_GET["GID"])){
	   $GID = $_GET['GID'];
	   $dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config');
	   $connSelect = $dbt->prepare('SELECT * FROM groups WHERE GroupID= :GID');
	   $connSelect->bindValue(':GID', $GID);
	   $connSelect->execute();
	if($connSelect->rowCount()>0) { 
      foreach ($connSelect as $row) {
		$parentID= $row['ParentID'];
		$GTitle = $row['GroupTitle'];
		$GDescription = $row['groupDescription'];
		$GStartDate = $row['groupStartDate'];
		$GEndDate = $row['groupEndDate'];
		$GUserNum = $row['GroupNumUserLimit'];
		$GUserType = $row['GroupUserTypeLimit'];
		$GStatus = $row['IsPublished'];
	          break;}
	}	
	    $connSelect = null;
 }
 ?>
 <form method="POST" action="../sites/all/themes/evolve/Survey/Surveydatabase.inc.php?action=edit">
   <div class="row">
        <div class="col-lg-6">
            <label for="">Group Title</label>
			<input type="hidden" name="GID" value="<?php echo $GID;?>">
            <input type="text" class="form-control" name="groupTitle" value="<?php echo $GTitle;?>">
        </div>
        <div class="col-lg-6">
            <label for="">Group Description</label>
            <input type="text" class="form-control" name="groupDescription" value="<?php echo $GDescription;?>">
        </div>
    </div>
	<div class="row">
        <div class="col-lg-6">
            <label for="">Group StartDate</label>
            <input type="date" class="form-control" name="groupStartDate" value="<?php echo $GStartDate;?>">
        </div>
        <div class="col-lg-6">
            <label for="">Group EndDate</label>
            <input type="date" class="form-control" name="groupEndDate" value="<?php echo $GEndDate;?>">
        </div>
    </div>
	<div class="row">
        <div class="col-lg-6">
            <label for="">User Number</label>
            <input type="text" class="form-control" name="userNumber" value="<?php echo $GUserNum;?>">
        </div>
        <div class="col-lg-6">
            <label for="">User Type</label>
            <input type="text" class="form-control" name="userType" value="<?php echo $GUserType;?>">
        </div>
    </div>
	<div class="row">
        <div class="col-lg-6">
            <label for="">Published Status</label>
            <select class="form-control" id="publishStatus" name="publishStatus">
                              <option <?php if($GStatus =="1") echo "selected";?> value="1">YES</option>
                              <option <?php if($GStatus =="0") echo "selected";?> value="0">NO</option>
            </select>
        </div>
        <div class="col-lg-6"><button type="submit">Save</button></div>
    </div>
</form>
<?php endif;?>