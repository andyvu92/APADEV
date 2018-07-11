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
		<div class="col-xs-12">
			<span class="dashboard-name"><strong>Renew my membership</strong></span>
		</div>
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
				<li><a class="tabtitle6 inactiveLink" style="cursor: pointer;"><span class="eventtitle6 <?php if(isset($_POST['step2-1'])|| (isset($_POST['step1'])&& $_POST['insuranceTag']=="0")||isset($_POST['QOrder']) || isset($_POST['goP']))echo 'text-underline';?>" id="Payment"><strong>Payment</strong></span></a></li>
				<!--<li><a class="tabtitle7 inactiveLink" style="cursor: pointer;"><span class="eventtitle7 <?php //if(isset($_POST['goP']))echo 'text-underline';?>" id="Payment"><strong>Payment</strong></span></a></li>-->
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
				else{$orderDetails = array();}
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
</div>
<?php logRecorder(); ?>
<div id="privacypolicyWindow" style="display:none;">
	<h3>APA privacy policy</h3>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  
	
	<p>Our Commitment to Your Privacy</p>



<p>Your privacy is very important to the Australian Physiotherapy Association (APA). As part of the normal operation of this site, the APA may collect certain information from you. This privacy policy details what information the APA collects, how it uses that information and what your rights are regarding any information that you supply to it. The APA is subject to the requirements of applicable Australian law and strives to meet the requirements of the Australian Privacy Principles.</p>



<p>Your information and Your Right to Privacy</p>



<p>You can elect to provide as much or as little information as you choose although the APA requires a minimum set of information to provide access to its site. What you provide is your choice.</p>

<p><br />
The APA will under no circumstances sell, trade or rent any personal information that you supply to it to any third party. The APA has partnerships with commercial organisations and those partners will, from time to time, request that the APA send information to people on the APA database as part of the partnership. Any APA or partner information is sent by the APA and data is not provided to any third party. In short, information you supply to the APA stays with the APA. The APA may disclose personal information to the following third parties to satisfy standard operating procedures of the APA:</p>



<p>IT service providers<br />
Marketing and communications agencies<br />
Agencies that conduct member surveys on our behalf<br />
Mailing houses<br />
Printers that print and distribute our publications and marketing material</p>



<p>By using the site and the APA’s services, you acknowledge and accept that it will use your personal data as set out in this privacy policy. If you do not accept this privacy policy, please immediately stop using the site and/or the APA’s services or any part of them. In these circumstances, you will not be able to register or purchase anything further using the site.</p>



<p>APA is the controller responsible for your personal data. It has appointed a privacy officer who is responsible for overseeing issues of privacy. If you have any questions about this privacy policy, including requests to exercise your legal rights, please contact the privacy officer at privacy@physiotherapy.asn.au.</p>



<p>The site may include links to third-party websites, plug-ins and applications. Clicking on those links or enabling those connections may allow third parties to collect or share data about you. We do not control these third-party websites and are not responsible for their privacy statements. We strongly recommend you read the privacy policy of every website you visit.</p>



<p>APA adheres to the principles set out in data protection legislation when handling personal data. These principles require personal data to be:</p>



<p>Processed lawfully, fairly and in a transparent manner<br />
Collected only for specified, explicit and legitimate purposes<br />
Adequate, relevant and limited to what is necessary in relation to the purposes for which it is processed<br />
Accurate and where necessary kept up to date<br />
Not kept in a form which permits identification of data subjects for longer than is necessary for the purposes for which the data is processed<br />
Processed in a manner that ensures its security using appropriate technical and organisational measures to protect against unauthorised or unlawful processing and against accidental loss, destruction or damage<br />
Not transferred to another country without appropriate safeguards being in place<br />
Made available to data subjects and allow data subjects to exercise certain rights in relation to their personal data</p>



<p>The APA is also responsible and accountable for ensuring that it can demonstrate compliance with the data protection principles listed above.</p>



<p>Collecting Information</p>

<p>The APA may collect, use, store and transfer different kinds of personal data about you. It collects and process personal data about you when you:</p>



<p>Access and use the site and its services<br />
Register an account on the site<br />
Leave a comment on the site<br />
Place an advertisement on the site<br />
Buy a product through the site<br />
Make an enquiry about a particular product on the site<br />
submit a general enquiry to the APA<br />
Enter a competition<br />
Create a wish list on the site<br />
Subscribe to the APA’s newsletter<br />
Leave your feedback or review on the site<br />
Manage your marketing preferences with the APA<br />
Make a payment through the site</p>



<p>The APA may hold the following information about you:</p>



<p>Name, address, telephone number(s)<br />
Date of birth<br />
Racial or ethnic origin<br />
Email address<br />
Occupation<br />
Transaction details associated with services we have provided to you<br />
Additional information provided by us to you<br />
Information you have provided to us via client surveys</p>



<p>The APA may also collect, use and share aggregated data such as statistical or demographic data. Aggregated data derived from your personal data but is not considered personal data under data protection law as it does not directly or indirectly reveal your identity. For example, the APA may aggregate data about your use of the site to calculate the percentage of users accessing a specific feature. Likewise, the APA may aggregate data that it collects through your use of the site in order to produce certain benchmarking reports. However, if the APA combines or connects aggregated data with your personal data so that it can directly or indirectly identify you, the APA treats the combined data as personal data which will be used in accordance with this privacy policy.</p>



<p>Access to Personal Information</p>



<p>You have the right to review and alter any personal membership information that the APA stores about you. After all, it is your information, so you should be the person that controls it.&nbsp;Should you wish to access this information please&nbsp;contact the APA’s privacy officer. Unless the access you request will require special steps or significant resources, there will be no charge for providing you with this access.</p>



<p>To change your personal information you must login to your account with your unique login and password via the APA website www.physiotherapy.asn.au.</p>



<p>Opt-Out<br />
&nbsp;</p>

<p>By choosing to register on the APA web site or as a member of the APA, you may receive information from the APA about membership, APA services, partner information and offers. The APA uses this method to communicate quickly with you. You have the right to refuse inclusion on a mailing list. You can make a request to remove your email address from a mailing list by contacting the privacy officer at privacy@physiotherapy.asn.au.&nbsp;</p>



<p>The APA uses your email address, your mailing address and phone number to contact you regarding administrative notices, publications, and communications relevant to your use of the site and your APA membership. If you do not wish to receive these communications, you have the ability to opt out by contacting the privacy officer at privacy@physiotherapy.asn.au.</p>


<p>From time to time, the APA arranges mailings using the contact information you have provided, from its business partners (including corporate partners and endorsed product manufacturers/suppliers). These mailings aim to provide you with information and benefits available to you.</p>



<p>If you do not wish to receive information from APA's business partners you should advise your local APA Branch or notify the APA’s privacy officer at privacy@physiotherapy.asn.au. For any information about privacy, please contact the APA’s privacy officer by phoning 03 9092 0888 or by email privacy@physiotherapy.asn.au.</p>



<p>Cookies</p>

<p><br />
As part of the normal operation of this site, your internet browser will be sent a "cookie" (a temporary internet file). This cookie enhances the site's functionality with features such as membership logon and electronic ordering. By itself, this cookie can only identify your computer to APA’s server; it is not used to identify you personally.</p>

<p><br />
Your personal password to access the APA website protects your privacy. We recommend that you do not disclose, share or reveal this password to any other individual.</p>



<p>Change of Purpose</p>



<p>It is not anticipated that any information will be disclosed to overseas recipients.&nbsp;If this were to change this page will be updated.</p>



<p>From time to time, the APA may decide to collect different kinds of information. When this occurs, the APA will update this privacy page.<br />
&nbsp;</p>

<p>Privacy Enquires</p>



<p>You have the right to complain regarding any aspect of your privacy rights.&nbsp;If you have a complaint please contact the privacy officer at privacy@physiotherapy.asn.au or on 03 9092 0888.</p>



<p>APA Membership</p>

<p>If you decide to become a member of the APA, and we hope that you do, the APA will ask you for additional personal details. You may also opt to provide the APA with more information such as special interest areas you may have where you are employed and your date of birth. Relevant information is disclosed to the public on the internet via the APA's 'Find a Physio' online searchable database only. You must approve the use of your details on this database. Whether you decide to use this service is your choice.</p>

<p>Security</p>

<p>Your information is stored on the APA's server located in a secure data housing facility. While, it is important to recognise that "perfect security" does not exist on the internet, the APA is committed to using industry standard mechanisms to safeguard the confidentiality of your personal information such as firewalls and Secure Socket Layers.&nbsp;&nbsp;</p>

<p>Credit Card Information</p>

<p>The APA does not permanently store credit card information anywhere on this site.&nbsp;&nbsp;</p>

<p>APA Members Privacy</p>

<p>The APA has a strong commitment to protecting your privacy and ensuring the confidentiality and security of personal information provided to the APA by you. As an organisation with an annual turnover of more than $3 million, the APA is required to comply with the Privacy Act 1988 as amended by the Privacy Amendment (Enhancing Privacy Protection) Act 2012 which came into effect in March 2014.<br />
&nbsp;<br />
You have the right to access the personal information about yourself held by the APA and to correct information which is inaccurate. To change your information you must log into your account with your unique login and password via the APA website www.physiotherapy.asn.au.</p>

<p>Information you have provided to the APA is used to:&nbsp;</p>

<p>Process applications and renewals and to update your membership details and profile information<br />
Notify members and the public that you have met our requirements for credentialing (e.g. specialisation or titling)<br />
Provide information to consumers and others on the availability of physiotherapy services<br />
Conduct market research in order to identify and analyse the ongoing needs of APA members<br />
Ensure compliance with the APA's Constitution and Regulations<br />
Provide you with APA publications and information<br />
Provide you with access to and information about current and future member benefits</p>



<p>Consent</p>



<p>You acknowledge and agree that by providing your personal and/or sensitive information to the APA that the APA, its related bodies corporate and partners and each of their officers, employees, agents and contractors are permitted to collect, store, use and disclose your personal information in the manner set out in this privacy policy and in accordance with the Australian Privacy Principles.</p>



<p>Contact Us</p>


<p>Please do not hesitate to contact us if you have a concern or issue in relation to how we collect, store, use or disclose your personal information.</p>



<p>If your concern relates to your APA membership or another APA function or service please contact us by email to&nbsp;privacy@physiotherapy.asn.au&nbsp;or call or mail us at the following address:</p>


<p>Australian Physiotherapy Association<br />
Postal address: PO Box 437 Hawthorn BC VIC 3122<br />
Telephone: 1300 306 622<br />
Facsimile: (03) 9092 0899</p>

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
	<h3 style="color:black;">Renewing your APA membership is easy…</h3>
	<p>If your membership category hasn’t changed, simply click continue to proceed with the following purchase:</p>
	<p><?php if(sizeof($orderDetails)!=0): ?>
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
	}?><?php endif;?></p>
	<a href="javascript:document.getElementById('renew-survey-form2').submit();" class="accent-btn cancelInsuranceButton"><span class="dashboard-button-name">Continue</span></a>

	<p>If this isn’t quite right, and you’d like to change your member type, or add some National Groups to your membership, follow the link below:</p>
	<a href="renewmymembership"  target="_self" class="accent-btn cancelInsuranceButton"><span class="dashboard-button-name">Change member type and national group</span></a><br>

	<p>If you’ve changed address recently or would like to update any of your personal details, follow this link:</p>
	<a href="renewmymembership" target="_self" class="accent-btn cancelInsuranceButton"><span class="dashboard-button-name">Change your details</span></a>

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