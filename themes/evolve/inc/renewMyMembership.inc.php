<?php
include('sites/all/themes/evolve/commonFile/updateBackgroundImage.php');
include('sites/all/themes/evolve/commonFile/dashboardLeftNavigation.php');
/* get background image****/
if(isset($_SESSION['UserId'])) { $userID = $_SESSION['UserId'];} else { $userID =0; }
$background = getBackgroundImage($userID);
/* get background image****/ 
 
?>
<div id="pre_background" style="display:none">background_<?php echo $background; ?></div>
<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 background_<?php echo $background; ?> autoscroll" id="dashboard-right-content">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dashboard_detail">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><span class="dashboard-name"><strong>Renew my membership</strong></span></div>
		<!--<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><button class="dashboard-backgroud" data-target="#myModal" data-toggle="modal"><span class="customise_background <?php if(!isset($_SESSION["userID"])) echo "display-none";?>">Customise your background</span><span class="customise_icon">[icon class="fa fa-cogs fa-x"][/icon]</span></button></div>-->
		</div>
	<?php
		include('sites/all/themes/evolve/commonFile/customizeBackgroundImage.php');
	?>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
				<ul class="nav nav-tabs">
				<li><a class="tabtitle1 inactiveLink" style="cursor: pointer;"><span class="<?php if(!isset($_POST['step1']) && !isset($_POST['step2']) && !isset($_POST['stepAdd']) && !isset($_POST['step2-1']) && !isset($_POST['goI']) && !isset($_POST['goP'])&& !isset($_POST['step2-2'])&&!isset($_POST['step2-3'])&& !isset($_POST['QOrder']))echo "text-underline";?> eventtitle1" id="yourdetails-tab"><strong>Your details</strong></span> </a></li>
				<li><a class="tabtitle2 inactiveLink" style="cursor: pointer;"><span class="eventtitle2" id="Membership"><strong>Membership</strong></span></a></li>
				<li><a class="tabtitle3 inactiveLink" style="cursor: pointer;"><span class="eventtitle3" id="Workplace"><strong>Workplace</strong></span></a></li>
				<li><a class="tabtitle4 inactiveLink" style="cursor: pointer;"><span class="eventtitle4" id="Education"><strong>Education</strong></span></a></li>
				<li><a class="tabtitle5 inactiveLink" style="cursor: pointer;"><span class="eventtitle5 <?php if((isset($_POST['step1'])&& $_POST['insuranceTag']!="0") || isset($_POST['goI']))echo 'text-underline';?>" id="Insurance"><strong>Insurance</strong></span></a></li>
				<li><a class="tabtitle6 inactiveLink" style="cursor: pointer;"><span class="eventtitle6 <?php if(isset($_POST['step2-1'])|| (isset($_POST['step1'])&& $_POST['insuranceTag']=="0")||isset($_POST['QOrder']))echo 'text-underline';?>" id="Survey"><strong>Survey</strong></span></a></li>
				<li><a class="tabtitle7 inactiveLink" style="cursor: pointer;"><span class="eventtitle7 <?php if(isset($_POST['goP']))echo 'text-underline';?>" id="Payment"><strong>Payment</strong></span></a></li>
				<li><a class="tabtitle8 inactiveLink" style="cursor: pointer;"><span class="eventtitle8 <?php if(isset($_POST['step2']) || isset($_POST['step3']) || isset($_POST['stepAdd']) ||isset($_POST['step2-2']) ||isset($_POST['step2-3']))echo 'text-underline';?>" id="Review"><strong>Review</strong></span></a></li>
				</ul>
			<div id="insuranceBlockRN"></div>
			<?php
			//This is to get the renewal quatation order details from Aptify!!!!!!!!
			// 2.2.45 - Renewal Quatation OrderID
			// Send - 
			// userID
			// Response -Renewal Quatation OrderID
			if(isset($_SESSION["UserId"])){
				$variableData['id'] = $_SESSION["UserId"];
				$Quatation = GetAptifyData("45", $variableData);
				if(sizeof($Quatation["results"])!=0){
					foreach ($Quatation["results"] as $quatationOrderArray){
						$quatationOrderID =  $quatationOrderArray["ID"];
					}


			// after web service 2.2.45 Get renewal quatation orderID from Aptify;
			// 2.2.44 Get Order details this web service is to use renew membership to get the order detail for next year
			// Send - 
			// Invoice_ID
			// Response -Order details
				$orderDetails = GetAptifyData("44", $quatationOrderID); 
				}
			}      
			include('sites/all/themes/evolve/inc/renewMyMembership/renew-yourdetail.inc.php');
			if((isset($_POST["step1"]) && $_POST["step1"] == "1"&& $_POST['insuranceTag']!="0") || isset($_POST['goI'])){
			include('sites/all/themes/evolve/inc/renewMyMembership/renew-insurance.inc.php'); 
			}
            elseif(isset($_POST["step2-1"]) && $_POST["step2-1"] == "1" || isset($_POST['goP'])|| (isset($_POST['step1'])&& $_POST['insuranceTag']=="0") || isset($_POST['QOrder'])) {
		    include('sites/all/themes/evolve/inc/renewMyMembership/renew-surveypayment.inc.php');
		    } 			
			elseif((isset($_POST["step2"]) && $_POST["step2"] == "2") || (isset($_POST["stepAdd"]) && $_POST["stepAdd"] == "2") ||isset($_POST['step2-2'])||isset($_POST['step2-3'])) {
			include('sites/all/themes/evolve/inc/renewMyMembership/renew-final.inc.php');
			}
			?>
			</div>
		</div>
	</div>
</div>
<div id="privacypolicyWindow" style="display:none;">
	<h3>APA privacy policy</h3>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  
	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam pretium
	tellus non ex mattis feugiat a in est. Praesent est leo, viverra ac
	hendrerit ac, facilisis at ante. Phasellus elementum hendrerit risus,
	eu luctus dolor sollicitudin vitae. Cras ac tellus ut mauris scelerisque
	mollis. Sed nibh ipsum, fringilla sed pellentesque non, luctus ut diam.
	In viverra neque lacus, vel pulvinar nulla convallis id. Curabitur porttitor
	eleifend quam in tincidunt.
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  
		<label for="privacypolicyp">Yes. I’ve read and understand the APA privacy policy</label><input type="checkbox" id="privacypolicyp">
	</div>
</div>
<div id="installmentpolicyWindow" style="display:none;">
	<h3>APA installment policy</h3>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  
	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam pretium
	tellus non ex mattis feugiat a in est. Praesent est leo, viverra ac
	hendrerit ac, facilisis at ante. Phasellus elementum hendrerit risus,
	eu luctus dolor sollicitudin vitae. Cras ac tellus ut mauris scelerisque
	mollis. Sed nibh ipsum, fringilla sed pellentesque non, luctus ut diam.
	In viverra neque lacus, vel pulvinar nulla convallis id. Curabitur porttitor
	eleifend quam in tincidunt.
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  
		<label for="installmentpolicyp">Yes. I’ve read and understand the APA installment policy</label><input type="checkbox" id="installmentpolicyp">
	</div>
</div>
<div id="QuatationPopUp" style="display:none;" class="container">
	<h3 style="color:black;">Your purchased product:<br>
	<?php foreach($orderDetails['Order'] as $orders){
		foreach($orders['OrderLines'] as $order){
//  put the code here to save the quatation order products into the database firstly.
			if($order['ProductCategory'] =="Memberships"){
				checkShoppingCart($userID=$_SESSION["UserId"], $type="membership", $productID=$order['ProductID']);
				createShoppingCart($userID, $productID =$order['ProductID'],$type="membership",$coupon="");
			}
			if($order['ProductCategory'] =="Subscription"){
				checkShoppingCart($userID=$_SESSION["UserId"], $type="NG", $productID=$order['ProductID']);
				createShoppingCart($userID, $productID =$order['ProductID'],$type="NG",$coupon="");
			}
			if($order['ProductID'] =="9978"){
				checkShoppingCart($userID=$_SESSION["UserId"], $type="MG1", $productID=$order['ProductID']);
				createShoppingCart($userID, $productID =$order['ProductID'],$type="MG1",$coupon="");
			}
			if($order['ProductID'] =="9977"){
				checkShoppingCart($userID=$_SESSION["UserId"], $type="MG2", $productID=$order['ProductID']);
				createShoppingCart($userID, $productID =$order['ProductID'],$type="MG2",$coupon="");
			}
			if($order['ProductID'] =="9973"){
				checkShoppingCart($userID=$_SESSION["UserId"], $type="FP", $productID=$order['ProductID']);
				createShoppingCart($userID, $productID =$order['ProductID'],$type="FP",$coupon="");
			}
		
		echo $order['ProductName']; echo ",";} 
	}?></h3>
	<p>&nbsp;</p>
	<a href="javascript:document.getElementById('renew-survey-form2').submit();" class="cancelInsuranceButton"><span class="dashboard-button-name">Continue</span></a>
	<a href="renewmymembership" target="_self" class="cancelInsuranceButton"><span class="dashboard-button-name">Change your details</span></a>
	<a href="renewmymembership"  target="_self" class="cancelInsuranceButton"><span class="dashboard-button-name">Change member type and national group</span></a>
</div>
<form id="renew-survey-form2" action="" method="POST"><input type="hidden" name="QOrder"></form>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">		
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
	var isshow = sessionStorage.getItem('isshow');
	var user ='<?php if(isset($_SESSION['UserId'])) {echo $_SESSION['UserId']; } else{ echo "";}?>';
	if(isshow== null && user!== ''){
       sessionStorage.setItem('isshow', 1);
       $("#QuatationPopUp" ).dialog();
       
    }
	$('input[value="log-oout"]').click(function(){
	   sessionStorage.removeItem("isshow");
	});
	
});
</script>