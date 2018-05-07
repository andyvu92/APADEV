<?php  
// 2.2.* - Get user insurance data
// Send - 
// UserID 
// Response -UserID & insurance data
$insuranceDataTag=1;// this is important key, to check the user is whether the first time to submit insuranceData.
$insuarnceData=array();
$insuarnceData['Claim']="Yes";
$insuarnceData['Facts']="No"; 
$insuarnceData['Disciplinary']="No"; 
$insuarnceData['Decline']="No"; 
$insuarnceData['Oneclaim']="No";  
$insuarnceData['Addtionalquestion']="1";
$insuarnceData['Yearclaim']="2018";
$insuarnceData['Nameclaim']="test";
$insuarnceData['Fulldescription']="test"; 
$insuarnceData['Amountpaid']="2000"; 
$insuarnceData['Finalisedclaim']="Yes"; 
$insuarnceData['Businiessname']="test"; 

?>
<form id="join-insurance-form2" action="jointheapa" method="POST">
    <input type="hidden" name="step2-1" value="1"/>
	<input type="hidden" name="insuranceStatus" id="insuranceStatus" value="1">
	
	<div class="down5 <?php if((isset($_POST['step1'])&& $_POST['insuranceTag']!="0")||isset($_POST['goI']) )echo 'display'; else { echo 'display-none';}?>">
		<div class="row">
			<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			Has there been any medical malpractice or liability claim in the last five years(whether insured or uninsured)?<span class="tipstyle">*</span>
			</div>
			<div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Claim1">Yes</label><input type="radio" name="Claim" id="Claim1" value="Yes" <?php if($insuranceDataTag==1 && $insuarnceData['Claim']=="Yes") echo 'checked="checked"';?>></div>
			<div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Claim2">No</label><input type="radio" name="Claim" id="Claim2" value="No" <?php if($insuranceDataTag==0) echo 'checked="checked"';?>></div>
		</div>
		<div class="row">
			<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			Are there any facts or circumstances that may give risk to a claim against any insured, including any predecessors in business?<span class="tipstyle">*</span>
			</div>
			<div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Facts1">Yes</label><input type="radio" name="Facts" id="Facts1" value="Yes" <?php if($insuranceDataTag==1 && $insuarnceData['Facts']=="Yes") echo 'checked="checked"';?>></div>
			<div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Facts2">No</label><input type="radio" name="Facts" id="Facts2" value="No" <?php if($insuranceDataTag==1 && $insuarnceData['Facts']=="No") echo 'checked="checked"';?><?php if($insuranceDataTag==0) echo 'checked="checked"';?>></div>
		</div>
		<div class="row">
			<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			Has there been any external disciplinary proceeding or been subject to a complaint to a professional society or statutory registration board in the last five years?<span class="tipstyle">*</span>
			</div>
			<div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Disciplinary1">Yes</label><input type="radio" name="Disciplinary" id="Disciplinary1" value="Yes" <?php if($insuranceDataTag==1 && $insuarnceData['Disciplinary']=="Yes") echo 'checked="checked"';?>></div>
			<div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Disciplinary2">No</label><input type="radio" name="Disciplinary" id="Disciplinary2" value="No" <?php if($insuranceDataTag==1 && $insuarnceData['Disciplinary']=="No") echo 'checked="checked"';?><?php if($insuranceDataTag==0) echo 'checked="checked"';?>></div>
		</div>
		<div class="row">
			<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			Has any insurer ever declined a proposal, impose special terms, decline to renew or cancel an insurance policy?<span class="tipstyle">*</span>
			</div>
			<div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Decline1">Yes</label><input type="radio" name="Decline" id="Decline1" value="Yes" <?php if($insuranceDataTag==1 && $insuarnceData['Decline']=="Yes") echo 'checked="checked"';?>></div>
			<div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Decline2">No</label><input type="radio" name="Decline" id="Decline2" value="No" <?php if($insuranceDataTag==1 && $insuarnceData['Decline']=="No") echo 'checked="checked"';?><?php if($insuranceDataTag==0) echo 'checked="checked"';?>></div>
		</div>
		<div class="row">
			<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			Have you had more than one claim?<span class="tipstyle">*</span>
			</div>
			<div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Oneclaim1">Yes</label><input type="radio" name="Oneclaim" id="Oneclaim1" value="Yes" <?php if($insuranceDataTag==1 && $insuarnceData['Oneclaim']=="Yes") echo 'checked="checked"';?>></div>
			<div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Oneclaim2">No</label><input type="radio" name="Oneclaim" id="Oneclaim2" value="No" <?php if($insuranceDataTag==1 && $insuarnceData['Oneclaim']=="No") echo 'checked="checked"';?><?php if($insuranceDataTag==0) echo 'checked="checked"';?>></div>
		</div>
		<div class="display-none" id="insuranceMore">
			<div class="row">If you answered yes to one or more of the above questions (1-5) please provide:<input type="hidden" name="Addtionalquestion" id="Addtionalquestion" value="<?php if($insuranceDataTag==1) echo $insuarnceData['Addtionalquestion'];?>"></div>
			<div class="row">
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<input type="text" class="form-control" name="Yearclaim" id="Yearclaim" <?php if($insuranceDataTag==1 && $insuarnceData['Addtionalquestion']=="1") {echo "value=".$insuarnceData['Yearclaim']; }else{ echo 'placeholder="Year of claim"';}?> >
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<input type="text" class="form-control" name="Nameclaim" id="Nameclaim" <?php if($insuranceDataTag==1 && $insuarnceData['Addtionalquestion']=="1") {echo "value=".$insuarnceData['Nameclaim']; }else{ echo 'placeholder="Name of claimant"';}?>>
				</div>
			</div>
			<div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input type="text" class="form-control" name="Fulldescription" id="Fulldescription" <?php if($insuranceDataTag==1 && $insuarnceData['Addtionalquestion']=="1") {echo "value=".$insuarnceData['Fulldescription']; }else{ echo 'placeholder="Full description of insurance"';}?>></div></div>
			<div class="row">Insufficient details in your response may result in additional details being requested</div>
			<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
					<input type="text" class="form-control" name="Amountpaid" id="Amountpaid" <?php if($insuranceDataTag==1 && $insuarnceData['Addtionalquestion']=="1") {echo "value=".$insuarnceData['Amountpaid']; }else{ echo 'placeholder="Amount paid (if nil, please state NIL)"';}?>>
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				Has the claim been finalised?
				</div>
				<div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Finalisedclaim1">Yes</label><input type="radio" name="Finalisedclaim" id="Finalisedclaim1" value="Yes" <?php if($insuranceDataTag==1 && $insuarnceData['Addtionalquestion']=="1" && $insuarnceData['Finalisedclaim']=="Yes") echo 'checked="checked"';?>></div>
				<div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="Finalisedclaim2">No</label><input type="radio" name="Finalisedclaim" id="Finalisedclaim2" value="No" <?php if($insuranceDataTag==1 && $insuarnceData['Addtionalquestion']=="1"&& $insuarnceData['Finalisedclaim']=="No") echo 'checked="checked"';?><?php if($insuranceDataTag==0) echo 'checked="checked"';?>></div>
			</div>
			<div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input type="text" class="form-control" name="Businiessname" id="Businiessname"  <?php if($insuranceDataTag==1 && $insuarnceData['Addtionalquestion']=="1") {echo "value=".$insuarnceData['Businiessname']; }else{ echo 'placeholder="Business name, practice name or trading name owned by you, do not name your employer’s business."';}?>></div></div>
		</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<input type="checkbox" name="conditions" id="conditions" value="0"><label for="conditions">I acknowledge I have read the conditions, declare my responses are correct and I am not aware of any
				other material information to be disclosed<span class="tipstyle">*</span></label>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">  <a id="insuranceControl"><span class="dashboard-button-name">Next</span></a><a class="your-details-prevbutton5"><span class="dashboard-button-name">Last</span></a></div>
	</div>
</form>
<div id="insurancePopUp" style="display:none;">
	<h3>Are you sure you want to submit your insurance information?</h3>
	<a href="javascript:document.getElementById('join-insurance-form2').submit();" class="join-details-button5"><span class="dashboard-button-name">Yes</span></a>
	<a target="_self" class="cancelInsuranceButton"><span class="dashboard-button-name">No</span></a>
	
</div>
	