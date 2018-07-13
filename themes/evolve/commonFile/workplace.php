<?php 
$i = $_POST['count'];
$sessionWorkplaceSetting = json_decode($_POST['sessionWorkplaceSetting']);
$sessioninterestAreas = json_decode($_POST['sessioninterestAreas']);
$sessionLanguage = json_decode($_POST['sessionLanguage']);
$sessionCountry = $_POST['sessionCountry'];
$interestAreas= $sessioninterestAreas;

echo '<input type="hidden" name="WorkplaceID'.$i.'" value="-1">

	<div class="col-xs-12 FapTagC">
		<input class="styled-checkbox" type="checkbox" name="Findphysio'.$i.'" id="Findphysio'.$i.'" value="" >
		<label class="light-font-weight" for="Findphysio'.$i.'"><span class="note-text">NOTE:&nbsp;</span>I want this workplace to be listed on Find a Physio on the consumer choose.physio site</label>
	</div>

	<div class="col-xs-12 FapTagA">
		<input class="styled-checkbox" type="checkbox" name="Findabuddy'.$i.'" id="Findabuddy'.$i.'" value="" >
		<label class="light-font-weight" for="Findabuddy'.$i.'"><span class="note-text">NOTE:&nbsp;</span>I want this workplace to be listed on Find a Physio on the corporate australian.physio site</label>
	</div>
<div class="row">
<div class="col-lg-12">
<label for="Name-of-workplace'.$i.'">Name of workplace<span class="tipstyle">*</span></label>
<input type="text" class="form-control" name="Name-of-workplace'.$i.'" id="Name-of-workplace'.$i.'">
</div>
</div>
<div class="row">
	<div class="col-xs-12 col-md-6">
		<label for="BuildingName'.$i.'">Building Name</label>
		<input type="text" class="form-control" name="WBuildingName'.$i.'" id="WBuildingName'.$i.'" value="">
	</div>
</div>

	<div class="col-xs-12 col-md-6">
		<label for="WAddress_Line_1'.$i.'">Address line 1</label>
		<input type="text" class="form-control" name="WAddress_Line_1'.$i.'" id="WAddress_Line_1'.$i.'" value="" placeholder="Address line 1">
	</div>

	<div class="col-xs-12 col-md-6">
		<label for="WAddress_Line_2'.$i.'">Address line 2</label>
		<input type="text" class="form-control" name="WAddress_Line_2'.$i.'" id="WAddress_Line_2'.$i.'" value="" placeholder="Address line 2">
	</div>


<div class="row">
	<div class="col-xs-6 col-md-6">
		<label for="Wcity'.$i.'">City/Town</label>
		<input type="text" class="form-control" name="Wcity'.$i.'" id="Wcity'.$i.'" value="">
	</div>

	<div class="col-xs-6 col-md-6">
		<label for="Wpostcode'.$i.'">Postcode</label>
		<input type="text" class="form-control" name="Wpostcode'.$i.'" id="Wpostcode'.$i.'" value="">
	</div>

	<div class="col-xs-6 col-md-6">
		<label for="Wstate'.$i.'">State</label>
		<div class="chevron-select-box">
			<select class="form-control" id="Wstate'.$i.'" name="Wstate'.$i.'">
				<option value="" selected disabled> State </option>
				<option value="ACT"> ACT </option>
				<option value="NSW"> NSW </option>
				<option value="SA"> SA </option>
				<option value="TAS"> TAS </option>
				<option value="VIC"> VIC </option>
				<option value="QLD"> QLD </option>
				<option value="NT"> NT </option>
				<option value="WA"> WA </option>
			</select>
		</div>
	</div>

	<div class="col-xs-6 col-md-6">
	<label for="Wcountry'.$i.'">Country</label>
	<div class="chevron-select-box">
		<select class="form-control" id="Wcountry'.$i.'" name="Wcountry'.$i.'">
		';
			$country = $sessionCountry;
			foreach($country  as $key => $object){
				echo '<option value="'.$country[$key]['Country']; 
				echo '"';
				if($country[$key]['ID']=="14"){
					echo "selected='selected'";
				}
				echo '>'.$country[$key]['Country'].'</option>';
				
			}
		echo '
		</select>
	</div>
	</div>
</div>

<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-6">
		<label for="Wemail'.$i.'">Workplace email</label>
		<input type="email" class="form-control" name="Wemail'.$i.'" id="Wemail'.$i.'" value="">
	</div>

	<div class="col-xs-12 col-sm-6 col-md-6">
		<label for="Wwebaddress'.$i.'">Website</label>
		<input type="text" class="form-control" name="Wwebaddress'.$i.'" id="Wwebaddress'.$i.'" value="">
	</div>

	<div class="col-xs-12 col-sm-6 col-md-6">
		<label for="">Phone number</label>
		<input type="text" class="form-control" name="Wphone'.$i.'">
	</div>
</div>

<div class="row">

	<div class="col-xs-12 col-md-6">
		<label>What languages do you speak in your professional practice?</label>
		<select class="chosen-select" multiple id="Additionallanguage'.$i.'" name="Additionallanguage'.$i.'[]">';
			$Language = $sessionLanguage;
			foreach($Language  as $key => $object){
				echo '<option value="'.$object->ID.'">'.$object->Name.'</option>';
			}
		echo '
		</select>
	</div>

	<div class="col-xs-6 col-md-6">
		<label>Quality In Practice number(QIP):</label>
		<input type="text" class="form-control" name="QIP'.$i.'" id="QIP'.$i.'" value="" placeholder="QIP Number">
	</div>
</div>

<div class="row label-list"> 
	<div class="col-xs-12" style="margin-top: 18px">
		<label>What services does this workplace provide?</label>
	</div>

	<div class="col-xs-12 col-sm-6 col-md-6">
		<input class="styled-checkbox" type="checkbox" name="Electronic-claiming'.$i.'" id="Electronic-claiming'.$i.'" value="False" >
		<label class="light-font-weight" for="Electronic-claiming'.$i.'">Electronic claiming</label>
	</div>

	<div class="col-xs-12 col-sm-6 col-md-6">
		<input class="styled-checkbox" type="checkbox" name="Hicaps'.$i.'" id="Hicaps'.$i.'" value="False" >
		<label class="light-font-weight" for="Hicaps'.$i.'">HICAPS</label>
	</div>

	<div class="col-xs-12 col-sm-6 col-md-6">
		<input class="styled-checkbox" type="checkbox" name="Healthpoint'.$i.'" id="Healthpoint'.$i.'" value="False">
		<label class="light-font-weight" for="Healthpoint'.$i.'">Healthpoint</label>
	</div>

	<div class="col-xs-12 col-sm-6 col-md-6">
		<input class="styled-checkbox" type="checkbox" name="Departmentva'.$i.'" id="Departmentva'.$i.'" value="False">
		<label class="light-font-weight" for="Departmentva'.$i.'">Department of Vetarans Affairs</label>
	</div>

	<div class="col-xs-12 col-sm-6 col-md-6">
		<input class="styled-checkbox" type="checkbox" name="Workerscompensation'.$i.'" id="Workerscompensation'.$i.'" value="False">
		<label class="light-font-weight" for="Workerscompensation'.$i.'">Workers compensation</label>
	</div>

	<div class="col-xs-12 col-sm-6 col-md-6">
		<input class="styled-checkbox" type="checkbox" name="Motora'.$i.'" id="Motora'.$i.'" value="False">
		<label class="light-font-weight" for="Motora'.$i.'">Motor accident compensation</label>
	</div>

	<div class="col-xs-12 col-sm-6 col-md-6">
		<input class="styled-checkbox" type="checkbox" name="Medicare'.$i.'" id="Medicare'.$i.'" value="False">
		<label class="light-font-weight" for="Medicare'.$i.'">Medicare Chronic Disease Management</label>
	</div>

	<div class="col-xs-12 col-sm-6 col-md-6">
		<input class="styled-checkbox" type="checkbox" name="Homehospital'.$i.'" id="Homehospital'.$i.'" value="False">
		<label class="light-font-weight" for="Homehospital'.$i.'">Home and hospital visits</label>
	</div>

	<div class="col-xs-12 col-sm-6 col-md-6">
		<input class="styled-checkbox" type="checkbox" name="MobilePhysio'.$i.'" id="MobilePhysio'.$i.'" value="False">
		<label class="light-font-weight" for="MobilePhysio'.$i.'">Mobile physiotherapist</label>
	</div>
</div>

<div class="row">

	<div class="col-xs-12 col-md-6">
		<label>Workplace setting<span class="tipstyle">*</span></label>
		<div class="chevron-select-box">
		<select class="form-control" id="Workplace-setting'.$i.'" name="workplace-setting'.$i.'">';
			$workplaceSettings = $sessionWorkplaceSetting;
			foreach($workplaceSettings  as $key => $object){
				echo '<option value="'.$object->ID.'">'.$object->Name.'</option>';
			}
		echo '
		</select>
		</div>
	</div>

	<div class="col-xs-12 col-sm-6 col-md-6">
		<label>Numbers of hours worked<span class="tipstyle">*</span></label>
		<div class="chevron-select-box">
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
</div>
';
?>