<?php 
   
    $link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
	$dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config'); 
	/*********save PD to local server******/
	if(isset($_POST["create"])){
		$userID = $_POST['userID'];
		$prodcutID = $_POST['prodcutID'];
		
		$pd_type = $_POST['pd_type'];
	try {
		$wishlistGet= $dbt->prepare('SELECT * FROM wishlist WHERE prodcutID= :prodcutID');
		$wishlistGet->bindValue(':prodcutID', $prodcutID);
		$wishlistGet->execute();
		
		
		if($wishlistGet->rowCount()>0) {
			
		} else{
		
			$shoppingcartUpdate= $dbt->prepare('INSERT INTO wishlist (userID, productID, pd_type) VALUES (:userID, :prodcutID, :pd_type)');
		    $shoppingcartGet = null;
		}
		$shoppingcartUpdate->bindValue(':userID', $userID);
        $shoppingcartUpdate->bindValue(':prodcutID', $prodcutID);
		$shoppingcartUpdate->bindValue(':pd_type', $pd_type);
		
   		$shoppingcartUpdate->execute();	
        $shoppingcartUpdate = null;
			
	}
     catch (PDOException $e) {
				print "Error!: " . $e->getMessage() . "<br/>";
				die();
	}
     header("Location:".$link."pd/pd-wishlist");
}
?>