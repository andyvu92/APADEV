<?php

global $user;
$wishlists = array();
$now = date('d-m-Y');
$wishlistTag = 0;

if(isset($_SESSION["userID"])&& ($_SESSION["userID"]!=0)){
	$userid = $_SESSION["userID"];

   /*********save wishlist to APAserver******/
$dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config'); 
	if(isset($_GET["create"])){
		$userID = $userid;
	     if(isset($_GET["id"])){	
               $productID = $_GET['id'];} else{ $productID ='';}
              if(isset($_GET["pd_type"])){ $pd_type = $_GET['pd_type']; } else { $pd_type =''; }
      
                if(isset($_GET["source"])){ $source = $_GET['source']; } else { $source = '';}
             
	try {
		$wishlistGet= $dbt->prepare('SELECT * FROM wishlist WHERE productID=:productID AND userID=:userID AND source=:source');
		$wishlistGet->bindValue(':productID', $productID);
               $wishlistGet->bindValue(':userID', $userID);
              $wishlistGet->bindValue(':source', $source);
		$wishlistGet->execute();
		
		if($wishlistGet->rowCount()>0) {
                     
                       $wishlistTag =1;
		} else{
		
			$wishlistUpdate= $dbt->prepare('INSERT INTO wishlist (userID, productID, pd_type,source) VALUES (:userID, :productID, :pd_type, :source)');
		         $wishlistGet = null;
                         $wishlistUpdate->bindValue(':userID', $userID);
                         $wishlistUpdate->bindValue(':productID', $productID);
		         $wishlistUpdate->bindValue(':pd_type', $pd_type);
		          $wishlistUpdate->bindValue(':source', $source);
                       
   		         $wishlistUpdate->execute();	
                         $wishlistUpdate = null;
		}
		
			
	}
     catch (PDOException $e) {
				print "Error!: " . $e->getMessage() . "<br/>";
				die();
	}
}
/*********End save wishlist to APAserver******/
/*********Add to  wishlist from Shopping cart******/
        if(isset($_GET["addWishList"])){
              $UID = $_GET['UID'];
             try{  
               $shoppingcartGet= $dbt->prepare('SELECT * FROM shopping_cart WHERE ID= :UID');
               $shoppingcartGet->bindValue(':UID', $UID);
               $shoppingcartGet->execute();
            if($shoppingcartGet->rowCount()>0){
              $temp = $shoppingcartGet->fetchAll();
    
                       $userID= $temp[0]['userID'];
                       $productID = $temp[0]['productID'];
                       $source = "PD";
                       $coupon = $temp[0]['coupon'];
                        
               $wishlistUpdate= $dbt->prepare('INSERT INTO wishlist (userID, productID,source, coupon) VALUES (:userID, :productID, :source, :coupon)');
		         $wishlistGet = null;
                         $wishlistUpdate->bindValue(':userID', $userID);
                         $wishlistUpdate->bindValue(':productID', $productID);
		     
		          $wishlistUpdate->bindValue(':source', $source);
                         $wishlistUpdate->bindValue(':coupon', $coupon);
   		         $wishlistUpdate->execute();	
                         $wishlistUpdate = null;
                         $shoppingcartDel= $dbt->prepare('DELETE FROM shopping_cart WHERE ID= :UID');
		         $shoppingcartDel->bindValue(':UID', $UID);
                           $shoppingcartDel->execute();
                            $shoppingcartDel = null;
            }
            }
             catch (PDOException $e) {
				print "Error!: " . $e->getMessage() . "<br/>";
				die();
	}
                           
        }

/*********End Add to  wishlist from Shopping cart******/
/*********Delete  wishlist from APAserver******/
 if(isset($_GET["action"])&&$_GET["action"]=="del"){
             $userID = $userid;
		$productID = $_GET['wishlistid'];
             $wishlistDel= $dbt->prepare('DELETE FROM wishlist WHERE productID=:productID AND userID=:userID');
		$wishlistDel->bindValue(':productID', $productID);
               $wishlistDel->bindValue(':userID', $userID);
		$wishlistDel->execute();
                $wishlistDel = null;
         
        }

/*********End delete wishlist from APAserver******/

   /*********Get wishlist to APAserver******/
                $userwishlistGet= $dbt->prepare('SELECT * FROM wishlist WHERE userID=:userID');
		
                $userwishlistGet->bindValue(':userID', $userid);
		$userwishlistGet->execute(); 
                $productList = $userwishlistGet;
                $userwishlistGet = null;
                /********Get Product details  from Aptify******/
         foreach ($productList as $productDetail){
                    $productID = $productDetail['productID'];
                  
                         /****************this is testing data***************/
                       $productTemp_json=' { 
       
                      
                       "Id":"1",
			"ProductName":"Sports Physiotherapy Level 2",
                         "BeginDate":"03/11/2018",
                         "EndDate":"04/12/2018",
          		 "Location":"Camberwell, VIC",
                          "Price":"$750.00"	
	   }';
             $productTemp= json_decode($productTemp_json, true);
              
              array_push($wishlists, $productTemp);
           /****************this is testing data***************/
   
      }
        

/********End get Product details  from Aptify******/
  
   /*********End get wishlist to APAserver******/

         
}
else{
	if(isset($_GET["create"])){
		$userID = $userid;
		$productID = $_GET['id'];
             	$pd_type = $_GET['pd_type'];
                $source = $_GET['source'];
                /*  header("Location:http://10.2.1.190/apanew/user?destination=pd-wishlist?source=$source&create&id=$productID&pd_type=$pd_type"); Redirect browser */
                     header("Location:http://10.2.1.190/apanew/user?destination=pd/pd-search?search-result"); 
                 
       
        }
	
}
?>
<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
               <div id="popUp" style="display:none;"><?php echo $wishlistTag; ?></div>
          
		<h1 class="SectionHeader">Your wishlist</h1>
		<div class="brd-headling">&nbsp;</div>
         <?php if(sizeof($wishlists)>0) :?>
              <table>
                   <tbody>
                      <tr>
                       <th>Product name</th>
                       <th>Date</th>
                       <th>Location</th>
                       <th>Price</th>
                       <th>Action</th>
                       <th>Delete</th>
                       </tr>
                       <?php foreach( $wishlists as $wishlist){
                         
                           echo "<tr>";
                                echo	"<td>".$wishlist['ProductName']."</td>";
                                echo	"<td>".$wishlist['BeginDate']."-".$wishlist['EndDate']."</td>";
                                echo	"<td>".$wishlist['Location']."</td>";
                                echo	"<td>".$wishlist['Price']."</td>";
                        if(strtotime($now)> strtotime(str_replace("/","-",$wishlist['BeginDate']))){
                                 echo        "<td>THIS EVENT HAS ALREADY HAPPENED</td>";
                           }
                         else    { echo        '<td><a target="_self" href="pd-product?id='.$wishlist['Id'].'">ADD TO Cart</a></td>'; }
                                echo        '<td><a target="_self" id="deleteWishlist1" href="pd-wishlist?action=del&wishlistid='.$wishlist['Id'].'" ><i class="fa fa-times-circle fa-2x" aria-hidden="true"></i></a></td>';
                           echo "</tr>";    
                        }
                     ?>
                   </tbody>
              </table>
           <?php endif; ?>
           <?php if(sizeof($wishlists)==0)   { echo '<h3 style="color:black;">You don not have any products in your wishlist.</h3>'; }?>
                 
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 scleft">
       
          <a target="_blank" class="addCartlink" href="pd-search"><button class="dashboard-button dashboard-bottom-button your-details-submit shopCartButton">Continue shopping</button></a>
          <a target="_blank" class="addCartlink" href="pd-shopping-cart"><button class="dashboard-button dashboard-bottom-button your-details-submit shopCartButton">View my cart</button></a>
   </div>
 

</div>
<div id="popUpWindow">
		   <h3>This item has already been in your wishlist.</h3>
         
</div>
<div id="deleteConfirmwindow">
		   <h3>Are you sure to delete this item from your wishlist?</h3>
                   <a target="_self" class="addCartlink" href="pd-wishlist"><button class="dashboard-button dashboard-bottom-button your-details-submit shopCartButton">NO</button></a>
                   <a target="_self" class="addCartlink" href="pd-wishlist?action=del&wishlistid='.$wishlist['Id'].'"><button class="dashboard-button dashboard-bottom-button your-details-submit shopCartButton">YES</button></a>
         
</div>

 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="http://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
	          
		  $('#deleteWishlist').click(function(){
		   	 
		 $( "#deleteConfirmwindow" ).dialog();
		   
		   
	   }); 
		 if($('#popUp').text()=='1' ){
		   $( "#popUpWindow" ).dialog();
		 }
       
});
</script>