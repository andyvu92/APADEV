<?php 
  $platform = render($content['field_supported_platforms']);
  $isFeatured = ((array)$content['field_is_featured']['#items'][0]['taxonomy_term'])["name"];
  $ios = $content['field_apple_link']['#items']['0']['value'];
  $android = $content['field_android_link']['#items']['0']['value'];
  $webApp = $content['field_web_app_link']['#items']['0']['value'];
  $cost = $content['field_cost']['#items']['0']['value'];
  $description = $content['body']['#items']['0']['value'];
  $contact = $content['field_contact']['#items']['0']['value'];
  $termsConditions = $content['field_terms_and_conditions']['#items']['0']['value'];
?>

<?php 
  $applogo = render($content['field_logo']);
  $typePos = strpos($applogo, 'typeof');
  $a = $typePos + 8;
  $b = $typePos + 26;
  //echo "a: $a & b: $b <br />";
  $type = substr($applogo, $a, 10);
  if($type == "foaf:Image") {
    $num1 = strpos($applogo, "src");
    $num2 = strpos($applogo, 'width') - 7;
    $num3 = $num2 - $num1;
    $imgUrlapplogo = substr($applogo, $num1 + 5, $num3);
  }
?>

<?php 
  $featureimg = render($content['field_featured_image']);
  $typePos = strpos($featureimg, 'typeof');
  $a = $typePos + 8;
  $b = $typePos + 26;
  //echo "a: $a & b: $b <br />";
  $type = substr($featureimg, $a, 10);
  if($type == "foaf:Image") {
    $num1 = strpos($featureimg, "src");
    $num2 = strpos($featureimg, 'width') - 7;
    $num3 = $num2 - $num1;
    $appfeatureimg = substr($featureimg, $num1 + 5, $num3);
  }
?>

<?php 
  $img1 = render($content['field_app_screen_1']);
  $typePosimg1 = strpos($img1, 'typeof');
  $aimg1 = $typePosimg1 + 8;
  $bimg1 = $typePosimg1 + 26;
  //echo "a: $a & b: $b <br />";
  $typeimg1 = substr($img1, $aimg1, 10);
  if($typeimg1 == "foaf:Image") {
    $num1img1 = strpos($img1, "src");
    $num2img1 = strpos($img1, 'width') - 7;
    $num3img1 = $num2 - $num1;
    $imgUrlimg1 = substr($img1, $num1img1 + 5, $num3img1);
  }
?>

<?php 
  $img2 = render($content['field_app_screen_2']);
  $typePosimg2 = strpos($img2, 'typeof');
  $aimg2 = $typePosimg2 + 8;
  $bimg2 = $typePosimg2 + 26;
  //echo "a: $a & b: $b <br />";
  $typeimg2 = substr($img2, $aimg2, 10);
  if($typeimg2 == "foaf:Image") {
    $num1img2 = strpos($img2, "src");
    $num2img2 = strpos($img2, 'width') - 7;
    $num3img2 = $num2 - $num1;
    $imgUrlimg2 = substr($img2, $num1img2 + 5, $num3img2);
  }
?>

<?php 
  $img3 = render($content['field_app_screen_3']);
  $typePosimg3 = strpos($img3, 'typeof');
  $aimg3 = $typePosimg3 + 8;
  $bimg3 = $typePosimg3 + 26;
  //echo "a: $a & b: $b <br />";
  $typeimg3 = substr($img3, $aimg3, 10);
  if($typeimg3 == "foaf:Image") {
    $num1img3 = strpos($img3, "src");
    $num2img3 = strpos($img3, 'width') - 7;
    $num3img3 = $num2 - $num1;
    $imgUrlimg3 = substr($img3, $num1img3 + 5, $num3img3);
  }
?>

<?php 
  $img4 = render($content['field_app_screen_4']);
  $typePosimg4 = strpos($img4, 'typeof');
  $aimg4 = $typePosimg4 + 8;
  $bimg4 = $typePosimg4 + 26;
  //echo "a: $a & b: $b <br />";
  $typeimg4 = substr($img4, $aimg4, 10);
  if($typeimg4 == "foaf:Image") {
    $num1img4 = strpos($img4, "src");
    $num2img4 = strpos($img4, 'width') - 7;
    $num3img4 = $num2 - $num1;
    $imgUrlimg4 = substr($img4, $num1img4 + 5, $num3img4);
  }
?>

<div id="node-<?php print $node->nid; ?>" style="margin-bottom: 0" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <div class="app_inner_wrapper">
    <div class="app_featured_img">
      <div class="img_wrapper">
        <?php
          if($type == "foaf:Image") {
            echo "<img src=".'"'.$appfeatureimg.'"'.";'>";
          }
        ?>
      </div>
    </div>
    
    <div class="app_content">
      <?php 
        if ( $isFeatured == 'yes' ){
          echo "<h2 class='lead-heading'>Featuring this month:</h2>";
        }
      ?>
      <div class="app_heading">
        <div class="app_logo">
          <?php
            if($typeimg1 == "foaf:Image") {
              echo "<img class='img1' src=".'"'.$imgUrlapplogo.'"'.";'>";
            }
          ?>
        </div>
        <div class="app_title_provider">
          <h3 class="app_title"><?php print $title;?></h3>
          <span class="app_provider">
            by <?php print render($content['field_creator']['#items']['0']['value']); ?>
          </span>
        </div>
      </div>
      
      <div class="app_description">
        <?php 
          $excerp = $content['field_excerp']['#items']['0']['value'];
          if ($isFeatured == 'yes'){
            //$maxPos = 500;
          } else  {
            //$maxPos = 80;
          }
          //if (strlen($excerp) > $maxPos)
          {
              //$lastPos = $maxPos - strlen($excerp);
              //$excerp = substr($excerp, 0, strrpos($excerp, ' ', $lastPos)) . '...';
          }
          print $excerp; 
        ?>
      </div>
      <?php 
        $striped_node_url = str_replace("/featured-app/","",$node_url);
        if ( $isFeatured == 'yes' ){
          echo "<a class='initiate_data cta_light' data-src='".$striped_node_url."'>Read more</a>";
        } else {
          echo "<a data-src='".$striped_node_url."' class='app_readmore initiate_data'>Read more</a>";
        }
      ?>

      <!-- hidden content -->
      <div class="hidden_content">
        <div class="download_urls">
          <a class="ios" target="_blank" rel="nofollow" href="<?php print $ios ?>">Download on apple</a>
          <a class="android" target="_blank" rel="nofollow" href="<?php print $android ?>">Download on android</a>
          <a class="webApp" target="_blank" rel="nofollow" href="<?php print $webApp ?>">Go to the Website</a>
        </div> <!-- end download url -->
        <div class="app_platforms">
          <?php echo $platform ?>
        </div><!-- end platform -->
        <div class="app_images">
          <?php
            if($typeimg1 == "foaf:Image") {
              echo "<img class='img1' src=".'"'.$imgUrlimg1.'"'.";'>";
            }
            if($typeimg2 == "foaf:Image") {
              echo "<img class='img2' src=".'"'.$imgUrlimg2.'"'.";'>";
            }
            if($typeimg3 == "foaf:Image") {
              echo "<img class='img3' src=".'"'.$imgUrlimg3.'"'.";'>";
            }
            if($typeimg4 == "foaf:Image") {
              echo "<img class='img4' src=".'"'.$imgUrlimg4.'"'.";'>";
            }
          ?>
        </div><!-- end app images -->
        <div class="app_cost">
            <?php print $cost ?>
        </div><!-- end app cost -->
        <div class="app_description">
            <?php print $description ?>
        </div><!-- end app description -->
        <div class="app_contact">
            <?php print $contact ?>
        </div><!-- end app contact -->
        <div class="app_terms_conditions">
            <?php print $termsConditions ?>
        </div><!-- end app terms Conditions -->

      </div>      <!-- end hidden content -->
    
    </div>
  </div>
</div>