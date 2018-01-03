<?php
$creditcard='';
$i=0;
$price=0;
$tag=0;
$products = array();
$localProducts = array();
$pdtype= array("event", "course", "workshop");
$type = "PD";
$userID = "1";

   /***************get userinfo from Aptify******************/
    $userInfo_json = '{ 
              "Dietary":["Shellfish","Eggs","Lactose"]
	  }';
    $userInfo= json_decode($userInfo_json, true);	
    $Dietary = $userInfo['Dietary'];
   /****************End get userinfo from Aptify************/



$dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config'); 
/*********Delete shopping product from APAserver******/
 if(isset($_GET["action"])&&$_GET["action"]=="del"){
            
	    $productID = $_GET['productid'];
            $deltype =  $_GET['type'];
             $shoppingcartDel= $dbt->prepare('DELETE FROM shopping_cart WHERE productID=:productID AND userID=:userID AND type= :type');
		$shoppingcartDel->bindValue(':productID', $productID);
               $shoppingcartDel->bindValue(':userID', $userID);
                $shoppingcartDel->bindValue(':type', $deltype);
		$shoppingcartDel->execute();
                $shoppingcartDel= null;
         
        }

/*********End delete shopping product from APAserver******/
/********Get user shopping product form APA server******/
try {
		$shoppingcartGet= $dbt->prepare('SELECT ID, productID, coupon FROM shopping_cart WHERE userID= :userID AND type= :type');
                $shoppingcartGet->bindValue(':userID', $userID);
                $shoppingcartGet->bindValue(':type', $type);
		$shoppingcartGet->execute();
               
                $productList = $shoppingcartGet;
             
         
                $shoppingcartGet= null;
               
}
     catch (PDOException $e) {
				print "Error!: " . $e->getMessage() . "<br/>";
				die();
	}
/********End get user shopping product form APA server******/
/********Get Product details  from Aptify******/
         foreach ($productList as $productDetail){
                    $productID = $productDetail['productID'];
                     $coupon =  $productDetail['coupon'];
                     $UID = $productDetail['ID'];
                     $Lproduct = array('UID'=>$UID,'productID' =>$productID, 'coupon' =>$coupon);
                      array_push($localProducts, $Lproduct);
                    
                         /****************this is testing data***************/
                       $productTemp_json=' { 
       
                       "Id":"1",
			"Title":"Sports Physiotherapy Level 2",
                         "Begindate":"3/06/2017",
                         "Enddate":"4/06/2017",
          		 "Location":"Camberwell, VIC",
                          "Price":"$750.00",
                          "Typeofpd":"event",
                          "Coupon":"test"
	   }';
             $productTemp= json_decode($productTemp_json, true);
              
              array_push($products, $productTemp);
           /****************this is testing data***************/
   
      }
     

/********End get Product details  from Aptify******/

if(isset($_SESSION["userID"])&& ($_SESSION["userID"]!=0)){
    
	$userid = $_SESSION["userID"];
      if(isset($_SESSION["cardsnum"])){
         
       $cardsnum = $_SESSION["cardsnum"];

       }
  else{
        $cardsnum_json= '{
                 "0":{
                         "Digitsnumber":"8888",
                         "Cardtype":"Master",
                         "Default":"1"
                       },
                  "1":{
                         "Digitsnumber":"6666",
                         "Cardtype":"Visa",
                         "Default":"0"
                       } ,
                  "2":{
                         "Digitsnumber":"9999",
  
                         "Cardtype":"Master",
                         "Default":"0"
                       }
      
      }';
           $cardsnum= json_decode( $cardsnum_json , true);
            $_SESSION["cardsnum"]= $cardsnum;
    }
       if(isset($_GET["action"])&& ($_GET["action"]=="addcard"))  {
            
             $newcardsnum =  $_SESSION["cardsnum"];
             $newcard =  array("Digitsnumber"=>substr($_POST["Cardnumber"],-4),"Cardtype"=>$_POST["Cardtype"],"Default"=>"0");
              array_push($newcardsnum, $newcard);
              $_SESSION["cardsnum"]= $newcardsnum;
             $cardsnum =   $_SESSION["cardsnum"];
             
                         
       }  
          /* $cardnum=substr( $creditcard,-4);  */
	  /*  Get shopping cart data via $user from Aptify  */
       
                 
      
      
         
}
else{
	$product_id = $_GET["id"];
	header("Location:http://10.2.1.190/apanew/sign-in?id=$product_id"); /* Redirect browser */
    
}
?>

<form action="completed-purchase" method="POST">
<?php   if($productList->rowCount()>0):?>
<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
		<h1 class="SectionHeader">Summary of cart</h1>
		<div class="brd-headling">&nbsp;</div>
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
                       <?php foreach( $products as $product){
                              $n = 0;
                              $pass=$localProducts[$n]['UID'];
                           echo "<tr>";
                                
                                echo	"<td>".$product['Title']."</td>";
                                echo	"<td>".$product['Begindate']."-".$product['Enddate']."</td>";
                                echo	"<td>".$product['Location']."</td>";
                                echo	"<td>".$product['Price']."</td>";
                                echo        '<td><a target="_blank" href="pd-wishlist?addWishList&UID='.$pass.'">ADD TO WISHLIST</a></td>';
                                echo        '<td><a target="_self" href="pd-shopping-cart?action=del&type=PD&productid='.$product['Id'].'"><i class="fa fa-times-circle fa-2x" aria-hidden="true"></i></a></td>';
                           echo "</tr>";    
                           $n=$n+1;
                         $i=$i+1;
                         $price=$price+(int)str_replace('$', '', $product['Price']);
                            if (in_array($product['Typeofpd'],  $pdtype)){ $tag=1; }
                        }
                     ?>
                   </tbody>
              </table>
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 scleft <?php if($price==0) echo " display-none";?>">
          <p>Terms & conditions</p>
          <p><label for="accept1">I accept the APA events terms and conditions including the APA cancellation clause</label><input type="checkbox" id="accept1" <?php if($price!=0) echo " required";?>></p>
         <?php if($tag==1): ?>
           <p><label for="accept2">I understand that I must have appropriate Professional Indemnity insurance current on the date/s of any APA course/workshop that I’m registered for.</label><input type="checkbox" id="accept2" <?php if($price!=0) echo " required";?>></p>
        <?php endif; ?>
          <p><label for="accept3">I accept that the APA will not reimburse costs associated with travel and/or accommodation if the event is cancelled. The APA recommends travelling participants purchase travel insurance to cover this.</label><input type="checkbox" id="accept3" <?php if($price!=0) echo " required";?>></p>
         
   </div>
   <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 scright<?php if(($price==0)) echo " display-none";?>">
         <p>Your dietary requirements</p>
         <p>Based on your details, we’ve recognised you are:</p>
         <p style=" border: 1px solid #004250; padding: 5px 0;"><?php if(sizeof($Dietary)>0) {foreach($Dietary as $item) {echo $item.'&nbsp;';} }  else { echo "None";}?></p>
         <p>Please note that not all APA PD events include catering.</p>
   </div>

</div>
<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 paymentsiderbar">
		<p><span class="sidebardis<?php if($price==0) echo " display-none";?>">Payment Information:</span></p>
                <div class="paymentsidecredit <?php if($price==0) echo " display-none";?>"> <fieldset><select  id="Paymentcard" name="Paymentcard">
                      <?php if (sizeof($cardsnum)!=0): ?>   
                                   
                             <?php foreach( $cardsnum as $cardnum):  ?>
                                 <option value="<?php echo  $cardnum["Digitsnumber"];?>" <?php if($cardnum["Default"]==1) echo "selected"; ?> data-class="<?php echo  $cardnum["Cardtype"];?>">Credit card ending with <?php echo  $cardnum["Digitsnumber"];?></option>
                              <?php endforeach; ?>
                         <?php endif; ?>  
                           </select></fieldset></div>
              <?php endif; ?>
          </form>
                <div class="paymentsideuse <?php if($price==0) echo " display-none";?>"><input type="checkbox" id="anothercard"><label for="anothercard"><a class="event10" style="cursor: pointer;">Use another card</a></label>
				  <div class="down10" style="display:none;">
                  <form action="pd-shopping-cart?action=addcard" method="POST" id="formaddcard">
                     <div class="row">
				   <div class="col-lg-12">
                        <select class="form-control" id="Cardtype" name="Cardtype" placeholder="Card type">
                           <option value="AE">American Express</option>
                           <option value="Visa">Visa</option>
                           <option value="Mastercard">Mastercard</option>
                        </select>
                   </div>
				 </div>
				 <div class="row">
				   <div class="col-lg-12">
                        <input type="text" class="form-control" id="Cardname" name="Cardname" placeholder="Name on card">
                   </div>
				 </div>
				 <div class="row">
				   <div class="col-lg-12">
                        <input type="text" class="form-control" id="Cardnumber" name="Cardnumber" placeholder="Card number">
                   </div>
				 </div>
				 <div class="row">
				   <div class="col-lg-12">
                        <input type="date" class="form-control" id="Expirydate" name="Expirydate" placeholder="Expire date">
                   </div>
				  
				 </div>
                               <div class="row">
                                    <div class="col-lg-12">
                        <input type="text" class="form-control" id="CCV" name="CCV" placeholder="CCV">
                                   </div>
                              </div>
                            <div class="row">
                                 <a target="_blank" class="addCartlink"><button type="submit" class="dashboard-button dashboard-bottom-button your-details-submit addCartButton">Add</button></a>
                             </div>
             </form>
    </div>
				</div>
               
         <?php if($productList->rowCount()>0): ?>      
          <div class="row ordersummary"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><span>YOUR ORDER</span></div></div>
               <table>
                    <tr>
                      <td><?php echo $i;?> items</td>
                      <td>A$<?php echo $price;?></td>
                   </tr>
                    <tr>
                      <td>Discount</td>
                      <td>A$0.00</td>
                   </tr>
                     <tr>
                      <td>Total(Inc.GST)</td>
                      <td>A$<?php echo $price;?></td>
                   </tr>
           </table>
    
         <a target="_blank" class="addCartlink"><button class="placeorder" type="submit">PLACE YOUR ORDER</button></a>
</div>
     <?php endif; ?>
        <?php if($productList->rowCount()==0): ?>   <div  class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><h3 style="color:black;">You don not have any products in your shopping cart.</h3></div>      <?php endif;?>
<div  class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
 <a target="_blank" class="addCartlink" href="pd-search"><button class="dashboard-button dashboard-bottom-button your-details-submit shopCartButton">Continue shopping</button></a>
 <a target="_blank" class="addCartlink" href="../your-details"><button class="dashboard-button dashboard-bottom-button your-details-submit shopCartButton">Update my details</button></a>
</div>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$( function() {
$.widget( "custom.iconselectmenu", $.ui.selectmenu, {
      _renderItem: function( ul, item ) {
        var li = $( "<li>" ),
          wrapper = $( "<div>", { text: item.label } );
 
        if ( item.disabled ) {
          li.addClass( "ui-state-disabled" );
        }
 
        $( "<span>", {
          style: item.element.attr( "data-style" ),
          "class": "ui-icon " + item.element.attr( "data-class" )
        })
          .appendTo( wrapper );
 
        return li.append( wrapper ).appendTo( ul );
      }
    });
 
 
 
    $( "#Paymentcard" )
      .iconselectmenu()
      .iconselectmenu( "menuWidget" )
        .addClass( "ui-menu-icons customicons" );

} );
</script>
<style>
fieldset {
      border: 0;
    }
  
 
    /* select with custom icons */
    .ui-selectmenu-menu .ui-menu.customicons .ui-menu-item-wrapper {
      padding: 0.5em 0 0.5em 3em;
    }
    .ui-selectmenu-menu .ui-menu.customicons .ui-menu-item .ui-icon {
      height: 24px;
      width: 24px;
      top: 0.1em;
    }
    .ui-icon.Master{
      background: url("http://10.2.1.190/apanew/sites/default/files/logo_apa_0.png") 0 0 no-repeat;
    }
    .ui-icon.Visa{
      background: url("http://10.2.1.190/apanew/sites/default/files/logo_apa_0.png") 0 0 no-repeat;
    }
    .ui-icon.AE{
      background: url("http://10.2.1.190/apanew/sites/default/files/logo_apa_0.png") 0 0 no-repeat;
    }
</style>
  