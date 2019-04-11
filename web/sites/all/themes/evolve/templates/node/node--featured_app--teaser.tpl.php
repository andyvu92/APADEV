<div id="node-<?php print $node->nid; ?>" style="margin-bottom: 0" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <div class="app_inner_wrapper"<?php print $content_attributes; ?>>
    <div class="app_featured_img">
      <div class="img_wrapper">
        <?php $test = render($content['field_featured_image']);
          $typePos = strpos($test, 'typeof');
          $a = $typePos + 8;
          $b = $typePos + 26;
          //echo "a: $a & b: $b <br />";
          $type = substr($test, $a, 10);
          if($type == "foaf:Image") {
            $num1 = strpos($test, "src");
            $num2 = strpos($test, 'width') - 7;
            $num3 = $num2 - $num1;
            echo "<img src=".'"'.substr($test, $num1 + 5, $num3).'"'.";'>";
          } else {
            print render($content['field_featured_image']);
          }
        ?>
      </div>
    </div>
    
    <div class="app_content">
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
              echo "<img src=".'"'.substr($test, $num1 + 5, $num3).'"'.";'>";
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
      <a class="app_readmore">Read more</a>
    </div>
    
  </div>
</div>
