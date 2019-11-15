<?php
if(!function_exists('drupal_session_started'))
{
  die("Unauthorized Access");
}
?>
<?php if(isset($_SESSION["UserId"])) : ?>
<?php
//include('sites/all/themes/evolve/commonFile/updateBackgroundImage.php');
apa_function_updateBackgroundImage_form();
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
	$product = aptify_get_GetAptifyData("17", $data);
	//print_r($product);
} else {
	echo "not logged in";
}
$products = $product["Orders"];
//rsort($products);
$SetDate = strtotime("13-11-2018");
?>
<div id="pre_background" style="display:none">background_<?php echo $background; ?></div>
<?php //include('sites/all/themes/evolve/commonFile/dashboardLeftNavigation.php');
apa_function_dashboardLeftNavigation_form();
 ?>
<div class="dashboard_content col-xs-12 col-sm-12 col-md-10 col-lg-10 background_<?php //echo $background; ?>" id="dashboard-right-content">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dashboard_detail">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="col-xs-12"><span class="dashboard-name cairo">Your purchases</span></div>
			<div class="col-xs-12 col-sm-6" style="display: none"><button class="dashboard-backgroud" data-target="#myModal" data-toggle="modal"><span class="customise_background">Customise your background</span><span class="customise_icon">[icon class="fa fa-cogs fa-x"][/icon]</span></button></div>
		</div>
        <?php
			//include('sites/all/themes/evolve/commonFile/customizeBackgroundImage.php');
			apa_function_customizeBackgroundImage_form();
	    ?>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
				<div class="row" style="padding: 10px 0;"><a class="event4" style="cursor: pointer;"><span class="text-underline accent" id="recent-purchases"><strong>Recent</strong></span> </a><a class="event5" style="cursor: pointer; margin-left:10px;"><span id="all-purchases" class="accent"><strong>See all purchases</strong></span></a></div>
				<div class="down4">
					<div class="flex-container flex-flow-column member-purchases">

						<div class="flex-cell flex-flow-row border-btm">

							<div class="flex-col-6">
								<span class="table-heading">Order number</span>
							</div>
							<!--div class="flex-col-3 flex-center">
								<span class="table-heading">Download Invoice</span>
							</div-->
							<div class="flex-col-3">
								<span class="table-heading">Price</span>
							</div>
							<div class="flex-col-3">
								<span class="table-heading">Date</span>
							</div>
						</div>

						<?php 
						$counter = 0;
						if(!empty($products)) {
							$counterTwo = 0;
							$products = array_reverse($products);
							foreach($products as $product){
								$now = date('d-m-Y');
								$productDate = str_replace('/', '-', $product['Orderdate']);
								if($SetDate<=strtotime($productDate)){
									if(strtotime($now)<strtotime('+1 years',strtotime($productDate))){
										$counter++;
										$instal = false;
										echo "<div class='flex-cell flex-flow-row'>";
										$status = "";
										if($product['Orderstatus'] == "Cancelled") {
											$status = " - cancelled";
										}
										echo "<div class='flex-col-6'><a class='Tabs".$counter."'>Order ID: ".$product['ID'].$status."</a></div>";//$product['OrderLines'][0]['ProductName']."</a></div>";
										//echo '<div class="flex-col-3 flex-center"><a class="download-link" data-toggle="modal" data-target="#Iaksbnkvoice'.$product['ID'].'"><span class="invoice-icon"></span><span class="invoice-text">Invoice</span></a></div>';
										echo "<div class='flex-col-3'><div class='price".$counter."'>$".number_format($product['Grandtotal'],2)."</div></div>";
										$OrderDate = date('d-m-Y', strtotime($productDate));
										echo "<div class='flex-col-3'>".$OrderDate."</div>";
										echo "</div><div class='TabContents".$counter."' style='display: none;'>";
										foreach($product["OrderLines"] as $orderDetails) {
											echo "<div class='flex-cell flex-flow-row'>";
											echo "<div class='flex-col-6 orderListItems'>".$orderDetails['ProductName']."</div>";
											if($orderDetails['ProductCategory'] == "Memberships") {
												if($product["Grandtotal"] < $orderDetails['ProductPrice']) {
													$priceStart = doubleval($product["Grandtotal"]);
													foreach($product["OrderLines"] as $ForSubs) {
														if($ForSubs['ProductCategory'] != "Memberships") {
															$priceStart = $priceStart - doubleval($ForSubs['ProductPrice']);
														}
													}
													echo "<div class='flex-col-3'>$".number_format($priceStart,2)." (pro-rata)</div>";
												} else {
													echo "<div class='flex-col-3'>$".number_format($orderDetails['ProductPrice'],2)."</div>";
												}
											} else {
												echo "<div class='flex-col-3'>$".number_format($orderDetails['ProductPrice'],2)."</div>";
											}
											echo "<div class='flex-col-3'></div></div>";
											if($orderDetails['ProductName'] == "Administrative Fee") {$instal = true;}
										}
										if($instal) {
											echo "<div class='flex-cell flex-flow-row lastLineItem'>";
											echo "<div class='flex-col-6'><b>Left to pay</b></div>";
											echo "<div class='flex-col-3'>$".number_format($product['Balance'],2)."</div>";
											echo "<div class='flex-col-3'></div></div>";
										} else {
											echo "<div class='flex-cell flex-flow-row lastLineItem'></div>";
										}
										if($product["Balance"] != "0.0000") {
											echo "<div class='flex-cell flex-flow-row lastLineItem'>";
											echo "<div class='flex-col-6 orderListItems priceHighlight'>Total</div><div class='flex-col-3 priceHighlight'>$".number_format($product['Grandtotal'],2)."</div><div class='flex-col-3'></div>";
											echo "<div class='flex-col-6 orderListItems'>Paid</div><div class='flex-col-3'>$".number_format($product['Paymenttotal'],2)."</div><div class='flex-col-3'></div></div>";
											echo "<div class='flex-cell flex-flow-row'>";
											echo "<div class='flex-col-6 orderListItems priceHighlight'>Balance (amount owing)</div><div class='flex-col-3 priceHighlight'>$".number_format($product['Balance'],2)."</div><div class='flex-col-3'></div></div>";
										} else {
											echo "<div class='flex-cell flex-flow-row lastLineItem'>";
											echo "<div class='flex-col-6 orderListItems priceHighlight'>Total</div><div class='flex-col-3 priceHighlight'>$".number_format($product['Grandtotal'],2)."</div><div class='flex-col-3'></div></div>";
										}
										echo "</div>";
									}
								}
							}
						}
						?>

					</div>
				</div>

				<div class="down5"   style="display: none;">
				<div class="flex-container flex-flow-column member-purchases">

					<div class="flex-cell flex-flow-row border-btm">

						<div class="flex-col-6">
							<span class="table-heading">Product Name</span>
						</div>
						<!--div class="flex-col-3 flex-center">
							<span class="table-heading">Download Invoice</span>
						</div-->
						<div class="flex-col-3">
							<span class="table-heading">Price</span>
						</div>
						<div class="flex-col-3">
							<span class="table-heading">Date</span>
						</div>

					</div>

					<?php
							$apis = Array();
							$counterTwo = 0;
							if(!empty($products)) {
								foreach($products as $product){
									$productDate = str_replace('/', '-', $product['Orderdate']);
									$counter++;
									$instal = false;
									//array_push($apis, $product["ID"]);
									if($SetDate<=strtotime($productDate)){
										echo "<div class='flex-cell flex-flow-row'>";
										$status = "";
										if($product['Orderstatus'] == "Cancelled") {
											$status = " - cancelled";
										}
										echo "<div class='flex-col-6'><a class='Tabs".$counter."'>Order ID: ".$product['ID'].$status."</a></div>";//$product['OrderLines'][0]['ProductName']."</a></div>";
										//echo '<div class="flex-col-3 flex-center"><a class="download-link" data-toggle="modal" data-target="#Iaksbnkvoice'.$product['ID'].'"><span class="invoice-icon"></span><span class="invoice-text">Invoice</span></a></div>';
										echo "<div class='flex-col-3'><div class='price".$counter."'>$".number_format($product['Grandtotal'],2)."</div></div>";
										$OrderDate = date('d-m-Y', strtotime($productDate));
										echo "<div class='flex-col-3'>".$OrderDate."</div>";
										echo "</div><div class='TabContents".$counter."' style='display: none;'>";
										foreach($product["OrderLines"] as $orderDetails) {
											echo "<div class='flex-cell flex-flow-row'>";
											echo "<div class='flex-col-6 orderListItems'>".$orderDetails['ProductName']."</div>";
											if($orderDetails['ProductCategory'] == "Memberships") {
												if($product["Grandtotal"] < $orderDetails['ProductPrice']) {
													$priceStart = doubleval($product["Grandtotal"]);
													foreach($product["OrderLines"] as $ForSubs) {
														if($ForSubs['ProductCategory'] != "Memberships") {
															$priceStart = $priceStart - doubleval($ForSubs['ProductPrice']);
														}
													}
													echo "<div class='flex-col-3'>$".number_format($priceStart,2)." (pro-rata)</div>";
												} else {
													echo "<div class='flex-col-3'>$".number_format($orderDetails['ProductPrice'],2)."</div>";
												}
											} else {
												echo "<div class='flex-col-3'>$".number_format($orderDetails['ProductPrice'],2)."</div>";
											}
											echo "<div class='flex-col-3'></div></div>";
											if($orderDetails['ProductName'] == "Administrative Fee") {$instal = true;}
										}
										if($instal) {
											echo "<div class='flex-cell flex-flow-row lastLineItem'>";
											echo "<div class='flex-col-6'><b>Left to pay</b></div>";
											echo "<div class='flex-col-3'>$".number_format($product['Balance'],2)."</div>";
											echo "<div class='flex-col-3'></div></div>";
										} else {
											echo "<div class='flex-cell flex-flow-row lastLineItem'></div>";
										}
										if($product["Balance"] != "0.0000") {
											echo "<div class='flex-cell flex-flow-row lastLineItem'>";
											echo "<div class='flex-col-6 orderListItems priceHighlight'>Total</div><div class='flex-col-3 priceHighlight'>$".number_format($product['Grandtotal'],2)."</div><div class='flex-col-3'></div>";
											echo "<div class='flex-col-6 orderListItems'>Paid</div><div class='flex-col-3'>$".number_format($product['Paymenttotal'],2)."</div><div class='flex-col-3'></div></div>";
											echo "<div class='flex-cell flex-flow-row'>";
											echo "<div class='flex-col-6 orderListItems priceHighlight'>Balance (amount owing)</div><div class='flex-col-3 priceHighlight'>$".number_format($product['Balance'],2)."</div><div class='flex-col-3'></div>";
										} else {
											echo "<div class='flex-cell flex-flow-row lastLineItem'>";
											echo "<div class='flex-col-6 orderListItems priceHighlight'>Total</div><div class='flex-col-3 priceHighlight'>$".number_format($product['Grandtotal'],2)."</div><div class='flex-col-3'></div></div>";
										}
										echo "</div>";
									}
								}
							}
							//// 2.2.18 - GET payment history list
							// Send - 
							// UserID, Invoice_ID
							// Response -
							// Invoice PDF
							//$invoiceAPI = aptify_get_GetAptifyData("18", $apis);
							?>	
				</div>
				</div>
				<?php 
				/*
					if(!empty($products)) {
						foreach($products as $product) {
							echo '<div id="Iaksbnkvoice'.$product['ID'].'" class="modal fade big-screen" role="dialog">
									<div class="modal-dialog">

									<!-- Modal content-->
									<div class="modal-content">
										<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										</div>
										<div class="modal-body">
										<iframe name="stsIaksbnkvoice'.$product['ID'].'" src="https://www.physiotherapy.asn.au"></iframe>
										</div>
										<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										</div>
									</div>

									</div>
								</div>';
						}
					}
				*/
				?>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 21px;">If you would like to view your transaction history prior to November 2018, please get in touch via <a href="mailto:info@australian.physio">email</a> or phone 1300 306 622.</div>
		</div>
	</div>
	<?php logRecorder(); ?>
	<?php /*
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
		<?php if(!empty($apis)): ?>
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
	<?php endif; ?>
	});
	</script>
	*/ ?>
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
	<!-- NON-LOGIN USERS -->
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
<?php endif; ?>