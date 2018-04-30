<?php
include('sites/all/themes/evolve/commonFile/updateBackgroundImage.php');
include('sites/all/themes/evolve/commonFile/dashboardLeftNavigation.php');       
?>
<div id="pre_background" style="display:none">background_<?php echo $user['background']; ?></div>
<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 background_<?php echo $user['background']; ?> autoscroll" id="dashboard-right-content">
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
				<li><a class="tabtitle1 inactiveLink" style="cursor: pointer;"><span class="<?php if(!isset($_POST['step1']) && !isset($_POST['step2']) && !isset($_POST['stepAdd']) && !isset($_POST['step2-1']) && !isset($_POST['goI']) && !isset($_POST['goP']))echo "text-underline";?> eventtitle1" id="yourdetails-tab"><strong>Your details</strong></span> </a></li>
				<li><a class="tabtitle2 inactiveLink" style="cursor: pointer;"><span class="eventtitle2" id="Membership"><strong>Membership</strong></span></a></li>
				<li><a class="tabtitle3 inactiveLink" style="cursor: pointer;"><span class="eventtitle3" id="Workplace"><strong>Workplace</strong></span></a></li>
				<li><a class="tabtitle4 inactiveLink" style="cursor: pointer;"><span class="eventtitle4" id="Education"><strong>Education</strong></span></a></li>
				<li><a class="tabtitle5 inactiveLink" style="cursor: pointer;"><span class="eventtitle5 <?php if(isset($_POST['step1']) || isset($_POST['goI']))echo 'text-underline';?>" id="Insurance"><strong>Insurance</strong></span></a></li>
				<li><a class="tabtitle6 inactiveLink" style="cursor: pointer;"><span class="eventtitle6 <?php if(isset($_POST['step2-1']))echo 'text-underline';?>" id="Survey"><strong>Survey</strong></span></a></li>
				<li><a class="tabtitle7 inactiveLink" style="cursor: pointer;"><span class="eventtitle7 <?php if(isset($_POST['goP']))echo 'text-underline';?>" id="Payment"><strong>Payment</strong></span></a></li>
				<li><a class="tabtitle8 inactiveLink" style="cursor: pointer;"><span class="eventtitle8 <?php if(isset($_POST['step2']) || isset($_POST['step3']) || isset($_POST['stepAdd']) )echo 'text-underline';?>" id="Review"><strong>Review</strong></span></a></li>
				</ul>
			<div id="insuranceBlockRN"></div>
			<?php
			include('sites/all/themes/evolve/inc/renewMyMembership/renew-yourdetail.inc.php');
			if((isset($_POST["step1"]) && $_POST["step1"] == "1") || isset($_POST['goI'])){
			include('sites/all/themes/evolve/inc/renewMyMembership/renew-insurance.inc.php'); 
			}
            elseif(isset($_POST["step2-1"]) && $_POST["step2-1"] == "1" || isset($_POST['goP'])) {
		    include('sites/all/themes/evolve/inc/renewMyMembership/renew-surveypayment.inc.php');
		    } 			
			elseif((isset($_POST["step2"]) && $_POST["step2"] == "2") || (isset($_POST["stepAdd"]) && $_POST["stepAdd"] == "2")) {
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
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">		
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
