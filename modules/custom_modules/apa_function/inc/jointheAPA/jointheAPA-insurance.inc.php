<?php  
// 2.2.40 - Get user insurance data
// Send - 
// UserID 
// Response -UserID & insurance data
$data = array();
$data['ID'] = $_SESSION["UserId"];
$insuarnceData = aptify_get_GetAptifyData("40", $data,""); // #_SESSION["UserID"];
if(sizeof($insuarnceData['results'])!=0){$insuranceDataTag=1;}else {$insuranceDataTag=0;}// this is important key, to check the user is whether the first time to submit insuranceData;


?>
<form id="join-insurance-form2" action="jointheapa" method="POST">
    <input type="hidden" name="step2-1" value="1"/>
	<input type="hidden" name="insuranceStatus" id="insuranceStatus" value="0">
	
	<div class="down5 <?php if((isset($_POST['step1'])&& $_POST['insuranceTag']!="0")||isset($_POST['goI']) )echo 'display'; else { echo 'display-none';}?>">
	
	<div class="row">
			<div class="col-xs-12">
			<label>Have you been the subject of a medical malpractice or liability claim in the last five years (whether insured or uninsured)?<span class="tipstyle">*</span></label>
			</div>
			<div class="col-xs-6 col-md-3"><input class="styled-radio-select" style="min-height:0" type="radio" name="Claim" id="Claim1" value="true" <?php if($insuranceDataTag==1 && $insuarnceData['results'][0]['Claim']=="1") echo 'checked="checked"';?>><label for="Claim1">Yes</label></div>
			<div class="col-xs-6 col-md-3"><input class="styled-radio-select" style="min-height:0" type="radio" name="Claim" id="Claim2" value="false" <?php if($insuranceDataTag==1 && $insuarnceData['results'][0]['Claim']=="0") echo 'checked="checked"';?><?php if($insuranceDataTag==0) echo 'checked="checked"';?>><label for="Claim2">No</label></div>
		</div>
		<div class="row">
			<div class="col-xs-12">
			<label>Are you aware of any circumstances that may give rise to a claim, including but not limited to predecessors in your workplace?<span class="tipstyle">*</span></label>
			</div>
			<div class="col-xs-6 col-md-3"><input class="styled-radio-select" style="min-height:0" type="radio" name="Facts" id="Facts1" value="true" <?php if($insuranceDataTag==1 && $insuarnceData['results'][0]['Facts']=="1") echo 'checked="checked"';?>><label for="Facts1">Yes</label></div>
			<div class="col-xs-6 col-md-3"><input class="styled-radio-select" style="min-height:0" type="radio" name="Facts" id="Facts2" value="false" <?php if($insuranceDataTag==1 && $insuarnceData['results'][0]['Facts']=="0") echo 'checked="checked"';?><?php if($insuranceDataTag==0) echo 'checked="checked"';?>><label for="Facts2">No</label></div>
		</div>
		<div class="row">
			<div class="col-xs-12">
			<label>Have there been any external disciplinary proceedings, or have you been subject to a complaint to a professional society or statutory registration board in the last five years?<span class="tipstyle">*</span></label>
			</div>
			<div class="col-xs-6 col-md-3"><input class="styled-radio-select" style="min-height:0" type="radio" name="Disciplinary" id="Disciplinary1" value="true" <?php if($insuranceDataTag==1 && $insuarnceData['results'][0]['Disciplinary']=="1") echo 'checked="checked"';?>><label for="Disciplinary1">Yes</label></div>
			<div class="col-xs-6 col-md-3"><input class="styled-radio-select" style="min-height:0" type="radio" name="Disciplinary" id="Disciplinary2" value="false" <?php if($insuranceDataTag==1 && $insuarnceData['results'][0]['Disciplinary']=="0") echo 'checked="checked"';?><?php if($insuranceDataTag==0) echo 'checked="checked"';?>><label for="Disciplinary2">No</label></div>
		</div>
		<div class="row">
			<div class="col-xs-12">
			<label>Has any insurer declined a proposal, imposed special terms, declined to renew or cancelled your insurance policy?<span class="tipstyle">*</span></label>
			</div>
			<div class="col-xs-6 col-md-3"><input class="styled-radio-select" style="min-height:0" type="radio" name="Decline" id="Decline1" value="true" <?php if($insuranceDataTag==1 && $insuarnceData['results'][0]['Decline']=="1") echo 'checked="checked"';?>><label for="Decline1">Yes</label></div>
			<div class="col-xs-6 col-md-3"><input class="styled-radio-select" style="min-height:0" type="radio" name="Decline" id="Decline2" value="false" <?php if($insuranceDataTag==1 && $insuarnceData['results'][0]['Decline']=="0") echo 'checked="checked"';?><?php if($insuranceDataTag==0) echo 'checked="checked"';?>><label for="Decline2">No</label></div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<label>Have you made more than one claim?<span class="tipstyle">*</span>
			</div>
			<div class="col-xs-6 col-md-3"><input class="styled-radio-select" style="min-height:0" type="radio" name="Oneclaim" id="Oneclaim1" value="true" <?php if($insuranceDataTag==1 && $insuarnceData['results'][0]['Oneclaim']=="1") echo 'checked="checked"';?>><label style="min-height:0" for="Oneclaim1">Yes</label></div>
			<div class="col-xs-6 col-md-3"><input class="styled-radio-select" style="min-height:0" type="radio" name="Oneclaim" id="Oneclaim2" value="false" <?php if($insuranceDataTag==1 && $insuarnceData['results'][0]['Oneclaim']=="0") echo 'checked="checked"';?><?php if($insuranceDataTag==0) echo 'checked="checked"';?>><label style="min-height:0" for="Oneclaim2">No</label></div>
		</div>
		<div class="row">
			<div class="col-xs-12">
						<label>Business name</label>
						<input type="text" class="form-control" name="Businiessname" id="Businiessname" placeholder="" <?php if($insuranceDataTag==1) {echo "value=".$insuarnceData['results'][0]['Businiessname']; }else{ echo '';}?>>
			</div>
			<div class="col-xs-12">
				<strong><span class="note-text">Note: </span>Business name, practice name or trading name owned by you, do not name your employer’s business.</strong>
			</div>
		</div>
		<div class="display-none" id="insuranceMore">
			<div class="col-xs-12">
				<label>If you answered yes to one or more of the above questions (1-5) please provide:</label>
				<input type="hidden" name="Addtionalquestion" id="Addtionalquestion" value="">
			</div>
			<div class="row">
				<div class="col-xs-6 col-md-3">
					<label>Year of claim of incident</label>
					<input type="number" class="form-control" name="Yearclaim" id="Yearclaim" placeholder="Year of claim of incident"<?php if($insuranceDataTag==1) {echo "value=".$insuarnceData['results'][0]['Yearclaim']; }else{ echo '';}?> oninput="this.value = Math.abs(this.value)" min="0">
				</div>
				<div class="col-xs-6 col-md-3">
					<label>Name of claimant</label>
					<input type="text" class="form-control" name="Nameclaim" id="Nameclaim" placeholder="Name of claimant"<?php if($insuranceDataTag==1) {echo "value=".$insuarnceData['results'][0]['Nameclaim']; }else{ echo '';}?>>
				</div>
			</div>

				<div class="col-xs-12 col-md-6">
					<label>Full description</label>
					<textarea type="text" rows="5" class="form-control" name="Fulldescription" id="Fulldescription" placeholder="Full description of insurance"<?php if($insuranceDataTag==1) {echo "value=".$insuarnceData['results'][0]['Fulldescription']; }else{ echo '';}?>></textarea>
				</div>

			<div class="col-xs-12 font-weight-500"><label class="note-text">Insufficient details in your response may result in additional details being requested</label></div>
			<div class="row">

				<div class="row">
					<div class="col-xs-6">
						<label>Amount paid</label>
						<input type="number" class="form-control" name="Amountpaid" id="Amountpaid" placeholder="Amount paid (if nil, please state NIL)"<?php if($insuranceDataTag==1) {echo "value=".$insuarnceData['results'][0]['Amountpaid']; }else{ echo '';}?> oninput="this.value = Math.abs(this.value)" min="0">
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
					<label>Has the claim been finalised?<span class="tipstyle">*</span></label>
					</div>
					<div class="col-xs-6 col-md-3"><input class="styled-radio-select" style="min-height:0" type="radio" name="Finalisedclaim" id="Finalisedclaim1" value="true" <?php if($insuranceDataTag==1 && $insuarnceData['results'][0]['Finalisedclaim']=="1") echo 'checked="checked"';?>><label for="Finalisedclaim1">Yes</label></div>
					<div class="col-xs-6 col-md-3"><input class="styled-radio-select" style="min-height:0" type="radio" name="Finalisedclaim" id="Finalisedclaim2" value="false" <?php if($insuranceDataTag==1 && $insuarnceData['results'][0]['Finalisedclaim']=="0") echo 'checked="checked"';?><?php if($insuranceDataTag==0) echo 'checked="checked"';?>><label for="Finalisedclaim2">No</label></div>
				</div>
				
				
		    </div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<input popup class="styled-checkbox" type="checkbox" name="conditions" id="conditions" value="0">
					<label for="conditions" popup-target="insuranceTermsandConditions"><span class="tipstyle">* </span>I have read and agree to the terms and conditions within the Financial Services</label>
				</div>
			</div>
			<div class="col-xs-12">  <a id="insuranceControl"><span class="dashboard-button-name">Next</span></a><a class="your-details-prevbutton5"><span class="dashboard-button-name">Back</span></a></div>
	</div>
</form>
<div id="insurancePopUp" style="display:none;">
	<h3 style="margin-bottom: 20px">Are you sure you want to submit your insurance information?</h3>
	<span style="display: block; margin-bottom: 20px">This may take a moment while we process your request.</span>

	<div class="buttons">
		<a href="javascript:document.getElementById('join-insurance-form2').submit();" style="float:none;" class="join-details-button5"><span class="dashboard-button-name">Yes</span></a>
		<a target="_self" class="cancelInsuranceButton accent-btn"><span class="dashboard-button-name">No</span></a>
	</div>
	
</div>
<div id="insuranceTermsandConditions" style="display:none;">
			<span class="close-popup"></span>
			<div class="modal-header">
				<h4 class="modal-title">Financial Services Guide</h4>
			</div>
			<div class="modal-body">
				<span class="note-text" style="display: block">Please scroll down to accept the full terms and conditions of this guide</span>
				<strong>This guide includes important information about:</strong>
				<ul>
					<li>the financial services we offer</li>
					<li>the advice we will give to you</li>
					<li>information we need from you</li>
					<li>how we are paid</li>
					<li>what to do if you have a complaint</li>
					<li>how you can contact the FOS</li>
				</ul>
				<strong>From when does this FSG apply?</strong>
				<p>This FSG applies from 1st December 2016 and is valid until it is replaced.</p>
				<p>You should read this FSG in its entirety and retain it for your future reference.  By engaging, or continuing to engage us you are, in the absence of any formal written agreement with us, agreeing to the delivery of our services and remuneration as described in this FSG. </p>
				<strong>Who is responsible for the financial services provided?</strong>
				<p>BMS Risk Solutions Pty Limited (“BMS Risk Solutions”), ABN 45 161 187 980, is responsible for the financial services provided, including the distribution of this FSG. </p>
				<p>BMS Risk Solutions is licensed by the Australian Securities & Investments Commission (ASIC). The licence number is 461594.</p>
				<p>All references, in this FSG, to ‘we’, ‘us’ and ‘our’ mean ‘BMS Risk Solutions Pty Limited’.</p>
				<strong>What kinds of Financial Products are we authorised to advise and deal in?</strong>
				<p>BMS Risk Solutions is authorised to advise on, and deal in general insurance products.</p>
				<strong>Who do we act for when providing the financial service?</strong>
				<p>We will usually provide financial services on your behalf.</p>
				<p>In some circumstances, we may act on behalf of the insurer and not for you. These circumstances arise where we have an authority to effect an insurance policy under a binder agreement with the insurer. This means we can enter into the contract on the insurer’s behalf. You will be notified if this is relevant to the financial services offered or provided to you.</p>
				<strong>Will we provide you with tailored advice?</strong>
				<p>No. When we give you financial advice it is general in nature in all instances meaning we have not taken into account your personal situation, or any particular circumstances or objectives.</p>
				<p>We will explain to you any significant risks of financial products and strategies, which we recommend to you. If we do not do so, you should ask us to explain the risks to you.</p>
				<p>We expect that you will use our advice to enable you to make informed decisions regarding the purchase of the insurance policies we will offer you.</p>
				<strong>What information we need from you?</strong>
				<p>We expect that you will provide us with accurate information that we request so that we have a reasonable basis on which to provide you with advice. We will rely on the accuracy and completeness of the information that you provide to us and do not independently verify the information before sending it to the insurer.</p>
				<p>As a financial service provider, we have an obligation under the Anti-Money Laundering and Counter Terrorism Finance Act to verify your identity and the source of any funds. This means that we may need to ask you to present identification documents such as passports and driver’s license. If this is the case we will handle this information in line with the Privacy Act.</p>
				<strong>What are the possible consequences of not providing this information?</strong>
				<p>You are of course at liberty to decline to provide some or all of this information, but if you do not provide it, any recommendations we make may not be appropriate to your needs and objectives. In certain cases, your failure to provide information may place us in a position where we cannot provide any advice or any financial services to you.</p>
				<strong>Product Disclosure Statement (PDS)</strong>
				<p>If we recommend to you a particular insurance product we will provide you with a PDS. This  will contain the details of the insurance policy and help you make an informed decision about the purchase of the policy.</p>
				<strong>Your Duty of Disclosure</strong>
				<p>Before you enter into an insurance contract with an insurer, you have a duty under the Insurance Contracts Act 1984 to disclose information to the insurer.  The Duty of Disclosure applies until the insurer agrees to insure you or renew your insurance.  The Duty of Disclosure also applies before you extend, vary or reinstate your insurance.  You must tell the insurer all information that is known to you, that a reasonable person could be expected to know or that is relevant to the insurer’s decision to insure you and on what terms.  You do not need to tell the insurer anything:</p>
				<ul>
					<li>that reduces the risk it insures you for;</li>
					<li>is comon knowledge;</li>
					<li>that the insurer knows or should know; or</li>
					<li>which the insurer waived your duty to tell it about. </li>
				</ul>
				<strong>Non-Disclosure</strong>
				<p>If you fail to comply with your Duty of Disclosure, the insurer may cancel your contract or reduce the amount it will pay you if you make a claim, or both.  If your failure to comply with the Duty of Disclosure is fraudulent, the insurer may refuse to pay a claim and treat the contract as if it never existed. </p>
				<strong>Cooling off period</strong>
				<p>The PDS will include details of any cooling off period that may apply if you are a Retail client. You may return the policy during the relevant period if cooling off applies.</p>
				<strong>Do any relationships or associations exist which might influence you in providing me with the financial service?</strong>
				<p>We are not controlled by any financial institution(s) such as a fund manager, bank, insurance company or trade/credit union. None of these institutions has a vested interest in our business and are not therefore in a position to influence us in the provision of advice.</p>
				<p>We may have arrangements with insurers which limit our ability to provide you a service, if you fall outside of the criteria of the arrangement agreed with the insurer.</p>
				<strong>Privacy</strong>
				<p>We value the privacy of personal information and are bound by the Privacy Act 1988 when we collect, use, disclose or handle personal information. We collect personal information to offer, provide, manage and administer the many financial services and products we and our group of companies are involved in (including those outlined in this FSG). Further information about our privacy practices can be found in our Privacy Policy that can be viewed on the BMS website at www.bmsgroup.com or alternatively, a copy can be sent to you on request. If you wish to seek access to, or to correct, the personal information we collect or disclose about you</p>
				<strong>How can you give us instructions about Financial Products?</strong>
				<p>You may tell us how you would like to give us instruction. For example by telephone, email or other means.</p>
				<p>If we provide you with execution related telephone advice, you may request record of the execution related telephone advice, at that time or up to 90 days after providing the advice.</p>
				<p>If you have supplied your email address to us, we will send insurance documents including this FSG and any PDS (if required) to that address unless you tell us you would like to receive those documents in a different form. </p>
				<strong>How will you pay for the service?</strong>
				<p>For each insurance product the insurer will charge a premium which includes any relevant taxes, charges or levies.</p>
				<p>The amount you pay may also include a fee from BMS Risk Solutions for arranging the policy. The Corporations Act requires us to fully disclose all fees and charges, so if you are in doubt please ask us to explain. </p>
				<p>Depending upon the insurance product, you will make payment of the premium and any fees that we may apply for arranging your insurance policy:</p>
				<ul>	
					<li>directly via an online service;</li>
					<li>directly to us following an invoice (payable in 30 days);</li>
					<li>through an Association in which you hold membership.</li>
				</ul>
				<p>If you do not pay the premium the insurer may cancel the contract, and you would not be insured.  The insurer may also charge a premium for the time on risk. </p>
				<p>Your payment of the premium is treated as acceptance of all of the terms and conditions of the associated insurance policy.</p>
				<p>Where you have paid a premium directly to us, we hold it on trust for you until we pass it on to the insurer.  If there is any delay between you paying an invoice and us passing your premium on the insurer, we may retain any interest earned on the premium during that period.</p>
				<p>If your insurance contract is cancelled or varied before the expiry of the period of insurance, you will be paid any refunded pro-rata premium received from the insurer.  We will retain all of our commission, fees and other remuneration in full in the event of any early cancellation or variation of your insurance contract or adjustment of premium.  We may charge an additional fee for processing your request to cancel, or vary your insurance contract and you agree that this fee may be offset against any premium pro-rat refund you are entitled to. </p>
				<p>We may offer premium funding so you can pay your insurance by instalments. Such funding would incur an interest charge, which would be advised to you before you decide on this payment method. We may also charge you a fee for this facility.</p>
				<p>If you pay by credit card, we may charge you a credit card fee, which will be disclosed to you.</p>
				<strong>What remuneration, commission, fees or other benefits do we receive in relation to providing you with financial services?</strong>
				<p>We are remunerated through the fees you pay, and a percentage of the premium – a ‘commission’ – which we receive from the insurers. The commission we receive may vary from insurer to insurer and from product to product.</p>
				<p>We may also earn remuneration where we act as an agent for an insurer under a binder authority.  The remuneration we receive from these arrangements is generally a mixture of a flat processing fee and variable performance fees and commissions.  The performance fees and commissions are determined by the nature of the arrangement and, in the case of the performance fees, may be influenced by the profitability of the relevant portfolio.  </p>
				<p>If we arrange premium funding we may be paid a commission by the premium funder.</p>
				<p>All fees and commissions are payable to BMS Risk Solutions. Details of the fees and for each product are contained in the Product Disclosure Statements (PDS) that we will provide. </p>
				<strong>Waiver of rights and disclaimers</strong>
				<p>Some insurance policies limit or exclude claims where the insured has limited or waived their right to recover a loss from the person who was responsible for causing the loss.  You should not sign any agreement that mofidifes or limits your rights of recovery from another party.  You should always seek professional advice begfore signing such a disclaimer.</p>
				<strong>What information do we maintain on file and can you examine your file?</strong>
				<p>We need to hold all information you give us for a period of 7 years. You can view information held by us by making a written request.</p>
				<strong>What kind of compensation arrangements are in place and are these arrangements compliant?</strong>
				<p>BMS Risk Solutions has Professional Indemnity Insurance in place to cover the financial services that we provide. We understand that it is sufficient and appropriate to meet our obligations as the holder of an Australian Financial Services license. The policy includes coverage for claims made in relation to the conduct of representatives/employees who no longer work for us (but who did at the time of the relevant conduct).</p>
				<strong>What should you do if you have a complaint?</strong>
				<p>BMS Risk Solutions is committed to providing quality advice to our clients. This commitment extends to providing accessible complaint resolution mechanisms for our clients. If you have any complaint about the service provided to you, you should take the following steps:</p>
				<ul>
					<li>Contact us first via phone (03)9993 6920; email at enquiries_au@bmsgroup.com ; or in writing to Level 3, 360 Little Collins Street, Melbourne, VIC 3000</li>
					<li>If we cannot reach a satisfactory resolution within a further 45 days you can send your complaint to FOS at phone 1300 780 808; email at info@fos.org.au; or in writing to Financial Ombudsman Service, GPO Box 3, Melbourne, VIC 3001. The FOS website is www.fos.org.au. </li>
				</ul>

			</div>

			<div class="modal-footer">
				<a class="disagree-btn" href="" popup-dismiss="insuranceTermsandConditions">Disagree</a>
				<a id="insuranceTerms" class="agree-btn" href="" popup-dismiss="insuranceTermsandConditions">Agree</a>
			</div>
</div>
<?php logRecorder();  ?>
<!--  this part will be merged with Andy's Dashboard less file-->
<style>
div#insuranceTermsandConditions {
    color: black;
}
#disagreeDescription{
	color:red!important;
}

</style>
<!--  this part will be merged with Andy's Dashboard less file-->	