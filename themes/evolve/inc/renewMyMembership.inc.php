<?php if(isset($_SESSION["UserId"])) : ?>
<?php
include('sites/all/themes/evolve/commonFile/updateBackgroundImage.php');
include('sites/all/themes/evolve/commonFile/dashboardLeftNavigation.php');
/* get background image****/
if(isset($_SESSION['UserId'])) { $userID = $_SESSION['UserId'];
$userTag = getInsuranceStatus($userID);
if($userTag ==1){
	$link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
	header("Location:".$link."/insuranceprocess");
}
   
} else { $userID =0; }
$background = getBackgroundImage($userID);
/* get background image****/ 
 
?>
<div id="pre_background" style="display:none">background_<?php echo $background; ?></div>
	<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 background_<?php echo $background; ?> autoscroll" id="dashboard-right-content">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dashboard_detail">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="col-xs-12">
			<span class="dashboard-name cairo">Renew my membership</span>
		</div>
		<!--<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><button class="dashboard-backgroud" data-target="#myModal" data-toggle="modal"><span class="customise_background <?php if(!isset($_SESSION["userID"])) echo "display-none";?>">Customise your background</span><span class="customise_icon">[icon class="fa fa-cogs fa-x"][/icon]</span></button></div>-->
		</div>
	<?php
		include('sites/all/themes/evolve/commonFile/customizeBackgroundImage.php');
	?>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
				<ul class="nav nav-tabs">
				<li><a class="tabtitle1 inactiveLink" style="cursor: pointer;"><span class="<?php if(!isset($_POST['step1']) && !isset($_POST['step2']) && !isset($_POST['stepAdd']) && !isset($_POST['step2-1']) && !isset($_POST['goI']) && !isset($_POST['goP'])&& !isset($_POST['step2-2'])&&!isset($_POST['step2-3'])&& !isset($_POST['QOrder']) && !isset($_POST["MType"]) && !isset($_POST['step2-4']))echo "text-underline";?> eventtitle1" id="yourdetails-tab"><strong>Your details</strong></span> </a></li>
				<li><a class="tabtitle2 inactiveLink" style="cursor: pointer;"><span class="eventtitle2 <?php if(isset($_POST['MType']))echo 'text-underline';?>" id="Membership"><strong>Membership</strong></span></a></li>
				<li><a class="tabtitle3 inactiveLink" style="cursor: pointer;"><span class="eventtitle3" id="Workplace"><strong>Workplace</strong></span></a></li>
				<li><a class="tabtitle4 inactiveLink" style="cursor: pointer;"><span class="eventtitle4" id="Education"><strong>Education</strong></span></a></li>
				<li><a class="tabtitle5 inactiveLink" style="cursor: pointer;"><span class="eventtitle5 <?php if((isset($_POST['step1'])&& $_POST['insuranceTag']!="0") || isset($_POST['goI']))echo 'text-underline';?>" id="Insurance"><strong>Insurance</strong></span></a></li>
				<li><a class="tabtitle6 inactiveLink" style="cursor: pointer;"><span class="eventtitle6 <?php if(isset($_POST['step2-1'])|| (isset($_POST['step1'])&& $_POST['insuranceTag']=="0")||isset($_POST['QOrder']) || isset($_POST['goP']))echo 'text-underline';?>" id="Payment"><strong>Payment</strong></span></a></li>
				<!--<li><a class="tabtitle7 inactiveLink" style="cursor: pointer;"><span class="eventtitle7 <?php //if(isset($_POST['goP']))echo 'text-underline';?>" id="Payment"><strong>Payment</strong></span></a></li>-->
				<li><a class="tabtitle8 inactiveLink" style="cursor: pointer;"><span class="eventtitle8 <?php if(isset($_POST['step2']) || isset($_POST['step3']) || isset($_POST['stepAdd']) ||isset($_POST['step2-2']) ||isset($_POST['step2-3']) ||isset($_POST['step2-4']))echo 'text-underline';?>" id="Review"><strong>Review</strong></span></a></li>
				</ul>
			<div id="insuranceBlockRN"></div>
			<div class="col-xs-12 none-margin">
				<label class="note-text"><span class="tipstyle">*</span>Required fields</label>
			</div>
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
				else{$orderDetails = array();}
			}      
			include('sites/all/themes/evolve/inc/renewMyMembership/renew-yourdetail.inc.php');
			if((isset($_POST["step1"]) && $_POST["step1"] == "1"&& $_POST['insuranceTag']!="0") || isset($_POST['goI'])){
			include('sites/all/themes/evolve/inc/renewMyMembership/renew-insurance.inc.php'); 
			}
            elseif(isset($_POST["step2-1"]) && $_POST["step2-1"] == "1" || isset($_POST['goP'])|| (isset($_POST['step1'])&& $_POST['insuranceTag']=="0") || isset($_POST['QOrder'])) {
		    include('sites/all/themes/evolve/inc/renewMyMembership/renew-surveypayment.inc.php');
		    } 			
			elseif((isset($_POST["step2"]) && $_POST["step2"] == "2") || (isset($_POST["stepAdd"]) && $_POST["stepAdd"] == "2") ||isset($_POST['step2-2'])||isset($_POST['step2-3'])||isset($_POST['step2-4'])) {
			include('sites/all/themes/evolve/inc/renewMyMembership/renew-final.inc.php');
			}
			?>
			</div>
		</div>
	</div>
</div>
</div>
<?php logRecorder(); ?>
<div id="privacypolicyWindow" style="display:none;">
	<div class="modal-header">
		<h4 class="modal-title">APA privacy policy</h4>
	</div>

	<div class="modal-body">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  
	<span class="note-text" style="display: block">Please scroll down to accept the full terms and conditions of this guide</span>	
	<h5 class="doc-header">Our Commitment to Your Privacy</h5>



<p>Your privacy is very important to the Australian Physiotherapy Association (APA). As part of the normal operation of this site, the APA may collect certain information from you. This privacy policy details what information the APA collects, how it uses that information and what your rights are regarding any information that you supply to it. The APA is subject to the requirements of applicable Australian law and strives to meet the requirements of the Australian Privacy Principles.</p>



<h5 class="doc-header">Your information and Your Right to Privacy</h5>

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



<p>APA is the controller responsible for your personal data. It has appointed a privacy officer who is responsible for overseeing issues of privacy. If you have any questions about this privacy policy, including requests to exercise your legal rights, please contact the privacy officer at <a href="mailto:privacy@physiotherapy.asn.au" style="text-decoration: underline; color: #000">privacy@physiotherapy.asn.au</a>.</p>



<p>The site may include links to third-party websites, plug-ins and applications. Clicking on those links or enabling those connections may allow third parties to collect or share data about you. We do not control these third-party websites and are not responsible for their privacy statements. We strongly recommend you read the privacy policy of every website you visit.</p>



<p>APA adheres to the principles set out in data protection legislation when handling personal data. These principles require personal data to be:</p>



<ul>
	<li>Processed lawfully, fairly and in a transparent manner</li>li>
	<li>Collected only for specified, explicit and legitimate purposes</li>
	<li>Adequate, relevant and limited to what is necessary in relation to the purposes for which it is processed</li>
	<li>Accurate and where necessary kept up to date</li>
	<li>Not kept in a form which permits identification of data subjects for longer than is necessary for the purposes for which the data is processed</li>
	<li>Processed in a manner that ensures its security using appropriate technical and organisational measures to protect against unauthorised or unlawful processing and against accidental loss, destruction or damage</li>
	<li>Not transferred to another country without appropriate safeguards being in place</li>
	<li>Made available to data subjects and allow data subjects to exercise certain rights in relation to their personal data</li>
</ul>



<p>The APA is also responsible and accountable for ensuring that it can demonstrate compliance with the data protection principles listed above.</p>



<h5 class="doc-header">Collecting Information</h5>

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



<p>Access to Personal Information</p>



<p>You have the right to review and alter any personal membership information that the APA stores about you. After all, it is your information, so you should be the person that controls it.&nbsp;Should you wish to access this information please&nbsp;contact the APA’s privacy officer. Unless the access you request will require special steps or significant resources, there will be no charge for providing you with this access.</p>



<p>To change your personal information you must login to your account with your unique login and password via the APA website <a href="http://www.physiotherapy.asn.au" target="_blank" style="text-decoration: underline; color: #000">www.physiotherapy.asn.au</a>.</p>



<h5 class="doc-header">Opt-Out</h5>

<p>By choosing to register on the APA web site or as a member of the APA, you may receive information from the APA about membership, APA services, partner information and offers. The APA uses this method to communicate quickly with you. You have the right to refuse inclusion on a mailing list. You can make a request to remove your email address from a mailing list by contacting the privacy officer at <a href="mailto:privacy@physiotherapy.asn.au" style="text-decoration: underline; color: #000">privacy@physiotherapy.asn.au</a>.</p>



<p>The APA uses your email address, your mailing address and phone number to contact you regarding administrative notices, publications, and communications relevant to your use of the site and your APA membership. If you do not wish to receive these communications, you have the ability to opt out by contacting the privacy officer at <a href="mailto:privacy@physiotherapy.asn.au" style="text-decoration: underline; color: #000">privacy@physiotherapy.asn.au</a>.</p>


<p>From time to time, the APA arranges mailings using the contact information you have provided, from its business partners (including corporate partners and endorsed product manufacturers/suppliers). These mailings aim to provide you with information and benefits available to you.</p>



<p>If you do not wish to receive information from APA's business partners you should advise your local APA Branch or notify the APA’s privacy officer at <a href="mailto:privacy@physiotherapy.asn.au" style="text-decoration: underline; color: #000">privacy@physiotherapy.asn.au</a>. For any information about privacy, please contact the APA’s privacy officer by phoning <a href="tel:03 9092 0888" style="text-decoration: underline; color: #000">03 9092 0888</a> or by email <a href="mailto:privacy@physiotherapy.asn.au" style="text-decoration: underline; color: #000">privacy@physiotherapy.asn.au</a>.</p>



<h5 class="doc-header">Cookies</h5>

<p>As part of the normal operation of this site, your internet browser will be sent a "cookie" (a temporary internet file). This cookie enhances the site's functionality with features such as membership logon and electronic ordering. By itself, this cookie can only identify your computer to APA’s server; it is not used to identify you personally.</p>

<p>Your personal password to access the APA website protects your privacy. We recommend that you do not disclose, share or reveal this password to any other individual.</p>


<h5 class="doc-header">Change of Purpose</h5>



<p>It is not anticipated that any information will be disclosed to overseas recipients.&nbsp;If this were to change this page will be updated.</p>



<p>From time to time, the APA may decide to collect different kinds of information. When this occurs, the APA will update this privacy page.</p>


<h5 class="doc-header">Privacy Enquires</h5>

<p>You have the right to complain regarding any aspect of your privacy rights.&nbsp;If you have a complaint please contact the privacy officer at <a href="mailto:privacy@physiotherapy.asn.au" style="text-decoration: underline; color: #000">privacy@physiotherapy.asn.au</a> or on <a href="tel:03 9092 0888" style="text-decoration: underline; color: #000">03 9092 0888</a>.</p>


<h5 class="doc-header">APA Membership</h5>

<p>If you decide to become a member of the APA, and we hope that you do, the APA will ask you for additional personal details. You may also opt to provide the APA with more information such as special interest areas you may have where you are employed and your date of birth. Relevant information is disclosed to the public on the internet via the APA's 'Find a Physio' online searchable database only. You must approve the use of your details on this database. Whether you decide to use this service is your choice.</p>


<h5 class="doc-header">Security</h5>

<p>Your information is stored on the APA's server located in a secure data housing facility. While, it is important to recognise that "perfect security" does not exist on the internet, the APA is committed to using industry standard mechanisms to safeguard the confidentiality of your personal information such as firewalls and Secure Socket Layers.&nbsp;&nbsp;</p>


<h5 class="doc-header">Credit Card Information</h5>

<p>The APA does not permanently store credit card information anywhere on this site.&nbsp;&nbsp;</p>


<h5 class="doc-header">APA Members Privacy</h5>

<p>The APA has a strong commitment to protecting your privacy and ensuring the confidentiality and security of personal information provided to the APA by you. As an organisation with an annual turnover of more than $3 million, the APA is required to comply with the Privacy Act 1988 as amended by the Privacy Amendment (Enhancing Privacy Protection) Act 2012 which came into effect in March 2014.<br />

You have the right to access the personal information about yourself held by the APA and to correct information which is inaccurate. To change your information you must log into your account with your unique login and password via the APA website <a href="http://www.physiotherapy.asn.au" target="_blank" style="text-decoration: underline; color: #000">www.physiotherapy.asn.au</a>.</p>

<p>Information you have provided to the APA is used to:</p>

<ul>
	<li>Process applications and renewals and to update your membership details and profile information</li>
	<li>Notify members and the public that you have met our requirements for credentialing (e.g. specialisation or titling)</li>
	<li>Provide information to consumers and others on the availability of physiotherapy services</li>
	<li>Conduct market research in order to identify and analyse the ongoing needs of APA members</li>
	<li>Ensure compliance with the APA's Constitution and Regulations</li>
	<li>Provide you with APA publications and information</li>
	<li>Provide you with access to and information about current and future member benefits</li>
</ul>


<h5 class="doc-header">Consent</h5>

<p>You acknowledge and agree that by providing your personal and/or sensitive information to the APA that the APA, its related bodies corporate and partners and each of their officers, employees, agents and contractors are permitted to collect, store, use and disclose your personal information in the manner set out in this privacy policy and in accordance with the Australian Privacy Principles.</p>


<h5 class="doc-header">Contact Us</h5>


<p>Please do not hesitate to contact us if you have a concern or issue in relation to how we collect, store, use or disclose your personal information.</p>



<p>If your concern relates to your APA membership or another APA function or service please contact us by email to&nbsp;<a href="mailto:privacy@physiotherapy.asn.au" style="text-decoration: underline; color: #000">privacy@physiotherapy.asn.au</a>&nbsp;or call or mail us at the following address:</p>


<p>Australian Physiotherapy Association<br />
Postal address: PO Box 437 Hawthorn BC VIC 3122<br />
Telephone: 1300 306 622<br />
Facsimile: (03) 9092 0899</p>

	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  
		<input class="styled-checkbox" type="checkbox" id="privacypolicyp" checked name="privacy-policy">
		<label class="apa_policy_button" for="privacypolicyp">Yes. I’ve read and understand the APA privacy policy</label>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 display-none" id="disagreePolicyDescription"> 
        Please agree to the APA Privacy Policy to continue with your membership
	</div> 
	</div>

	<div class="modal-footer">
	<button type="button" class="btn btn-default apa_policy_button">Submit</button>
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
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 display-none" id="disagreeInstallmentDescription"> 
         Please agree to the APA Installment Policy to continue with your membership
	</div>
	<button type="button" class="btn btn-default" id="installment_policy_button">Submit</button>
</div>
<div id="QuatationPopUp" style="display:none;" class="container">
	<h3 style="color:black;">Renewing your APA membership is easy…</h3>
	<p>If your membership category hasn’t changed, simply click continue to proceed with the following purchase:</p>
	<p><?php if(sizeof($orderDetails)!=0): ?>
	<?php foreach($orderDetails['Order'] as $orders){
		foreach($orders['OrderLines'] as $order){
//  put the code here to save the quatation order products into the database firstly.
        
		if(!isset($_SESSION['QuatationTag'])){
			
			if($order['ProductCategory'] =="Memberships"){
				//checkShoppingCart($userID=$_SESSION["UserId"], $type="membership", $productID=$order['ProductID']);
				checkShoppingCart($userID=$_SESSION["UserId"], $type="membership", $productID="");
				createShoppingCart($userID, $productID =$order['ProductID'],$type="membership",$coupon="");
			}
			if($order['ProductCategory'] =="Subscription"){
				checkShoppingCart($userID=$_SESSION["UserId"], $type="", $productID=$order['ProductID']);
				createShoppingCart($userID, $productID =$order['ProductID'],$type="NG",$coupon="");
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
			}
			$_SESSION['QuatationTag'] = "1";
			
		}
		
		echo $order['ProductName']; echo ",";} 
	}?><?php endif;?></p>
	
	<a href="javascript:document.getElementById('renew-survey-form2').submit();" class="accent-btn cancelInsuranceButton"><span class="dashboard-button-name">Continue</span></a>

	<!--<p>If this isn’t quite right, and you’d like to change your member type, or add some National Groups to your membership, follow the link below:</p>-->
	<a href="javascript:document.getElementById('renew-membertype-form2').submit();"  target="_self" class="accent-btn cancelInsuranceButton"><span class="dashboard-button-name">Change member category or national group</span></a>

	<!--<p>If you’ve changed address recently or would like to update any of your personal details, follow this link:</p>-->
	<a href="renewmymembership" target="_self" class="accent-btn cancelInsuranceButton"><span class="dashboard-button-name">Change your details</span></a>

</div>

		<div id="deleteWorkplaceWindow" style="display:none;">
			<form action="your-details" method="POST" id="deleteWorlplaceForm">
				<div class="flex-cell">
					<h3 class="light-lead-heading cairo">Are you sure you want to delete this workplace</h3>
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
	$('input[value="log-out"]').click(function(){
	   sessionStorage.removeItem("isshow");
	});
	
});
</script>
<?php else : 
	// todo
	// add log-in button with message - you must be logged in
	?>
<p>please log-in to use this page</p>
<?php endif; ?>