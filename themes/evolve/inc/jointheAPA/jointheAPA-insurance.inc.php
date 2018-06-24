<?php  
// 2.2.40 - Get user insurance data
// Send - 
// UserID 
// Response -UserID & insurance data
$data = array();
$data['ID'] = $_SESSION["UserId"];
$insuarnceData = GetAptifyData("40", $data,""); // #_SESSION["UserID"];
if(sizeof($insuarnceData['results'])!=0){$insuranceDataTag=1;}else {$insuranceDataTag=0;}// this is important key, to check the user is whether the first time to submit insuranceData;


?>
<form id="join-insurance-form2" action="jointheapa" method="POST">
    <input type="hidden" name="step2-1" value="1"/>
	<input type="hidden" name="insuranceStatus" id="insuranceStatus" value="0">
	
	<div class="down5 <?php if((isset($_POST['step1'])&& $_POST['insuranceTag']!="0")||isset($_POST['goI']) )echo 'display'; else { echo 'display-none';}?>">
	<div class="row">
			<div class="col-xs-12">
			<label>Has there been any medical malpractice or liability claim in the last five years(whether insured or uninsured)?<span class="tipstyle">*</span></label>
			</div>
			<div class="col-xs-6 col-md-3"><input style="min-height:0" type="radio" name="Claim" id="Claim1" value="true" <?php if($insuranceDataTag==1 && $insuarnceData['results'][0]['Claim']=="1") echo 'checked="checked"';?>><label for="Claim1">Yes</label></div>
			<div class="col-xs-6 col-md-3"><input style="min-height:0" type="radio" name="Claim" id="Claim2" value="false" <?php if($insuranceDataTag==1 && $insuarnceData['results'][0]['Claim']=="0") echo 'checked="checked"';?><?php if($insuranceDataTag==0) echo 'checked="checked"';?>><label for="Claim2">No</label></div>
		</div>
		<div class="row">
			<div class="col-xs-12">
			<label>Are there any facts or circumstances that may give risk to a claim against any insured, including any predecessors in business?<span class="tipstyle">*</span></label>
			</div>
			<div class="col-xs-6 col-md-3"><input style="min-height:0" type="radio" name="Facts" id="Facts1" value="true" <?php if($insuranceDataTag==1 && $insuarnceData['results'][0]['Facts']=="1") echo 'checked="checked"';?>><label for="Facts1">Yes</label></div>
			<div class="col-xs-6 col-md-3"><input style="min-height:0" type="radio" name="Facts" id="Facts2" value="false" <?php if($insuranceDataTag==1 && $insuarnceData['results'][0]['Facts']=="0") echo 'checked="checked"';?><?php if($insuranceDataTag==0) echo 'checked="checked"';?>><label for="Facts2">No</label></div>
		</div>
		<div class="row">
			<div class="col-xs-12">
			<label>Has there been any external disciplinary proceeding or been subject to a complaint to a professional society or statutory registration board in the last five years?<span class="tipstyle">*</span></label>
			</div>
			<div class="col-xs-6 col-md-3"><input style="min-height:0" type="radio" name="Disciplinary" id="Disciplinary1" value="true" <?php if($insuranceDataTag==1 && $insuarnceData['results'][0]['Disciplinary']=="1") echo 'checked="checked"';?>><label for="Disciplinary1">Yes</label></div>
			<div class="col-xs-6 col-md-3"><input style="min-height:0" type="radio" name="Disciplinary" id="Disciplinary2" value="false" <?php if($insuranceDataTag==1 && $insuarnceData['results'][0]['Disciplinary']=="0") echo 'checked="checked"';?><?php if($insuranceDataTag==0) echo 'checked="checked"';?>><label for="Disciplinary2">No</label></div>
		</div>
		<div class="row">
			<div class="col-xs-12">
			<label>Has any insurer ever declined a proposal, impose special terms, decline to renew or cancel an insurance policy?<span class="tipstyle">*</span></label>
			</div>
			<div class="col-xs-6 col-md-3"><input style="min-height:0" type="radio" name="Decline" id="Decline1" value="true" <?php if($insuranceDataTag==1 && $insuarnceData['results'][0]['Decline']=="1") echo 'checked="checked"';?>><label for="Decline1">Yes</label></div>
			<div class="col-xs-6 col-md-3"><input style="min-height:0" type="radio" name="Decline" id="Decline2" value="false" <?php if($insuranceDataTag==1 && $insuarnceData['results'][0]['Decline']=="0") echo 'checked="checked"';?><?php if($insuranceDataTag==0) echo 'checked="checked"';?>><label for="Decline2">No</label></div>
		</div>
		<div class="row">
			<div class="col-xs-12">
			Have you had more than one claim?<span class="tipstyle">*</span>
			</div>
			<div class="col-xs-6 col-md-3"><input style="min-height:0" type="radio" name="Oneclaim" id="Oneclaim1" value="true" <?php if($insuranceDataTag==1 && $insuarnceData['results'][0]['Oneclaim']=="1") echo 'checked="checked"';?>><label style="min-height:0" for="Oneclaim1">Yes</label></div>
			<div class="col-xs-6 col-md-3"><input style="min-height:0" type="radio" name="Oneclaim" id="Oneclaim2" value="false" <?php if($insuranceDataTag==1 && $insuarnceData['results'][0]['Oneclaim']=="0") echo 'checked="checked"';?><?php if($insuranceDataTag==0) echo 'checked="checked"';?>><label style="min-height:0" for="Oneclaim2">No</label></div>
		</div>
		<div class="display-none" id="insuranceMore">
			<div class="col-xs-12">
				<label>If you answered yes to one or more of the above questions (1-5) please provide:</label>
				<input type="hidden" name="Addtionalquestion" id="Addtionalquestion" value="">
			</div>
			<div class="row">
				<div class="col-xs-6 col-md-3">
					<label>Year of claim</label>
					<input type="text" class="form-control" name="Yearclaim" id="Yearclaim" placeholder="Year of claim"<?php if($insuranceDataTag==1) {echo "value=".$insuarnceData['results'][0]['Yearclaim']; }else{ echo '';}?> >
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
		</div>
			<div class="col-xs-12 font-weight-500"><label>Insufficient details in your response may result in additional details being requested</label></div>
			<div class="row">

				<div class="row">
					<div class="col-xs-6 col-md-3">
						<label>Amount paid</label>
						<input type="text" class="form-control" name="Amountpaid" id="Amountpaid" placeholder="Amount paid (if nil, please state NIL)"<?php if($insuranceDataTag==1) {echo "value=".$insuarnceData['results'][0]['Amountpaid']; }else{ echo '';}?>>
					</div>
				</div>
				<div class="col-xs-12">
					<label>Has the claim been finalised?</label>
					<label for="Finalisedclaim1">Yes</label><input type="radio" name="Finalisedclaim" id="Finalisedclaim1" value="true" <?php if($insuranceDataTag==1 && $insuarnceData['results'][0]['Finalisedclaim']=="1") echo 'checked="checked"';?>></div>
					<label for="Finalisedclaim2">No</label><input type="radio" name="Finalisedclaim" id="Finalisedclaim2" value="false" <?php if($insuranceDataTag==1 && $insuarnceData['results'][0]['Finalisedclaim']=="0") echo 'checked="checked"';?><?php if($insuranceDataTag==0) echo 'checked="checked"';?>>
				</div>
			</div>

				<div class="col-xs-12 col-md-6">
					<label>Business name</label>
					<input type="text" class="form-control" name="Businiessname" id="Businiessname" placeholder="Business name" <?php if($insuranceDataTag==1) {echo "value=".$insuarnceData['results'][0]['Businiessname']; }else{ echo '';}?>>
					Note:Business name, practice name or trading name owned by you, do not name your employer’s business.
				</div>
		</div>
			<div class="row">
				<div class="col-xs-12">
					<input type="checkbox" name="conditions" id="conditions" value="0"><label for="conditions">I acknowledge I have read the conditions, declare my responses are correct and I am not aware of any
				other material information to be disclosed<span class="tipstyle">*</span></label>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  <a id="insuranceControl"><span class="dashboard-button-name">Next</span></a><a class="your-details-prevbutton5"><span class="dashboard-button-name">Last</span></a></div>
	</div>
</form>
<div id="insurancePopUp" style="display:none;">
	<h3>Are you sure you want to submit your insurance information?</h3>
	<a href="javascript:document.getElementById('join-insurance-form2').submit();" class="join-details-button5"><span class="dashboard-button-name">Yes</span></a>
	<a target="_self" class="cancelInsuranceButton"><span class="dashboard-button-name">No</span></a>
	
</div>
	