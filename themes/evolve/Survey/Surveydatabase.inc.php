<?php
/* Survey Database */

/* ------------------ forGetGroupList() start -------- */
function forGetGroupList() {
	$arrayReturn = array();
	try {
		//$db = new PDO('mysql:host=10.1.1.35;dbname=apa_survey', 'c0DefaultMain', 'Apa2017Config');
		$db = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config');
		
		$Mcheck = $db->prepare('SELECT * FROM groups');
		if(!$Mcheck->execute()) {
			echo "<br />RunFail- Mcheck<br>";
			print_r($Mcheck->errorInfo());
		}
		// Tester! 	echo "<p>Number of raws: ".$Mcheck->rowCount()."</p>";
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
		// close connection
		$Mcheck->closeCursor();
		$Mcheck = null;
		
		/////////// end of the code
		$db = null;
	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}
	return $arrayReturn;
}
/* ------------------ forGetGroupList() end -------- */

/* ------------------ forUpdateGroupList($action) start -------- */
function forUpdateGroupList($action){
/* Survey Group Edit/Create */
	try {
		$dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config'); 
		$GDescription = '';
		$GStartDate = '';
		$GEndDate = '';
		$userNumber = '';
		$userType = '';
		$publishStatus = '';
       $GTitle = $_POST['groupTitle'];
	   if(isset($_POST['GID'])){ $GID = $_POST['GID']; }
	   if(isset($_POST['groupDescription'])){ $GDescription = $_POST['groupDescription']; }
	   if(isset($_POST['groupStartDate'])){ $GStartDate = $_POST['groupStartDate']; }
       if(isset($_POST['groupEndDate'])){ $GEndDate = $_POST['groupEndDate']; }    
	   if(isset($_POST['userNumber'])){ $GUserNum = $_POST['userNumber']; } 
	   if(isset($_POST['userType'])){ $GUserType = $_POST['userType']; }
       if(isset($_POST['publishStatus'])){ $GStatus = $_POST['publishStatus']; } 	   
         if($action == "create"){ 
		  $connUpdate= $dbt->prepare('INSERT INTO groups (GroupTitle, GroupDescription, GroupStartDate, GroupEndDate, GroupNumUserLimit, GroupUserTypeLimit, IsPublished) VALUES (:GTitle, :GDescription, :GStartDate, :GEndDate, :userNumber, :userType, :publishStatus)');
		 }
          if($action == "edit")	{
			  $connUpdate= $dbt->prepare('UPDATE groups SET GroupTitle = :GTitle, GroupDescription = :GDescription, GroupStartDate = :GStartDate, GroupEndDate = :GEndDate, GroupNumUserLimit = :userNumber, GroupUserTypeLimit = :userType, IsPublished = :publishStatus WHERE GroupID= :GID');  
		      $connUpdate->bindValue(':GID', $GID);
		  }	
		  $connUpdate->bindValue(':GTitle', $GTitle);
          $connUpdate->bindValue(':GDescription', $GDescription);
		  $connUpdate->bindValue(':GStartDate', $GStartDate);
		  $connUpdate->bindValue(':GEndDate', $GEndDate);
		  $connUpdate->bindValue(':userNumber', $GUserNum);
		  $connUpdate->bindValue(':userType', $GUserType);
		  $connUpdate->bindValue(':publishStatus', $GStatus);
		  $connUpdate->execute();
 
          $connUpdate= null;
       echo "save sccussfully!";
  
     }
      catch (PDOException $e) {
				print "Error!: " . $e->getMessage() . "<br/>";
				die();
	  }
   
}
/* ------------------ forUpdateGroupList($action) end -------- */

/* ------------------ forSingleGroup($GID) start -------- */
function forSingleGroup($GID){
	   $arrayReturn = array();
	  
	   $dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config');
	   $connSelect = $dbt->prepare('SELECT * FROM groups WHERE GroupID= :GID');
	   $connSelect->bindValue(':GID', $GID);
	   $connSelect->execute();
	if($connSelect->rowCount()>0) { 
      foreach ($connSelect as $row) {
		    $arrayRaw = array();
			array_push($arrayRaw, $row['ParentID']);
			array_push($arrayRaw, $row['GroupTitle']);
			array_push($arrayRaw, $row['GroupDescription']);
			array_push($arrayRaw, $row['GroupStartDate']);
			array_push($arrayRaw, $row['GroupEndDate']);
			array_push($arrayRaw, $row['GroupNumUserLimit']);
			array_push($arrayRaw, $row['GroupUserTypeLimit']);
			array_push($arrayRaw, $row['IsPublished']);
			
			array_push($arrayReturn, $arrayRaw);
		
	          }
	}	
	    $connSelect = null;
        return $arrayReturn;
	
}
/* ------------------ forSingleGroup($GID)end -------- */

/* ------------------ forUpdateQustion($action) start -------- */
function forUpdateQustion($action){
/* Survey Group Edit/Create */
	try {
		$dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config'); 
		$QDescription = '';
		$QType = '';
		$QMandatory = '';
		$QOption = '';
       $QTitle = $_POST['qTitle'];
	   if(isset($_POST['QID'])){ $QID = $_POST['QID']; }
	   if(isset($_POST['qDescription'])){ $QDescription = $_POST['qDescription']; }
	   if(isset($_POST['qType'])){ $QType = $_POST['qType']; }
       if(isset($_POST['qMandatory'])){ $QMandatory = $_POST['qMandatory']; } 
	   if(isset($_POST['optionID'])){ $QOption = $_POST['optionID']; } 
	   if(isset($_POST['GID'])){ $GID = $_POST['GID']; }
	   if($action == "create"){
          if(isset($_POST['oValue'])){ $OValue = $_POST['oValue']; } 
		  $optionUpdate= $dbt->prepare('INSERT INTO options (Value) VALUES (:OValue)');
		  $optionUpdate->bindValue(':OValue', $OValue);
		  $optionUpdate->execute();
		  $QOption = $dbt->lastInsertId();
		  $optionUpdate= null;
          $connUpdate= $dbt->prepare('INSERT INTO questions (QuestionTitle, QuestionDescription, OptionID, QuestionType, IsMandatory) VALUES (:QTitle, :QDescription, :QOption, :QType, :QMandatory)');
		  $parentUpdate= $dbt->prepare('INSERT INTO parent (ParentTitle, ParentDescription, GroupID) VALUES (:QTitle, :QDescription, :GID)');
		  $parentUpdate->bindValue(':QTitle', $QTitle);
          $parentUpdate->bindValue(':QDescription', $QDescription);
		  $parentUpdate->bindValue(':GID', $GID);
		  $parentUpdate->execute();
          $parentUpdate= null;		  
		 }			  
		  
		  
          if($action == "edit")	{
			  $connUpdate= $dbt->prepare('UPDATE questions SET QuestionTitle = :QTitle, QuestionDescription = :QDescription, QuestionType = :QType, IsMandatory = :QMandatory WHERE QuestionID= :QID');  
		      $connUpdate->bindValue(':QID', $QID);
		  }	
		  $connUpdate->bindValue(':QTitle', $QTitle);
          $connUpdate->bindValue(':QDescription', $QDescription);
		  $connUpdate->bindValue(':QOption', $QOption);
		  $connUpdate->bindValue(':QType', $QType);
		  $connUpdate->bindValue(':QMandatory', $QMandatory);
		  $connUpdate->execute();
          $connUpdate= null;
       echo "save sccussfully!";
  
     }
      catch (PDOException $e) {
				print "Error!: " . $e->getMessage() . "<br/>";
				die();
	  }
   
}
/* ------------------ forUpdateQustion($action) end -------- */
/* ------------------ forGetOptionList() start -------- */
function forGetOptionList() {
	$arrayReturn = array();
	try {
		//$db = new PDO('mysql:host=10.1.1.35;dbname=apa_survey', 'c0DefaultMain', 'Apa2017Config');
		$db = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config');
		
		$Mcheck = $db->prepare('SELECT * FROM options');
		if(!$Mcheck->execute()) {
			echo "<br />RunFail- Mcheck<br>";
			print_r($Mcheck->errorInfo());
		}
		// Tester! 	echo "<p>Number of raws: ".$Mcheck->rowCount()."</p>";
		foreach($Mcheck as $checks) {
			$arrayRaw = array();
			array_push($arrayRaw, $checks[0]);
			array_push($arrayRaw, $checks[1]);
			array_push($arrayRaw, $checks[2]);
			array_push($arrayRaw, $checks[3]);
			array_push($arrayReturn, $arrayRaw);
		}
		// close connection
		$Mcheck->closeCursor();
		$Mcheck = null;
		
		/////////// end of the code
		$db = null;
	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}
	return $arrayReturn;
}
/* ------------------ forGetGroupList() end -------- */


?>