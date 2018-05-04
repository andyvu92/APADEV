<?php 
$i = $_POST['count'];
$sessionWorkplaceSetting = json_decode($_POST['sessionWorkplaceSetting']);
$sessioninterestAreas = json_decode($_POST['sessioninterestAreas']);
$interestAreas= $sessioninterestAreas;

echo '<div class="row"><div class="col-lg-6">&nbsp;</div><div class="col-lg-6"> <label for="Findphysio'.$i.'"><strong>NOTE:</strong>This workplace is included in Find a Pyhsio.</label>
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
	foreach($workplaceSettings->WorkplaceSettings  as $key => $object){
		echo '<option value="'.$object->code.'">'.$object->name.'</option>';
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
<input type="text" class="form-control" name="Wcountry'.$i.'" id="Wcountry'.$i.'" value="">
</div>
</div>
<div class="row">
<div class="col-lg-6">
<label for="Wemail'.$i.'">Workplace email</label>
<input type="text" class="form-control" name="Wemail'.$i.'" id="Wemail'.$i.'" value="">
</div>
<div class="col-lg-3">
<label for="Wwebaddress'.$i.'">Website</label>
<input type="text" class="form-control" name="Wwebaddress'.$i.'" id="Wwebaddress'.$i.'" value="">
</div>
<div class="col-lg-3">
<label for="Wphone'.$i.'">Phone number</label>
<input type="text" class="form-control" name="Wphone'.$i.'" id="Wphone'.$i.'" value="">
</div>
</div>
<div class="row">
<div class="col-lg-3">
Does this workplace offer additional languages?
</div>
<div class="col-lg-3">
<select class="chosen-select" multiple id="Additionallanguage'.$i.'" name="Additionallanguage'.$i.'[]">
	<option value="NONE" disabled="" >no</option>
	<option value="1"> Afrikaans </option>
	<option value="2"> Arabic </option>
	<option value="3"> Bosnian </option>
	<option value="4"> Cantonese </option>
	<option value="5"> Chinese </option>
	<option value="6"> Chzech </option>
	<option value="7"> Croation </option>
	<option value="8"> Danish </option>
	<option value="9"> Dutch </option>
	<option value="10"> Egyptian </option>
	<option value="11"> English </option>
	<option value="12"> Filipino </option>
	<option value="13"> French </option>
	<option value="14"> German </option>
	<option value="15"> Greek </option>
	<option value="16"> Hebrew </option>
	<option value="17"> Hindi </option>
	<option value="18"> Hokkien </option>
	<option value="19"> Hungarian </option>
	<option value="20"> Indonesian </option>
	<option value="21"> Italian </option>
	<option value="22"> Japanese </option>
	<option value="23"> Korean </option>
	<option value="24"> Latvian </option>
	<option value="25"> Lebanese </option>
	<option value="27"> Macedonian </option>
	<option value="30"> Malay </option>
	<option value="28"> Maltese </option>
	<option value="29"> Mandaron </option>
	<option value="26"> Marathi </option>
	<option value="31"> Norwegian </option>
	<option value="32"> Poland </option>
	<option value="33"> Portuguese </option>
	<option value="34"> Punjabi </option>
	<option value="35"> Russian </option>
	<option value="37"> Serbian </option>
	<option value="38"> Sign Language </option>
	<option value="36"> Slovak </option>
	<option value="39"> Spanish </option>
	<option value="40"> Swedish </option>
	<option value="41"> Swiss </option>
	<option value="43"> Taiwanese </option>
	<option value="42"> Tamil </option>
	<option value="44"> Teo-Chew </option>
	<option value="45"> Thai </option>
	<option value="46"> Turkish </option>
	<option value="47"> Ukrainian </option>
	<option value="48"> Urdu </option>
	<option value="49"> Vietnamese </option>
	<option value="50"> Yiddish </option>
	<option value="51"> Yugoslav </option>
</select>
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
<input type="checkbox" name="Electronic-claiming'.$i.'" id="Electronic-claiming'.$i.'" value="" > <label for="Electronic-claiming'.$i.'">Electronic claiming</label>
</div>
<div class="col-lg-6">
<input type="checkbox" name="Hicaps'.$i.'" id="Hicaps'.$i.'" value="" > <label for="Hicaps'.$i.'">HICAPS</label>
</div>
</div>
<div class="row">
<div class="col-lg-6">
<input type="checkbox" name="Healthpoint'.$i.'" id="Healthpoint'.$i.'" value="0"> <label for="Healthpoint'.$i.'">Healthpoint</label>
</div>
<div class="col-lg-6">
<input type="checkbox" name="Departmentva'.$i.'" id="Departmentva'.$i.'" value="0"> <label for="Departmentva'.$i.'">Department of Vetarans Affairs</label>
</div>
</div>
<div class="row">
<div class="col-lg-6">
<input type="checkbox" name="Workerscompensation'.$i.'" id="Workerscompensation'.$i.'" value="0"> <label for="Workerscompensation'.$i.'">Workers compensation</label>
</div>
<div class="col-lg-6">
<input type="checkbox" name="Motora'.$i.'" id="Motora'.$i.'" value="0"> <label for="Motora'.$i.'">Motor accident compensation</label>
</div>
</div>
<div class="row">
<div class="col-lg-6">
<input type="checkbox" name="Medicare'.$i.'" id="Medicare'.$i.'" value="0"> <label for="Medicare'.$i.'">Medicare Chronic Disease Management</label>
</div>
<div class="col-lg-6">
<input type="checkbox" name="Homehospital'.$i.'" id="Homehospital'.$i.'" value="0"> <label for="Homehospital'.$i.'">Home and hospital visits</label>
</div>
</div>
<div class="row">
<div class="col-lg-6">
<input type="checkbox" name="MobilePhysio'.$i.'" id="MobilePhysio'.$i.'" value="0"> <label for="MobilePhysio'.$i.'">Mobile physiotherapist</label>
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
		echo '<option value="'.$value->Code.'">'.$value->Name.'</option>';
	}
echo '</select>
</div>
</div>
';
?>