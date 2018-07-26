<?php if(isset($_SESSION["UserId"])) : ?>
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
			<div class="col-xs-12"><span class="dashboard-name cairo"><strong>Your purchases</strong></span></div>
			<div class="col-xs-12 col-sm-6" style="display: none"><button class="dashboard-backgroud" data-target="#myModal" data-toggle="modal"><span class="customise_background">Customise your background</span><span class="customise_icon">[icon class="fa fa-cogs fa-x"][/icon]</span></button></div>
		</div>
        <?php
			include('sites/all/themes/evolve/commonFile/customizeBackgroundImage.php');
	    ?>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
				<div class="row" style="padding: 10px 0;"><a class="event4" style="cursor: pointer;"><span class="text-underline accent" id="recent-purchases"><strong>Recent</strong></span> </a><a class="event5" style="cursor: pointer; margin-left:10px;"><span id="all-purchases" class="accent"><strong>See all purchases</strong></span></a></div>
				<div class="down4">
					<div class="flex-container flex-flow-column member-purchases">

						<div class="flex-cell flex-flow-row border-btm">

							<div class="flex-col-4">
								<span class="table-heading">Product Name</span>
							</div>
							<div class="flex-col-3 flex-center">
								<span class="table-heading">Download Invoice</span>
							</div>
							<div class="flex-col-2">
								<span class="table-heading">Price</span>
							</div>
							<div class="flex-col-3">
								<span class="table-heading">Date</span>
							</div>
						</div>

						<?php 
							foreach($products as $product){
								$now = date('d-m-Y');
								if(strtotime($now)<strtotime('+1 years',strtotime($product['Orderdate']))){
									echo "<div class='flex-cell flex-flow-row'>";
									echo "<div class='flex-col-4'>".$product['OrderLines'][0]['ProductName']."</div>";
									echo '<div class="flex-col-3 flex-center"><a class="download-link" data-toggle="modal" data-target="#Iaksbnkvoice'.$product['ID'].'"><span class="invoice-icon"></span><span class="invoice-text">Invoice</span></a></div>';
									echo "<div class='flex-col-2'>".$product['Paymenttotal']."</div>";
									echo "<div class='flex-col-3'>".$product['Orderdate']."</div>";
									echo "</div>";
								}
							}
						?>

					</div>
				</div>

				<div class="down5"   style="display: none;">
				<div class="flex-container flex-flow-column member-purchases">

					<div class="flex-cell flex-flow-row border-btm">

						<div class="flex-col-4">
							<span class="table-heading">Product Name</span>
						</div>
						<div class="flex-col-3 flex-center">
							<span class="table-heading">Download Invoice</span>
						</div>
						<div class="flex-col-2">
							<span class="table-heading">Price</span>
						</div>
						<div class="flex-col-3">
							<span class="table-heading">Date</span>
						</div>

					</div>

					<?php
							$apis = Array();
							foreach($products as $product){
								array_push($apis, $product["ID"]);
								echo "<div class='flex-cell flex-flow-row'>";
								echo "<div class='flex-col-4'>".$product['OrderLines'][0]['ProductName']."</div>";
								echo '<div class="flex-col-3 flex-center"><a class="download-link" data-toggle="modal" data-target="#Iaksbnkvoice'.$product['ID'].'"><span class="invoice-icon"></span><span class="invoice-text">Invoice</span></a></div>';
								echo "<div class='flex-col-2'>".$product['Paymenttotal']."</div>";
								echo "<div class='flex-col-3'>".$product['Orderdate']."</div>";
								echo "</div>";
							}
							//// 2.2.18 - GET payment history list
							// Send - 
							// UserID, Invoice_ID
							// Response -
							// Invoice PDF
							$invoiceAPI = GetAptifyData("18", $apis);
							?>	
				</div>


				</div>
				<?php 
					foreach($products as $product) {
						echo '<div id="Iaksbnkvoice'.$product['ID'].'" class="modal fade big-screen" role="dialog">
								<div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									</div>
									<div class="modal-body">
									<iframe name="stsIaksbnkvoice'.$product['ID'].'" src="http://www.physiotherapy.asn.au"></iframe>
									</div>
									<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</div>

								</div>
							</div>';
					}
				?>
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
		if (window.frames["<?php echo "Iaksbnkvoice".$apis[0]; ?>"] && !window.userSet) {
			<?php if(count($invoiceAPI) <= 30) :?>
				window.userSet = true;
			<?php endif; ?>
			<?php	
				$count = 0;
				$tt = 0;
			?>
			<?php foreach($apis as $api): ?>
				<?php
					if($count > 30) {
						$tt++;
						break;
					}
				?>
				frames['stsIaksbnkvoice<?php echo $api; ?>'].location.href="<?php echo $invoiceAPI[$count]; ?>";
				<?php $count++; ?>
			<?php endforeach; ?>
			<?php	
				foreach($apis as $api) {
					if($count > 60) {
						$tt++;
						echo "window.userSet = false";
						break;
					}
					if($count > 30) {
						echo "frames['stsIaksbnkvoice".$api."'].location.href='".$invoiceAPI[$count]."';\n";
					}
					$count++;
				}
				foreach($apis as $api) {
					if($count > 90) {
						$tt++;
						echo "window.userSet = false";
						break;
					}
					if($count > 60) {
						echo "frames['stsIaksbnkvoice".$api."'].location.href='".$invoiceAPI[$count]."';\n";
					}
					$count++;
				}
			?>
		}
	});
	</script>
	<?php /* if($tt > 0): ?>
	<script>
	$(document).ready(function() {
		if (window.frames["<?php echo "Iaksbnkvoice".$apis[31]; ?>"] && !window.userSet){
			window.userSet = true;
			<?php 
				if(count($invoiceAPI) <= 60) {
					window.userSet = true;
				}
				$count = 0;
				foreach($apis as $api) {
					if($count > 60) {
						$tt++;
						echo "window.userSet = false";
						break;
					}
					if($count > 30) {
						echo "frames['stsIaksbnkvoice".$api."'].location.href='".$invoiceAPI[$count]."';\n";
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
						echo "frames['stsIaksbnkvoice".$api."'].location.href='".$invoiceAPI[$count]."';\n";
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
						echo "frames['stsIaksbnkvoice".$api."'].location.href='".$invoiceAPI[$count]."';\n";
					}
					$count++;
				}
			?>
		}
	});
	</script>
	<?php endif;*/ ?>
</div>
 <?php else : 
	// todo
	// add log-in button with message - you must be logged in
	?>
<p>please log-in to use this page</p>
<?php endif; ?>