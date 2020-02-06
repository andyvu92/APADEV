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
    <div class="flex-container join-NGtable">
        <div class="flex-cell">
            <?php if(in_array("20", $mgProduct) && !$SMag):?>
				<input type="checkbox" name="9977" id="9977" class="styled-checkbox MGname0" checked>
				<label class="NGnameText0" for="9977">Sports Magazine</label>
			<?php endif;?>
            <?php if(in_array("11", $mgProduct) && !$TMag):?>
				<input type="checkbox" name="9978" id="9978" class="styled-checkbox MGname0" checked>
				<label class="NGnameText0" for="9978">InTouch Magazine</label>
			<?php endif;?>
        </div>
        <button class='placeorder accent-btn' type='submit' value='Add to cart'>Add to cart</button>
    </div>
</form>
<?php endif; ?>
<?php else:?>
<!-- NON-MEMBER SECTION -->
<div class="flex-container" id="non-member">
    <!-- LOGIN PROM -->
    <?php 
			$block = block_load('block', '358');
			$get = _block_get_renderable_array(_block_render_blocks(array($block)));
			$output = drupal_render($get);        
			print $output;
		?>



</div>

<?php endif; ?>