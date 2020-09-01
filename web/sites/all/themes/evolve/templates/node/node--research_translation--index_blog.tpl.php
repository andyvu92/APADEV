<div id="node-<?php print $node->nid; ?>" style="margin-top:30px;" class="<?php print $classes; ?> post MediaListing" <?php print $attributes; ?>>
    <div class="post-img media">
      <div class='mediaholder'>
        <?php print render($content['field_translation_image']);?>
      </div>
   </div>
   <div>
      <?php
         if( !empty(render($content['field_podcast_url'])) ){
            echo '<a href="'.render($content['field_podcast_url']).'">'.$title.'</a><br>';
         } else {
            echo '<a href="'.$node_url.'">'.$title.'</a><br>';
         }
      ?>
	    <?php print date('M',$created); print " "; print date('d',$created).' '.date('Y',$created); ?>
    </div>
    <a class="link_cover" href="<?php print $node_url; ?>"></a>
</div> 

