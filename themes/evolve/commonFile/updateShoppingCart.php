<?php 
$link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
$dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config'); 
/*********save PD to local server******/
if(isset($_POST["create"])){
$userID = $_POST['userID'];
$productID = $_POST['productID'];
$type = $_POST['type'];
$Coupon = $_POST['Couponcode'];
try {
$shoppingcartGet= $dbt->prepare('SELECT * FROM shopping_cart WHERE productID= :productID AND userID=:userID AND type=:type');
$shoppingcartGet->bindValue(':productID', $productID);
$shoppingcartGet->bindValue(':userID', $userID);
$shoppingcartGet->bindValue(':type', $type);
$shoppingcartGet->execute();
if($shoppingcartGet->rowCount()>0) {
header("Location:".$link."/pd/pd-product?saveShoppingCart&id=".$productID);
} else{
$shoppingcartUpdate= $dbt->prepare('INSERT INTO shopping_cart (userID, productID, type, Coupon) VALUES (:userID, :productID, :type, :Coupon)');
$shoppingcartGet = null;
}
$shoppingcartUpdate->bindValue(':userID', $userID);
$shoppingcartUpdate->bindValue(':productID', $productID);
$shoppingcartUpdate->bindValue(':type', $type);
$shoppingcartUpdate->bindValue(':Coupon', $Coupon);
$shoppingcartUpdate->execute();	
$shoppingcartUpdate = null;
$wishlistDel= $dbt->prepare('DELETE FROM wishlist WHERE productID=:productID AND userID=:userID AND source=:source');
$wishlistDel->bindValue(':productID', $productID);
$wishlistDel->bindValue(':userID', $userID);
$wishlistDel->bindValue(':source', $type);
$wishlistDel->execute();
$wishlistDel = null;		
}
catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}
header("Location:".$link."/pd/pd-product?saveShoppingCart&id=".$productID);
}
?>