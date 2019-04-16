<?php 
  $isFeatured = ((array)$content['field_is_featured']['#items'][0]['taxonomy_term'])["name"]; 
  $ios = $content['field_apple_link']['#items']['0']['value'];
  $android = $content['field_android_link']['#items']['0']['value'];
?>

<?php 
  $test = render($content['field_featured_image']);
  $typePos = strpos($test, 'typeof');
  $a = $typePos + 8;
  $b = $typePos + 26;
  //echo "a: $a & b: $b <br />";
  $type = substr($test, $a, 10);
  if($type == "foaf:Image") {
    $num1 = strpos($test, "src");
    $num2 = strpos($test, 'width') - 7;
    $num3 = $num2 - $num1;
    $imgUrl = substr($test, $num1 + 5, $num3);
  }
?>

<div id="node-<?php print $node->nid; ?>" style="margin-bottom: 0" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <div class="app_inner_wrapper"<?php print $content_attributes; ?>>
    <div class="app_featured_img">
      <div class="img_wrapper" style="background-image: url(<?php echo $imgUrl; ?>);">
        <?php
          if($type == "foaf:Image") {
            echo "<img src=".'"'.$imgUrl.'"'.";'>";
          } else {
            print render($content['field_featured_image']);
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
          <?php $test = render($content['field_logo']);
            $typePos = strpos($test, 'typeof');
            $a = $typePos + 8;
            $b = $typePos + 26;
            //echo "a: $a & b: $b <br />";
            $type = substr($test, $a, 10);
            if($type == "foaf:Image") {
              $num1 = strpos($test, "src");
              $num2 = strpos($test, 'width') - 7;
              $num3 = $num2 - $num1;
              if ( $isFeatured == 'yes' ){
                echo "<img src=".'"'.substr($test, $num1 + 5, $num3).'"'.";'>";
              }
            } else {
              print render($content['field_logo']);
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
        <?php print render($content['field_excerp']['#items']['0']['value']); ?>
      </div>
      <?php 
        $striped_node_url = str_replace("/featured-app/","",$node_url);
        if ( $isFeatured == 'yes' ){
          echo "<div class='cta-primary'><a class='initiate_data' data-src='".$striped_node_url."'><span>Check it out</span></a></div>";
        } else {
          echo "<a data-src='".$striped_node_url."' class='app_readmore initiate_data'>Read more</a>";
        }
      ?>
      <div class="download_urls">
        <a class="ios" target="_blank" href="<?php print $ios ?>">Download on apple</a>
        <a class="android" target="_blank" href="<?php print $android ?>">Download on android</a>
      </div>
    </div>
  </div>
</div>
