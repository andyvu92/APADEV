
<div class="flex-container">
  <div class="flex-cell">
    <div class="flex-col-9 left-content theme-<?php echo $content['field_color_theme']['#items'][0]['value'];?>">
      <?php print render($content['body']);?>
    </div>
    <div class="flex-col-3 right-sidebar theme-<?php echo $content['field_color_theme']['#items'][0]['value'];?>">
      <span class="underline-heading"><?php echo $content['field_right_siderbar_headline']['#items'][0]['value'];?></span>
      <?php
        $blockID = $content['field_right_siderbar']['#items'][0]['value'];
        $block = block_load('block', $blockID);
        $get = _block_get_renderable_array(_block_render_blocks(array($block)));
        $output = drupal_render($get);
        print $output;
      ?>
    </div>
  </div>
</div>
<div class="space-50"></div>
<div class="full-width-alt bg-porcelain">
  <div class="content">
    <div class="container">
      <div class="flex-container">
        <div class="flex-cell">
          <div class="flex-col-9 left-content-alt theme-<?php echo $content['field_color_theme']['#items'][0]['value'];?>">
            <div class="space-50"></div>
            <?php
            $rens = render($content['field_list_items']);
            $linksList = explode("\n", $rens);
            $count = 0;
            $total = count($linksList);
            foreach($linksList as $ren) {
              // when it reached the max, break;
              if($count == $total) { break; }
              $org = $ren;
              // get rid of <p> tags
              $ren = str_replace("<p>","",$ren);
              $ren = str_replace("</p>","",$ren);
              // get rid of &nbsp;
              $string = htmlentities($ren, null, 'utf-8');
              $checks = str_replace("&nbsp;", " ", $string);
              $checks = html_entity_decode($checks);
              if(strpos($checks, "--")!== false && (strpos($checks, "--") == 0 || $count == 0 || strpos($checks, "</ul>--") !== false || strpos($checks, "</ol>--") !== false)) {
                if($count > 0) {
                  echo '</div><div class="clearfix"></div>';
                  $checks = str_replace("--", "", $checks);
                } else {
                  $testresult = str_replace("--", "", $checks);
                  $checks = $ttt = str_replace('<div class="field  field-type-text-long field-label-hidden"><div class="field-items"><div class="field-item even">', "", $testresult);
                }
                $count++;
                echo '<h2 class="lead-heading fontsize-50">'.$checks.'</h2>';
                echo '<div class="space-30"></div>';
                echo '<ul class="icon-list fontsize-22 cairo">';

              } elseif(strlen(trim($org))) {
                echo '<li><div class="check_square_'.$content['field_color_theme']['#items'][0]['value'].' icon"></div><span>'.$org.'</span></li>';
              }
            }
            echo '</ul>';
            echo '</div><div class="clearfix"></div>';
      ?>
      <div class="space-50"></div>
    </div>
  </div>
</div>

<div class="space-50"></div>
<div class="flex-container">
  <div class="flex-cell">
    <div class="flex-col-9 left-content-alt theme-<?php echo $content['field_color_theme']['#items'][0]['value'];?>">
    <?php print render($content['field_general_content']);?>
    </div>
  </div>
</div>
<div class="space-50"></div>
<?php $rens = render($content['field_slider_show']);
    if (sizeof($rens) != "0"):
?>
<div class="block block-block bg-bluewood full-width-alt">
  <div class="content">
    <div class="container theme-<?php echo $content['field_color_theme']['#items'][0]['value'];?> text-center">
      <div class="space-70"></div>
      <?php
            $rens = render($content['field_slider_show']);
            $linksList = explode("\n", $rens);
            $count = 0;
            $total = count($linksList);
            foreach($linksList as $ren) {
              // when it reached the max, break;
              if($count == $total-3) { break; }
              $org = $ren;
              // get rid of <p> tags
              $ren = str_replace("<p>","",$ren);
              $ren = str_replace("</p>","",$ren);
              // get rid of &nbsp;
              $string = htmlentities($ren, null, 'utf-8');
              $checks = str_replace("&nbsp;", " ", $string);
              $checks = html_entity_decode($checks);
              if(strpos($checks, "--")!== false && (strpos($checks, "--") == 0 || $count == 0)) {
                $checks = str_replace("--", "", $checks);
                $checks = str_replace('<div class="field field-name-field-slider-show field-type-text-long field-label-hidden"><div class="field-items"><div class="field-item even">', "", $checks);
                $checks = str_replace('</div></div></div>', "", $checks);
                $count++;
                echo '<h2 class="lead-heading fontsize-50">'.$checks.'</h2>';
              } elseif(strpos($checks, "**")!== false && (strpos($checks, "**") == 0)){
                $checks = str_replace("**", "", $checks);
                $count++;
                echo '<p class="white fontsize-solid-26">'.$checks.'</p>';
                echo  '<div class="simple-carousel">';
              } elseif(strpos($checks, "Icon#")!== false && (strpos($checks, "Icon#") == 0)){
                $checks = str_replace("Icon#", "", $checks);
                $count++;
                echo '<div class="col">';
                echo '<div class="icon-box">';
                echo '<div class="icon size-70 svg-icon" icon-src="'.$checks.'"></div>';
                echo '<div class="box-content">';
              } elseif(strpos($checks, "Image#")!== false && (strpos($checks, "Image#") == 0)){
                $checks = str_replace("Image#", "", $checks);
                $count++;
                echo '<div class="col">';
                echo '<div class="icon-box">';
                echo '<div class="size-100 icon">';
                echo '<img src="'.$checks.'"></div>';
                echo '<div class="box-content">';
              }
              elseif(strpos($checks, "Title#")!== false && (strpos($checks, "Title#") == 0)){
                $checks = str_replace("Title#", "", $checks);
                $count++;
                echo '<h3 class="white">'.$checks.'</h3>';

              }elseif(strpos($checks, "Description#")!== false && (strpos($checks, "Description#") == 0)){
                $checks = str_replace("Description#", "", $checks);
                $count++;
                echo '<p class="white">'.$checks.'</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
              }

            }


          echo "</div>";
          echo '<div class="space-50"></div>';

      ?>

    </div>
  </div>
</div>
<?php endif;?>
<?php
  $link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
  $base_path = base_path();
  $imageUrl = $link.$base_path."sites/default/files/".str_replace("public://","",$node->field_promotion_image['und'][0]['uri']);
?>
<?php if (!empty($node->field_promotion_image['und'][0]['uri'])):?>
<div class="block block-block full-width-alt simple-image-banner" style="background-image: url(<?php echo $imageUrl;?>);background-position:center center;background-size:cover"></div>
<?php endif; ?>
<div class="space-50"></div>
<div class="flex-container">
  <div class="flex-cell">
    <div class="flex-col-9 left-content-alt theme-<?php echo $content['field_color_theme']['#items'][0]['value'];?>">
      <?php print render($content['field_bottom_content']);?>
    </div>
  </div>
</div>
<div class="space-50"></div>
<div class="flex-container">
  <div class="flex-cell">
    <div class="flex-col-9 left-content-alt theme-<?php echo $content['field_color_theme']['#items'][0]['value'];?>">
      <?php print render($content['field_bottom_content_extra']);?>
    </div>
  </div>
</div>
<div class="flex-container">
  <div class="flex-cell">
      <div class="flex-col-9 left-content-alt theme-<?php echo $content['field_color_theme']['#items'][0]['value'];?>">
        <button class="back-to-top large no-margin">Back to top</button>
      </div>
  </div>
</div>

<div class="space-50"></div>
