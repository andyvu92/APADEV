<?php
 if(isset($_SESSION["UserId"])) {
	$variableData['id'] = $_SESSION["UserId"];
	$Quatation = GetAptifyData("45", $variableData);

	if(sizeof($Quatation["results"])!=0){
		$tag = true;

	}
     else{  $tag = false; }
 }

?>
<div class="container home-main-grid">
    <div class="flex-container">
        <div class="flex-cell flex-grid-sm-padding">
            <div class="flex-col-6 fit-div image-grid flex-md-down-fw main-block">
                <?php echo views_embed_view('homemainblock', 'block');?>
            </div>
            <div class=" flex-col-6 flex-column none-padding flex-md-down-fw">
                <div class="flex-col-6 image-grid"><?php echo views_embed_view('homemainblock', 'block_1');?></div>

                <div class="flex-col-6 image-grid" ><?php echo views_embed_view('homemainblock', 'block_2');?></div>
                <?php if(!isset($_SESSION['UserId'])): ?>
                 <div class="flex-col-6 image-grid"><?php echo views_embed_view('homemainblock', 'block_4');?></div>
              <?php endif;?>
                 <?php if(isset($_SESSION['UserId'])): ?>
                      <?php    if($_SESSION['MemberTypeID']=="1"):    ?>
                        <div class="flex-col-6 image-grid"><?php echo views_embed_view('homemainblock', 'block_4');?></div>
                         <?php /* elseif(!empty($_SESSION['payThroughDate']) && checkRenew($_SESSION['payThroughDate'], $tag)): ?>
                         <div class="flex-col-6 image-grid"><?php echo views_embed_view('homemainblock', 'block_6');?></div>
                         <?php */ else: ?>

                           <div class="flex-col-6 image-grid"><?php echo views_embed_view('homemainblock', 'block_3');?></div>
                     <?php endif;?>
                        <?php endif;?>

                <div class="flex-col-6 image-grid" ><?php echo views_embed_view('homemainblock', 'block_5');?></div>
            </div>
        </div>
    </div>
</div>
