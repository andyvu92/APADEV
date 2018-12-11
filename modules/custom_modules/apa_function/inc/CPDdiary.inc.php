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
	$resultst = aptify_get_GetAptifyData("34", $CPDsend);
	print_r($resultst);
	if($resultst["Status"] == "Success") {
		header("Location: /pd/cpd-diary");
		exit;
	} else {
		echo "error!";
	}
	// this should be executed before load the data.
}

// 2.2.33 - GET CPD diary
// Send - 
// UserID
// Response -
// PD_id, NPD_id, CPD hours, PD title, PD date, CPD points
// Description, Date, Time, Provider, Reflection
$results = aptify_get_GetAptifyData("33", $_SESSION["UserId"]);
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
	//$NCPDPDF = aptify_get_GetAptifyData("38", "UserID");//$_SESSON["UserID"]
	// todo!
}
$DiaryAll = Array();

function date_sort($a, $b) {
	$c = strtotime($b["Date"]) - strtotime($a["Date"]);
	$c .= strcmp($b["Description"], $a["Description"]);
	return $c;
}
?>

<div id="CPD-diary-main">
<div class="container">
<div class="row">
<div class="region region-content col-xs-12 col-sm-12 col-md-12 col-lg-12">
<h2 class="lead-heading">Your CPD diary</h2>


<div class="Tabs1 active"><a>APA hours</a></div>
<div class="Tabs2"><a>Non-APA hours</a></div>
<div class="Tabs3"><a>All hours</a></div>
<div class='lineBreak'>&nbsp;</div>
<div class="TabContents1">
	<div class="APAhours">
		<div class="APAhoursHead flex-cell flex-flow-row heading-row">
			<div class="flex-col-5 table-heading">Completed PD</div><div class="flex-col-1 table-heading date">Date</div><div class="flex-col-2 table-heading hours">Hours</div><div class="flex-col-3 table-heading">Provider</div>
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
					echo "<div style='display: none;'>".$rowData["Id"]."</div><div class='flex-col-5'><span class='mobile-header'>Completed PD</span><b>".$rowData["Title"]."&nbsp;</b></div><div class='flex-col-1 date'><span class='mobile-header'>Date</span>".$date."</div><div class='flex-col-2 hours'><span class='mobile-header'>Hours</span>".$rowData["Hours"]."</div>";
					echo "<div class='flex-col-3'><span class='mobile-header'>Provider</span>Australian Physiotherapy Association</div><div class='lineBreak'>&nbsp;</div>";
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
    <div class="flex-col-4 table-heading ">Description</div><div class="flex-col-1 table-heading date">Date</div><div class="flex-col-1 table-heading hours">Hours</div><div class="flex-col-2 table-heading ">Provider</div><div class="flex-col-4 table-heading reflection">Reflection</div>
  </div>
  <div class="NAPAhoursContent">
    <?php
	if(sizeof($NAPA) > 0) {
		usort($NAPA, "date_sort");
		foreach($NAPA as $rowData) {
			echo "<div class='flex-cell flex-flow-row'>";
			$date = date("d/m/Y", strtotime($rowData["Date"]));
			echo "<div style='display: none;'>".$rowData["NPDid"]."</div><div class='flex-col-4'><b><span class='mobile-header'>Description</span>".$rowData["Description"]."</b></div><div class='flex-col-1 date'><span class='mobile-header'>Date</span>".$date."</div><div class='flex-col-1 hours'><span class='mobile-header'>Hours</span>".$rowData["Time"]."</div><div class='flex-col-2'><span class='mobile-header'>Provider</span>".$rowData["Provider"]."</div><div class='flex-col-4 reflection'><span class='mobile-header'>Reflection</span>".$rowData["Reflection"]."</div>";
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
<button class="Non-APA-hour accent-btn" data-toggle="modal" data-target="#nonAPAhour"><span>Add non-APA hours</span></button><br />
</div>
<div class="TabContents3" style="display: none;">
	<div class="NAPAhours">
	<div class="NAPAhoursHead flex-cell flex-flow-row heading-row">
		<div class="flex-col-4 table-heading ">Description</div><div class="flex-col-1 table-heading date">Date</div><div class="flex-col-1 table-heading hours">Hours</div><div class="flex-col-2 table-heading ">Provider</div><div class="flex-col-4 table-heading reflection">Reflection</div>
	</div>
	<div class="NAPAhoursContent">
		<?php
		if(sizeof($DiaryAll) > 0) {
			usort($DiaryAll, "date_sort");
			foreach($DiaryAll as $rowData) {
				$date = date("d/m/Y", strtotime($rowData["Date"]));
				echo "<div class='flex-cell flex-flow-row'>";
				echo "<div style='display: none;'>".$rowData["ID"]."</div><div class='flex-col-4'><b><span class='mobile-header'>Description</span>".$rowData["Description"]."</b></div><div class='flex-col-1 date'><span class='mobile-header'>Date</span>".$date."</div><div class='flex-col-1 hours'><span class='mobile-header'>Hours</span>".$rowData["Hours"]."</div><div class='flex-col-2'><span class='mobile-header'>Provider</span>".$rowData["Provider"]."</div><div class='flex-col-4 reflection'><span class='mobile-header'>Reflection</span>".$rowData["Reflection"]."</div>";
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
	<div class="modal-dialog">

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
			<input class="form-control" type="text" required="true" name="Description" placeholder="" id="Description">
			</div><div class="col-lg-12">
			<label for="DateNA">Date</label>
			<input class="form-control" type="date" required="true" name="Date" placeholder="" id="DateNA">
			</div><div class="col-lg-12">
			<label for="TimeNA">Hours</label>
			<input class="form-control" type="number" required="true" name="Time" placeholder="" id="TimeNA">
			</div><div class="col-lg-12">
			<label for="ProviderNA">Provider</label>
			<input class="form-control" type="text" required="true" name="Provider" placeholder="" id="ProviderNA">
			</div><div class="col-lg-12">
			<label for="ReflectionNA">Reflection</label>
			<input class="form-control" type="text" required="true" name="Reflection" placeholder="" id="ReflectionNA" maxlength="250">
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
<?php  else: ?>
	<!-- USER LOGGED IN BUT NOT A MEMBER  -->
	<div class="flex-container" id="non-member">
		<div class="flex-cell">
			<h3 class="light-lead-heading">If you’re not already a member,<br> join us today.</h3>
		</div>
		<div class="flex-cell cta">
			<a href="/membership-question" class="join">Join now</a>
		</div>

		<?php 
				$block = block_load('block', '309');
				$get = _block_get_renderable_array(_block_render_blocks(array($block)));
				$output = drupal_render($get);        
				print $output;
		?>

	</div>
<?php endif;?>
<?php else:?>
	<!-- NON-LOGIN MESSAGE -->
		<div class="flex-container" id="non-member">
			<div class="flex-cell">
				<h3 class="light-lead-heading">Please login to see this page.</h3>
			</div>
			<div class="flex-cell cta">
				<a data-target="#loginAT" data-toggle="modal" href="#" class="login">Login</a>
				<a href="/membership-question" class="join">Join now</a>
			</div>
			
			<?php 
				$block = block_load('block', '309');
				$get = _block_get_renderable_array(_block_render_blocks(array($block)));
				$output = drupal_render($get);        
				print $output;
			?>

		</div>
<?php endif;?>

<?php
// 2.2.2 - GET Membership certification PDF
// Send - 
// UserID
// Response -
// Membership certificate PDF
//echo "<iframe name='YInkFroamame' src='http://www.physiotherapy.asn.au'></iframe>";
// $Certi = aptify_get_GetAptifyData("38", $_SESSION['LinkId']);
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
			<label> <input type="radio" name="background" value="2"  id="background2"><img src="/sites/default/files/ABOUT-US/ABOUTUS1170X600.jpg"></label>
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