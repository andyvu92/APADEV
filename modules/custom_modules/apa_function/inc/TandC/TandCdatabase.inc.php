<?php
/* Terms And Conditions Database */



/* ------------------ forCreateRecord start -------- */
function forCreateRecord($dataArray){
/* Terms and Conditions Create */
	try {
		$dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Rkd#!8cd,&ag6e95g9&5192(gb[5g'); 
		$MemberID = $dataArray['MemberID'];
		$CreateDate = $dataArray['CreateDate'];
		$MembershipYear = $dataArray['MembershipYear'];
		$ProductList = $dataArray['ProductList'];
		$Type = $dataArray['Type'];
	    $connUpdate= $dbt->prepare('INSERT INTO termsandcondition (MemberID, CreateDate, MembershipYear, ProductList, Type) VALUES (:MemberID, :CreateDate, :MembershipYear, :ProductList, :Type)');
		$connUpdate->bindValue(':MemberID', $MemberID);
		$connUpdate->bindValue(':CreateDate', $CreateDate);
		$connUpdate->bindValue(':MembershipYear', $MembershipYear);
		$connUpdate->bindValue(':ProductList', $ProductList);
		$connUpdate->bindValue(':Type', $Type);
		$connUpdate->execute();
		$connUpdate= null;
   
    }
    catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}
   
}
/* ------------------ forCreateRecord start end -------- */



?>