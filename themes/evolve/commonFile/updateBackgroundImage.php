<?php 
$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if(isset($_SESSION["userID"])){   
	$userID = $_SESSION["userID"];
}
else{
/******require user login, set userID as 1 temporarily****/
	$userID=1;
}
$dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config'); 
/*********update background image to local server******/
if(isset($_POST["update"]) && isset($_POST["background"]) &&($_POST['background']!=0)){
	$userID = $_POST['userID'];
	$imageID = $_POST['background'];
	try {
		$backgroundGet= $dbt->prepare('SELECT * FROM background_images WHERE userID= :userID');
		$backgroundGet->bindValue(':userID', $userID);
		$backgroundGet->execute();
		if($backgroundGet->rowCount()>0) {
			$backgroundUpdate= $dbt->prepare('UPDATE background_images SET imageID = :imageID WHERE userID= :userID');
			$backgroundGet = null;
		}
		else{
			$backgroundUpdate= $dbt->prepare('INSERT INTO background_images (userID, imageID) VALUES (:userID, :imageID)');
			$backgroundGet = null;
		}
		$backgroundUpdate->bindValue(':userID', $userID);
		$backgroundUpdate->bindValue(':imageID', $imageID);		  
		$backgroundUpdate->execute();	
		$backgroundUpdate = null;
	}
	catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}
header("Location:".$actual_link);
}
/*********end background image to local server******/
/*********get background image from local server******/
$background=0;
	try {
		$backgroundInfo= $dbt->prepare('SELECT * FROM background_images WHERE userID= :userID');
		$backgroundInfo->bindValue(':userID', $userID);
		$backgroundInfo->execute();
		if($backgroundInfo->rowCount()>0) { 
			foreach ($backgroundInfo as $row) {
				$background= $row['imageID'];
				break;
			}
			$user['background'] = $background;
		}
		else{
			$user['background']=1; 
		}
		$backgroundInfo = null;
	}
	catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}
/**********end get background image from local server******/
?>