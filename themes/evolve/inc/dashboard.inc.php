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
	//print_r($users);
	$cpd = $users["results"][0]["CPD"];
	//echo "CPD: ".$cpd;
	$user = $users["results"][0];
}
include('sites/all/themes/evolve/commonFile/updateBackgroundImage.php'); 
/* get background image****/
if(isset($_SESSION['UserId'])) { $userID = $_SESSION['UserId'];} else { $userID =0; }
$background = getBackgroundImage($userID);
/* get background image****/
?>
<?php if(isset($_SESSION["UserId"])) : ?>
<div id="cpd" style="display:none"><?php echo $cpd; ?></div>
<div id="pre_background" style="display:none">background_<?php echo $background; ?></div>
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
		if(window.innerWidth<480){
			var options = {
				chartArea:{left:0,top:0,width:'100%',height:'100%'},
				width: '200',
				height: '200',
				backgroundColor: 'transparent',
				pieSliceBorderColor: 'transparent',
				pieHole: 0.89,
				legend: 'none',
				pieSliceText: 'none',
				pieSliceTextStyle: {
					color: 'white',
				},
				slices: {
					0: { color: '#009fda' },
					1: { color: '#a6a8ab' }
				},
			};
		}
		else if(window.innerWidth<570){
			var options = {
				chartArea:{left:0,top:0,width:'100%',height:'100%'},
				width: '160',
				height: '160',
				backgroundColor: 'transparent',
				pieSliceBorderColor: 'transparent',
				pieHole: 0.91,
				legend: 'none',
				pieSliceText: 'none',
				pieSliceTextStyle: {
					color: 'white',
				},
				slices: {
					0: { color: '#009fda' },
					1: { color: '#a6a8ab' }
				},
			};
		}
		else if(window.innerWidth<992){
			var options = {
				chartArea:{left:0,top:0,width:'100%',height:'100%'},
				width: '230',
				height: '230',
				backgroundColor: 'transparent',
				pieSliceBorderColor: 'transparent',
				pieHole: 0.87,
				legend: 'none',
				pieSliceText: 'none',
				pieSliceTextStyle: {
					color: 'white',
				},
				slices: {
					0: { color: '#009fda' },
					1: { color: '#a6a8ab' }
				},
			};
		}
		else if(window.innerWidth<1200){
			var options = {
				chartArea:{left:0,top:0,width:'100%',height:'100%'},
				width: '170',
				height: '170',
				backgroundColor: 'transparent',
				pieSliceBorderColor: 'transparent',
				pieHole: 0.91,
				legend: 'none',
				pieSliceText: 'none',
				pieSliceTextStyle: {
					color: 'white',
				},
				slices: {
					0: { color: '#009fda' },
					1: { color: '#a6a8ab' }
				},
			};
		}
		else if(window.innerWidth<1500){
			var options = {
				chartArea:{left:0,top:0,width:'100%',height:'100%'},
				width: '200',
				height: '200',
				backgroundColor: 'transparent',
				pieSliceBorderColor: 'transparent',
				pieHole: 0.89,
				legend: 'none',
				pieSliceText: 'none',
				pieSliceTextStyle: {
					color: 'white',
				},
				slices: {
					0: { color: '#009fda' },
					1: { color: '#a6a8ab' }
				},
			};
		}
		else{
			var options = {
				chartArea:{left:0,top:0,width:'100%',height:'100%'},
				width: '230',
				height: '230',
				backgroundColor: 'transparent',
				pieSliceBorderColor: 'transparent',
				pieHole: 0.87,
				legend: 'none',
				pieSliceText: 'none',
				pieSliceTextStyle: {
					color: 'white',
				},
				slices: {
					0: { color: '#009fda' },
					1: { color: '#a6a8ab' }
				},
			};
		}
		var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
		chart.draw(data, options);
	}
</script>
<?php include('sites/all/themes/evolve/commonFile/dashboardLeftNavigation.php'); ?> 
<div class="col-xs-12 col-md-10 background_<?php echo $background; ?>" id="dashboard-right-content">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dashboard_detail">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="col-xs-12 col-sm-6"><span class="dashboard-name cairo">Hello <?php echo $user["Preferred-name"]; ?></span></div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><button class="dashboard-backgroud" data-toggle="modal" data-target="#myModal"><span class="customise_background" >Customise your background</span><span class="customise_icon">[icon class="fa fa-cogs fa-x"][/icon]</span></button></div>
		</div>
	<?php
		include('sites/all/themes/evolve/commonFile/customizeBackgroundImage.php');
	?>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bottom-space">
			<div class="col-xs-12 col-md-6 mobile_line" >
				<table class="table table-responsive bordless">
					<tbody class="limit-width" style="border-top: none;">
						<tr>
						<span class="med-accent-header"><strong>Your details</strong></span>
						</tr>
						<tr>
							<td><strong>Name:</strong></td>
							<td><?php echo $user['Firstname']." ".$user['Lastname']; ?></td>
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
						//echo "<iframe name='YInkFroamame' src='http://www.physiotherapy.asn.au'></iframe>";
						$Certi = GetAptifyData("2", $_SESSION['LinkId']);
						//echo "<iframe id="YInkFroamame" srcdoc='".$MemberCerti."'></iframe>";
						//echo "<iframe src='".$MemberCerti."'></iframe>";
						//echo "<iframe src='https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/Authentication/Login/DomainWithContainer?UserName=aptifyuser&Password=!@-auser-Apatest1-2468' style='display: none;'></iframe>";
						//echo "<iframe src='https://apaaptifywebuat.aptify.com/AptifyServicesAPI/forms/CrystalReportView.aspx?ViewMode=entityRecord&amp;ViewEntityName=Persons&amp;ReportId=151&amp;EntityRecordID=55280'width='900' height='900'></iframe>";
						//echo "<a href='https://apaaptifywebuat.aptify.com/AptifyServicesAPI/forms/CrystalReportView.aspx?ViewMode=entityRecord&ViewEntityName=Persons&ReportId=151&EntityRecordID=".$_SESSION['LinkId']."'>ttttt</a>";
						?>

							<?php /*<a href="https://apaaptifywebuat.aptify.com/AptifyServicesAPI/forms/CrystalReportView.aspx?ViewMode=entityRecord&ViewEntityName=Persons&ReportId=151&EntityRecordID=<?php echo $_SESSION['UserId']; ?>" target="_blank"><strong><span style="text-decoration: underline; color:white;">Membership certificate</span></strong></a> */ ?>
						</tr>
						<tr>
						<?php
						// 2.2.3 - GET Insurance certification PDF
						// Send - 
						// UserID
						// Response -
						// Insurance certificate PDF
						//$InsuCerti = GetAptifyData("3", $_SESSION['LinkId']);
						?>

							<?php /*<a href=""><strong><span style="text-decoration: underline; color:white"><?php echo $InsuCerti['InsuranceCertification']; ?></span></strong></a>*/ ?>
						</tr>
					</tbody>
				</table>
				
				<div class="col-xs-12 none-padding">
					<a href class="black-underline-link" data-toggle="modal" data-target="#YInkFroamame">
						<span>Membership certificate</span></a>
				</div>

				<div class="col-xs-12 none-padding">
					<a href class="black-underline-link" data-toggle="modal" data-target="#KiNsuraneCiynbC">
						<span>Insurance certification</span></a>	
				</div>

				<div id="YInkFroamame" class="modal fade big-screen" role="dialog">
				  <div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					  </div>
					  <div class="modal-body">
						<iframe name='YInkFroamame' src='http://www.physiotherapy.asn.au'></iframe>
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					  </div>
					</div>

				  </div>
				</div>
				
				<div id="KiNsuraneCiynbC" class="modal fade big-screen" role="dialog">
				  <div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					  </div>
					  <div class="modal-body">
						<iframe name='KiNsuraneCiynbC' src='http://www.physiotherapy.asn.au'></iframe>
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					  </div>
					</div>

				  </div>
				</div>
				<style type="text/css">
					.big-screen {
						width: 62%;
						margin: auto;
						min-width: 1190px;
						overflow: hidden;
					}
					.big-screen .modal-dialog .modal-content .modal-body {
						width: 100%;
						height: 85%;
					}
					.big-screen .modal-dialog, .big-screen .modal-dialog .modal-content, .big-screen iframe {
						width: 100%;
						height: 100%;
					}
				</style>
			</div>   
			<script>
			$(document).ready(function() {
				if (window.frames['YInkFroamame'] && !window.userSet){
					window.userSet = true;
					frames['YInkFroamame'].location.href='<?php echo $Certi["M"]; ?>';
					frames['KiNsuraneCiynbC'].location.href='<?php echo $Certi["I"]; ?>';
				}
			});
			</script>
			<div class="col-xs-12 col-md-6 mobile_line" >
				<div class="col-xs-12 center">				 
					<span class="lead-heading">Your membership</br> snapshot</span>		
			    </div>
				<div class="col-xs-6 col-md-6 circle-container">
					<div class="circle"><span class="number"><?php echo $user['Yearmembership']; ?></span><span class="text">Years of membership</span></div>
				</div>
				<div class="col-xs-6 col-md-6 circle-container" id="goo-chart">
					<div id="donutchart"></div>
					<span class="number"><?php  
					if (!empty($cpd)){
						echo $cpd;
					}
					else{
						echo '0';
					}
					
					?></span>
					<span class="text">CPD hours <a href="/pd/cpd-diary"><i class="fa fa-info"></i> Full CPD diary</a></span>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bottom-space bottom-section flex-column">
			<div class="col-xs-12 col-sm-12 col-md-4 mobile_line">
				<span class="small-heading">Your National Groups</span>
				<div class="col-xs-12 dashboard-content-bottom ng-icons-group">

						<?php 
						nationalIcons();
						?>

					</div>
				<a class="accent-button" href="#"><span>Join more</span></a>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4 mobile_line">
					<span class="small-heading">Donate to the PRF</span>
					<img style="display: block" src="/sites/default/files/PRF_155x56.png" alt="">
					<a class="accent-button" href="#"><span>Donate today</span></a>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4 mobile_line">
				<span class="small-heading">Suggestions/feedback</span>
				<span class="dashboard-content-bottom">If you have a question or concern, please don’t hesitate to contact us. We’re always looking for ways to improve our member offering.</span>
				<a class="accent-button" href="#"><span>Submit</span></a>
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
<?php logRecorder(); ?>