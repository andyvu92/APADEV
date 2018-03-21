<?php
include('sites/all/themes/evolve/commonFile/updateBackgroundImage.php');
/*
This page is undone.

I need to add "List of fellowship product and National Groups"

I'm doing it now :)
*/

/* We may use this as "Session" data and won't need to load. */
// 2.2.20 - GET list of subscribed National Group
// Send - 
// Request, User ID
// Response -
// National Group ID, National Group title
$sendData["RequestNG"] = "RequestNG";
$sendData["UserID"] = "UserID";
$nationalGroups = GetAptifyData("20", $sendData);

/* We may use this as "Session" data and won't need to load. */
// 2.2.22 - Get list of subscribed Fellowship Products
// Send - 
// UserID
// Response -
// List of Fellowship ID and its titles.
$Fellows = GetAptifyData("22", "UserID");

/* We may use this as "Session" data and won't need to load. */
// 2.2.23 - GET list of subscription preferences
// Send - 
// UserID
// Response -
// List of subscriptions and its T/F values.
$subscriptions = GetAptifyData("23", "UserID");
$Subscription = $subscriptions["Subscription"];

// use one of above to get "current" data
// and combine with existing data ("$Subsctiption")
// Then send it to Aptify.
// May go through Session

//print_r($Subscription);
//echo "<br /><br />";
$PostArray = Array();
foreach ($_POST as $key => $value) {
	//echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
	$PostArray[htmlspecialchars($key)] = htmlspecialchars($value);
}
if(count($PostArray) == 0) { // Just GET data
	$SubListAll = Array();
	foreach($Subscription as $Subs) {
		$ArrayRe["SubscriptionID"] = $Subs["SubscriptionID"];
		$ArrayRe["Subscription"] = $Subs["Subscription"];
		$ArrayRe["Subscribed"] = $Subs["Subscribed"];
		array_push($SubListAll, $ArrayRe);
	}
	$nationalGroup = $nationalGroups["NationalGroup"];
	foreach($nationalGroup as $Subs) {
		$ArrayRe["SubscriptionID"] = $Subs["NGid"];
		$ArrayRe["Subscription"] = $Subs["NGtitle"];
		$ArrayRe["Subscribed"] = 1;
		array_push($SubListAll, $ArrayRe);
	}
	$Fellow = $Fellows["Fellowship"];
	foreach($Fellow as $Subs) {
		$ArrayRe["SubscriptionID"] = $Subs["FPid"];
		$ArrayRe["Subscription"] = $Subs["FPtitle"];
		$ArrayRe["Subscribed"] = 1;
		array_push($SubListAll, $ArrayRe);
	}
} else {
	$ArrayReturn = Array();
	array_push($ArrayReturn, "UserID");
	$SubListAll = Array();
	foreach($Subscription as $Subs) {
		$ArrayRe["SubscriptionID"] = $Subs["SubscriptionID"];
		$ArrayRe["Subscription"] = $Subs["Subscription"];
		if(!isset($PostArray[$Subs["SubscriptionID"]])) {
			// When it's not set (unticked on check box)
			$ArrayRe["Subscribed"] = 0;
		} else {
			$ArrayRe["Subscribed"] = $Subs["Subscribed"];
		}
		array_push($SubListAll, $ArrayRe);
	}
	$nationalGroup = $nationalGroups["NationalGroup"];
	foreach($nationalGroup as $Subs) {
		$ArrayRe["SubscriptionID"] = $Subs["NGid"];
		$ArrayRe["Subscription"] = $Subs["NGtitle"];
		if(!isset($PostArray[$Subs["NGid"]])) {
			// When it's not set (unticked on check box)
			$ArrayRe["Subscribed"] = 0;
		} else {
			$ArrayRe["Subscribed"] = 1;
		}
		array_push($SubListAll, $ArrayRe);
	}
	$Fellow = $Fellows["Fellowship"];
	foreach($Fellow as $Subs) {
		$ArrayRe["SubscriptionID"] = $Subs["FPid"];
		$ArrayRe["Subscription"] = $Subs["FPtitle"];
		if(!isset($PostArray[$Subs["FPid"]])) {
			// When it's not set (unticked on check box)
			$ArrayRe["Subscribed"] = 0;
		} else {
			$ArrayRe["Subscribed"] = 1;
		}
		array_push($SubListAll, $ArrayRe);
	}
	array_push($ArrayReturn, $SubListAll);
	echo "<br /><br />";

	// 2.2.24 - Update subscription preferences
	// Send - 
	// UserID, List of subscriptions and its F/F values.
	// Response -
	// Response, List of subscriptions and it's T/F values.
	$subscriptions = GetAptifyData("24", $ArrayReturn);
}


?>


<div id="pre_background" style="display:none">background_<?php echo $user['background']; ?></div>
<div style="display:table;">
<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 dashboard-left-nav">
    <a type="button" class="navbar-toggle" data-toggle="collapse" data-target="#dashboard-navbar-collapse-1"><i class="fa fa-align-justify"></i></a>
 <!----edit-->
<div class="collapse" id="dashboard-navbar-collapse-1">
<table class="table table-responsive">
	<tbody style="border-top: none;">
	<tr>
		<td><a href="dashboard"><div class="dashboard-icon">[icon class="fa fa-tachometer fa-3x" link=""][/icon]</div><br/><div class="dashboard-button-name">Dashboard</div></a></td>
		<td> <a href="your-details"><div class="dashboard-icon">[icon class="fa fa-users fa-3x" link=""][/icon]</div><br/><div class="dashboard-button-name">Your details</div></a></td>
	</tr>
	<tr>
		<td><a href="your-purchases"><div class="dashboard-icon">[icon class="fa fa-shopping-cart fa-3x" link=""][/icon]</div><br/><div class="dashboard-button-name">Purchases</div></a></td>
		<td><a href="subscriptions"><div class="dashboard-icon">[icon class="fa fa-trophy fa-3x" link=""][/icon]</div><br/><div class="dashboard-button-name">Subscriptions</div></a></td>
		<td><a href="#about"><div class="dashboard-icon">[icon class="fa fa-folder-open fa-3x" link=""][/icon]</div><br/><div class="dashboard-button-name">Renew</div></a></td>
	</tr>
	</tbody>
</table>
</div>
<!---end--->
<div class="navbar-collapse collapse">
	<ul class="nav navbar-nav navbar-left">
		<li class="dashboard-nav"><a href="dashboard"><div class="dashboard-icon">[icon class="fa fa-tachometer fa-3x" link=""][/icon]</div><br/><div class="dashboard-button-name">Dashboard</div></a></li>
		<li class="dashboard-nav"><a href="your-details"><div class="dashboard-icon">[icon class="fa fa-users fa-3x" link=""][/icon]</div><br/><div class="dashboard-button-name">Your details</div></a></li>
		<li class="dashboard-nav"><a href="your-purchases"><div class="dashboard-icon">[icon class="fa fa-shopping-cart fa-3x" link=""][/icon]</div><br/><div class="dashboard-button-name">Purchases</div></a></li>
		<li class="dashboard-nav"><a href="subscriptions"><div class="dashboard-icon">[icon class="fa fa-trophy fa-3x" link=""][/icon]</div><br/><div class="dashboard-button-name">Subscriptions</div></a></li>
		<li class="dashboard-nav"><a href="#about"><div class="dashboard-icon">[icon class="fa fa-folder-open fa-3x" link=""][/icon]</div><br/><div class="dashboard-button-name">Renew</div></a></li>
	</ul>
</div>
 </div >

<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 background_<?php echo $user['background']; ?>" id="dashboard-right-content">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dashboard_detail">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><span class="dashboard-name"><strong>Your subscriptions</strong></span></div>

<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><button class="dashboard-backgroud" data-target="#myModal" data-toggle="modal"><span class="customise_background">Customise your background</span><span class="customise_icon">[icon class="fa fa-cogs fa-x"][/icon]</span></button></div>
</div>
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
	<form name="formradio" action="subscriptions" method="POST"">
		<input type="hidden" name="userID" value="<?php echo $userID; ?>"> 
		<input type="hidden" name="update">  
		<label> <input type="radio" name="background" value="1" id="background1"><img src="../sites/default/files/PARALLAX_TRADIES.jpg"></label>
		<label> <input type="radio" name="background" value="2"  id="background2"><img src="../sites/default/files/ABOUT%20US/ABOUTUS1170X600.jpg"></label>
		<label> <input type="radio" name="background" value="3"  id="background3"><img src="../sites/default/files/NG_1200X600_RURAL.png"></label>
		<label> <input type="radio" name="background" value="4"  id="background4"><img src="../sites/default/files/MEDIA1170X600_5.jpg"></label>


	</div>
	<div class="modal-footer">

		<button type="Submit" class="btn btn-default" id="background_save">Save</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	</div>
	</form>
	</div>

</div>
</div>
<script type="text/javascript">
 
    function changeStatus(number){
          document.formradio.background[number].checked=true;
        
      
       
   }

function myFunction() {
        var background_number =document.formradio.background.value;
        var pre_bg =  document.getElementById('pre_background').innerHTML;
        document.getElementById("dashboard-right-content").classList.remove(pre_bg);
        var cur_bg = 'background_' +background_number;
        document.getElementById("dashboard-right-content").classList.add(cur_bg);
        document.getElementById('pre_background').innerHTML = 'background_' + background_number; 
}</script>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
<p><span style="text-decoration: underline; color:#009fda; margin-left:1%;"><strong>What I'm signed up for</strong></span></p>
<form action="/subscriptions" method="POST">
<table class="table table-responsive table-bordered">
	<tbody>
		<?php
			$countSubs = count($Subscription);
			$countSubType = $countSubs%2;
			$counter = 0;
			foreach($SubListAll as $Subs) {
				$tr = $counter % 2;
				if($tr == 0) {
					echo "<tr>";
				}
				echo '<td><label for="'.$Subs["Subscription"].'">'.$Subs["Subscription"]
					.'</label><input type="checkbox" name="'.$Subs["SubscriptionID"].
					'" id="'.$Subs["Subscription"].'" value="'.$Subs["Subscribed"].'"';
				if($Subs['Subscribed']==1){ 
					echo "checked";
				}
				echo '></td>';
				if($tr == 1) {
					echo "</tr>";
				}
				$counter++;
			}
		?>
	</tbody>
</table>
  <button  class="dashboard-button dashboard-bottom-button subscriptions-submit"><span class="dashboard-button-name">Submit</span></button>
</form>
</div>



</div>
</div>
</div>
 