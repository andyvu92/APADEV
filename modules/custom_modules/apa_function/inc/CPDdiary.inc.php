<?php if(isset($_SESSION['UserId'])):?>
<?php  if($_SESSION['MemberTypeID']!="1"): ?>

<?php 
//include('sites/all/themes/evolve/commonFile/updateBackgroundImage.php');

/* get background image****/
if(isset($_SESSION['UserId'])) { $userID = $_SESSION['UserId'];} else { $userID =0; }
$background = getBackgroundImage($userID);
/* get background image****/

if(isset($_POST["nonAPA"])) {
	// 2.2.34 - INSERT CPD diary
	// Send - 
	// UserID, Description, Date, Time, Provider, Reflection
	// Response -
	// response
	$CPDsend = Array();
	// Values need keys associated
	$CPDsend["userID"] = $_SESSION["UserId"];
	$CPDsend["Date"] = $_POST["Date"];
	$CPDsend["Description"] = $_POST["Description"];
	$CPDsend["Time"] = $_POST["Time"];
	$CPDsend["Provider"] = $_POST["Provider"];
	$CPDsend["Reflection"] = $_POST["Reflection"];
	// send and get response
	$resultst = GetAptifyData("34", $CPDsend);
	//print_r($resultst);
	if($resultst == "type of value") {// to be used later
		// to do
	} else {
		// to do
	}
	// this should be executed before load the data.
}

// 2.2.33 - GET CPD diary
// Send - 
// UserID
// Response -
// PD_id, NPD_id, CPD hours, PD title, PD date, CPD points
// Description, Date, Time, Provider, Reflection
$results = GetAptifyData("33", $_SESSION["UserId"]);
//print_r($results);
$totalNum = sizeof($results);
$CPDHousrs = $results["CurrentCPDHour"];
$APA = array();
$NAPA = array();

foreach($results["NONAPA"] as $t) {
	array_push($NAPA, $t);
}
foreach($results["APA"] as $t) {
	array_push($APA, $t);
}
if(isset($_POST["NONAPA"])) {
	// 2.2.38 - GET NON-APA CPD point's PDF
	// Send - 
	// UserID
	// Response -
	// PDF file of NON-CPD hours
	$NCPDPDF = GetAptifyData("38", "UserID");//$_SESSON["UserID"]
	// todo!
}
$DiaryAll = Array();
?>

<div id="CPD-diary-main">
<div class="container">
<div class="row">
<div class="region region-content col-xs-12 col-sm-12 col-md-12 col-lg-12">
<h1 class="SectionHeader">Your CPD diary</h1>


<div class="Tabs1"><a>APA hours</a></div>
<div class="Tabs2"><a>Non-APA hours</a></div>
<div class="Tabs3"><a>All hours</a></div>
<div class='lineBreak'>&nbsp;</div>
<div class="TabContents1">
	<div class="APAhours">
		<div class="APAhoursHead flex-cell flex-flow-row heading-row">
			<div class="flex-col-5 table-heading">Completed PD</div><div class="flex-col-2 table-heading">Date</div><div class="flex-col-2 table-heading">Hours</div><div class="flex-col-3 table-heading">Provider</div>
		</div>
		<div class="APAhoursContent">
		<?php
			if(sizeof($APA) > 0) {
				function date_sortA($a, $b) {
					$c = strtotime($b["Date"]) - strtotime($a["Date"]);
					$c .= strcmp($b["Title"], $a["Title"]);
					return $c;
				}
				usort($APA, "date_sortA");
				foreach($APA as $rowData) {
					echo "<div class='flex-cell flex-flow-row'>";
					$date = date("d/m/Y", strtotime($rowData["Date"]));
					echo "<div style='display: none;'>".$rowData["Id"]."</div><div class='flex-col-5'><b>".$rowData["Title"]."&nbsp;</b></div><div class='flex-col-2'>".$date."</div><div class='flex-col-2'>".$rowData["Hours"]."</div>";
					echo "<div class='flex-col-3'>Australian Physiotherapy Association</div><div class='lineBreak'>&nbsp;</div>";
					echo "</div>";
					$arrT["ID"] = $rowData["Id"];
					$arrT["Description"] = $rowData["Title"];
					$arrT["Date"] = $rowData["Date"];
					$arrT["Hours"] = $rowData["Hours"];
					$arrT["Provider"] = "Australian Physiotherapy Association";
					$arrT["Reflection"] = "";
					array_push($DiaryAll, $arrT);
				}
			} else {
				echo "<div style='display: none;'>&nbsp;</div><div>No PD information found.</div><div>&nbsp;</div><div>0</div>";
			}
		?> 
		</div>
	</div>
</div>

<div class="TabContents2" style="display: none;">
<!--strong><a href="http://www.physiotherapyboard.gov.au/documents/default.aspx?record=WD15%2f18489&dbid=AP&chksum=ewqLtzOm4m%2fsRUrlGCmo1A%3d%3d">This is based on Physiotherapy Board of Australia's Continuing professional development form.</a></strong-->
<div class="NAPAhours">
  <div class="NAPAhoursHead flex-cell flex-flow-row heading-row">
    <div class="flex-col-4 table-heading ">Description</div><div class="flex-col-1 table-heading ">Date</div><div class="flex-col-1 table-heading ">Hours</div><div class="flex-col-2 table-heading ">Provider</div><div class="flex-col-4 table-heading ">Reflection</div>
  </div>
  <div class="NAPAhoursContent">
    <?php
	if(sizeof($NAPA) > 0) {
		function date_sort($a, $b) {
			$c = strtotime($b["Date"]) - strtotime($a["Date"]);
			$c .= strcmp($b["Description"], $a["Description"]);
			return $c;
		}
		usort($NAPA, "date_sort");
		foreach($NAPA as $rowData) {
			echo "<div class='flex-cell flex-flow-row'>";
			$date = date("d/m/Y", strtotime($rowData["Date"]));
			echo "<div style='display: none;'>".$rowData["NPDid"]."</div><div class='flex-col-4'><b>".$rowData["Description"]."</b></div><div class='flex-col-1'>".$date."</div><div class='flex-col-1'>".$rowData["Time"]."</div><div class='flex-col-2'>".$rowData["Provider"]."</div><div class='flex-col-4'>".$rowData["Reflection"]."</div>";
			echo "<div class='lineBreak'>&nbsp;</div>";
			echo "</div>";
			$arrT["ID"] = $rowData["NPDid"];
			$arrT["Description"] = $rowData["Description"];
			$arrT["Date"] = $rowData["Date"];
			$arrT["Hours"] = $rowData["Time"];
			$arrT["Provider"] = $rowData["Provider"];
			$arrT["Reflection"] = $rowData["Reflection"];
			array_push($DiaryAll, $arrT);
		}
	}else {
		echo "<div style='display: none;'>&nbsp;</div><div>&nbsp;</div><div>No PD information was found.</div><div>0</div><div>&nbsp;</div><div>&nbsp;</div>";
	}
    ?> 
  </div>
</div>
<button class="Non-APA-hour" data-toggle="modal" data-target="#nonAPAhour"><span>Add non-APA hours</span></button><br />
<form action="/pd/cpd-diary" method="POST">
</form>
</div>
<div class="TabContents3" style="display: none;">
	<div class="NAPAhours">
	<div class="NAPAhoursHead flex-cell flex-flow-row heading-row">
		<div class="flex-col-4 table-heading ">Description</div><div class="flex-col-1 table-heading ">Date</div><div class="flex-col-1 table-heading ">Hours</div><div class="flex-col-2 table-heading ">Provider</div><div class="flex-col-4 table-heading ">Reflection</div>
	</div>
	<div class="NAPAhoursContent">
		<?php
		if(sizeof($DiaryAll) > 0) {
			usort($DiaryAll, "date_sort");
			foreach($DiaryAll as $rowData) {
				$date = date("d/m/Y", strtotime($rowData["Date"]));
				echo "<div class='flex-cell flex-flow-row'>";
				echo "<div style='display: none;'>".$rowData["ID"]."</div><div class='flex-col-4'><b>".$rowData["Description"]."</b></div><div class='flex-col-1'>".$date."</div><div class='flex-col-1'>".$rowData["Hours"]."</div><div class='flex-col-2'>".$rowData["Provider"]."</div><div class='flex-col-4'>".$rowData["Reflection"]."</div>";
				echo "<div class='lineBreak'>&nbsp;</div>";
				echo "</div>";
			}
		}else {
			echo "<div style='display: none;'>&nbsp;</div><div>&nbsp;</div><div>No PD information was found.</div><div>0</div><div>&nbsp;</div><div>&nbsp;</div>";
		}
		?> 
	</div>
	</div>
</div>

</div>
</div></div>
<!--div class="container"-->
<!-- Modal -->
<div id="nonAPAhour" class="modal fade" role="dialog">
	<div class="modal-dialog" <!--style="overflow-y: scroll; max-height:85%;  margin-top: 50px; margin-bottom:50px;"-->>

	<!-- Modal content-->
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Please enter non-APA PD activity details</h4>
		</div>
		<form name="formradio" action="cpd-diary" method="POST">
		<div class="modal-body">
			<input type="hidden" name="nonAPA" value="1" placeholder="" id="hidden">
			<div class="col-lg-12">
			<label for="DescripotionNA">Description</label>
			<input type="text" required="true" name="Description" placeholder="" id="Description">
			</div><div class="col-lg-12">
			<label for="DateNA">Date</label>
			<input type="date" required="true" name="Date" placeholder="" id="DateNA">
			</div><div class="col-lg-12">
			<label for="TimeNA">Time</label>
			<input type="number" required="true" name="Time" placeholder="" id="TimeNA">
			</div><div class="col-lg-12">
			<label for="ProviderNA">Provider</label>
			<input type="text" required="true" name="Provider" placeholder="" id="ProviderNA">
			</div><div class="col-lg-12">
			<label for="ReflectionNA">Reflection</label>
			<input type="text" required="true" name="Reflection" placeholder="" id="ReflectionNA">
			</div>
		</div>
		<div class="modal-footer">
			<button type="Submit" class="btn btn-default" id="saveNA">Save</button>
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
		</form>
	</div>

	</div>
</div>
<!--/div-->
<?php logRecorder(); ?>
<?php endif;?>
<?php endif;?>

<?php
// 2.2.2 - GET Membership certification PDF
// Send - 
// UserID
// Response -
// Membership certificate PDF
//echo "<iframe name='YInkFroamame' src='http://www.physiotherapy.asn.au'></iframe>";
// $Certi = GetAptifyData("38", $_SESSION['LinkId']);
//echo "<iframe id="YInkFroamame" srcdoc='".$MemberCerti."'></iframe>";
//echo "<iframe src='".$MemberCerti."'></iframe>";
//echo "<iframe src='https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/Authentication/Login/DomainWithContainer?UserName=aptifyuser&Password=!@-auser-Apatest1-2468' style='display: none;'></iframe>";
//echo "<iframe src='https://apaaptifywebuat.aptify.com/AptifyServicesAPI/forms/CrystalReportView.aspx?ViewMode=entityRecord&amp;ViewEntityName=Persons&amp;ReportId=151&amp;EntityRecordID=55280'width='900' height='900'></iframe>";
//echo "<a href='https://apaaptifywebuat.aptify.com/AptifyServicesAPI/forms/CrystalReportView.aspx?ViewMode=entityRecord&ViewEntityName=Persons&ReportId=151&EntityRecordID=".$_SESSION['LinkId']."'>ttttt</a>";
?>
<?php 
/*
<input type="submit" class="Non-APA-hour" name="NONAPA" id="NONAPA" value="Download NON-APA PDF">
<button type="button" class="btn btn-info btn-lg Non-APA-hour" data-toggle="modal" data-target="#NonCPDPDF"><span style="text-decoration: underline; color:white;">Download NON-APA PDF</span></button>
*/
?>
<?php /*
<div id="NonCPDPDF" class="modal fade big-screen" role="dialog">
	<div class="modal-dialog">

	<!-- Modal content-->
	<div class="modal-content">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		</div>
		<div class="modal-body">
		<iframe name='NonCPDPDF' src='http://www.physiotherapy.asn.au'></iframe>
		</div>
		<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</div>

	</div>
</div>
<script>
$(document).ready(function() {
	if (window.frames['NonCPDPDF'] && !window.userSet){
		window.userSet = true;
		frames['NonCPDPDF'].location.href='<?php echo $Certi; ?>';
	}
});
</script>
*/
?>
<?php
/*
echo "Result: <br />";
echo $results;
echo "<br /><br />Result var dump: <br />";
var_dump($results);
echo "<br /><br />cpdhours: ".$CPDHousrs;
echo "<br /><br />apa <br />";
print_r($APA);
echo "<br /><br />nonpap <br />";
print_r($NAPA);



<script type="text/javascript">
	function changeStatus(number){
		document.formradio.background[number].checked=true;
	}

	function myFunction() {
		var background_number =document.formradio.background.value;
		var pre_bg =  document.getElementById('pre_background').innerHTML;
		document.getElementById("CPD-diary-main").classList.remove(pre_bg);
		var cur_bg = 'background_' +background_number;
		document.getElementById("CPD-diary-main").classList.add(cur_bg);
		document.getElementById('pre_background').innerHTML = 'background_' + background_number; 
}
</script>

<div id="pre_background" style="display:none">background_2</div>
<div id="CPD-diary-main" class="background_<?php echo $background; ?>">
<div class="container">
<button class="dashboard-backgroud" data-toggle="modal" data-target="#myModal"><span class="customise_background" >Customise your background</span><span class="customise_icon">[icon class="fa fa-cogs fa-x"][/icon]</span></button>
</div>
<div class="container">
    <!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog" style="overflow-y: scroll; max-height:85%;  margin-top: 50px; margin-bottom:50px;">
		<!-- Modal content-->
		<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Please select background image</h4>
		</div>
		<div class="modal-body">
			<form name="formradio" action="cpd-diary" method="POST">
			<input type="hidden" name="userID" value="<?php echo $userID; ?>"> 
			<input type="hidden" name="update">  
			<label> <input type="radio" name="background" value="1" id="background1"><img src="/sites/default/files/PARALLAX_TRADIES.jpg"></label>
			<label> <input type="radio" name="background" value="2"  id="background2"><img src="/sites/default/files/ABOUT%20US/ABOUTUS1170X600.jpg"></label>
			<label> <input type="radio" name="background" value="3"  id="background3"><img src="/sites/default/files/NG_1200X600_RURAL.png"></label>
			<label> <input type="radio" name="background" value="4"  id="background4"><img src="/sites/default/files/MEDIA1170X600_5.jpg"></label>
		</div>
		<div class="modal-footer">
			<button type="Submit" class="btn btn-default" id="background_save">Save</button>
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
		</form>
		</div>
	</div>
	</div>

	<div id="myProgress">
	<div id="currentProgress">0 hours currently</div>

	<div id="ProgressCPDback">
		<span class="front fa fa-circle"></span>
		<span class="back fa fa-circle"></span>
	</div>
	<div id="myBar">10%</div>

	<div id="MaxHours">
	<div class="trophy"><i class="fa fa-trophy fa-2x"></i></div>

	<div class="MaxHours">20 hours minimum</div>
	</div>
	</div>
</div>

<form><input id="inputProgress" type="text" /> <input id="buttonProgress" type="button" value="Click Me" />&nbsp;</form>
</div>

<div class='lineBreak' style="height: 40px;">&nbsp;</div>

<script>
  jQuery(document).ready(function($) {
	$('#buttonProgress').click(function() {
      var thiseee = $('#inputProgress').val();
		move(thiseee);
	});
  });
</script><script>

document.onload = move(<?php echo $CPDHousrs; ?>);
function move(input) {
  var elem = document.getElementById("myBar");
  var pointy = document.getElementById("currentProgress");
  var totalWidth = document.getElementById("myProgress").offsetWidth;
  var maxHour = document.getElementById("MaxHours");
  var width = 0;
  var CurrentHrs = 0;
  var termMax = 20;
  var id = setInterval(frame, 10);
  function frame() {
    if (width > 100) { // to stop the progress bar
      clearInterval(id);
    } else if(CurrentHrs >= termMax) { // when exceeded the limit
    	elem.style.width = width+'%';
        elem.innerHTML = CurrentHrs+'/'+termMax;
        pointy.style.marginLeft = (totalWidth - 37)+ 'px';
        currentProgress.innerHTML = CurrentHrs + ' hours currently';
        width++;
        if(CurrentHrs < input) {
        	CurrentHrs++;
        }
    } else { // in progress
      if(input <= termMax) {
      	CurrentHrs = 0.25 + CurrentHrs;
      	width = Math.floor(CurrentHrs/termMax * 100);
      	elem.style.width = width + '%';
      	elem.innerHTML = width + '%';
      	pointy.style.marginLeft = ((totalWidth * width / 100) - 36) + 'px';
      	currentProgress.innerHTML = Math.floor(CurrentHrs) + ' hours currently';
        maxHour.style.paddingLeft = totalWidth+'px';
        if(CurrentHrs >= input) clearInterval(id);
      } else {
      	CurrentHrs++;
      	width++;
      	elem.style.width = width + '%';
      	elem.innerHTML = width * 1  + '%';
      	pointy.style.marginLeft = ((width * 4)/5) + '%';
      	currentProgress.innerHTML = CurrentHrs + ' hours currently';
        maxHour.style.paddingLeft = (width/input*100) + '%';
      }
    }
  }
}
</script>

*/
?>