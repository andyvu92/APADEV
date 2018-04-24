<?php
if(isset($_POST['step3'])) {
	//continue to get the review data
	$postReviewData = $_SESSION['postReviewData'];
	if(isset($_POST['Paymentcardvalue'])){ $postReviewData['Card_number'] = $_POST['Paymentcardvalue']; }
	//if(isset($_POST['rollover'])){ $postReviewData['Rollover'] = $_POST['rollover']; }
	//if(isset($_POST['Installpayment-frequency'])){ $postReviewData['Installpayment-frequency'] = $_POST['Installpayment-frequency']; }
	$postReviewData['Termsandconditions'] = "1";
	// 2.2.27 - Renew a membership order
	// Send - 
	// userID&Paymentoption&PRFdonation&Rollover&Card_number&productID
	// Response -Renew a membership order successfully
	//submit data to complete renew membership web service 2.2.27
	GetAptifyData("27", $postReviewData);
	//put extra code when using API to get the status of order, if it is successful, will save terms and conditions on APA side
	//save the terms and conditons on APA side
	$dataArray = array();
	$dataArray['MemberID'] = $postReviewData['userID'];
	$dataArray['CreateDate']= date('Y-m-d');
	$dataArray['MembershipYear'] = date('Y',strtotime('+1 year'));
	$dataArray['ProductList'] = implode(",",$postReviewData['productID']);
	$dataArray['Type'] = "R";
	forCreateRecordFunc($dataArray);
	//delete session:
	unset($_SESSION["postReviewData"]);
}
?>
<?php
include('sites/all/themes/evolve/commonFile/updateBackgroundImage.php');
include('sites/all/themes/evolve/commonFile/dashboardLeftNavigation.php');       
?>
<div id="pre_background" style="display:none">background_<?php echo $user['background']; ?></div>
<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 background_<?php echo $user['background']; ?>" id="dashboard-right-content">
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
				<li><a class="tabtitle1 inactiveLink" style="cursor: pointer;"><span class="eventtitle1" id="yourdetails-tab"><strong>Your details</strong></span> </a></li>
				<li><a class="tabtitle2 inactiveLink" style="cursor: pointer;"><span class="eventtitle2" id="membership"><strong>Membership</strong></span></a></li>
				<li><a class="tabtitle3 inactiveLink" style="cursor: pointer;"><span class="eventtitle3" id="workplace"><strong>Workplace</strong></span></a></li>
				<li><a class="tabtitle4 inactiveLink" style="cursor: pointer;"><span class="eventtitle4" id="education"><strong>Education</strong></span></a></li>
				<li><a class="tabtitle5 inactiveLink" style="cursor: pointer;"><span class="eventtitle5" id="Insurance"><strong>Insurance</strong></span></a></li>
				<li><a class="tabtitle6 inactiveLink" style="cursor: pointer;"><span class="eventtitle6" id="Survey"><strong>Survey</strong></span></a></li>
				<li><a class="tabtitle7 inactiveLink" style="cursor: pointer;"><span class="eventtitle7" id="Payment"><strong>Payment</strong></span></a></li>
				<li><a class="tabtitle8 inactiveLink" style="cursor: pointer;"><span class="eventtitle8 text-underline" id="Review"><strong>Review</strong></span></a></li>
				</ul>
				<div class="row">
					<h2 style="color:white;">Thank you for your joining</h2>
					<p style="color:white;">We’re glad to have you on board.</p>
					<?php 
					// after web service 2.2.26 Aptify response the invoice_id;
					// 2.2.18 Get payment invoice PDF
					// Send - 
					// UserID & Invoice_ID
					// Response -Invoice PDF
					$send["UserID"] = $_SESSION["userID"];
					$send["Invoice_ID"] = "1111";  
					$invoiceAPI = GetAptifyData("18", $send); 
					// delete shopping cart data from APA database; put the response status validation here!!!!!!!
					$userID = $_SESSION["userID"];
					$dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config');
					try {
						$shoppingCartDel= $dbt->prepare('DELETE FROM shopping_cart WHERE userID=:userID');
						$shoppingCartDel->bindValue(':userID', $userID);
						$shoppingCartDel->execute();
						$shoppingCartDel = null;
					}
					catch (PDOException $e) {
						print "Error!: " . $e->getMessage() . "<br/>";
						die();
					}    		
					?> 
					<a style="color:white;" href="<?php echo $invoiceAPI["Invoice"];?>">Download your receipt</a>
					<p style="color:white;">A copy will be sent to your inbox and stored in your new ‘Member dashboard’under the ‘Purchases’ tab.</p>
				</div>
			</div>
		</div>
	</div>
</div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">		
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	