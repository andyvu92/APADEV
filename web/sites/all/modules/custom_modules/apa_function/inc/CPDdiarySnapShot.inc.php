<?php if(isset($_SESSION['UserId'])):?>
<?php  if($_SESSION['MemberTypeID']!="1"): ?>
<?php
// 2.2.33 - GET CPD diary
// Send -
// UserID
// Response -
// PD_id, NPD_id, CPD hours, PD title, PD date, CPD points
// Description, Date, Time, Provider, Reflection
$results = aptify_get_GetAptifyData("33", $_SESSION["UserId"]);
$CPDHousrs = $results["CurrentCPDHour"];
$currentYear = date("Y");
?>

<h2>Your <?php echo $currentYear;?> CPD snapshot</h2>

<div id="cpd" style="display:none"><?php echo $CPDHousrs; ?></div>
<div class="col-xs-12 col-md-12 circle-container" id="goo-chart">
	<div id="donutchart"></div>
	<span class="number"><?php
	if (!empty($CPDHousrs)){
		echo $CPDHousrs;
	}
	else{
		echo '0';
	}

	?></span>
	<span class="text">CPD hours<br>Completed</span>
</div>
<?php logRecorder(); ?>


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
<?php endif;?>
<?php endif;?>
