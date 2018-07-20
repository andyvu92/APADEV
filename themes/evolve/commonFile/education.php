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
		<div class="col-xs-12 col-sm-6"> <label for="degree'.$i.'">Level of qualification<span class="tipstyle">*</span></label>
		<div class="chevron-select-box">	
		<select class="form-control" name="Udegree'.$i.'" id="Udegree'.$i.'">';
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
		<div class="col-xs-12 col-sm-6">
			<label for="Undergraduate-university-name'.$i.'">University name<span class="tipstyle">*</span></label>
			<div class="chevron-select-box">
			<select class="form-control" name="Undergraduate-university-name'.$i.'" id="Undergraduate-university-name'.$i.'">';
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
	<div class="col-xs-6 col-sm-3 col-md-3">
		<label for="Ugraduate-yearattained'.$i.'">Year attained<span class="tipstyle">*</span></label>
		<div class="chevron-select-box">
		<select class="form-control" name="Ugraduate-yearattained'.$i.'" id="Ugraduate-yearattained'.$i.'">';

		$y = date("Y") + 5; 
		for ($i=1940; $i<= $y; $i++){
		echo '<option value="'.$i.'">'.$i.'</option>';  
		}
		echo '</select>
		</div>
	</div>

	<div class="col-xs-6 col-sm-9 col-md-9">
		<label for="Ugraduate-country'.$i.'">Country<span class="tipstyle">*</span></label>
		<div class="chevron-select-box">
		<select class="form-control" id="Ugraduate-country'.$i.'" name="Ugraduate-country'.$i.'">
			';
				$country = $sessionCountry;
				foreach($country  as $key => $object){
					echo '<option value="'.$country[$key]['ID'].'">'.$country[$key]['Country'].'</option>';
					if($country[$key]['ID']=="14"){
						echo "selected='selected'";
					}
				}
			echo '
		</select>
		</div>
	</div>
</div>
';
?>