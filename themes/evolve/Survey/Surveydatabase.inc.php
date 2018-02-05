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

/* ------------------ forDeleteGroup($GID) start -------- */
function forDeleteGroup($GID) {
	try {
		//$db = new PDO('mysql:host=10.1.1.35;dbname=apa_survey', 'c0DefaultMain', 'Apa2017Config');
		$db = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config');
		
		$Delete = $db->prepare('Delete FROM groups WHERE GroupID = :gid');
		$Delete->bindValue(':gid', $GID);
		if(!$Delete->execute()) {
			echo "<br />RunFail- Mcheck<br>";
			print_r($Delete->errorInfo());
		}
		echo "delete successful!";
		
		// close connection
		$Delete->closeCursor();
		$Delete = null;
		
		/////////// end of the code
		$db = null;
	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}
}
/* ------------------ forDeleteGroup($GID) end -------- */

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

/* ------------------ forUpdateQustions($action) start -------- */
function forUpdateQustions($action){
	// this variable will be used to add optionID to questions and questionID to options.
	$QuestionList = Array();
	try {
		$dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config'); 
		/* First run - Enter questions */
		$questionInsert = $dbt->prepare('INSERT INTO questions (QuestionTitle, QuestionDescription, QuestionType, IsMandatory) VALUES (:QTitle, :QDescription, :QType, :QMandatory)');
		$questionInsert->bindValue(':QTitle', $OValue);
		$questionInsert->bindValue(':QDescription', $OValue);
		$questionInsert->bindValue(':QType', $OValue);
		$questionInsert->bindValue(':QMandatory', $OValue);
		/* Second run - Enter options */
		$optionInsert= $dbt->prepare('INSERT INTO options (Value, NextQuestion, QuestionID) VALUES (:OValue, :NextQuestion, :QuestionID)');
		$optionInsert->bindValue(':OValue', $OValue);
		$optionInsert->bindValue(':NextQuestion', $OValue);
		$optionInsert->bindValue(':QuestionID', $OValue);
		/* Third run - Enter option ID to questions */
		$questionUpdate= $dbt->prepare('UPDATE questions SET OptionID = :OID WHERE QuestionID= :QID');  
		$questionUpdate->bindValue(':OID', $OValue);
		$questionUpdate->bindValue(':QID', $OValue);
		/* Forth run - Create parent based on QID list array */
		/* Forth run - Don't build at sprint2. out of scope */
		// code
		/* Fifth run - Add ParentIDs in Group */
		/* Fifth run - Don't build at sprint2. out of scope */
		// code
		echo "save sccussfully!";
  
    } catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}
   
}
/* ------------------ forUpdateQustions($action) end -------- */

/* ------------------ forListQustions($GID) start -------- */
function forListQuestions($GID){
	// this variable will be used to search parent list from Group table.
	$parentListArray = Array();
	
	$questionCollection = Array();
	
	//$db = new PDO('mysql:host=10.1.1.35;dbname=apa_survey', 'c0DefaultMain', 'Apa2017Config');
	$db = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config');
	try {
	
	   $connSelect = $db->prepare('SELECT * FROM groups WHERE GroupID= :GID');
	   $connSelect->bindValue(':GID', $GID);
	   $connSelect->execute();
	if($connSelect->rowCount()>0) { 
        foreach ($connSelect as $row) {
		   $parentStr = $row['ParentID'];
		   print_r($parentStr);
	       echo "----Parent List ID---<br>";
            break;			
	    }
	}
    //Get ParentList from Group	
	$parentListArray = explode(",",$parentStr);
    $questioL = array();
	//loop get question list from parent table
		for ($i=0; $i<sizeof($parentListArray); $i++){
		  $questionListArray = array();
		   $pSelect = $db->prepare('SELECT * FROM parent WHERE ParentID= :PID');
           $pSelect->bindValue(':PID', $parentListArray[$i]);
           $pSelect->execute();
           if($pSelect->rowCount()>0){
			   foreach ($pSelect as $rowParent){
				  $questionStr = $rowParent['QuestionList'];
				  print_r($questionStr);
	              echo "----Question List ID---<br>";
				  //break;
			   }
		    }
            //get question list for one loop 
		
			$questionListArray = explode(",",$questionStr); 
			$questioL = array_merge($questioL, $questionListArray);
	      	//if($i==0){$questioL = $questionListArray;}
			//else{array_merge($questioL, $questionListArray);}
		    print_r($questioL);
			echo "-------<br>";
		
			
		}	
            //get questions from questions table 
            for ($i=0; $i<sizeof($questioL); $i++){
			   $qSelect = $db->prepare('SELECT * FROM questions WHERE QuestionID= :QID');
			   $qSelect->bindValue(':QID', $questioL[$i]);
			   $qSelect->execute();
			   if($qSelect->rowCount()>0){
				   foreach ($qSelect as $rowQuestion){
					  echo "----Options List ID for one question---<br>";
					  $arrayQuestion = array();
					  $OptionList = array();
					  $optionItem = array();
					  
					  //get option list for each question
					  $optionStr = $rowQuestion['OptionID'];
					  print_r($optionStr);
	                  echo "----Option---<br>";
					  $optionList = explode(",",$optionStr);
					  //get option data from options table
					  for($j=0; $j<sizeof($optionList);$j++){
						//$optionCollection = array();
						$oSelect = $db->prepare('SELECT * FROM options WHERE OptionID= :OID');
			            $oSelect->bindValue(':OID', $optionList[$j]);
			            $oSelect->execute();
                      	if($oSelect->rowCount()>0){
							foreach ($oSelect as $rowOption){
								$arrayOption = array();
								array_push($arrayOption, $rowOption['OptionID']);
								array_push($arrayOption, $rowOption['Value']);
								array_push($arrayOption, $rowOption['NextQuestion']);
								array_push($optionItem, $arrayOption);
							}
						}
                                             					
					  }
					 // array_push($optionCollection, $optionItem);	
					  array_push($arrayQuestion, $rowQuestion['QuestionID']);
					  array_push($arrayQuestion, $rowQuestion['QuestionTitle']);
					  array_push($arrayQuestion, $rowQuestion['QuestionDescription']);
					  array_push($arrayQuestion, $optionItem);
					  array_push($arrayQuestion, $rowQuestion['QuestionType']);
					  array_push($arrayQuestion, $rowQuestion['IsMandatory']);
					  array_push($questionCollection, $arrayQuestion);
				   }
				}
            }			
		
	// Return the array colletion for all the questions against with option
        return $questionCollection;
	
  
    } catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}
   
}
/* ------------------ forListQustions($GID) end -------- */
?>