<?php 

$i = $_POST['count'];
$sessionCountry = $_POST['sessionCountry'];
//$sessionWorkplaceSetting = json_decode($_POST['sessionWorkplaceSetting']);
//$sessioninterestAreas = json_decode($_POST['sessioninterestAreas']);
echo '<input type="hidden" name="ID'.$i.'" value="-1"><div class="row"><div class="col-lg-6"> <label for="degree'.$i.'">Degree<span class="tipstyle">*</span></label>
<select name="Udegree'.$i.'" id="Udegree'.$i.'">
	<option selected="selected" value="">(None)</option>
	<option value="1">Bachelor of Physiotherapy</option>
	<option value="2">Bachelor of Physiotherapy (Hons)</option>
	<option value="3">Bachelor of Physiotherapy (Honours)</option>
	<option value="4">Bachelor of Science (Physiotherapy)</option>
	<option value="5">Bachelor of Science (Physiotherapy) (Honours)</option>
	<option value="6">Bachelor of Applied Science and Master of Physiotherapy Practice</option>
	<option value="7">Bachelor of Applied Science (Physiotherapy)</option>
	<option value="8">Bachelor of Applied Science (Physiotherapy) (Honours)</option>
	<option value="Other">Other</option>
</select>
</div>
</div>
<div class="row">
	<div class="col-lg-6">
		<label for="Undergraduateuniversity-name'.$i.'">University name<span class="tipstyle">*</span></label>
		<select name="Undergraduateuniversity-name'.$i.'" id="Undergraduateuniversity-name0">
			<option selected="selected" value="">(None)</option>
			<option value="ACU">Australian Catholic University - NSW</option>
			<option value="ACUQ">Australian Catholic University - QLD</option>
			<option value="ACUB">Australlian Catholic University - Ballarat</option>
			<option value="BON">Bond University - QLD</option>
			<option value="CU">Canberra University</option>
			<option value="CQU">Central Qld University</option>
			<option value="CSU">Charles Sturt University - Albury NSW</option>
			<option value="CSUO">Charles Sturt University - Orange NSW</option>
			<option value="CSUP">Charles Sturt University Port Macquarie</option>
			<option value="CUMB">Cumberland University - NSW</option>
			<option value="CUR">Curtin University - WA</option>
			<option value="ECU">Edith Cowan University - WA</option>
			<option value="FLIN">Flinders University SA</option>
			<option value="GRIF">Griffith University - Gold coast QLD</option>
			<option value="JCU">James Cook University - QLD</option>
			<option value="LAT">Latrobe University - Bundoora VIC</option>
			<option value="LATB">Latrobe Universtiy - Bendigo VIC</option>
			<option value="LIN">Lincoln Institute - VIC</option>
			<option value="MACQ">Macquarie University - NSW</option>
			<option value="MON">Monash University - Vic</option>
			<option value="UA">University of Adelaide</option>
			<option value="UM">University of Melbourne - Vic</option>
			<option value="UNC">University of Newcastle - NSW</option>
			<option value="UND">University of Notre Dam - WA</option>
			<option value="UQ">University of Qld</option>
			<option value="USA">University of South Australia</option>
			<option value="US">University of Sydney - NSW</option>
			<option value="UTS">University of Technology Sydney</option>
			<option value="UWA">University of Western Australia</option>
			<option value="UWS">University of Western Sydney- NSW</option>
			<option value="WAIT">Western Australian Institute of Technology</option>
			<option value="Other">Other</option>
		</select>
		<input type="text" class="form-control display-none" name="Undergraduate-university-name-other'.$i.'" id="Undergraduate-university-name-other'.$i.'">
	</div>
</div>
<div class="row">
	<div class="col-lg-4">
		<label for="Ugraduate-country'.$i.'">Country<span class="tipstyle">*</span></label>
		<select class="form-control" id="Ugraduate-country'.$i.'" name="Ugraduate-country'.$i.'">
';
 	$country = $sessionCountry;
	foreach($country  as $key => $object){
		echo '<option value="'.$country[$key]['Country'].'">'.$country[$key]['Country'].'</option>';
	}
echo '
</select>
		
	</div>
	<div class="col-lg-2">
		<label for="Ugraduate-yearattained'.$i.'">Year attained<span class="tipstyle">*</span></label>
		<select class="form-control" name="Ugraduate-yearattained'.$i.'" id="Ugraduate-yearattained'.$i.'">';
	
		$y = date("Y"); 
		for ($i=1940; $i<= $y; $i++){
		echo '<option value="'.$i.'">'.$i.'</option>';  
		}
		
		echo '</select>
	</div>
</div>
';
?>