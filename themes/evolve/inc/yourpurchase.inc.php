<?php
include('sites/all/themes/evolve/commonFile/updateBackgroundImage.php');
/* get background image****/
if(isset($_SESSION['UserId'])) { $userID = $_SESSION['UserId'];} else { $userID =0; }
$background = getBackgroundImage($userID);
/* get background image****/
// 2.2.17 - GET payment history list
// Send - 
// UserID
// Response -
// Invoice ID, product name, Invoice, Price, date
if(isset($_SESSION["Log-in"])) {
	$data["ID"] = $_SESSION["UserId"];
	$product = GetAptifyData("17", $data);
	//print_r($product);
} else {
	echo "not logged in";
}
$products = $product["Orders"]
//rsort($products);
?>
<div id="pre_background" style="display:none">background_<?php echo $background; ?></div>
<?php include('sites/all/themes/evolve/commonFile/dashboardLeftNavigation.php'); ?>
<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 background_<?php echo $background; ?>" id="dashboard-right-content">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dashboard_detail">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><span class="dashboard-name cairo"><strong>Your purchases</strong></span></div>
			<div class="col-xs-6 col-sm-6"><button class="dashboard-backgroud" data-target="#myModal" data-toggle="modal"><span class="customise_background">Customise your background</span><span class="customise_icon">[icon class="fa fa-cogs fa-x"][/icon]</span></button></div>
		</div>
        <?php
			include('sites/all/themes/evolve/commonFile/customizeBackgroundImage.php');
	    ?>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
				<div class="row" style="padding: 10px 0;"><a class="event4" style="cursor: pointer;"><span class="text-underline accent" id="recent-purchases"><strong>Recent</strong></span> </a><a class="event5" style="cursor: pointer; margin-left:10px;"><span id="all-purchases" class="accent"><strong>See all purchases</strong></span></a></div>
				<div class="down4">
					<table class="table table-responsive">
						<tbody>
							<tr>
								<td><span class="table-heading">Product Name</span></td>
								<td><span class="table-heading">Download Invoice</span></td>
								<td><span class="table-heading">Price</span></td>
								<td><span class="table-heading">Date</span></td>
							</tr>
							<?php 
							foreach($products as $product){
								$now = date('d-m-Y');
								if(strtotime($now)<strtotime('+1 years',strtotime($product['Orderdate']))){
									echo "<tr>";
									echo "<td>".$product['OrderLines'][0]['ProductName']."</td>";
									echo '<td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Iaksbnkvoice'.$product['ID'].'"><span style="text-decoration: underline; color:white;">Invoice</span></button></td>';
									echo "<td>".$product['Paymenttotal']."</td>";
									echo "<td>".$product['Orderdate']."</td>";
									echo "</tr>";
								}
							}
							?>	
						</tbody>
					</table>
				</div>
				<div class="down5"   style="display: none;">
					<table class="table table-responsive">
						<tbody>
							  <tr>
								<td><span class="table-heading">Product Name</span></td>
								<td><span class="table-heading">Download Invoice</span></td>
								<td><span class="table-heading">Price</span></td>
								<td><span class="table-heading">Date</span></td>
							</tr>
							<?php
							$apis = Array();
							foreach($products as $product){
								array_push($apis, $product["ID"]);
								echo "<tr>";
								echo "<td>".$product['OrderLines'][0]['ProductName']."</td>";
								echo '<td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Iaksbnkvoice'.$product['ID'].'"><span style="text-decoration: underline; color:white;">Invoice</span></button></td>';
								echo "<td>".$product['Paymenttotal']."</td>";
								echo "<td>".$product['Orderdate']."</td>";
								echo "</tr>";
								echo '<div id="Iaksbnkvoice'.$product['ID'].'" class="modal fade big-screen" role="dialog">
									  <div class="modal-dialog">

										<!-- Modal content-->
										<div class="modal-content">
										  <div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
										  </div>
										  <div class="modal-body">
											<iframe name="Iaksbnkvoice'.$product['ID'].'" src="http://www.physiotherapy.asn.au"></iframe>
										  </div>
										  <div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										  </div>
										</div>

									  </div>
									</div>';
							}
							//// 2.2.18 - GET payment history list
							// Send - 
							// UserID, Invoice_ID
							// Response -
							// Invoice PDF
							$invoiceAPI = GetAptifyData("18", $apis);
							?>	
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<?php logRecorder(); ?>
	<style type="text/css">
		.big-screen {
			width: 62%;
			margin: auto;
			min-width: 1190px;
		}
		.big-screen .modal-dialog, .big-screen .modal-dialog .modal-content, .big-screen .modal-dialog .modal-content .modal-body, .big-screen iframe {
			width: 100%;
			height: 100%;
		}
	</style> 
	<script>
	$(document).ready(function() {
		if (window.frames["<?php echo "Iaksbnkvoice".$apis[0]; ?>"] && !window.userSet){
			//window.userSet = true;
			
			<?php 
				$count = 0;
				$tt = 0;
				foreach($apis as $api) {
					if($count > 30) {
						$tt++;
						break;
					}
					echo "frames['Iaksbnkvoice".$api."'].location.href='".$invoiceAPI[$count]."';\n";
					$count++;
				}
			?>
		}
	});
	</script>
	<?php if($tt > 0): ?>
	<script>
	$(document).ready(function() {
		if (window.frames["<?php echo "Iaksbnkvoice".$apis[31]; ?>"] && !window.userSet){
			window.userSet = true;
			<?php 
				$count = 0;
				foreach($apis as $api) {
					if($count > 60) {
						$tt++;
						echo "window.userSet = false";
						break;
					}
					if($count > 30) {
						echo "frames['Iaksbnkvoice".$api."'].location.href='".$invoiceAPI[$count]."';\n";
					}
					$count++;
				}
			?>
		}
	});
	</script>
	<?php endif; ?>
	<?php if($tt > 1): ?>
	<script>
	$(document).ready(function() {
		if (window.frames["<?php echo "Iaksbnkvoice".$apis[61]; ?>"] && !window.userSet){
			window.userSet = true;
			<?php 
				$count = 0;
				foreach($apis as $api) {
					if($count > 90) {
						$tt++;
						echo "window.userSet = false";
						break;
					}
					if($count > 60) {
						echo "frames['Iaksbnkvoice".$api."'].location.href='".$invoiceAPI[$count]."';\n";
					}
					$count++;
				}
			?>
		}
	});
	</script>
	<?php endif; ?>
	<?php /*if($tt > 2): ?>
	<script>
	$(document).ready(function() {
		if (window.frames["<?php echo "Iaksbnkvoice".$apis[91]; ?>"] && !window.userSet){
			window.userSet = true;
			<?php 
				foreach($apis as $api) {
					if($count > 90) {
						echo "frames['Iaksbnkvoice".$api."'].location.href='".$invoiceAPI[$count]."';\n";
					}
					$count++;
				}
			?>
		}
	});
	</script>
	<?php endif;*/ ?>
</div>
 