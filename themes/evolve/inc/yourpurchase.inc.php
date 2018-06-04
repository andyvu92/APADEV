<?php
include('sites/all/themes/evolve/commonFile/updateBackgroundImage.php');

// 2.2.17 - GET payment history list
// Send - 
// UserID
// Response -
// Invoice ID, product name, Invoice, Price, date
if(isset($_SESSION["Log-in"])) {
	$data["ID"] = $_SESSION["UserId"];
	$product = GetAptifyData("17", $data);
	print_r($product);
} else {
	echo "not logged in";
}
$products = $product["Orders"]
//rsort($products);
?>
<div id="pre_background" style="display:none">background_<?php echo $user['background']; ?></div>
<?php include('sites/all/themes/evolve/commonFile/dashboardLeftNavigation.php'); ?>
<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 background_<?php echo $user['background']; ?>" id="dashboard-right-content">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dashboard_detail">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><span class="dashboard-name"><strong>Your purchases</strong></span></div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><button class="dashboard-backgroud" data-target="#myModal" data-toggle="modal"><span class="customise_background">Customise your background</span><span class="customise_icon">[icon class="fa fa-cogs fa-x"][/icon]</span></button></div>
		</div>
        <?php
			include('sites/all/themes/evolve/commonFile/customizeBackgroundImage.php');
	    ?>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
				<p><a class="event4" style="cursor: pointer;"><span class="text-underline" id="recent-purchases" style="margin-left:1%;"><strong>Recent purchases</strong></span> </a><a class="event5" style="cursor: pointer; margin-left:10px;"><span id="all-purchases"><strong>See all purchases</strong></span></a></p>
				<div class="down4">
					<table class="table table-responsive">
						<tbody>
							<tr>
								<td>Prodcut Name</td>
								<td>Download Invoice</td>
								<td>Price</td>
								<td>Date</td>
							</tr>
							<?php foreach($products as $product){
								$now = date('d-m-Y');
								if(strtotime($now)<strtotime('+1 years',strtotime($product['Orderdate']))){
									echo "<tr>";
									// 2.2.18 - GET payment history list
									// Send - 
									// UserID, Invoice_ID
									// Response -
									// Invoice PDF
									$send["UserID"] = "UserID";
									$send["Invoice_ID"] = $product['ID'];
									$invoiceAPI = GetAptifyData("18", $send); // #_SESSION["UserID"];
									echo "<td>".$product['OrderLines'][0]['ProductName']."</td>";
									echo '<td><a style="color:white;" href="' .$product['ID'].'">'.$invoiceAPI["Invoice"].'</a></td>';
									echo "<td>".$product['Paymenttotal']."</td>";
									echo "<td>".$product['Orderdate']."</td>";
									echo "</tr>";
								}
							} ?>	
						</tbody>
					</table>
				</div>
				<div class="down5"   style="display: none;">
					<table class="table table-responsive">
						<tbody>
							  <tr>
								 <td>Prodcut Name</td>
								 <td>Download Invoice</td>
								  <td>Price</td>
								  <td>Date</td>
							</tr>
							<?php foreach($products as $product){
								echo "<tr>";
								// 2.2.18 - GET payment history list
								// Send - 
								// UserID, Invoice_ID
								// Response -
								// Invoice PDF
								$send["UserID"] = "UserID";
								$send["Invoice_ID"] = $product['ID'];
								$invoiceAPI = GetAptifyData("18", $send); // #_SESSION["UserID"];
								echo "<td>".$product['OrderLines'][0]['ProductName']."</td>";
								echo '<td><a style="color:white;" href="' .$product['ID'].'">'.$invoiceAPI["Invoice"].'</a></td>';
								echo "<td>".$product['Initialpaymentamount']."</td>";
								echo "<td>".$product['Orderdate']."</td>";
								echo "</tr>";
								   
							} ?>	
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
 