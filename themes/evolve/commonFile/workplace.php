<?php 
$i = $_POST['count'];
$sessionWorkplaceSetting = json_decode($_POST['sessionWorkplaceSetting']);
$sessioninterestAreas = json_decode($_POST['sessioninterestAreas']);
$sessionLanguage = json_decode($_POST['sessionLanguage']);
$sessionCountry = $_POST['sessionCountry'];
$interestAreas= $sessioninterestAreas;

echo '<input type="hidden" name="WorkplaceID'.$i.'" value="-1"><div class="row"><div class="col-lg-6">&nbsp;</div><div class="col-lg-6"> <label for="Findphysio'.$i.'"><strong>NOTE:</strong>This workplace is included in Find a Pyhsio.</label>
<input type="checkbox" name="Findphysio'.$i.'" id="Findphysio'.$i.'" value="" ></div></div>
<div class="row"><div class="col-lg-6">&nbsp;</div><div class="col-lg-6"> <label for="Findabuddy'.$i.'"><strong>NOTE:</strong>Please list my details in the physio</label>
<input type="checkbox" name="Findabuddy'.$i.'" id="Findabuddy'.$i.'" value="" ></div></div>
<div class="row">
<div class="col-lg-12">
<label for="Name-of-workplace'.$i.'">Name of workplace</label>
<input type="text" class="form-control" name="Name-of-workplace'.$i.'" id="Name-of-workplace'.$i.'">
</div>
</div>
<div class="row">
<div class="col-lg-3">
Workplace setting
</div>
<div class="col-lg-9">
<select class="form-control" id="Workplace-setting'.$i.'" name="workplace-setting'.$i.'">';
 	$workplaceSettings = $sessionWorkplaceSetting;
	foreach($workplaceSettings  as $key => $object){
		echo '<option value="'.$object->ID.'">'.$object->Name.'</option>';
	}
echo '</select>
</div>
</div>
<div class="row">
<div class="col-lg-6">
<label for="BuildingName'.$i.'">Practice Name</label>
<input type="text" class="form-control" name="WBuildingName'.$i.'" id="WBuildingName'.$i.'" value="">
</div>
<div class="col-lg-2">
<label for="WAddress_Line_1'.$i.'">Address line 1</label>
<input type="text" class="form-control" name="WAddress_Line_1'.$i.'" id="WAddress_Line_1'.$i.'" value="">
</div>
<div class="col-lg-4">
<label for="WAddress_Line_2'.$i.'">Address line 2</label>
<input type="text" class="form-control" name="WAddress_Line_2'.$i.'" id="WAddress_Line_2'.$i.'" value="">
</div>
</div>
<div class="row">
<div class="col-lg-3">
<label for="Wcity'.$i.'">City/Town</label>
<input type="text" class="form-control" name="Wcity'.$i.'" id="Wcity'.$i.'" value="">
</div>
<div class="col-lg-3">
<label for="Wpostcode'.$i.'">Postcode</label>
<input type="text" class="form-control" name="Wpostcode'.$i.'" id="Wpostcode'.$i.'" value="">
</div>
<div class="col-lg-3">
<label for="Wstate'.$i.'">State</label>
<select class="form-control" id="Wstate'.$i.'" name="Wstate'.$i.'">
	<option value="" selected disabled> State </option>
	<option value="73"> ACT </option>
	<option value="74"> NSW </option>
	<option value="77"> SA </option>
	<option value="78"> TAS </option>
	<option value="79"> VIC </option>
	<option value="76"> QLD </option>
	<option value="75"> NT </option>
	<option value="80"> WA </option>
</select>
</div>
<div class="col-lg-3">
<label for="Wcountry'.$i.'">Country</label>
<select class="form-control" id="Wcountry'.$i.'" name="Wcountry'.$i.'">
';
 	$country = $sessionCountry;
	foreach($country  as $key => $object){
		echo '<option value="'.$country[$key]['Country'].'">'.$country[$key]['Country'].'</option>';
	}
echo '
</select>

</div>
</div>
<div class="row">
<div class="col-lg-6">
<label for="Wemail'.$i.'">Workplace email</label>
<input type="email" class="form-control" name="Wemail'.$i.'" id="Wemail'.$i.'" value="">
</div>
<div class="col-lg-3">
<label for="Wwebaddress'.$i.'">Website</label>
<input type="text" class="form-control" name="Wwebaddress'.$i.'" id="Wwebaddress'.$i.'" value="">
</div>

</div>
<div class="row">
							
<div class="col-lg-2">
	<label for="">Country code</label>
	<select class="form-control" id="WPhoneCountryCode'.$i.'" name="WPhoneCountryCode'.$i.'">';
				
		foreach($country  as $pair => $value){
			echo '<option value="'.$country[$pair]['TelephoneCode'].'"';
			if ($details['Workplaces'][$key]['WPhoneCountryCode'] == $country[$pair]['TelephoneCode']){ echo "selected='selected'"; } 
			echo '> '.$country[$pair]['Country'].' </option>';
		}
	
	echo '</select>
</div>
<div class="col-lg-2">
	<label for="">Area code</label>
	<input type="text" class="form-control" name="WPhoneAreaCode'.$i.'" maxlength="5">
</div>
<div class="col-lg-4">
	<label for="">Phone number</label>
	<input type="text" class="form-control" name="Wphone'.$i.'">
</div>
<div class="col-lg-2">
	<label for="">Extention Number</label>
	<input type="text" class="form-control" name="WPhoneExtentions'.$i.'">
</div>

</div>
<div class="row">
<div class="col-lg-3">
Does this workplace offer additional languages?
</div>
<div class="col-lg-3">
<select class="chosen-select" multiple id="Additionallanguage'.$i.'" name="Additionallanguage'.$i.'[]">';
	$Language = $sessionLanguage;
	foreach($Language  as $key => $object){
		echo '<option value="'.$object->ID.'">'.$object->Name.'</option>';
	}
echo '</select>
</div>
<div class="col-lg-3">
Quality In Practice number(QIP):
</div>
<div class="col-lg-3">
 <input type="text" class="form-control" name="QIP'.$i.'" id="QIP'.$i.'" value="">
</div>
</div>
<div class="row"> 
<div class="col-lg-3">
Does this workplace provide:
</div>
</div>
<div class="row">
<div class="col-lg-6">
<input type="checkbox" name="Electronic-claiming'.$i.'" id="Electronic-claiming'.$i.'" value="False" > <label for="Electronic-claiming'.$i.'">Electronic claiming</label>
</div>
<div class="col-lg-6">
<input type="checkbox" name="Hicaps'.$i.'" id="Hicaps'.$i.'" value="False" > <label for="Hicaps'.$i.'">HICAPS</label>
</div>
</div>
<div class="row">
<div class="col-lg-6">
<input type="checkbox" name="Healthpoint'.$i.'" id="Healthpoint'.$i.'" value="False"> <label for="Healthpoint'.$i.'">Healthpoint</label>
</div>
<div class="col-lg-6">
<input type="checkbox" name="Departmentva'.$i.'" id="Departmentva'.$i.'" value="False"> <label for="Departmentva'.$i.'">Department of Vetarans Affairs</label>
</div>
</div>
<div class="row">
<div class="col-lg-6">
<input type="checkbox" name="Workerscompensation'.$i.'" id="Workerscompensation'.$i.'" value="False"> <label for="Workerscompensation'.$i.'">Workers compensation</label>
</div>
<div class="col-lg-6">
<input type="checkbox" name="Motora'.$i.'" id="Motora'.$i.'" value="False"> <label for="Motora'.$i.'">Motor accident compensation</label>
</div>
</div>
<div class="row">
<div class="col-lg-6">
<input type="checkbox" name="Medicare'.$i.'" id="Medicare'.$i.'" value="False"> <label for="Medicare'.$i.'">Medicare Chronic Disease Management</label>
</div>
<div class="col-lg-6">
<input type="checkbox" name="Homehospital'.$i.'" id="Homehospital'.$i.'" value="False"> <label for="Homehospital'.$i.'">Home and hospital visits</label>
</div>
</div>
<div class="row">
<div class="col-lg-6">
<input type="checkbox" name="MobilePhysio'.$i.'" id="MobilePhysio'.$i.'" value="False"> <label for="MobilePhysio'.$i.'">Mobile physiotherapist</label>
</div>
</div>
<div class="row">
<div class="col-lg-3">
Numbers of hours worked
</div>
<div class="col-lg-6">
<select class="form-control" id="Number-worked-hours'.$i.'" name="Number-worked-hours'.$i.'">
	<option value="0" disabled="">no</option>
	<option value="01-04"> 01-04 </option>
	<option value="05-08"> 05-08 </option>
	<option value="09-12"> 09-12 </option>
	<option value="13-16"> 13-16 </option>
	<option value="17-20"> 17-20 </option>
	<option value="21-25"> 21-25 </option>
	<option value="26-30"> 26-30 </option>
	<option value="31-35"> 31-35 </option>
	<option value="36-40"> 36-40 </option>
	<option value="40+"> 40+ </option>
</select>
</div>
</div>
 <div class="row"> 
<div class="col-lg-3">
Your special interest area:
</div>
<div class="col-lg-9">
<select class="chosen-select" id="WTreatmentarea'.$i.'" name="WTreatmentarea'.$i.'[]" multiple  tabindex="-1" data-placeholder="Choose treatment area...">';
    foreach($interestAreas  as $key => $value){
		echo '<option value="'.$value->ID.'">'.$value->Name.'</option>';
	}
echo '</select>
</div>
</div>
';
?>