<?php 

$i = $_POST['count'];
$sessionCountry = $_POST['sessionCountry'];
$sessionDegree = $_POST['sessionDegree'];
$sessionUniversity = $_POST['sessionUniversity'];
//$sessionWorkplaceSetting = json_decode($_POST['sessionWorkplaceSetting']);
//$sessioninterestAreas = json_decode($_POST['sessioninterestAreas']);
echo '<input type="hidden" name="ID'.$i.'" value="-1">
	<div class="col-xs-12 space-line"><div class="col-xs-12 separater"></div></div>

	<div class="row">
		<div class="col-xs-12 col-sm-12"> <label for="degree'.$i.'">Degree level<span class="tipstyle">*</span></label>
		<div class="chevron-select-box">	
		<select class="form-control" name="Udegree'.$i.'" id="Udegree'.$i.'">';
				echo '<option value="" selected disabled>Please select</option>';
				$degree = $sessionDegree;
						foreach($degree  as $key => $object){
					echo '<option value="'.$degree[$key]['ID'].'">'.$degree[$key]['Name'].'</option>';
				}
						echo '<option value="0">Other</option>
			</select>
			</div>
			<input type="text" class="form-control display-none" name="University-degree'.$i.'" id="University-degree'.$i.'">
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12 col-sm-12">
			<label for="Undergraduate-university-name'.$i.'">University name<span class="tipstyle">*</span></label>
			<div class="chevron-select-box">
			<select class="form-control" name="Undergraduate-university-name'.$i.'" id="Undergraduate-university-name'.$i.'">';
				echo '<option value="" selected disabled>Please select</option>';
				$University = $sessionUniversity;
				foreach($University  as $key => $object){
			echo '<option value="'.$University[$key]['ID'].'">'.$University[$key]['Name'].'</option>';
		}
				echo '<option value="0">Other</option>
			</select>
			</div>
			<input type="text" class="form-control display-none" name="Undergraduate-university-name-other'.$i.'" id="Undergraduate-university-name-other'.$i.'">
		</div>
	</div>

<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-6">
		<label for="Ugraduate-yearattained'.$i.'">Year attained or expected graduation date<span class="tipstyle">*</span></label>
		<div class="chevron-select-box">
		<select class="form-control" name="Ugraduate-yearattained'.$i.'" id="Ugraduate-yearattained'.$i.'">';
		echo '<option value="" selected disabled>Please select</option>';
		$y = date("Y") + 10; 
		for ($t=$y; $t>= 1940; $t--){
			echo '<option value="'.$t.'">'.$t.'</option>';  
		}
		echo '</select>
		</div>
	</div>

	<div class="col-xs-6 col-sm-6 col-md-6">
		<label for="Ugraduate-country'.$i.'">Country<span class="tipstyle">*</span></label>
		<div class="chevron-select-box">
		<select class="form-control" id="Ugraduate-country'.$i.'" name="Ugraduate-country'.$i.'">
			';
				$country = $sessionCountry;
				foreach($country  as $key => $object){
					echo '<option value="'.$country[$key]['ID'];
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

<div class="col-xs-12">
	<a class="callDeleteEdu" id="deleteEducation'.$i.'">
		Delete
	</a>
</div>
';
?>