<span class="col-xs-12 col-sm-8 col-md-6 col-lg-5" id="pdSearch">
<?php
	// 2.2.19 - GET list of National Group
	// For this page, we are going to get NG list only. 
	// Not sending NGID here.
	// Send - 
	// Request, NGID(optional)
	// Response -
	// National Group ID, National Group title and National Group Price
	if(isset($_SESSION['UserID'])) {
		$sendData["UserID"] = $_SESSION['UserId'];
	} else {
		$sendData["UserID"] = "-1";
	}
	$details = GetAptifyData("19", $sendData);
	//print_r($details);
?>
<form action="pd-search?search-result" method="POST">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h2 class="light-lead-heading">Explore our Professional Development options below:</h2>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<label>Keyword</label>
		<input type="text" name="Keywords" placeholder="Keyword" <?php if(isset($_POST["Keywords"]) || isset($_GET["Keywords"])) { if(isset($_POST["Keywords"])) {echo "value='".$_POST["Keywords"]."'";} else {echo "value='".$_GET["Keywords"]."'";} } ?>>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<label>Type of PD</label>
		<select  class="chosen-select" name="Typeofpd" id="Typeofpd" multiple data-placeholder="Type of PD">
			<option value="Course" <?php if(isset($_POST["Typeofpd"]) && $_POST["Typeofpd"]=="Course") { echo "selected";} ?>>Course</option>
			<option value="Lecture" <?php if(isset($_POST["Typeofpd"]) && $_POST["Typeofpd"]=="Lecture") { echo "selected";} ?>>Lecture</option>
			<option value="ProfessionalE" <?php if(isset($_POST["Typeofpd"]) && $_POST["Typeofpd"]=="ProfessionalE") { echo "selected";} ?>>Professional interest event</option>
			<option value="Conference" <?php if(isset($_POST["Typeofpd"]) && $_POST["Typeofpd"]=="Conference") { echo "selected";} ?>>Conference/tour</option> 
			<option value="Vclass" <?php if(isset($_POST["Typeofpd"]) && $_POST["Typeofpd"]=="Vclass") { echo "selected";} ?>>Virtual classroom</option>
		</select>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<label>National group</label>
		<select  class="chosen-select" name="Nationalgp" id="Nationalgp" multiple data-placeholder="National group">
		<?php
		//$_SESSION["testTTdad"]["NationalGroup"]
		foreach($details as $lines) {
			$vals = '';
			if((isset($_POST["Nationalgp"])  || isset($_GET["Nationalgp"])) && ($_GET["Nationalgp"]==$lines["NGid"] || $_POST["Nationalgp"]==$lines["NGid"])) { $vals = "selected";}
			echo '<option value="'.$lines["NGid"].'" '.$vals.'> '.$lines["NGtitle"].' </option>';
		}
		?>
		</select>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<label>Regional group</label>
		<select  class="chosen-select" name="Regionalgp" id="Regionalgp" multiple data-placeholder="Regional group">
			<option value="NSW-CC" <?php if(isset($_POST["Regionalgp"]) && $_POST["Regionalgp"]=="NSW-CC") { echo "selected";} ?>> NSW - CENTRAL COAST  </option>
			<option value="NSW-CH" <?php if(isset($_POST["Regionalgp"]) && $_POST["Regionalgp"]=="NSW-CH") { echo "selected";} ?>> NSW - COFFS HARBOUR  </option>
			<option value="NSW-CW" <?php if(isset($_POST["Regionalgp"]) && $_POST["Regionalgp"]=="NSW-CW") { echo "selected";} ?>> NSW - CENTRAL WEST  </option>
			<option value="NSW-FN" <?php if(isset($_POST["Regionalgp"]) && $_POST["Regionalgp"]=="NSW-FN") { echo "selected";} ?>> NSW - FAR NORTH COAST  </option>
			<option value="NSW-FS" <?php if(isset($_POST["Regionalgp"]) && $_POST["Regionalgp"]=="NSW-FS") { echo "selected";} ?>> NSW - FAR SOUTH COAST </option>
			<option value="NSW-HU" <?php if(isset($_POST["Regionalgp"]) && $_POST["Regionalgp"]=="NSW-HU") { echo "selected";} ?>> NSW - HUNTER  </option>
			<option value="NSW-IL" <?php if(isset($_POST["Regionalgp"]) && $_POST["Regionalgp"]=="NSW-IL") { echo "selected";} ?>>  NSW - ILLAWARRA  </option>
			<option value="NSW-MI" <?php if(isset($_POST["Regionalgp"]) && $_POST["Regionalgp"]=="NSW-MI") { echo "selected";} ?>> NSW - MID NORTH COAST  </option>
			<option value="NSW-MU" <?php if(isset($_POST["Regionalgp"]) && $_POST["Regionalgp"]=="NSW-MU") { echo "selected";} ?>> NSW - MURRAY AREA </option>
			<option value="NSW-NE" <?php if(isset($_POST["Regionalgp"]) && $_POST["Regionalgp"]=="NSW-NE") { echo "selected";} ?>> NSW - NEW ENGLAND  </option>
			<option value="NSW-OR" <?php if(isset($_POST["Regionalgp"]) && $_POST["Regionalgp"]=="NSW-OR") { echo "selected";} ?>>  NSW - ORANA FAR WEST  </option>
			<option value="NSW-RI" <?php if(isset($_POST["Regionalgp"]) && $_POST["Regionalgp"]=="NSW-RI") { echo "selected";} ?>> NSW - RIVERINA  </option>
			<option value="QLD-CE" <?php if(isset($_POST["Regionalgp"]) && $_POST["Regionalgp"]=="QLD-CE") { echo "selected";} ?>> QLD - CENTRAL </option>
			<option value="QLD-FN" <?php if(isset($_POST["Regionalgp"]) && $_POST["Regionalgp"]=="QLD-FN") { echo "selected";} ?>> QLD - FAR NORTH  </option>
			<option value="QLD-GC" <?php if(isset($_POST["Regionalgp"]) && $_POST["Regionalgp"]=="QLD-GC") { echo "selected";} ?>> QLD - GOLD COAST  </option>
			<option value="QLD-MA" <?php if(isset($_POST["Regionalgp"]) && $_POST["Regionalgp"]=="QLD-MA") { echo "selected";} ?>> QLD - MACKAY  </option>
			<option value="QLD-SC" <?php if(isset($_POST["Regionalgp"]) && $_POST["Regionalgp"]=="QLD-SC") { echo "selected";} ?>> QLD - SUNSHINE COAST  </option>
			<option value="QLD-NO" <?php if(isset($_POST["Regionalgp"]) && $_POST["Regionalgp"]=="QLD-NO") { echo "selected";} ?>> QLD - NORTH</option>
			<option value="QLD-SW" <?php if(isset($_POST["Regionalgp"]) && $_POST["Regionalgp"]=="QLD-SW") { echo "selected";} ?>> QLD - SOUTH WEST  </option>
			<option value="QLD-WB" <?php if(isset($_POST["Regionalgp"]) && $_POST["Regionalgp"]=="QLD-WB") { echo "selected";} ?>> QLD - WIDE BAY  </option>
			<option value="SA-RI" <?php if(isset($_POST["Regionalgp"]) && $_POST["Regionalgp"]=="SA-RI") { echo "selected";} ?>> SA - RIVERLAND  </option>
			<option value="SA-SE" <?php if(isset($_POST["Regionalgp"]) && $_POST["Regionalgp"]=="SA-SE") { echo "selected";} ?>> SA - SOUTH EAST </option>
			<option value="TAS-NO" <?php if(isset($_POST["Regionalgp"]) && $_POST["Regionalgp"]=="TAS-NO") { echo "selected";} ?>> TAS - NORTHERN </option>
			<option value="TAS-NW" <?php if(isset($_POST["Regionalgp"]) && $_POST["Regionalgp"]=="TAS-NW") { echo "selected";} ?>> TAS - NORTH WEST </option>
			<option value="VIC-BA" <?php if(isset($_POST["Regionalgp"]) && $_POST["Regionalgp"]=="VIC-BA") { echo "selected";} ?>> VIC - BALLARAT   </option>
			<option value="VIC-CV" <?php if(isset($_POST["Regionalgp"]) && $_POST["Regionalgp"]=="VIC-CV") { echo "selected";} ?>> VIC - CENTRAL VICTORIA   </option>
			<option value="VIC-GI" <?php if(isset($_POST["Regionalgp"]) && $_POST["Regionalgp"]=="VIC-GI") { echo "selected";} ?>> VIC - GIPPLAND  </option>
			<option value="VIC-GE" <?php if(isset($_POST["Regionalgp"]) && $_POST["Regionalgp"]=="VIC-GE") { echo "selected";} ?>> VIC - GEELONG  </option>
			<option value="VIC-MA" <?php if(isset($_POST["Regionalgp"]) && $_POST["Regionalgp"]=="VIC-MA") { echo "selected";} ?>> VIC - MURRAY AREA  </option>
			<option value="VIC-NE" <?php if(isset($_POST["Regionalgp"]) && $_POST["Regionalgp"]=="VIC-NE") { echo "selected";} ?>> VIC - NORTH EAST  </option>
			<option value="VIC-NW" <?php if(isset($_POST["Regionalgp"]) && $_POST["Regionalgp"]=="VIC-NW") { echo "selected";} ?>> VIC - NORTH WEST </option>
			<option value="VIC-SW" <?php if(isset($_POST["Regionalgp"]) && $_POST["Regionalgp"]=="VIC-SW") { echo "selected";} ?>> VIC - SOUTH WEST    </option>
			<option value="VIC-WI" <?php if(isset($_POST["Regionalgp"]) && $_POST["Regionalgp"]=="VIC-WI") { echo "selected";} ?>> VIC - WIMMERA   </option>
			<option value="WA-CW" <?php if(isset($_POST["Regionalgp"]) && $_POST["Regionalgp"]=="WA-CW") { echo "selected";} ?>> WA - CENTRAL WHEATBELT  </option>
			<option value="WA-GO" <?php if(isset($_POST["Regionalgp"]) && $_POST["Regionalgp"]=="WA-GO") { echo "selected";} ?>> WA - GOLDFIELFS   </option>
			<option value="WA-GS" <?php if(isset($_POST["Regionalgp"]) && $_POST["Regionalgp"]=="WA-GS") { echo "selected";} ?>> WA - GREAT SOUTHERN   </option>
			<option value="WA-MW" <?php if(isset($_POST["Regionalgp"]) && $_POST["Regionalgp"]=="WA-MW") { echo "selected";} ?>> WA - MID WEST </option>
			<option value="WA-PI" <?php if(isset($_POST["Regionalgp"]) && $_POST["Regionalgp"]=="WA-PI") { echo "selected";} ?>> WA - PILBARRA/KIMBERLEY </option>
			<option value="WA-SW" <?php if(isset($_POST["Regionalgp"]) && $_POST["Regionalgp"]=="WA-SW") { echo "selected";} ?>> WA - SOUTH WEST   </option>
																																																
		</select>
	</div>
	<div class="locationAutomatic">
		<div class="UseLocation"><img style="float: left; margin-left: 15px;" src="/sites/all/themes/evolve/lessc/YOUAREHERE_25x25.png"><span>Use current location</span></div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<input id="lat" type="hidden" name="lat" value="-37.81361100000001" style="display: none;" hidden="">
			<input id="lng" type="hidden" name="lng" value="144.96305600000005" hidden="" style="display: none;">
		</div>
	</div>
	<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".locationAutomatic").click(function() {
			if($(".locationAutomatic").hasClass("locationAutomaticHov")) {
				$(".locationAutomatic").removeClass("locationAutomaticHov");
				$(".locationManual").removeClass("locationManualHov");
				$("#lat").val("-37.813611");
				$("#lng").val("144.963056");
			} else {
				$(".locationAutomatic").addClass("locationAutomaticHov");
				$(".locationManual").addClass("locationManualHov");
				$("#lat").val("-37.848038");
				$("#lng").val("145.078698");
			}
		});
	});
	</script>
	<div class="locationManual">
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<label>State</label>
			<select class="chosen-select" name="State" id="State" multiple data-placeholder="State" id="State">
				<?php 
				$statecode  = file_get_contents("sites/all/themes/evolve/json/State.json");
				$State=json_decode($statecode, true);
				$t = 0;
				foreach($State  as $key => $value){
				echo '<option class="StateOption'.$State[$key]['CountryID'].'" value="'.$State[$key]['Abbreviation'].'"';
				if ((isset($_POST["State"]) || isset($_GET["State"])) && ($_GET["State"]==$State[$key]['Abbreviation'] || $_POST["State"]==$State[$key]['Abbreviation'])){ echo "selected='selected'"; } 
				echo '> '.$State[$key]['Abbreviation'].' </option>';
			
				}
				?>
			</select>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<label>Suburb/city</label>
			<input type="text" name="Suburb" placeholder="Suburb/city" style="margin-top:0px"<?php if(isset($_POST["Suburb"])  || isset($_GET["Suburb"])) { if(isset($_POST["Suburb"])) {echo "value='".$_POST["Suburb"]."'";} else {echo "value='".$_GET["Suburb"]."'";} } ?>>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
		<label>Start date</label>
		<input type="date" name="BeginDate" placeholder="Begin date" required <?php if(isset($_POST["BeginDate"]) || isset($_GET["BeginDate"])) { if(isset($_POST["BeginDate"])) {echo "value='".$_POST["BeginDate"]."'";} else {echo "value='".str_replace("/","-",$_GET["BeginDate"])."'";} } else {echo "value='".date("Y-m-d")."'";} ?>>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
		<label>End date</label>
		<input type="date" name="EndDate" placeholder="End date"<?php if(isset($_POST["EndDate"]) || isset($_GET["EndDate"])) { if(isset($_POST["EndDate"])) {echo "value='".$_POST["EndDate"]."'";} else {echo "value='".str_replace("/","-",$_GET["EndDate"])."'";} } ?>>
	</div>
	<div class="col-xs-12">
		<span>Please note: For online learning visit <a href="https://cpd4physios.com.au/" target="_blank"><strong>cpd4physios</strong></a></span>
	</div>

	<div class="row">
		<div class="col-xs-12 col-md-5">
			<span class="small-text"><a target="_blank">Terms and conditions</a></span>
			<span class="small-text"><a target="_blank">Frequently asked questions</a></span>
			<span class="small-text"><a target="_blank">Event registeration form</a></span>
		</div>
		<div class="col-xs-12 col-md-7 searchds align-right">
			<button class="accent-btn your-details-submit pdSearchButton" type="submit"><i class="fa fa-search"></i> Search now</button>
		</div>
	</div>
</form>
</div>
<?php logRecorder(); ?>
 <script type="text/javascript">
	  jQuery(document).ready(function($) {
		   $(".chosen-select").chosen({width: "100%"});
	  if(!(window.location.href.indexOf("?search-result") > -1)) 
	{  
		$("#block-block-241").addClass("display-none");
		$("#section-parallax-first").addClass("display-none");
		}
		   $(".pdSearchButton").click(function(){
	   
			if(!(window.location.href.indexOf("?search-result") > -1)){
			window.location.hash = '?search-result';
			}
	   });
  
	if(window.location.href.indexOf("?page") > -1||window.location.href.indexOf("?pagesize") > -1 || window.location.href.indexOf("?search-result") > -1){
		$("#block-block-241").removeClass("display-none");
		$("#block-block-241").addClass("display");
		$("#section-parallax-first").removeClass("display-none");
		$("#section-parallax-first").addClass("display");
		$('html').animate({ scrollTop: $('#section-content-top').offset().top  - $('#section-header').height() }, 1000);

		$('body').animate({scrollTop: 600 }, 400);

	}
});

   	jQuery(document).ready(function($) {
		
	});

</script>
<?php logRecorder(); ?>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>