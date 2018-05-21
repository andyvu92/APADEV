<?php
global $base_url;
// 2.2.1 - GET Dashboard main details
// Send - 
// UserID
// Response -
// Preferred name, First name, Last name, Member ID, Member type,
// Status, AHPRA number, Specialty, Office bearer, Year membership,
// CPD hours, Private health care Network, Home branch, Preferred branch
$user = Array();
if(isset($_SESSION["UserId"])) {
	$users = GetAptifyData("1", $_SESSION["UserId"]);
	print_r($users);
	$cpd = $users["results"][0]["CPD"];
	//echo "CPD: ".$cpd;
	$user = $users["results"][0];
}
include('sites/all/themes/evolve/commonFile/updateBackgroundImage.php'); 
?>
<?php if(isset($_SESSION["UserId"])) : ?>
<div id="cpd" style="display:none"><?php echo $cpd; ?></div>
<div id="pre_background" style="display:none">background_<?php echo $user['background']; ?></div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
	window.onresize = function(event) {
		google.charts.load("current", {packages:["corechart"]});
		google.charts.setOnLoadCallback(drawChart);
	};
	google.charts.load("current", {packages:["corechart"]});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
		var fin =  Number(document.getElementById('cpd').innerHTML);
		var unfin = Number(20 - fin);
		var data = google.visualization.arrayToDataTable([
		['CPD', 'Hours per Day'],
		['Finished',     fin],
		['Unfinished',  unfin],
		]);
		if(window.innerWidth<361){
			var options = {
				chartArea:{left:0,top:0,width:'80%',height:'80%'},
				backgroundColor: 'transparent',
				pieSliceBorderColor: 'transparent',
				pieHole: 0.7,
				legend: 'none',
				pieSliceText: 'none',
				pieSliceTextStyle: {
					color: 'white',
				},
				slices: {
					0: { color: '#009fda' },
					1: { color: 'grey' }
				},
			};
		}
		else{
			var options = {
				chartArea:{left:0,top:0,width:'150%',height:'150%'},
				backgroundColor: 'transparent',
				pieSliceBorderColor: 'transparent',
				pieHole: 0.75,
				legend: 'none',
				pieSliceText: 'none',
				pieSliceTextStyle: {
					color: 'white',
				},
				slices: {
					0: { color: '#009fda' },
					1: { color: 'grey' }
				},
			};
		}
		var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
		chart.draw(data, options);
	}
</script>
<?php include('sites/all/themes/evolve/commonFile/dashboardLeftNavigation.php'); ?> 
<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 background_<?php echo $user['background']; ?>" id="dashboard-right-content">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dashboard_detail">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><span class="dashboard-name"><strong>Hello <?php echo $user["Preferredname"]; ?></strong></span></div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><button class="dashboard-backgroud" data-toggle="modal" data-target="#myModal"><span class="customise_background" >Customise your background</span><span class="customise_icon">[icon class="fa fa-cogs fa-x"][/icon]</span></button></div>
		</div>
	<?php
		include('sites/all/themes/evolve/commonFile/customizeBackgroundImage.php');
	?>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mobile_line" >
				<table class="table table-responsive bordless">
					<tbody style="border-top: none;">
						<tr>
							<td><span style="text-decoration: underline; color:#009fda"><strong>Your details</strong></span></td>
						</tr>
						<tr>
							<td><strong>Name:</strong></td>
							<td><?php echo $user['FirstName']." ".$user['LastName']; ?></td>
						</tr>
						<tr>
							<td><strong>Member ID:</strong></td>
							<td><?php echo $user['MemberID']; ?></td>
						</tr>
						<tr>
							<td><strong>Member type:</strong></td>
							<td><?php echo $user['MemberType']; ?></td>
						</tr>
						<tr>
							<td><strong>Status:</strong></td>
							<td><?php echo $user['Status']; ?></td>
						</tr>
						<tr>
							<td><strong>AHPRA NO:</strong></td>
							<td><?php echo $user['Ahpranumber']; ?></td>
						</tr>
						<tr>
							<td><strong>Specialty:</strong></td>
							<td><?php echo $user['Specialty']; ?></td>
						</tr>
						<tr>
							<td><strong>Officebearer positions:</strong></td>
							<td><?php echo $user['Officebearer']; ?></td>
						</tr>
						<tr>
							<td><strong>Your branch:</strong></td>
							<td><?php echo $user['HomeBranch']; ?></td>
						</tr>
						<tr>
							<td><strong>Additional branch:</strong></td>
							<td><?php echo $user['PreferBranch']; ?></td>
						</tr>
						<tr>
							<td><strong>Primary health care network:</strong></td>
							<td><?php echo $user['PHN']; ?></td>
						</tr>
						<tr>
						<?php
						// 2.2.2 - GET Membership certification PDF
						// Send - 
						// UserID
						// Response -
						// Membership certificate PDF
						$MemberCerti = GetAptifyData("2", "UserID");
						?>
							<td></td>
							<td><a href=""><strong><span style="text-decoration: underline; color:white;"><?php echo $MemberCerti['MembershipCertification']; ?></span></strong></a></td>
						</tr>
						<tr>
						<?php
						// 2.2.3 - GET Insurance certification PDF
						// Send - 
						// UserID
						// Response -
						// Insurance certificate PDF
						$InsuCerti = GetAptifyData("3", "UserID");
						?>
							<td></td>
							<td><a href=""><strong><span style="text-decoration: underline; color:white"><?php echo $InsuCerti['InsuranceCertification']; ?></span></strong></a></td>
						</tr>
					</tbody>
				</table>
			</div>   
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mobile_line" >
				<table class="table table-responsive">
					<tbody style="border-top: none;">
						<tr>
							<td><strong>Years of membership</strong></td>
							<td><strong><span style="margin-left:15px;">CPD hours</span></strong></td>
						</tr>
						<tr>
							<td><div class="circle"><?php echo $user['Yearmembership']; ?></div></td>
							<td><div class="circle"><?php echo $cpd; ?></div><div id="donutchart"></div></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 mobile_line">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><strong>Your National Groups &gt</strong></div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dashboard-content-bottom">
					<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<!-- Indicators 
					<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
					</ol>
					-->
					<!-- Wrapper for slides -->
						<div class="carousel-inner">

						<!-----edit----><?php 
						nationalIcons();
						?>
						</div>
					<!-- Left and right controls -->
						<a class="left carousel-control" href="#myCarousel" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
						<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#myCarousel" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
						<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><button class="dashboard-button"><span class="dashboard-button-name">Join more &gt</span></button></div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 mobile_line">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><strong>Donate to the PRF &gt</strong></div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dashboard-content-bottom"><img src="/sites/default/files/PRF_155x56.png" alt=""></div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><button  class="dashboard-button dashboard-bottom-button "><span class="dashboard-button-name">Donate today &gt</span></button></div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><strong>Suggestions/feedback &gt</strong></div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dashboard-content-bottom">If you have a question or concern, please don’t hesitate to contact us. We’re always looking for ways to improve our member offering.</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><button class="dashboard-button dashboard-bottom-button"><span class="dashboard-button-name">Submit &gt</span></button></div>
			</div>
		</div>
	</div>
</div>
<?php else : 
	// todo
	// add log-in button with message - you must be logged in
	?>
<p>please log-in to use this page</p>
<?php endif; ?>