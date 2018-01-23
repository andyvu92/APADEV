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



/* Survey Group Edit/Create */
$dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config'); 


$GDescription = '';
$GStartDate = '';
$GEndDate = '';
$userNumber = '';
$userType = '';
$publishStatus = '';
 if(isset($_GET["action"])&& $_GET["action"]=="create"){
      $GTitle = $_POST['groupTitle'];
	   if(isset($_POST['groupDescription'])){ $GDescription = $_POST['groupDescription']; }
	   if(isset($_POST['groupStartDate'])){ $GStartDate = $_POST['groupStartDate']; }
       if(isset($_POST['groupEndDate'])){ $GEndDate = $_POST['groupEndDate']; }    
	   if(isset($_POST['userNumber'])){ $GUserNum = $_POST['userNumber']; } 
	   if(isset($_POST['userType'])){ $GUserType = $_POST['userType']; }
       if(isset($_POST['publishStatus'])){ $GStatus = $_POST['publishStatus']; } 	   
          $connCreate= $dbt->prepare('INSERT INTO groups (GroupTitle, GroupDescription, GroupStartDate, GroupEndDate, GroupNumUserLimit, GroupUserTypeLimit, IsPublished) VALUES (:GTitle, :GDescription, :GStartDate, :GEndDate, :userNumber, :userType, :publishStatus)');
		  $connCreate->bindValue(':GTitle', $GTitle);
          $connCreate->bindValue(':GDescription', $GDescription);
		  $connCreate->bindValue(':GStartDate', $GStartDate);
		  $connCreate->bindValue(':GEndDate', $GEndDate);
		  $connCreate->bindValue(':userNumber', $userNumber);
		  $connCreate->bindValue(':userType', $userType);
		  $connCreate->bindValue(':publishStatus', $publishStatus);
		  $connCreate->execute();
          $connCreate= null;
     echo "save sccussfully!";
    }
 
 if(isset($_GET["action"])&&$_GET["action"]=="edit"){
	   $GID = $_POST['GID'];
       $GTitle = $_POST['groupTitle'];
	   if(isset($_POST['groupDescription'])){ $GDescription = $_POST['groupDescription']; }
	   if(isset($_POST['groupStartDate'])){ $GStartDate = $_POST['groupStartDate']; }
       if(isset($_POST['groupEndDate'])){ $GEndDate = $_POST['groupEndDate']; }    
	   if(isset($_POST['userNumber'])){ $GUserNum = $_POST['userNumber']; } 
	   if(isset($_POST['userType'])){ $GUserType = $_POST['userType']; }
       if(isset($_POST['publishStatus'])){ $GStatus = $_POST['publishStatus']; } 
          $connUpdate= $dbt->prepare('UPDATE groups SET GroupTitle = :GTitle, GroupDescription = :GDescription, GroupStartDate = :GStartDate, GroupEndDate = :GEndDate, GroupNumUserLimit = :userNumber, GroupUserTypeLimit = :userType, IsPublished = :publishStatus WHERE GroupID= :GID');
		  $connUpdate->bindValue(':GTitle', $GTitle);
          $connUpdate->bindValue(':GDescription', $GDescription);
		  $connUpdate->bindValue(':GStartDate', $GStartDate);
		  $connUpdate->bindValue(':GEndDate', $GEndDate);
		  $connUpdate->bindValue(':userNumber', $userNumber);
		  $connUpdate->bindValue(':userType', $userType);
		  $connUpdate->bindValue(':publishStatus', $publishStatus);
		  $connUpdate->execute();
          $connUpdate= null;
        echo "save sccussfully!"; 
    }	

?>