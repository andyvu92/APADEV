<div class="firstSection">
<?php
$block = block_load('block', '148');
$rendr =_block_get_renderable_array(_block_render_blocks(array($block)));
      $output = drupal_render($rendr);
      print $output;
?>
</div>
<div class="secondSection" style="display: none;">
<?php
      $block = block_load('block', '255');
$rendr=_block_get_renderable_array(_block_render_blocks(array($block)));
      $output = drupal_render($rendr);
      print $output;
?>
</div>
<div class="thirdSection" style="display: none;">
<?php
      $block = block_load('block', '262');
$rendr=_block_get_renderable_array(_block_render_blocks(array($block)));
      $output = drupal_render($rendr);
      print $output;
?>
</div>
