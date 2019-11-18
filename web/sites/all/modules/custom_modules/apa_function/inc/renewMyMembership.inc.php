<?php
if(!function_exists('drupal_session_started'))
{
  die("Unauthorized Access");
}
unset($_SESSION['timeoutPopUp']);
?>
<?php if(isset($_SESSION["UserId"])): ?>

<?php if(isset($_SESSION["renewTag"])): ?>
<?php
	/*hanled renewTag session */
	$now = time();  
	if (isset($_SESSION['expireTag']) && $now > $_SESSION['expireTag']) {
		unset($_SESSION['renewTag']);
	}
?>
<?php if(!empty($_SESSION['payThroughDate'])):?>
<?php 
//This is to get the renewal quatation order details from Aptify!!!!!!!!
// 2.2.45 - Renewal Quatation OrderID
// Send - 
// userID
// Response -Renewal Quatation OrderID
   
	$variableData['id'] = $_SESSION["UserId"];
	$Quatation = aptify_get_GetAptifyData("45", $variableData);
	// Put the unexpected scenario here to avoid getting the empty data or sever response is empty.
    if(empty($Quatation)) {if(isset($_SESSION['reloadTag'])) { $_SESSION['reloadTag']++;} else{$_SESSION['reloadTag']=1;}}
	$link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
	if(empty($Quatation)){
		if($_SESSION['reloadTag'] == 4){
			unset($_SESSION['reloadTag']);
			$_SESSION['timeoutPopUp'] = 1;
			//header("Location:".$link."/");
			
		}
		else{
			header("Location:".$link."/renewmymembership");
		}
		
	}
	//End unexpected scenario

	if(!empty($Quatation) && sizeof($Quatation["results"])!=0){
		
		foreach ($Quatation["results"] as $quatationOrderArray){
			$quatationOrderID =  $quatationOrderArray["ID"];
		}


// after web service 2.2.45 Get renewal quatation orderID from Aptify;
// 2.2.44 Get Order details this web service is to use renew membership to get the order detail for next year
// Send - 
// Invoice_ID
// Response -Order details
	$orderDetails = aptify_get_GetAptifyData("44", $quatationOrderID); 
		// Put the unexpected scenario here to avoid getting the empty data or sever response is empty.
		if(empty($orderDetails)) {if(isset($_SESSION['orderDetailsTag'])) { $_SESSION['orderDetailsTag']++; } else{$_SESSION['orderDetailsTag']=1;}}
			if(empty($orderDetails)){
			if($_SESSION['orderDetailsTag'] == 4){
				unset($_SESSION['orderDetailsTag']);
				$_SESSION['timeoutPopUp'] = 1;
				//header("Location:".$link."/");
				
			}
			else{
				header("Location:".$link."/renewmymembership");
			}
			
		}
		//End unexpected scenario
	    if(!empty($orderDetails)){ $tag = true; } else{ $tag = false;}	
	}
	
else{$orderDetails = array(); $tag = false; }
    //$paythrough = date_create_from_format('m/d/Y', $_SESSION['payThroughDate']);
    //echo $_SESSION['payThroughDate'];
	//echo $paythrough;
   
?>

<?php if(checkRenew($_SESSION['payThroughDate'], $tag)): ?>
<?php
//include('sites/all/themes/evolve/commonFile/updateBackgroundImage.php');
apa_function_updateBackgroundImage_form();
//include('sites/all/themes/evolve/commonFile/dashboardLeftNavigation.php');
apa_function_dashboardLeftNavigation_form();
/* get background image****/
if(isset($_SESSION['UserId'])) { $userID = $_SESSION['UserId'];
$userTag = getInsuranceStatus($userID);
/*if($userTag ==1){
	$link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
	header("Location:".$link."/insuranceprocess");
}*/
   
} else { $userID =0; }
$background = getBackgroundImage($userID);
/* get background image****/ 
 
?>
<!-- PREVENT OVERLAY TO SHOW UP -->
<style>
	.white-overlay{
		display: none;
	}
</style>
<!--Quotation order POP UP-->

<div id="QuatationPopUp" style="display:none;" class="container">
	<h3 style="color:black;">Renewing your APA membership is easy…</h3>
	<p>Your membership category for 2020 is:</p>
	<p><?php if(sizeof($orderDetails)!=0): ?>
	<?php 
	$ngQuatation = array();
	$SubsCount = 0;
	if(!isset($_SESSION['QuatationTag'])){
		foreach($orderDetails['Order'] as $orders){
			foreach($orders['OrderLines'] as $order){
				//  put the code here to save the quatation order products into the database firstly.
			
				if($order['ProductCategory'] =="Memberships"){
					//checkShoppingCart($userID=$_SESSION["UserId"], $type="membership", $productID=$order['ProductID']);
					checkShoppingCart($userID=$_SESSION["UserId"], $type="membership", $productID="");
					createShoppingCart($userID, $productID =$order['ProductID'],$type="membership",$coupon="");
					echo $order['ProductName']; echo "</br>";
				}
				if($order['ProductCategory'] !="Memberships"){
					$SubsCount++;
				}
			}
		}
	}?><?php endif;?></p>
	<?php if(sizeof($orderDetails)!=0 && $SubsCount > 0): ?>
	<?php 
	echo "<p>Your subscription(s) for 2020:</p><p>";
	$ngQuatation = array();
	if(!isset($_SESSION['QuatationTag'])){
		foreach($orderDetails['Order'] as $orders){
			foreach($orders['OrderLines'] as $order){
				//  put the code here to save the quatation order products into the database firstly.
				if($order['ProductCategory'] !="Memberships"){
					echo $order['ProductName']; echo "</br>";
				}
				if($order['ProductCategory'] =="Subscription"){
					
					checkShoppingCart($userID=$_SESSION["UserId"], $type="", $productID=$order['ProductID']);
					createShoppingCart($userID, $productID =$order['ProductID'],$type="NG",$coupon="");
					array_push($ngQuatation, $order['ProductID']);
				}
				if($order['ProductID'] =="9978"){
					checkShoppingCart($userID=$_SESSION["UserId"], $type="", $productID=$order['ProductID']);
					createShoppingCart($userID, $productID =$order['ProductID'],$type="MG1",$coupon="");
					
				}
				if($order['ProductID'] =="9977"){
					checkShoppingCart($userID=$_SESSION["UserId"], $type="", $productID=$order['ProductID']);
					createShoppingCart($userID, $productID =$order['ProductID'],$type="MG2",$coupon="");
					
				}
				if($order['ProductID'] =="9973"){
					checkShoppingCart($userID=$_SESSION["UserId"], $type="", $productID=$order['ProductID']);
					createShoppingCart($userID, $productID =$order['ProductID'],$type="FP",$coupon="");
					$_SESSION['fpQuatation'] = $order['ProductID'];
					
				}
				if($order['ProductID'] =="18247"){
					checkShoppingCart($userID=$_SESSION["UserId"], $type="", $productID=$order['ProductID']);
					createShoppingCart($userID, $productID =$order['ProductID'],$type="FP",$coupon="");
					$_SESSION['fpQuatation'] = $order['ProductID'];
				}
				$_SESSION['QuatationTag'] = "1";
			}
		}
		
		$_SESSION['ngQuatation'] = $ngQuatation;
	}
	echo "</p>";
	?><?php endif;?>
	<p>
	</br></br>
	Click continue to confirm or alter your membership and complete your renewal process.</p>
		
	<a href="renewmymembership" target="_self" class="accent-btn cancelInsuranceButton"><span class="dashboard-button-name">Continue</span></a>

</div>
<!--End Pop up--->
<!-- PAGE CONTENT BEGIN -->
<div id="pre_background" style="display:none">background_<?php //echo $background; ?></div>
	<div class="renew_content col-xs-12 col-sm-12 col-md-10 col-lg-10 background_<?php //echo $background; ?> " id="dashboard-right-content">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dashboard_detail">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="col-xs-12 page-title">
			<span class="dashboard-name cairo">Renew my membership</span>
		</div>
		
		</div>
	<?php
		//include('sites/all/themes/evolve/commonFile/customizeBackgroundImage.php');
		apa_function_customizeBackgroundImage_form();
	?>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 renew-membership-nav">
				<ul class="nav nav-tabs">
				<li><a class="tabtitle1 inactiveLink" style="cursor: pointer;"><span class="<?php if(!isset($_POST['step1']) && !isset($_POST['step2']) && !isset($_POST['stepAdd']) && !isset($_POST['step2-1']) && !isset($_POST['goI']) && !isset($_POST['goP'])&& !isset($_POST['step2-2'])&&!isset($_POST['step2-3'])&& !isset($_POST['QOrder']) && !isset($_POST["MType"]) && !isset($_POST['step2-4']))echo "text-underline";?> eventtitle1" id="yourdetails-tab"><strong>Your details</strong></span> </a></li>
				<li><a class="tabtitle2 inactiveLink" style="cursor: pointer;"><span class="eventtitle2 <?php if(isset($_POST['MType']))echo 'text-underline';?>" id="Membership"><strong>Membership</strong></span></a></li>
				<li><a class="tabtitle3 inactiveLink" style="cursor: pointer;"><span class="eventtitle3" id="Workplace"><strong>Workplace</strong></span></a></li>
				<li><a class="tabtitle4 inactiveLink" style="cursor: pointer;"><span class="eventtitle4" id="Education"><strong>Education</strong></span></a></li>
				<li><a class="tabtitle5 inactiveLink" style="cursor: pointer;"><span class="eventtitle5 <?php if((isset($_POST['step1'])&& $_POST['insuranceTag']!="0") || isset($_POST['goI']))echo 'text-underline';?>" id="Insurance"><strong>Insurance</strong></span></a></li>
				<li><a class="tabtitle6 inactiveLink" style="cursor: pointer;"><span class="eventtitle6 <?php if(isset($_POST['step2-1'])|| (isset($_POST['step1'])&& $_POST['insuranceTag']=="0")||isset($_POST['QOrder']) || isset($_POST['stepAdd']) || isset($_POST['goP']) ||isset($_POST["step2-2"])||isset($_POST['step2-3']) ||isset($_POST['step2-4']))echo 'text-underline';?>" id="Payment"><strong>Payment</strong></span></a></li>
				
				</ul>
			<div id="insuranceBlockRN"></div>
			<div class="col-xs-12 none-margin">
				<label class="note-text"><span class="tipstyle">*</span>Required fields</label>
			</div>
			<?php
			
			//include('sites/all/themes/evolve/inc/renewMyMembership/renew-yourdetail.inc.php');
			apa_function_renew_your_detail_form();
			if((isset($_POST["step1"]) && $_POST["step1"] == "1"&& $_POST['insuranceTag']!="0") || isset($_POST['goI'])){
			//include('sites/all/themes/evolve/inc/renewMyMembership/renew-insurance.inc.php'); 
			apa_function_renew_the_apa_insurance_form();
			}
            elseif(isset($_POST["step2-1"]) && $_POST["step2-1"] == "1" || isset($_POST['goP'])|| (isset($_POST['step1'])&& $_POST['insuranceTag']=="0") || isset($_POST['QOrder']) || (isset($_POST["stepAdd"]) && $_POST["stepAdd"] == "2") ||isset($_POST['step2-2'])||isset($_POST['step2-3'])||isset($_POST['step2-4'])) {
		    //include('sites/all/themes/evolve/inc/renewMyMembership/renew-surveypayment.inc.php');
			//apa_function_renew_the_apa_surveypayment_form();
			apa_function_renew_the_apa_final_form();
		    } 			
			elseif((isset($_POST["step2"]) && $_POST["step2"] == "2") || (isset($_POST["stepAdd"]) && $_POST["stepAdd"] == "2") ||isset($_POST['step2-2'])||isset($_POST['step2-3'])||isset($_POST['step2-4'])) {
			//include('sites/all/themes/evolve/inc/renewMyMembership/renew-final.inc.php');
			apa_function_renew_the_apa_final_form();
			}
			?>
			</div>
		</div>
	</div>
</div>
</div>
<?php logRecorder(); ?>
<div id="privacypolicyWindow" style="display:none;">
	<span class="close-popup"></span>
	<div class="modal-header">
		<div class="col-xs-12">
			<h4 class="modal-title">Australian Physiotherapy Association Terms & Conditions</h4>
		</div>
	</div>

<div class="modal-body">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  
	<span class="note-text" style="display: block">Please scroll down to accept the full APA terms and conditions</span>
	
	<h4>1. Eligibility for all members</h4>
<p>In order to be eligible for APA membership, all members must:</p>
<ul>
	<li>agree to abide by the APA Constitution and <u>Code of Conduct</u></li>
	<li>be of good fame and character, and a fit and proper person to be a member of the Association</li>
	<li>have no criminal conviction recorded against them</li>
	<li>have no ruling of unprofessional conduct, professional misconduct or unsatisfactory professional conduct (or similar), or a finding of grounds for disciplinary action (or similar), by the Physiotherapy Board of Australia or its equivalent or by their industry registration board</li>
</ul>

<h4 class="doc-header">Eligibility for APA student members:</h4>
<p>In addition to the eligibility for all members, APA student members declare that:</p>
<ul>
	<li>I am a student enrolled in an accredited course in Australia leading to registration as a physiotherapist</li>
	<li>I understand physiotherapy student members do not have voting rights in the association</li>
</ul>

	<h4>2. Privacy Policy</h4>

	<h4 class="doc-header">Our Commitment to Your Privacy</h4>

<p>Your privacy is very important to the Australian Physiotherapy Association (APA). As part of the normal operation of this site, the APA may collect certain information from you. This privacy policy details what information the APA collects, how it uses that information and what your rights are regarding any information that you supply to it. The APA is subject to the requirements of applicable Australian law and strives to meet the requirements of the Australian Privacy Principles.</p>


<h4 class="doc-header">Your information and Your Right to Privacy</h4>

<p>You can elect to provide as much or as little information as you choose although the APA requires a minimum set of information to provide access to its site. What you provide is your choice.</p>

<p>The APA will under no circumstances sell, trade or rent any personal information that you supply to it to any third party. The APA has partnerships with commercial organisations and those partners will, from time to time, request that the APA send information to people on the APA database as part of the partnership. Any APA or partner information is sent by the APA and data is not provided to any third party. In short, information you supply to the APA stays with the APA. The APA may disclose personal information to the following third parties to satisfy standard operating procedures of the APA:</p>

<ul>
	<li>IT service providers</li>
	<li>Marketing and communications agencies</li>
	<li>Agencies that conduct member surveys on our behalf</li>
	<li>Mailing houses</li>
	<li>Printers that print and distribute our publications and marketing material</li>
</ul>

<p>By using the site and the APA’s services, you acknowledge and accept that it will use your personal data as set out in this privacy policy. If you do not accept this privacy policy, please immediately stop using the site and/or the APA’s services or any part of them. In these circumstances, you will not be able to register or purchase anything further using the site.</p>

<p>APA is the controller responsible for your personal data. It has appointed a privacy officer who is responsible for overseeing issues of privacy. If you have any questions about this privacy policy, including requests to exercise your legal rights, please contact the privacy officer at privacy@australian.physio.</p>

<p>The site may include links to third-party websites, plug-ins and applications. Clicking on those links or enabling those connections may allow third parties to collect or share data about you. We do not control these third-party websites and are not responsible for their privacy statements. We strongly recommend you read the privacy policy of every website you visit.</p>

<p>The APA adheres to the principles set out in data protection legislation when handling personal data. These principles require personal data to be:</p>

<ul>
	<li>Processed lawfully, fairly and in a transparent manner</li>
	<li>Collected only for specified, explicit and legitimate purposes</li>
	<li>Adequate, relevant and limited to what is necessary in relation to the purposes for which it is processed</li>
	<li>Not kept in a form which permits identification of data subjects for longer than is necessary for the purposes for which the data is processed</li>
	<li>Processed in a manner that ensures its security using appropriate technical and organisational measures to protect against unauthorised or unlawful processing and against accidental loss, destruction or damage</li>
	<li>Not transferred to another country without appropriate safeguards being in place</li>
	<li>Made available to data subjects and allow data subjects to exercise certain rights in relation to their personal data</li>
</ul>

<p>The APA is also responsible and accountable for ensuring that it can demonstrate compliance with the data protection principles listed above.</p>


<h4 class="doc-header">Collecting Information</h4>

<p>The APA may collect, use, store and transfer different kinds of personal data about you. It collects and process personal data about you when you:</p>

<ul>
	<li>Access and use the site and its services</li>
	<li>Register an account on the site</li>
	<li>Leave a comment on the site</li>
	<li>Place an advertisement on the site</li>
	<li>Buy a product through the site</li>
	<li>Make an enquiry about a particular product on the site</li>
	<li>submit a general enquiry to the APA</li>
	<li>Enter a competition</li>
	<li>Create a wish list on the site</li>
	<li>Subscribe to the APA’s newsletter</li>
	<li>Leave your feedback or review on the site</li>
	<li>Manage your marketing preferences with the APA</li>
	<li>Make a payment through the site</li>
</ul>

<p>The APA may hold the following information about you:</p>

<ul>
	<li>Name, address, telephone number(s)</li>
	<li>Date of birth</li>
	<li>Racial or ethnic origin</li>
	<li>Email address</li>
	<li>Occupation</li>
	<li>Transaction details associated with services we have provided to you</li>
	<li>Additional information provided by us to you</li>
	<li>Information you have provided to us via client surveys</li>
</ul>

<p>The APA may also collect, use and share aggregated data such as statistical or demographic data. Aggregated data derived from your personal data but is not considered personal data under data protection law as it does not directly or indirectly reveal your identity. For example, the APA may aggregate data about your use of the site to calculate the percentage of users accessing a specific feature. Likewise, the APA may aggregate data that it collects through your use of the site in order to produce certain benchmarking reports. However, if the APA combines or connects aggregated data with your personal data so that it can directly or indirectly identify you, the APA treats the combined data as personal data which will be used in accordance with this privacy policy.</p>


<h4 class="doc-header">Access to Personal Information</h4>

<p>You have the right to review and alter any personal membership information that the APA stores about you. After all, it is your information, so you should be the person that controls it.&nbsp;Should you wish to access this information please&nbsp;contact the APA’s privacy officer. Unless the access you request will require special steps or significant resources, there will be no charge for providing you with this access.</p>

<p>To change your personal information you must login to your account with your member ID and password via the APA website <a target="_blank" style="color: #000; text-decoration: underline" href="https://australian.physio">www.australian.physio</a>.</p>


<h4 class="doc-header">Opt-Out</h4>

<p>By choosing to register on the APA web site or as a member of the APA, you may receive information from the APA about membership, APA services, partner information and offers. The APA uses this method to communicate quickly with you. You have the right to refuse inclusion on a mailing list. You can make a request to remove your email address from a mailing list by contacting the privacy officer at <a target="_self" style="text-decoration: underline; color: #000" href="mailto:privacy@australian.physio">privacy@australian.physio</a>.</p>

<p>The APA uses your email address, your mailing address and phone number to contact you regarding administrative notices, publications, and communications relevant to your use of the site and your APA membership. If you do not wish to receive these communications, you have the ability to opt out by contacting the privacy officer at <a target="_self" style="text-decoration: underline; color: #000" href="mailto:privacy@australian.physio">privacy@australian.physio</a>.</p>

<p>From time to time, the APA arranges mailings using the contact information you have provided, from its business partners (including corporate partners and endorsed product manufacturers/suppliers). These mailings aim to provide you with information and benefits available to you.</p>

<p>If you do not wish to receive information from APA's business partners you should advise your local APA Branch or notify the APA’s privacy officer at <a target="_self" style="text-decoration: underline; color: #000" href="mailto:privacy@australian.physio">privacy@australian.physio</a>. For any information about privacy, please contact the APA’s privacy officer by phoning <a target="_self" style="text-decoration: underline; color: #000" href="tel:03 9092 0888">03 9092 0888</a> or by email <a target="_self" style="text-decoration: underline; color: #000" href="mailto:privacy@australian.physio">privacy@australian.physio</a>.</p>


<h4 class="doc-header">Cookies</h4>

<p>As part of the normal operation of this site, your internet browser will be sent a 'cookie' (a temporary internet file). This cookie enhances the site's functionality with features such as membership logon and electronic ordering. By itself, this cookie can only identify your computer to APA’s server; it is not used to identify you personally.</p>

<p>Your personal password to access the APA website protects your privacy. We recommend that you do not disclose, share or reveal this password to any other individual.</p>


<h4 class="doc-header">Change of Purpose</h4>

<p>It is not anticipated that any information will be disclosed to overseas recipients.&nbsp;If this were to change this page will be updated.</p>

<p>From time to time, the APA may decide to collect different kinds of information. When this occurs, the APA will update this privacy page.</p>


<h4 class="doc-header">Privacy Enquires</h4>

<p>You have the right to complain regarding any aspect of your privacy rights.&nbsp;If you have a complaint please contact the privacy officer at <a target="_self" style="text-decoration: underline; color: #000" href="mailto:privacy@australian.physio">privacy@australian.physio</a> or on <a target="_self" style="text-decoration: underline; color: #000" href="tel:03 9092 0888">03 9092 0888</a>.</p>


<h4 class="doc-header">APA Membership</h4>

<p>If you decide to become a member of the APA, and we hope that you do, the APA will ask you for additional personal details. You may also opt to provide the APA with more information such as special interest areas you may have where you are employed and your date of birth. Relevant information is disclosed to the public on the internet via the APA's 'Find a Physio' online searchable database only. You must approve the use of your details on this database. Whether you decide to use this service is your choice.</p>


<h4 class="doc-header">Security</h4>

<p>Your information is stored on the APA's server located in a secure data housing facility. While, it is important to recognise that 'perfect security' does not exist on the internet, the APA is committed to using industry standard mechanisms to safeguard the confidentiality of your personal information such as firewalls and Secure Socket Layers.&nbsp;&nbsp;</p>


<h4 class="doc-header">Credit Card Information</h4>

<p>The APA does not permanently store credit card information anywhere on this site.&nbsp;&nbsp;</p>


<h4 class="doc-header">APA Members Privacy</h4>

<p>The APA has a strong commitment to protecting your privacy and ensuring the confidentiality and security of personal information provided to the APA by you. As an organisation with an annual turnover of more than $3 million, the APA is required to comply with the Privacy Act 1988 as amended by the Privacy Amendment (Enhancing Privacy Protection) Act 2012 which came into effect in March 2014.<br />
&nbsp;<br />
You have the right to access the personal information about yourself held by the APA and to correct information which is inaccurate. To change your information you must log into your account with your member ID and password via the APA website <a href="https://australian.physio" target="_blank" style="text-decoration: underline; color: #000">www.australian.physio</a>.</p>

<p>Information you have provided to the APA is used to:&nbsp;</p>

<ul>
	<li>Process applications and renewals and to update your membership details and profile information</li>
	<li>Notify members and the public that you have met our requirements for credentialing (e.g. specialisation or titling)</li>
	<li>Provide information to consumers and others on the availability of physiotherapy services</li>
	<li>Conduct market research in order to identify and analyse the ongoing needs of APA members</li>
	<li>Ensure compliance with the APA's Constitution and Regulations</li>
	<li>Provide you with APA publications and information</li>
	<li>Provide you with access to and information about current and future member benefits</li>
</ul>



<h4 class="doc-header">Consent</h4>



<p>You acknowledge and agree that by providing your personal and/or sensitive information to the APA that the APA, its related bodies corporate and partners and each of their officers, employees, agents and contractors are permitted to collect, store, use and disclose your personal information in the manner set out in this privacy policy and in accordance with the Australian Privacy Principles.</p>


<h4>3. Membership cancellation and refund policies</h4>

<h4 class="doc-header">Instalment policy</h4>

<p>The first monthly instalment will be deducted upon receipt of renewal. The first instalment will include the full amount of GST payable for the year. It will also include any donations that you may have agreed to provide. Subsequent instalments for the year will equal the remaining amount due divided by the respective number of months of the year remaining. Monthly instalments will be deducted from your nominated credit or debit card on the first working day of the month. By electing to pay by instalments you are also opting to have your membership automatically rolled over into the forthcoming year, authorising the APA to continue deducting membership fees until you notify the APA in writing to cease deductions or your membership is cancelled or withdrawn and outstanding fees are collected. Instalments can only be cancelled in December at the end of our membership year. You will be notified in writing of any change to your deductions at least 30 days prior to that change. If there are insufficient funds available to make the deduction or the payment is rejected for other reasons, the APA may pass associated bank fees on to you.</p>

<h4 class="doc-header">Refund policy</h4>

<p>The Australian Physiotherapy Association will not issue membership refunds throughout the year unless under extraordinary circumstances. Applications for refund must be made in writing to the Senior Finance and Systems Officer. All applications will be considered on a case-by-case basis and the decision made will be final. Please note that membership to the APA is done on a yearly basis. If any refund of membership fees is granted the APA reserves its right to charge an administrative fee of $100.00 (inclusive of GST), which will be deducted before membership fees are refunded.</p>

<p><strong>AUSTRALIAN PHYSIOTHERAPY ASSOCIATION</strong></p>
<p><strong>ABN: 89 004 265 150</strong></p>
	</div>

</div>

			<div class="modal-footer">
				<a class="disagree-btn" href="" popup-dismiss="privacypolicyWindow">Disagree</a>
				<a id="privacypolicyp" class="agree-btn" href="" popup-dismiss="privacypolicyWindow">Agree</a>
			</div>
	</div>
</div>
<div id="installmentpolicyWindow" style="display:none;">
	<h3>APA installment policy</h3>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  
	<span class="note-text" style="display: block">Please scroll down to accept the full terms and conditions of this guide</span>	
	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam pretium
	tellus non ex mattis feugiat a in est. Praesent est leo, viverra ac
	hendrerit ac, facilisis at ante. Phasellus elementum hendrerit risus,
	eu luctus dolor sollicitudin vitae. Cras ac tellus ut mauris scelerisque
	mollis. Sed nibh ipsum, fringilla sed pellentesque non, luctus ut diam.
	In viverra neque lacus, vel pulvinar nulla convallis id. Curabitur porttitor
	eleifend quam in tincidunt.
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  
		<input class="styled-checkbox" type="checkbox" id="installmentpolicyp" checked name="instalmentpolicy">
		<label for="installmentpolicyp">Yes. I’ve read and understand the APA installment policy</label>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 display-none warning" id="disagreeInstallmentDescription"> 
         Please agree to the APA Installment Policy to continue with your membership
	</div>
	<button type="button" class="btn btn-default" id="installment_policy_button">Submit</button>
</div>

<!-- OVERLAY / LOADING SCREEN -->
<div class="overlay">
	<section class="loaders">
		<span class="loader loader-quart">
		</span>  
		<span class="edu-step-note">This may take a moment while we update your details</span>
	</section>
</div>


		<div id="deleteWorkplaceWindow" style="display:none;">
			<form action="your-details" method="POST" id="deleteWorlplaceForm">
				<div class="flex-cell">
					<h3 class="light-lead-heading cairo">Are you sure you want to delete this workplace?</h3>
				</div>
				<input type="hidden" name="WorkplaceID" value="">
				<div class="flex-cell buttons-container">
					<a class="" value="yes" target="_self">Yes</a>
					<a class="no accent-btn cancelDeleteButton" value="no" target="_self">No</a>
				</div>
			</form>
		</div>
		
<form id="renew-survey-form2" action="" method="POST"><input type="hidden" name="QOrder"></form>
<form id="renew-membertype-form2" action="" method="POST"><input type="hidden" name="MType"></form>
<?php else:?>
	<!-- A MEMBER DOESN'T HAVE A RENEW QUATATION -->
	<div class="flex-container" id="non-member">
		<div class="flex-cell">
			<h3 class="light-lead-heading">Looks like you’ve already renewed your APA membership. <br>If you’re looking to update your membership details, <br>go to your dashboard.</h3>
		</div>
		<div class="flex-cell cta">
			<a href="/dashboard" class="join">Go to dashboard</a>
		</div>

		<?php 
				$block = block_load('block', '309');
				$get = _block_get_renderable_array(_block_render_blocks(array($block)));
				$output = drupal_render($get);        
				print $output;
		?>

	</div>
<?php endif; ?>
<?php  else: ?>
	<!-- USER LOGGED IN BUT NOT A MEMBER  -->
	<div class="flex-container" id="non-member">
		<div class="flex-cell">
			<h3 class="light-lead-heading">If you’re not already a member,<br> join us today.</h3>
		</div>
		<div class="flex-cell cta">
			<a href="/membership-question" class="join">Join now</a>
		</div>

		<?php 
				$block = block_load('block', '309');
				$get = _block_get_renderable_array(_block_render_blocks(array($block)));
				$output = drupal_render($get);        
				print $output;
		?>

	</div>
<?php endif;?>
<?php else:
	//when the renewTag session is not existed 	
?>
	<div class="full-width banner-img">
			<img src="/sites/default/files/DASHBOARD/renew-membership/MEMBERSHIP_1500X500.png" alt="Every step a leader">
			<img class="mobile" src="/sites/default/files/DASHBOARD/renew-membership/MEMBERSHIP_376X366.png" alt="Every step a leader">
		</div>

		<span class="space-50">&nbsp;</span>

		<div class="header">
			<h2 class="lead-heading">Choose your current membership status below:</h2>
		</div>

		<div class="grid-block apa-member-grid">
			
			<div class="item">
				<div class="item-body current-member">
					<span class="item-title">2019 APA member</span>
					<span class="item-description">If you were an APA member in 2019, please renew your membership for 2020 below.</span>
					<a href="javascript:document.getElementById('apa-renew-landingpage-form').submit();" class="item-action">Renew</a>
				</div>
			</div>

			
			<div class="item">
				<div class="item-body previous-member">
					<span class="item-title">Existing account</span>
					<span class="item-description">Have you previously been an APA member or had an online account? Login below to purchase APA membership.</span>
					<a href="/membership-question" class="item-action">Login and join</a>
				</div>
			</div>

			<div class="item">
				<div class="item-body new-member">
					<span class="item-title">New member</span>
					<span class="item-description">New to the APA? Find out which membership type is best suited to you and purchase APA membership below.</span>
					<a href="/membership-question" class="item-action">Join</a>
				</div>
			</div>
		</div>

		<span class="space-50">&nbsp;</span>

		<div class="bottom-info">
			<span>If you have any questions with regard to APA membership, please contact our Member Service Centre at <a href="mailto:info@australian.physio">info@australian.physio</a> or call <a href="tel:1300 306 622">1300&nbsp;306&nbsp;622</a></span>
		</div>

		<span class="space-100">&nbsp;</span>
		
<?php endif;?>
<?php else: 
	// when user is not logged in
	?>
		<!-- USER NOT LOGIN  -->
		<div class="full-width banner-img">
			<img src="/sites/default/files/DASHBOARD/renew-membership/MEMBERSHIP_1500X500.png" alt="Every step a leader">
			<img class="mobile" src="/sites/default/files/DASHBOARD/renew-membership/MEMBERSHIP_376X366.png" alt="Every step a leader">
		</div>

		<span class="space-50">&nbsp;</span>

		<div class="header">
			<h2 class="lead-heading">Choose your current membership status below:</h2>
		</div>

		<div class="grid-block apa-member-grid">
				
			<div class="item">
				<div class="item-body current-member">
					<span class="item-title">2018 APA member</span>
					<span class="item-description">If you were an APA member in 2018, please renew your membership for 2019 below.</span>
					<a data-target="#loginAT" data-toggle="modal" class="item-action" href="#" id="renewItem">Renew</a>
				</div>
			</div> 
			
			<div class="item">
				<div class="item-body previous-member">
					<span class="item-title">Existing account</span>
					<span class="item-description">Have you previously been an APA member or had an online account? Login below to purchase APA membership.</span>
					<a data-target="#loginAT" data-toggle="modal" class="item-action" href="#">Login and Join</a>
				</div>
			</div>

			<div class="item">
				<div class="item-body new-member">
					<span class="item-title">New member</span>
					<span class="item-description">New to the APA? Find out which membership type is best suited to you and purchase APA membership below.</span>
					<a class="item-action" href="/membership-question">Join</a>
				</div>
			</div>
		</div>

		<span class="space-50">&nbsp;</span>

		<div class="bottom-info">
			<span>If you have any questions with regard to APA membership, please contact our Member Service Centre at <a href="mailto:info@australian.physio">info@australian.physio</a> or call <a href="tel:1300 306 622">1300&nbsp;306&nbsp;622</a></span>
		</div>

		<span class="space-100">&nbsp;</span>

<?php endif; ?>

<div class="white-overlay">
	<section class="loaders">
		<span class="loader loader-quart">
		</span>
	</section>
</div>

<!--Added renew landing page hidden form to check the login user eligible for renew process-->
<div class="display-none">
<?php 
	$the_form = drupal_get_form('apa_renew_landingpage_form');
	print drupal_render($the_form);			 
?>
</div>
<!---Handle the endpoint time out error start--->
<div id="timeoutWindow" style="display:none;">
	<div class="flex-cell">
		<div id="time_msg">
			<span class="light-lead-heading cairo">There was an unexpected server error. <br>Please contact the APA Member Hub on 1300 306 622 or try again later.</span>		
		</div>
	</div>
</div>
<a popup-target="timeoutWindow" id="triggerTimeout" syle="display:none;"></a>

<!---Handle the endpoint time out error end--->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">		
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
	var isshow = sessionStorage.getItem('isshow');
	var user ='<?php if(isset($_SESSION['UserId']) && isset($_SESSION['renewTag']))  {echo $_SESSION['UserId']; } else{ echo "";}?>';
	if(isshow == null && user != ""){
       sessionStorage.setItem('isshow', 1);
	   
       $("#QuatationPopUp").dialog();
       
    }
	$('input[value="Log out"]').click(function(){
	   sessionStorage.removeItem("isshow");
	   
	});
	
});
</script>
<script>
$(document).ready(function() {
        window.history.pushState(null, "", window.location.href);        
        window.onpopstate = function() {
            window.history.pushState(null, "", window.location.href);
		};
	// handle the endpoint time out 
	var timeoutTag ='<?php if(isset($_SESSION['timeoutPopUp']))  {echo $_SESSION['timeoutPopUp']; } else{ echo "";}?>';
	if(timeoutTag == "1"){
		// prevent element inspect
		document.addEventListener('contextmenu', function(e) {
			e.preventDefault();
		});
	   
		// append overlay
		if( $('body, html, .html').find('.overlay').length == 0 ){
			$('body').append('<div class="overlay"><section class="loaders"><span class="loader loader-quart"></span></section></div>');
		}
		$('.overlay').fadeIn();
		// fade in time out window
		$("#timeoutWindow").fadeIn();
		$("#QuatationPopUp").dialog('close');
	}
	else{
		$("#timeoutWindow").hide();
	}
 });
</script>