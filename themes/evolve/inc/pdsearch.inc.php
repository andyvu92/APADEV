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
		<input type="text" name="Keywords" placeholder="Keyword">
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<label>Type of PD</label>
		<select  class="chosen-select" name="Typeofpd" id="Typeofpd" multiple data-placeholder="Type of PD">
			<option value="Course">Course</option>
			<option value="Lecture">Lecture</option>
			<option value="ProfessionalE">Professional interest event</option>
			<option value="Conference">Conference/tour</option> 
			<option value="Vclass">Virtual classroom</option>
		</select>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<label>National group</label>
		<select  class="chosen-select" name="Nationalgp" id="Nationalgp" multiple data-placeholder="National group">
		<?php
		//$_SESSION["testTTdad"]["NationalGroup"]
		foreach($details as $lines) {
			echo '<option value="'.$lines["NGid"].'"> '.$lines["NGtitle"].' </option>';
		}
		?>
		</select>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<label>Regional group</label>
		<select  class="chosen-select" name="Regionalgp" id="Regionalgp" multiple data-placeholder="Regional group">
			<option value="NSW-CC"> NSW - CENTRAL COAST  </option>
			<option value="NSW-CH"> NSW - COFFS HARBOUR  </option>
			<option value="NSW-CW"> NSW - CENTRAL WEST  </option>
			<option value="NSW-FN"> NSW - FAR NORTH COAST  </option>
			<option value="NSW-FS"> NSW - FAR SOUTH COAST </option>
			<option value="NSW-HU"> NSW - HUNTER  </option>
			<option value="NSW-IL">  NSW - ILLAWARRA  </option>
			<option value="NSW-MI"> NSW - MID NORTH COAST  </option>
			<option value="NSW-MU"> NSW - MURRAY AREA </option>
			<option value="NSW-NE"> NSW - NEW ENGLAND  </option>
			<option value="NSW-OR">  NSW - ORANA FAR WEST  </option>
			<option value="NSW-RI"> NSW - RIVERINA  </option>
			<option value="QLD-CE"> QLD - CENTRAL </option>
			<option value="QLD-FN"> QLD - FAR NORTH  </option>
			<option value="QLD-GC"> QLD - GOLD COAST  </option>
			<option value="QLD-MA"> QLD - MACKAY  </option>
			<option value="QLD-SC"> QLD - SUNSHINE COAST  </option>
			<option value="QLD-NO"> QLD - NORTH</option>
			<option value="QLD-SW"> QLD - SOUTH WEST  </option>
			<option value="QLD-WB"> QLD - WIDE BAY  </option>
			<option value="SA-RI"> SA - RIVERLAND  </option>
			<option value="SA-SE"> SA - SOUTH EAST </option>
			<option value="TAS-NO"> TAS - NORTHERN </option>
			<option value="TAS-NW"> TAS - NORTH WEST </option>
			<option value="VIC-BA"> VIC - BALLARAT   </option>
			<option value="VIC-CV"> VIC - CENTRAL VICTORIA   </option>
			<option value="VIC-GI"> VIC - GIPPLAND  </option>
			<option value="VIC-GE"> VIC - GEELONG  </option>
			<option value="VIC-MA"> VIC - MURRAY AREA  </option>
			<option value="VIC-NE"> VIC - NORTH EAST  </option>
			<option value="VIC-NW"> VIC - NORTH WEST </option>
			<option value="VIC-SW"> VIC - SOUTH WEST    </option>
			<option value="VIC-WI"> VIC - WIMMERA   </option>
			<option value="WA-CW"> WA - CENTRAL WHEATBELT  </option>
			<option value="WA-GO"> WA - GOLDFIELFS   </option>
			<option value="WA-GS"> WA - GREAT SOUTHERN   </option>
			<option value="WA-MW"> WA - MID WEST </option>
			<option value="WA-PI"> WA - PILBARRA/KIMBERLEY </option>
			<option value="WA-SW"> WA - SOUTH WEST   </option>
																																																
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
			<select  class="chosen-select" name="State" id="State" multiple data-placeholder="State">
				<option value="ACT">ACT</option>
				<option value="NSW">NSW</option>
				<option value="QLD">QLD</option>
				<option value="SA">SA</option> 
				<option value="TAS">TAS</option>
				<option value="NT">NT</option>
				<option value="VIC">VIC</option>
				<option value="WA">WA</option> 
			</select>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<label>Suburb/city</label>
			<input type="text" name="Suburb" placeholder="Suburb/city" style="margin-top:0px">
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
		<label>Start date</label>
		<input type="date" name="Begindate" placeholder="Begin date" required value="<?php echo date("Y-m-d");?>">
	</div>
	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
		<label>End date</label>
		<input type="date" name="Enddate" placeholder="End date">
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
		$('html,body').animate({ scrollTop: $(document).height() * 0.25 }, 1000);
	}
                    
});


</script>
<?php logRecorder(); ?>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>