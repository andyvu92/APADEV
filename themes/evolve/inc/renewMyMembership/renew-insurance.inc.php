<?php  
// 2.2.40 - Get user insurance data
// Send - 
// UserID 
// Response -UserID & insurance data
$data = array();
$data['ID'] = $_SESSION["UserId"];
$insuarnceData = GetAptifyData("40", $data,""); // #_SESSION["UserID"];
if(sizeof($insuarnceData['results'])!=0){$insuranceDataTag=1;} else {$insuranceDataTag=0;}// this is important key, to check the user is whether the first time to submit insuranceData;


?>
<form id="renew-insurance-form2" action="renewmymembership" method="POST">
	<input type="hidden" name="step2-1" value="1"/>
	<input type="hidden" name="insuranceStatus" id="insuranceStatus" value="0">
	<div class="down5 <?php if((isset($_POST['step1'])&& $_POST['insuranceTag']!="0")||isset($_POST['goI']))echo 'display'; else { echo 'display-none';}?>">
		<div class="row">
			<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			Has there been any medical malpractice or liability claim in the last five years(whether insured or uninsured)?<span class="tipstyle">*</span>
			</div>
			<div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Claim1">Yes</label><input type="radio" name="Claim" id="Claim1" value="true" <?php if($insuranceDataTag==1 && $insuarnceData['results'][0]['Claim']=="1") echo 'checked="checked"';?>></div>
			<div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Claim2">No</label><input type="radio" name="Claim" id="Claim2" value="false" <?php if($insuranceDataTag==1 && $insuarnceData['results'][0]['Claim']=="0") echo 'checked="checked"';?><?php if($insuranceDataTag==0) echo 'checked="checked"';?>></div>
		</div>
		<div class="row">
			<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			Are there any facts or circumstances that may give risk to a claim against any insured, including any predecessors in business?<span class="tipstyle">*</span>
			</div>
			<div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Facts1">Yes</label><input type="radio" name="Facts" id="Facts1" value="true" <?php if($insuranceDataTag==1 && $insuarnceData['results'][0]['Facts']=="1") echo 'checked="checked"';?>></div>
			<div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Facts2">No</label><input type="radio" name="Facts" id="Facts2" value="false" <?php if($insuranceDataTag==1 && $insuarnceData['results'][0]['Facts']=="0") echo 'checked="checked"';?><?php if($insuranceDataTag==0) echo 'checked="checked"';?>></div>
		</div>
		<div class="row">
			<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			Has there been any external disciplinary proceeding or been subject to a complaint to a professional society or statutory registration board in the last five years?<span class="tipstyle">*</span>
			</div>
			<div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Disciplinary1">Yes</label><input type="radio" name="Disciplinary" id="Disciplinary1" value="true" <?php if($insuranceDataTag==1 && $insuarnceData['results'][0]['Disciplinary']=="1") echo 'checked="checked"';?>></div>
			<div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Disciplinary2">No</label><input type="radio" name="Disciplinary" id="Disciplinary2" value="false" <?php if($insuranceDataTag==1 && $insuarnceData['results'][0]['Disciplinary']=="0") echo 'checked="checked"';?><?php if($insuranceDataTag==0) echo 'checked="checked"';?>></div>
		</div>
		<div class="row">
			<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			Has any insurer ever declined a proposal, impose special terms, decline to renew or cancel an insurance policy?<span class="tipstyle">*</span>
			</div>
			<div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Decline1">Yes</label><input type="radio" name="Decline" id="Decline1" value="true" <?php if($insuranceDataTag==1 && $insuarnceData['results'][0]['Decline']=="1") echo 'checked="checked"';?>></div>
			<div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Decline2">No</label><input type="radio" name="Decline" id="Decline2" value="false" <?php if($insuranceDataTag==1 && $insuarnceData['results'][0]['Decline']=="0") echo 'checked="checked"';?><?php if($insuranceDataTag==0) echo 'checked="checked"';?>></div>
		</div>
		<div class="row">
			<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			Have you had more than one claim?<span class="tipstyle">*</span>
			</div>
			<div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Oneclaim1">Yes</label><input type="radio" name="Oneclaim" id="Oneclaim1" value="true" <?php if($insuranceDataTag==1 && $insuarnceData['results'][0]['Oneclaim']=="1") echo 'checked="checked"';?>></div>
			<div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Oneclaim2">No</label><input type="radio" name="Oneclaim" id="Oneclaim2" value="false" <?php if($insuranceDataTag==1 && $insuarnceData['results'][0]['Oneclaim']=="0") echo 'checked="checked"';?><?php if($insuranceDataTag==0) echo 'checked="checked"';?>></div>
		</div>
		<div class="display-none" id="insuranceMore">
			<div class="row">If you answered yes to one or more of the above questions (1-5) please provide:<input type="hidden" name="Addtionalquestion" id="Addtionalquestion" value=""></div>
			<div class="row">
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<input type="text" class="form-control" name="Yearclaim" id="Yearclaim" <?php if($insuranceDataTag==1) {echo "value=".$insuarnceData['results'][0]['Yearclaim']; }else{ echo 'placeholder="Year of claim"';}?> >
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<input type="text" class="form-control" name="Nameclaim" id="Nameclaim" <?php if($insuranceDataTag==1) {echo "value=".$insuarnceData['results'][0]['Nameclaim']; }else{ echo 'placeholder="Name of claimant"';}?>>
				</div>
			</div>
			<div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input type="text" class="form-control" name="Fulldescription" id="Fulldescription" <?php if($insuranceDataTag==1) {echo "value=".$insuarnceData['results'][0]['Fulldescription']; }else{ echo 'placeholder="Full description of insurance"';}?>></div></div>
			<div class="row">Insufficient details in your response may result in additional details being requested</div>
			<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
					<input type="text" class="form-control" name="Amountpaid" id="Amountpaid" <?php if($insuranceDataTag==1) {echo "value=".$insuarnceData['results'][0]['Amountpaid']; }else{ echo 'placeholder="Amount paid (if nil, please state NIL)"';}?>>
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				Has the claim been finalised?
				</div>
				<div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Finalisedclaim1">Yes</label><input type="radio" name="Finalisedclaim" id="Finalisedclaim1" value="true" <?php if($insuranceDataTag==1 && $insuarnceData['results'][0]['Finalisedclaim']=="1") echo 'checked="checked"';?>></div>
				<div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Finalisedclaim2">No</label><input type="radio" name="Finalisedclaim" id="Finalisedclaim2" value="false" <?php if($insuranceDataTag==1 && $insuarnceData['results'][0]['Finalisedclaim']=="0") echo 'checked="checked"';?><?php if($insuranceDataTag==0) echo 'checked="checked"';?>></div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input type="text" class="form-control" name="Businiessname" id="Businiessname"  <?php if($insuranceDataTag==1) {echo "value=".$insuarnceData['results'][0]['Businiessname']; }else{ echo 'placeholder="Business name, practice name or trading name owned by you, do not name your employer’s business."';}?>></div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<input type="checkbox" name="conditions" id="conditions" value="0" data-target="#insuranceTermsandConditions" data-toggle="modal"><label for="conditions">I acknowledge I have read the conditions, declare my responses are correct and I am not aware of any
			other material information to be disclosed<span class="tipstyle">*</span></label>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">  <a id="insuranceControl"><span class="dashboard-button-name">Next</span></a><a class="your-details-prevbutton5"><span class="dashboard-button-name">Last</span></a></div>
	</div>
</form>
<div id="insurancePopUp" style="display:none;">
	<h3>Are you sure you want to submit your insurance information?</h3>
	<a href="javascript:document.getElementById('renew-insurance-form2').submit();" class="join-details-button5"><span class="dashboard-button-name">Yes</span></a>
	<a target="_self" class="cancelInsuranceButton"><span class="dashboard-button-name">No</span></a>
</div>
<div id="insuranceTermsandConditions" class="modal fade" role="dialog">
	<div class="modal-dialog" style="overflow-y: scroll; max-height:85%;  margin-top: 50px; margin-bottom:50px;">
	<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">FINANCIAL SERVICES GUIDE</h4>
			</div>
			<div class="modal-body">
				<strong>This guide includes important information about:</strong>
				<ul>
					<li>the financial services we offer</li>
					<li>the advice we will give to you</li>
					<li>information we need from you</li>
					<li>how we are paid</li>
					<li>what to do if you have a complaint</li>
					<li>how you can contact the FOS</li>
				</ul>
				
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
            	<label for="insuranceTerms">Yes. I’ve read and understand the insurance terms and conditions</label><input type="checkbox" id="insuranceTerms" checked>
			</div>   
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 display-none" id="disagreeDescription"> 
            	Please agree with the insurance Terms and Conditions to continue with your membership
			</div> 
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" id="insurance_terms_button" data-dismiss="modal">Submit</button>
			</div>
		</div>
	</div>
</div>
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