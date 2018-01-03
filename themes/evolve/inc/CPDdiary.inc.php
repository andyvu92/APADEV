<?php
<<<<<<< HEAD
// Eddy's commit :)
=======
/* jing's commit */
>>>>>>> origin/Dev
include('sites/all/themes/evolve/commonFile/updateBackgroundImage.php');
 $results_json='{  
        "CurrentCPDHour": "12",
        "APA": [
         {
         "PD_id": "421",
         "PD_title":"PD title A",
         "PD_date":"13/12/2017",
         "PD_hours":"3" },
         {
         "PD_id": "231",
         "PD_title":"PD title B",
         "PD_date":"15/12/2017",
         "PD_hours":"2" },
         {
         "PD_id": "763",
         "PD_title":"PD title C",
         "PD_date":"17/12/2017",
         "PD_hours":"3" },
         {
         "PD_id": "236",
         "PD_title":"PD title D",
         "PD_date":"19/12/2017",
         "PD_hours":"1" }  ], 
         "NONAPA": [
         {
         "NPD_id": "821",
         "NPD_Description":"NPD title A",
         "NPD_date":"13/12/2017",
         "NPD_Time":"1",
         "NPD_Provider": "A Company",
         "NPD_Reflection": "I have learned dis!" },
         {
         "NPD_id": "518",
         "NPD_Description":"NPD title A",
         "NPD_date":"13/12/2017",
         "NPD_Time":"1",
         "NPD_Provider": "B Company",
         "NPD_Reflection": "I have learned dis!" },
         {
         "NPD_id": "324",
         "NPD_Description":"NPD title A",
         "NPD_date":"13/12/2017",
         "NPD_Time":"1",
         "NPD_Provider": "C Company",
         "NPD_Reflection": "I have learned dis!" }
         ]
}';
$results = json_decode($results_json, true);
    $totalNum = sizeof($results);
$CPDHousrs = $results["CurrentCPDHour"];
$APA = array();
$NAPA = array();
foreach($results["APA"] as $t) {
    array_push($APA, $t);
}
foreach($results["NONAPA"] as $t) {
    array_push($NAPA, $t);
}
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
*/
?>

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


  </script >

<div id="pre_background" style="display:none">background_2</div>
<div id="CPD-diary-main" class="background_<?php echo $user['background']; ?>">
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
       <form name="formradio" action="cpd-diary" method="POST"">
      <input type="hidden" name="userID" value="<?php echo $userID; ?>"> 
      <input type="hidden" name="update">  
       <label> <input type="radio" name="background" value="1" id="background1"><img src="http://10.2.1.190/apanew/sites/default/files/PARALLAX_TRADIES.jpg"></label>
      <label> <input type="radio" name="background" value="2"  id="background2"><img src="http://10.2.1.190/apanew/sites/default/files/ABOUT%20US/ABOUTUS1170X600.jpg"></label>
      <label> <input type="radio" name="background" value="3"  id="background3"><img src="http://10.2.1.190/apanew/sites/default/files/NG_1200X600_RURAL.png"></label>
      <label> <input type="radio" name="background" value="4"  id="background4"><img src="http://10.2.1.190/apanew/sites/default/files/MEDIA1170X600_5.jpg"></label>
       
      
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
<div class="trophy">&nbsp;</div>

<div class="MaxHours">20 hours minimum</div>
</div>
</div>
</div>
<form><input id="inputProgress" type="text" /> <input id="buttonProgress" type="button" value="Click Me" />&nbsp;</form>
</div>

<div class='lineBreak' style="height: 40px;">&nbsp;</div>

<style type="text/css">
div#CPD-diary-main { height: 400px; }
div#CPD-diary-main .container:nth-child(2) {
  padding-top: 70px;
}
#myProgress {
  width: 100%;
}
#ProgressCPDback {
  position: absolute;
  margin-top: -8px;
  height: 41px;
  background-color: white;
  z-index: 1;
  width: 1140px;
}
div#ProgressCPDback .front {
    font-size: 70px;
    position: absolute;
    left: -28px;
    top: -15px;
    color: rgb(0,159,218);
}
div#ProgressCPDback .back {
    font-size: 70px;
    position: absolute;
    right: -28px;
    top: -15px;
    color: rgb(0,159,218);
}
#myBar {
  width: 10%;
  height: 25px;
  text-align: center;
  background-color: rgb(0,159,218);
  line-height: 25px;
  color: white;
  position: relative;
  z-index: 15;
}
#currentProgress {
  width: 82px;
  height: 43px;
  text-align: center;
  line-height: 18px;
  background-color: black;
  padding: 5px;
  color: white;
  margin-left: -41px;
  z-index: 20;
  position: relative;
}
#currentProgress:after {
content: ' ';
  position: absolute;
  width: 0;
  height: 0;
  border: 13px solid;
  border-color: black transparent transparent transparent;
  margin: 20px 0 0 -44px;
  z-index: 25;
}
#MaxHours {
	width: 100%;
    height: 98px;
  z-index: 20;
  position: relative;
}
#MaxHours .trophy {
	border-left: black 1px solid;
    height: 24px;
    padding-left: 20px;
   color: black;
}
#MaxHours .MaxHours {
	padding: 10px 15px;
   color: black;
}
.APAhoursHead, .NAPAhoursHead { width: 100% }
.APAhoursContent, .NAPAhoursContent {
    height: 240px;
    overflow-y: auto;
    float: left;
    width: 100%;
}
.APAhoursHead div, .NAPAhoursHead div {
  background-color: rgb(0,159,218);
  border: 0.5px solid white;
  padding: 10px;
  float: left;
  color: white;
}
.APAhoursContent div:not(.lineBreak), .NAPAhoursContent div:not(.lineBreak) {
  border: solid black;
  border-width: 0 0 0.5px;
  padding: 10px;
  float: left;
}
.APAhoursHead div:nth-child(1) {
  width: 70%;
}
.APAhoursHead div:nth-child(2) {
  width: 15%;
}
.APAhoursHead div:nth-child(3) {
  width: 15%;
}
.APAhoursContent div:nth-child(5n + 2) {
  width: 70%;
}
.APAhoursContent div:nth-child(5n + 3) {
  width: 15%;
}
.APAhoursContent div:nth-child(5n + 4) {
  width: 15%;
}
.NAPAhoursHead div:nth-child(1) {
  width: 15%;
}
.NAPAhoursHead div:nth-child(2) {
  width: 20%;
}
.NAPAhoursHead div:nth-child(3) {
  width: 15%;
}
.NAPAhoursHead div:nth-child(4) {
  width: 20%;
}
.NAPAhoursHead div:nth-child(5) {
  width: 30%;
}
.NAPAhoursContent div:nth-child(7n + 2) {
  width: 15%;
}
.NAPAhoursContent div:nth-child(7n + 3) {
  width: 20%;
}
.NAPAhoursContent div:nth-child(7n + 4) {
  width: 15%;
}
.NAPAhoursContent div:nth-child(7n + 5) {
  width: 20%;
}
.NAPAhoursContent div:nth-child(7n + 6) {
  width: 30%;
}
.lineBreak { clear: both; height: 1px; }
</style>

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

<div class="container">
<div class="row">
<div class="region region-content col-xs-12 col-sm-12 col-md-9 col-lg-9">
<h1 class="SectionHeader">Your APA hours</h1>
<div class="brd-headling">&nbsp;</div>

<div class="APAhours">
  <div class="APAhoursHead">
    <div>Completed PD</div><div>Date</div><div>Hours</div>
  </div>
  <div class="APAhoursContent">
    <?php
       foreach($APA as $rowData) {
          echo "<div style='display: none;'>".$rowData["PD_id"]."</div><div>".$rowData["PD_title"]."</div><div>".$rowData["PD_date"]."</div><div>".$rowData["PD_hours"]."</div>";
          echo "<div class='lineBreak'>&nbsp;</div>";
       }
    ?> 
  </div>
</div>

<h1 class="SectionHeader">Non-APA hours</h1>
<div class="brd-headling">&nbsp;</div>
<strong><a href="http://www.physiotherapyboard.gov.au/documents/default.aspx?record=WD15%2f18489&dbid=AP&chksum=ewqLtzOm4m%2fsRUrlGCmo1A%3d%3d">This is based on Physiotherapy Board of Australia's Continuing professional development form.</a></strong>
<div class="NAPAhours">
  <div class="NAPAhoursHead">
    <div>Date</div><div>Description</div><div>Time</div><div>Provider</div><div>Reflection</div>
  </div>
  <div class="NAPAhoursContent">
    <?php
       foreach($NAPA as $rowData) {
          echo "<div style='display: none;'>".$rowData["NPD_id"]."</div><div>".$rowData["NPD_date"]."</div><div>".$rowData["NPD_Description"]."</div><div>".$rowData["NPD_Time"]."</div><div>".$rowData["NPD_Provider"]."</div><div>".$rowData["NPD_Reflection"]."</div>";
          echo "<div class='lineBreak'>&nbsp;</div>";
       }
    ?> 
  </div>
</div>

</div>
<div class="region region-right-sidebar col-xs-12 col-sm-12 col-md-3 col-lg-3">
<img alt="" src="/sites/default/files/SKINS%20280x600.png" style="width: 260px;">
</div>
</div></div>