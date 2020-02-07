<?php if(isset($_SESSION['UserId']) && $_SESSION['MemberTypeID']!="1" && $_SESSION['payThroughDate']>= date("d-m-Y") ): ?>
<?php if(isset($_GET["list"])): ?>
<?php 
$mgProduct = array();
if(isset($_GET["list"])){
$mgProduct = explode(" ",$_GET['list']);
}
//Get user's subscribed magezine products
$sendData["UserID"] = $_SESSION['UserId'];
$Fellows = aptify_get_GetAptifyData("22", $sendData);
$MagSubs = Array();
$Fellow = $Fellows["results"];
$TMag = false;
$SMag = false;
foreach($Fellow as $Subs) {
	if($Subs["ProductID"] == "9978") {
		$TMag = true;
	}
	
	if($Subs["ProductID"] == "9977") {
		$SMag = true;
	}
}
?>
<form id="single-ng-join" action="/pd/pd-shopping-cart" method="POST" style="width:100%;">
    <input type="hidden" name="PostNG" />
    <div id="magazine-subscription">
        <div class="inner-magazine-wrapper">

			<div class="magazine-grid">
				<?php // if eligible for intouch magazine ?>
				<?php if(in_array("11", $mgProduct) && !in_array("20", $mgProduct) && !$SMag ): ?>
					<img src="/sites/default/files/MEMBERSHIP/magazine/intouch-issue3.png" alt="inTouch Issue 1" class="magazine">
					<img src="/sites/default/files/MEMBERSHIP/magazine/intouch-issue1.png" alt="inTouch Issue 2" class="magazine">
					<img src="/sites/default/files/MEMBERSHIP/magazine/intouch-issue2.png" alt="inTouch Issue 3" class="magazine">
					<img src="/sites/default/files/MEMBERSHIP/magazine/intouch-issue4.png" alt="inTouch Issue 4" class="magazine">
				<?php // if eligible for sport magazine ?>
				<?php elseif(in_array("20", $mgProduct) && !in_array("11", $mgProduct) && !$SMag): ?>
					<img src="/sites/default/files/MEMBERSHIP/magazine/sport-issue2.png" alt="sport Issue 1" class="magazine">
					<img src="/sites/default/files/MEMBERSHIP/magazine/sport-issue1.png" alt="sport Issue 2" class="magazine">
					<img src="/sites/default/files/MEMBERSHIP/magazine/sport-issue3.png" alt="sport Issue 3" class="magazine">
					<img src="/sites/default/files/MEMBERSHIP/magazine/sport-issue4.png" alt="sport Issue 4" class="magazine">
				<?php // if eligible for both ?>
				<?php else: ?>
					<img src="/sites/default/files/MEMBERSHIP/magazine/intouch-issue3.png" alt="inTouch Issue 1" class="magazine">
					<img src="/sites/default/files/MEMBERSHIP/magazine/intouch-issue1.png" alt="inTouch Issue 2" class="magazine">
					<img src="/sites/default/files/MEMBERSHIP/magazine/sport-issue3.png" alt="sport Issue 3" class="magazine">
					<img src="/sites/default/files/MEMBERSHIP/magazine/sport-issue4.png" alt="sport Issue 4" class="magazine">
				<?php endif; ?>
			</div>

			<div class="magazine-subscribe-content">
				<h2 class="lead-heading">Sign me up!</h2>
				<p>For only $36, you’ll receive four printed issues per year, comprised of tailored educational articles featuring the latest research as well as upcoming professional development opportunities.</p>
				<div class="subscribe-option">
					<?php if(in_array("11", $mgProduct) && !$TMag):?>
						<div class="option">
							<input type="checkbox" name="9978" id="9978" class="styled-checkbox" checked>
							<label for="9978">InTouch - Musculoskeletal</label>
						</div>
					<?php endif;?>
					<?php if(in_array("20", $mgProduct) && !$SMag):?>
						<div class="option">
							<input type="checkbox" name="9977" id="9977" class="styled-checkbox" checked>
							<label for="9977">Sports Physio & Exercise</label>
						</div>
					<?php endif;?>
				</div>
				<div class="action-wrapper">
					<button class='placeorder accent-btn' type='submit' value='Add to cart'>Add to cart</button>
					<a class='accent-btn back-to-prev' href="/dashboard">Back to previous</a>
				</div>
				<div class="note">
					<p>Head to your shopping cart to check out and finalise your purchase.</p>
				</div>
			</div>
        </div>
    </div>
</form>

<?php else: ?>
<?php header('Location: /dashboard');?>

<?php endif; ?>
<?php else:?>
<!-- NON-MEMBER SECTION -->
<div class="flex-container" id="non-member">
    <!-- LOGIN PROM -->
    <?php 
		$block = block_load('block', '358');
		$get = _block_get_renderable_array(_block_render_blocks(array($block)));
		$output = drupal_render($get);        
		print $output.' <span class="space-100"></span> ';
	?>
</div>

<?php endif; ?>

<style>
	#section-header{
		border-bottom: 10px solid #E7E8E9;
	}
	#non-member{
		background: none!important;
	}
</style>