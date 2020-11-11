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
	
	<div class="row question_row">
		<div class="col-xs-12">
			<label>Have you been the subject of a medical malpractice or liability claim in the last five years (whether insured or uninsured)?&nbsp;<span class="tipstyle">*</span></label>
		</div>
			<div class="col-xs-6 col-md-3"><input class="styled-radio-select" style="min-height:0" type="radio" name="Claim" id="Claim1" value="true" <?php if($insuranceDataTag==1 && $insuarnceData['results'][0]['Claim']=="1") echo 'checked="checked"';?>><label for="Claim1">Yes</label></div>
			<div class="col-xs-6 col-md-3"><input class="styled-radio-select" style="min-height:0" type="radio" name="Claim" id="Claim2" value="false" <?php if($insuranceDataTag==1 && $insuarnceData['results'][0]['Claim']=="0") echo 'checked="checked"';?><?php if($insuranceDataTag==0) echo 'checked="checked"';?>><label for="Claim2">No</label></div>
		</div>
		<div class="row question_row">
			<div class="col-xs-12">
			<label>Are you aware of any circumstances that may give rise to a claim, including but not limited to predecessors in your workplace?&nbsp;<span class="tipstyle">*</span></label>
			</div>
			<div class="col-xs-6 col-md-3"><input class="styled-radio-select" style="min-height:0" type="radio" name="Facts" id="Facts1" value="true" <?php if($insuranceDataTag==1 && $insuarnceData['results'][0]['Facts']=="1") echo 'checked="checked"';?>><label for="Facts1">Yes</label></div>
			<div class="col-xs-6 col-md-3"><input class="styled-radio-select" style="min-height:0" type="radio" name="Facts" id="Facts2" value="false" <?php if($insuranceDataTag==1 && $insuarnceData['results'][0]['Facts']=="0") echo 'checked="checked"';?><?php if($insuranceDataTag==0) echo 'checked="checked"';?>><label for="Facts2">No</label></div>
		</div>
		<div class="row question_row">
			<div class="col-xs-12">
			<label>Have there been any external disciplinary proceedings, or have you been subject to a complaint to a professional society or statutory registration board in the last five years?&nbsp;<span class="tipstyle">*</span></label>
			</div>
			<div class="col-xs-6 col-md-3"><input class="styled-radio-select" style="min-height:0" type="radio" name="Disciplinary" id="Disciplinary1" value="true" <?php if($insuranceDataTag==1 && $insuarnceData['results'][0]['Disciplinary']=="1") echo 'checked="checked"';?>><label for="Disciplinary1">Yes</label></div>
			<div class="col-xs-6 col-md-3"><input class="styled-radio-select" style="min-height:0" type="radio" name="Disciplinary" id="Disciplinary2" value="false" <?php if($insuranceDataTag==1 && $insuarnceData['results'][0]['Disciplinary']=="0") echo 'checked="checked"';?><?php if($insuranceDataTag==0) echo 'checked="checked"';?>><label for="Disciplinary2">No</label></div>
		</div>
		<div class="row question_row">
			<div class="col-xs-12">
			<label>Has any insurer declined a proposal, imposed special terms, declined to renew or cancelled your insurance policy?&nbsp;<span class="tipstyle">*</span></label>
			</div>
			<div class="col-xs-6 col-md-3"><input class="styled-radio-select" style="min-height:0" type="radio" name="Decline" id="Decline1" value="true" <?php if($insuranceDataTag==1 && $insuarnceData['results'][0]['Decline']=="1") echo 'checked="checked"';?>><label for="Decline1">Yes</label></div>
			<div class="col-xs-6 col-md-3"><input class="styled-radio-select" style="min-height:0" type="radio" name="Decline" id="Decline2" value="false" <?php if($insuranceDataTag==1 && $insuarnceData['results'][0]['Decline']=="0") echo 'checked="checked"';?><?php if($insuranceDataTag==0) echo 'checked="checked"';?>><label for="Decline2">No</label></div>
		</div>
		<div class="row question_row">
			<div class="col-xs-12">
				<label>Have you made more than one claim?&nbsp;<span class="tipstyle">*</span>
			</div>
			<div class="col-xs-6 col-md-3"><input class="styled-radio-select" style="min-height:0" type="radio" name="Oneclaim" id="Oneclaim1" value="true" <?php if($insuranceDataTag==1 && $insuarnceData['results'][0]['Oneclaim']=="1") echo 'checked="checked"';?>><label style="min-height:0" for="Oneclaim1">Yes</label></div>
			<div class="col-xs-6 col-md-3"><input class="styled-radio-select" style="min-height:0" type="radio" name="Oneclaim" id="Oneclaim2" value="false" <?php if($insuranceDataTag==1 && $insuarnceData['results'][0]['Oneclaim']=="0") echo 'checked="checked"';?><?php if($insuranceDataTag==0) echo 'checked="checked"';?>><label style="min-height:0" for="Oneclaim2">No</label></div>
		</div>
		<div class="row">
			<div class="col-xs-12">
			    <label>If you require entity cover, you will be prompted once completing the online membership form to proceed to BMS’s microsite. This process will take between 5 – 10 minutes where additional data will be gathered to ensure your business is appropriately covered.</label>
				<label><span class="note-text">Please note</span> it is your duty to disclose anything that you know, or could reasonably be expected to know, that may affect the decision to insure you and on what terms. If you answered ‘yes’ to any of the underwriting questions, BMS may reach out to you to find out further details.</label>
			</div>
			
		</div>
		<div class="display-none" id="insuranceMore">
			<div class="col-xs-12">
				<label>If you answered yes to one or more of the above questions (1-5) please provide:</label>
				<input type="hidden" name="Addtionalquestion" id="Addtionalquestion" value="">
			</div>
			<div class="row">
				<div class="col-xs-6 col-md-3">
					<label>Year of claim of incident&nbsp;<span class="tipstyle">*</span></label>
					<input type="number" class="form-control" name="Yearclaim" id="Yearclaim" placeholder="Year of claim of incident"<?php if($insuranceDataTag==1) {echo "value=".$insuarnceData['results'][0]['Yearclaim']; }else{ echo '';}?> >
				</div>
				<div class="col-xs-6 col-md-3">
					<label>Name of claimant&nbsp;<span class="tipstyle">*</span></label>
					<input type="text" class="form-control" name="Nameclaim" id="Nameclaim" placeholder="Name of claimant"<?php if($insuranceDataTag==1) {echo "value=".$insuarnceData['results'][0]['Nameclaim']; }else{ echo '';}?>>
				</div>
			</div>

				<div class="col-xs-12 col-md-6">
					<label>Full description&nbsp;<span class="tipstyle">*</span></label>
					<textarea type="text" rows="5" class="form-control" name="Fulldescription" id="Fulldescription"><?php if($insuranceDataTag==1) {echo $insuarnceData['results'][0]['Fulldescription'];}  ?></textarea>
				</div>

			<div class="col-xs-12 font-weight-500"><label class="note-text">Insufficient details in your response may result in additional details being requested</label></div>
			<div class="row">

				<div class="row">
					<div class="col-xs-6">
						<label>Amount paid&nbsp;<span class="tipstyle">*</span></label>
						<input type="number" class="form-control" name="Amountpaid" id="Amountpaid" placeholder="Amount paid (if nil, please state NIL)"<?php if($insuranceDataTag==1) {echo "value=".$insuarnceData['results'][0]['Amountpaid']; }else{ echo '';}?> >
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

					<label for="conditions" popup-target="insuranceTermsandConditions"><span class="tipstyle">* </span>I have read and agree to the&nbsp;<span style="text-decoration: underline">Terms and Conditions</span>&nbsp;within the financial services guide.</label>

				</div>
			</div>
			<div class="col-xs-12 btn_wrapper">  
				<a id="insuranceControl" variant="next">
					<span class="dashboard-button-name">Next</span>
				</a>
				<a class="your-details-prevbutton5" variant="prev">
					<span class="icon arrow_left"></span>
					Back to previous
				</a>
			</div>
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
			<!-- <span class="close-popup"></span> -->
			<div class="modal-header">
				<div class="col-xs-12">
					<h4 class="modal-title">Financial Services Guide</h4>
				</div>
			</div>
			<div class="modal-body">
				<div class="col-xs-12">
					<span class="note-text" style="display: block">Please scroll down to accept the full terms and conditions of this guide</span>
					<br />
					<strong>This guide includes important information about:</strong>
					<ul>
						<li>the financial services we offer</li>
						<li>how we are paid</li>
						<li>any potential conflicts of interest we may have</li>
						<li>the type of advice we will give to you</li>
						<li>what to do if you have a complaint</li>
						<li>arrangements we have in place to compensate clients for losses.</li>
					</ul>
					<strong>From when does this FSG apply?</strong>
					<p>This FSG applies from 27 October 2020 and is valid until we issue you with a new one.</p>
					<p>You should read this FSG in its entirety and retain it for your future reference. By engaging, or continuing to engage us you are, in the absence of any formal written agreement with us, agreeing to the delivery of our services and remuneration as described in this FSG.</p>
					<strong>Who is responsible for the financial services provided?</strong>
					<p>BMS Risk Solutions, ABN 45 161 187 980, is responsible for the financial services provided, including the distribution of this FSG.</p>
					<p>BMS Risk Solutions is licensed by the Australian Securities & Investments Commission (ASIC). The licence number is 461594.</p>
					<p>All references in this FSG to ‘we’, ‘us’ and ‘our’ mean BMS Risk Solutions.</p>
					<strong>What kinds of Financial Products are we authorised to advise and deal in?</strong>
					<p>BMS Risk Solutions is authorised to advise on, and deal in general insurance products.</p>
					<strong>Who do we act for when providing the financial service?</strong>
					<p>We will usually provide financial services on your behalf.</p>
					<p>In some circumstances, we may act on behalf of the insurer and not for you. These circumstances arise where we have an authority to effect an insurance policy under a binder agreement with the insurer. This means we can enter into the contract on the insurer’s behalf. You will be notified if this is relevant to the financial services offered or provided to you.</p>
					<strong>Retail clients</strong>
					<p>Under the Corporations Act 2001 (the Act) Retail Clients are provided with additional protection from other clients. The Act defines Retail Clients as: Individuals or a manufacturing business employing less than 100 people or any other business employing less than 20 people and that are purchasing the following types of insurance covers: Motor vehicle, home building, contents, personal and domestic, sickness/accident/travel, consumer credit and other classes as prescribed by regulations.</p>
					<p>Some of the information in this FSG only applies to Retail Clients and it is important that you understand if you are covered by the additional protection provided.</p>
					<strong>Will I receive tailored advice?</strong>
					<p>BMS is authorised to provide our retail clients with General Advice only and not tailored advice. General Advice does not take into account your particular needs and requirements and you should consider the appropriateness of this advice to your circumstances prior to acting upon it.</p>
					<p>You should read the warnings that we give you carefully before making any decision about an insurance policy.</p>
					<p>Where we provide you with advice about your insurance arrangements, that advice is current at the time that we give it. We will review your insurance arrangements when you inform us about changes in your circumstances, at the time of any scheduled status review or upon renewal of your insurances.</p>
					<strong>Contractual Liability and your insurance cover</strong>
					<p>Many commercial or business contracts contain clauses dealing with your liability (including indemnities or hold harmless clauses). Such clauses may entitle your insurers to reduce cover, or in some cases, refuse to indemnify you at all. You should seek legal advice before signing and accepting contracts. You should inform us of any clauses of this nature before you enter into them.</p>
					<strong>What information do we need from you?</strong>
					<p>We expect that you will provide us with accurate information that we request so that we have a reasonable basis on which to provide you with advice. We will rely on the accuracy and completeness of the information that you provide to us and do not independently verify the information before sending it to the insurer.</p>
					<p>As a financial service provider, we have an obligation under the Anti-Money Laundering and Counter Terrorism Finance Act to verify your identity and the source of any funds. This means that we may need to ask you to present identification documents such as passports and driver’s license. If this is the case we will handle this information in line with the Privacy Act.</p>
					<strong>What are the possible consequences of not providing this information?</strong>
					<p>You are of course at liberty to decline to provide some or all of the information that we request, but if you do not provide it, any recommendations we make may not be appropriate to your needs and objectives. In certain cases, your failure to provide information may place us in a position where we cannot provide any advice or any financial services to you.</p>
					<strong>Duty of Disclosure</strong>
					<strong>Eligible contracts (Private Motor Vehicle, Strata, Home, Contents, Travel, Personal Accident / Disablement)</strong>
					<p>If the insurer asks you questions that are relevant to their decision whether to insure you and on what terms, you are required to tell the insurer about anything you know and that a reasonable person in the circumstances would include in answering their questions.</p>
					<p>At renewal the insurer may give you a copy of anything you previously told them and ask you to advise them if that information has changed. If they do this, you must tell them about any change or tell them if there is no change. If you don't tell the insurer about a change, the insurer assumes there is no change to this information.</p>
					<p>This duty applies until the insurer agrees to insure you. You have the same duty before you renew, extend, vary or reinstate an insurance contract.</p>
					<strong>All other contracts</strong>
					<p>Before you enter into an insurance contract, you have a duty to tell the insurer anything that you know, or could reasonably be expected to know, that may affect their decision to insure you and on what terms.</p>
					<p>You have this duty until they agree to insure you. You have the same duty before you renew, extend, vary or reinstate an insurance contract.</p>
					<p>You do not need to tell the insurer anything that:</p>
					<ul>
						<li>reduces the risk they insure you for; or</li>
						<li>is common knowledge; or</li>
						<li>they know or should know as an insurer; or</li>
						<li>they waive your duty to tell them about.</li>
					</ul>
					<strong>If you do not tell the insurer something</strong>
					<p>If you don't tell the insurer something you are required to tell them, they may cancel your insurance contract or reduce the amount they will pay you if you make a claim, or both. If your failure to tell them is fraudulent, they may refuse to pay a claim and treat the contract as if it never existed.</p>
					<strong>Cooling off period</strong>
					<p>If you are a retail client your PDS will include details of any cooling off period that may apply. You may return the policy during the relevant period if cooling off applies.</p>
					<strong>Relationships or associations which might influence us in providing you with a financial service</strong>
					<p>We are not controlled by any financial institution(s) such as a fund manager, bank, insurance company or trade/credit union. None of these institutions has a vested interest in our business and are not therefore in a position to influence us in the provision of advice.</p>
					<p>We may have arrangements with insurers which limit our ability to provide you a service, if you fall outside of the criteria of the arrangement agreed with the insurer.</p>
					<p>If a person has referred you to us, we may pay them a part of any fees or commission received. If you are a Retail Client and receive Personal Advice full remuneration details will be disclosed in the SOA or invoices related to the advice.</p>
					<p>We are a Steadfast Group Limited (Steadfast) Network Broker. As a Steadfast Network Broker we have access to services including model operating and compliance tools, procedures, manuals and training, legal, technical, HR, contractual liability advice and assistance, group insurance arrangements, product comparison and placement support, claims support, group purchasing arrangements and broker support services. These services are either funded by Steadfast, subsidised by Steadfast or available exclusively to Steadfast Network Brokers for a fee.</p>
					<p>Steadfast has arrangements with some insurers and premium funders (Partners) under which the Partners may pay Steadfast commission of between 0.5 – 1.5% for each product arranged by us with those Partners or alternatively a fee to access strategic and technological support and the Steadfast Broker Network. Steadfast is also a shareholder of some Partners.</p>
					<p>We may receive a proportion of any commission paid to Steadfast by its Partners at the end of each financial year (or other agreed period). You can obtain a copy of Steadfast's FSG at <a href="www.steadfast.com.au" target="_blank">www.steadfast.com.au</a></p>
					<p>If we arrange premium funding for you, we may be paid a commission by the premium funder. We may also charge you a fee (or both). The commission that we are paid by the premium funder is usually calculated as a percentage of your insurance premium (including government fees or charges). If you instruct us to arrange or issue a product, this is when we become entitled to the commission.</p>
					<p>Our commission rates for premium funding are in the range of 1-3% of funded premium. When we arrange premium funding for you, you can ask us what commission rates we are paid for that funding arrangement compared to the other arrangements that were available to you.</p>
					<strong>Privacy</strong>
					<p>We are committed to protecting your privacy. We use the information you provide to advise about and assist with your insurance needs. We provide your information to insurance companies and agents that provide insurance quotes and offer insurance terms to you or the companies that deal with your insurance claim (such as loss assessors and claims administrators). Your information may be given to an overseas insurer (like Lloyd’s of London) if we are seeking insurance terms from an overseas insurer, or to reinsurers who are located overseas. We will try to tell you where those companies are located at the time of advising you. We also provide your information to the providers of our policy administration and broking systems that help us to provide our products and services to you. We do not trade, rent or sell your information. If you don’t provide us with full information, we can’t properly advise you, seek insurance terms for you, or assist with claims and you could breach your duty of disclosure.</p>
					<p>For more information about how to access the personal information we hold about you and how to have the information corrected and how to complain if you think we have breached the privacy laws, ask us for a copy of our Privacy Policy or visit our website.</p>
					<strong>How can you give us instructions about Financial Products?</strong>
					<p>You may tell us how you would like to give us instructions. For example by telephone, email or other means.</p>
					<p>If we provide you with execution related telephone advice, you may request a record of the execution related telephone advice, at that time or up to 90 days after providing the advice.</p>
					<p>If you have supplied your email address to us, we will send insurance documents including this FSG and any PDS (if required) to that email address either as attachments or links to documents/websites, unless you tell us you would like to receive those documents in a different form.</p>
					<strong>How will you pay for the service?</strong>
					<p>For each insurance product the insurer will charge a premium which includes any relevant taxes, charges or levies.</p>
					<p>The amount you pay may also include a fee from BMS Risk Solutions for arranging the policy. The Corporations Act requires us to fully disclose all fees and charges, so if you are in doubt please ask us to explain.</p>
					<p>Depending upon the insurance product, you will make payment of the premium and any fees that we may apply for arranging your insurance policy:</p>
					<ul>
						<li>directly via an online service;</li>
						<li>directly to us following an invoice (payable in 30 days);</li>
						<li>through an Association in which you hold membership.</li>
					</ul>
					<p>If you do not pay the premium the insurer may cancel the contract, and you would not be insured. The insurer may also charge a premium for the time on risk.</p>
					<p>Your payment of the premium is treated as acceptance of all of the terms and conditions of the associated insurance policy.<br \>Where you have paid a premium directly to us, we hold it on trust for you until we pass it on to the insurer. We will retain any interest earned on the premium during that period.</p>
					<p>If your insurance contract is cancelled or varied before the expiry of the period of insurance, you will be paid any refunded pro-rata premium received from the insurer. We will retain all of our commission, fees and other remuneration in full in the event of any early cancellation or variation of your insurance contract or adjustment of premium. We may charge an additional fee for processing your request to cancel, or vary your insurance contract and you agree that this fee may be offset against any premium pro-rata refund you are entitled to.</p>
					<p>We may offer premium funding so you can pay your insurance by instalments. Such funding would incur an interest charge, which would be advised to you before you decide on this payment method. We may also charge you a fee for this facility.</p>
					<p>If you pay by credit card, we may charge you a credit card fee, which will be disclosed to you. This fee covers the cost of bank charges etc. associated with such facilities</p>
					<strong>What remuneration, commission, fees or other benefits do we receive in relation to providing you with financial services?</strong>
					<p>We are remunerated through the fees you pay, and a percentage of the premium – a ‘commission’ – which we receive from the insurers. The commission we receive may vary from insurer to insurer and from product to product and does not influence the amount that you pay. It varies between 0-30% of the base premium you pay.</p>
					<p>We may also earn remuneration where we act as an agent for an insurer under a binder authority. The remuneration we receive from these arrangements is generally a mixture of a flat processing fee and variable performance fees and commissions. The performance fees and commissions are determined by the nature of the arrangement and, in the case of the performance fees, may be influenced by the profitability of the relevant portfolio.</p>
					<p>If we arrange premium funding we may be paid a commission by the premium funder.</p>
					<p>All fees and commissions are payable to BMS Risk Solutions. When we give you General Advice, full commission information (including dollar amounts) will be provided on request.</p>
					<p>All fees payable for our services will be advised to you at the time of providing the advice or service.</p>
					<p>We may receive additional remuneration from insurers with whom we have profit share or volume bonus arrangements. This remuneration is payable if we meet certain agreed sales and/or profitability targets set by the insurer. If we have profit share arrangements with an insurer that apply to a product we recommend to you, we will advise you of this at the time of making any such recommendation if the amount involved is material.</p>
					<strong>How our representatives are paid</strong>
					<p>Our representatives do not receive any benefit directly from the sale of a product to you. Our representatives may receive bonuses payable based on the overall performance of our business.</p>
					<strong>What information do we maintain on file and can you examine your file?</strong>
					<p>We need to hold all information you give us for a period of 7 years. You can view information held by us by making a written request.</p>
					<strong>What kind of compensation arrangements are in place and are these arrangements compliant?</strong>
					<p>BMS Risk Solutions has Professional Indemnity Insurance in place to cover the financial services that we provide. We understand that it is sufficient and appropriate to meet our obligations as the holder of an Australian Financial Services license. The policy includes coverage for claims made in relation to the conduct of representatives/employees who no longer work for us (but who did at the time of the relevant conduct).</p>
					<strong>Conflicts of interest</strong>
					<p>As a business we have relationships with and receive income from various third parties as detailed in this FSG. Any material conflicts that impact our advice, that are not mentioned in this FSG, will be advised to you on the invoices related to that advice.</p>
					<strong>What should you do if you have a complaint?</strong>
					<p>BMS Risk Solutions is committed to providing quality advice to our clients. This commitment extends to providing accessible complaint resolution mechanisms for our clients. If you have any complaint about the service provided to you, please contact your broker first to discuss your concern, or you can contact our Complaints Manager at the contact details at the top of this FSG.</p>
					<p>If an issue has not been resolved to your satisfaction, you can lodge a complaint with the Australian Financial Complaints Authority, or AFCA. AFCA provides fair and independent financial services complaint resolution that is free to consumers.</p>
					<p>Website: <a href="www.afca.org.au" target="_blank">www.afca.org.au</a><br />
					Email: <a href="mailto:info@afca.org.au">info@afca.org.au</a><br />
					Telephone: 1800 931 678 (free call)<br />
					In writing to: Australian Financial Complaints<br />
					Authority, GPO Box 3, Melbourne VIC 3001</p>
				</div>
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