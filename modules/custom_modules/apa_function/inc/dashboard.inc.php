<?php
if(!function_exists('drupal_session_started'))
{
  die("Unauthorized Access");
}
?>
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
//include('sites/all/themes/evolve/commonFile/updateBackgroundImage.php'); 
apa_function_updateBackgroundImage_form();
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
		if(unfin < 0) {unfin = 0;}
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
<?php //include('sites/all/themes/evolve/commonFile/dashboardLeftNavigation.php');
apa_function_dashboardLeftNavigation_form();
 ?> 
<div class="col-xs-12 col-md-10 background_<?php echo $background; ?>" id="dashboard-right-content">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dashboard_detail">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="col-xs-12"><span class="dashboard-name cairo">Hello <?php 
				if (!empty($user["Preferred-name"])){
					echo $user["Preferred-name"];
				} else{
					echo $user['Firstname'];
				}
			?></span></div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="display: none"><button class="dashboard-backgroud" data-toggle="modal" data-target="#myModal"><span class="customise_background" >Customise your background</span><span class="customise_icon">[icon class="fa fa-cogs fa-x"][/icon]</span></button></div>
		</div>
	<?php
		//include('sites/all/themes/evolve/commonFile/customizeBackgroundImage.php');
		apa_function_customizeBackgroundImage_form();
	?>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 top-info bottom-space">
			<div class="col-xs-12 col-md-6 mobile_line" >
				<table class="table table-responsive bordless">
					<tbody class="limit-width" style="border-top: none;">
						<tr>
						<span class="med-accent-header cairo"><strong>Your details</strong></span>
						</tr>
						<tr>
							<td><strong>Name:</strong></td>
							<td class="user-name"><?php echo $user['Firstname']." ".$user['Lastname']; ?></td>
						</tr>
						<tr>
							<td><strong><?php if($_SESSION['MemberTypeID']=="1"){ echo "User ID:";} else{ echo "Member ID:";}?></strong></td>
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
						<?php if(isset($_SESSION['Speciality']) && sizeof($_SESSION['Speciality']) != 0): ?>
						<tr>
							<td><strong>Specialty:</strong></td>
							<td>
							<?php 
								foreach($_SESSION['Speciality'] as $Speciality){
									echo $Speciality['Specialisation'];
									echo "&nbsp;";
								}
							?>
							</td>
						</tr>
						<?php endif; ?>
						<?php if(isset($user['Officebearer']) && $user['Officebearer'] != ""): ?>
						<tr>
							<td><strong>Officebearer positions:</strong></td>
							<td><?php echo $user['Officebearer']; ?></td>
						</tr>
						<?php endif; ?>
						<?php if($_SESSION['MemberTypeID']!="1"): ?>
						<tr>
							<td><strong>Your Branch:</strong></td>
							<td><?php echo $user['HomeBranch']; ?></td>
						</tr>
						<?php endif;?>
						<?php if(isset($user['PreferBranch']) && $user['PreferBranch'] != ""): ?>
						<tr>
							<td><strong>Additional Branch:</strong></td>
							<td><?php echo $user['PreferBranch']; ?></td>
						</tr>
						<?php endif; ?>
						<?php if(isset($user['PHN']) && $user['PHN'] != ""): ?>
						<tr>
							<td><strong>Primary health care network:</strong></td>
							<td><?php echo $user['PHN']; ?></td>
						</tr>
						<?php endif; ?>
						<tr>
						<?php
						// 2.2.2 - GET Membership certification PDF
						// Send - 
						// UserID
						// Response -
						// Membership certificate PDF
						//echo "<iframe name='YInkFroamame' src='http://www.physiotherapy.asn.au'></iframe>";
						//$Certi = GetAptifyData("2", $_SESSION['LinkId']);
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
				
				<div class="col-xs-12 none-padding" style="font-size: 1.2em"><a href="/changepassword"><strong style="text-decoration: underline;">Change your password</strong></a></div>
				<!--div class="col-xs-12 none-padding">
					<a href class="black-underline-link" data-toggle="modal" data-target="#YInkFroamame">
						<span>Membership certificate</span></a>
				</div>

				<div class="col-xs-12 none-padding">
					<a href class="black-underline-link" data-toggle="modal" data-target="#KiNsuraneCiynbC">
						<span>Insurance certification</span></a>	
				</div-->
				
				<?php /*
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
				*/ ?>
			</div>   
			<script>
			<?php /*
			$(document).ready(function() {
				if (window.frames['YInkFroamame'] && !window.userSet){
					window.userSet = true;
					frames['YInkFroamame'].location.href='<?php echo $Certi["M"]; ?>';
					frames['KiNsuraneCiynbC'].location.href='<?php echo $Certi["I"]; ?>';
				}
			});
			*/ ?>
			</script>
			<?php if($_SESSION['MemberTypeID']!="1"): ?>
			<div class="col-xs-12 col-md-6 mobile_line" >
				<div class="col-xs-12 center">				 
					<span class="cairo lead-heading">Your membership</br> snapshot</span>		
			    </div>
				<div class="col-xs-6 col-md-6 circle-container">
					<div class="circle"><span class="number"><?php 
					if ( !empty($user['Yearmembership']) ){
						echo $user['Yearmembership'];
					} else {
						echo "0";
					} ?></span><span class="text">Years of membership</span></div>
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
					<span class="text">CPD hours <a href="/pd/cpd-diary">Full CPD diary</a></span>
				</div>
			</div>
			<?php endif;?>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bottom-space bottom-section flex-column">
		<?php if($_SESSION['MemberTypeID']!="1"): ?>
			<div class="col-xs-12 col-sm-12 col-md-4 mobile_line" id="national-groups">
				<span class="small-heading cairo">Your National Groups</span>
				<div class="col-xs-12 dashboard-content-bottom ng-icons-group">

						<?php 
						nationalIcons();
						?>

					</div>
				<a class="accent-button" href="/joinnationalgroup" id="ng-join-btn"><span>Join more</span></a>
			</div>
			<?php endif;?>
			<div class="col-xs-12 col-sm-12 col-md-4 mobile_line prf">
					<span class="small-heading cairo">Donate to the PRF</span>
					<img style="display: block" src="/sites/default/files/PRF_155x56.png" alt="">
					<a class="accent-button" href="/PRFdonation"><span>Donate today</span></a>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4 mobile_line feedback">
				<span class="small-heading cairo">Suggestions/ feedback</span>
				<span class="dashboard-content-bottom">If you have a question or concern, please don’t hesitate to contact us. We’re always looking for ways to improve our member offering.</span>
				<a class="accent-button" href="/contact-us"><span>Submit</span></a>
			</div>
		</div>
		<?php 
			$block = block_load('block', '308');
			$get = _block_get_renderable_array(_block_render_blocks(array($block)));
			$output = drupal_render($get);        
			print $output;
			
		?>
	</div>
</div>
<?php else : 
	// todo
	// add log-in button with message - you must be logged in
	?>
		<div class="flex-container" id="non-member">
			<div class="flex-cell">
				<h3 class="light-lead-heading">Please login to see this page.</h3>
			</div>
			<div class="flex-cell cta">
				<a data-target="#loginAT" data-toggle="modal" href="#" class="login">Login</a>
				<a href="/membership-question" class="join">Join now</a>
			</div>
			<div class="flex-cell pd-featured"><img src="/sites/default/files/pd-featured-images/next-18.5.png"></div>
		</div>
<?php endif; ?>
<?php logRecorder(); ?>