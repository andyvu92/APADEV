<div id="node-<?php print $node->nid; ?>" style="margin-top:30px;" class="<?php print $classes; ?> clearfix post large MediaListing" <?php print $attributes; ?>>
    <div class="post-img media">
      <div class='mediaholder'>
        <?php //print render($content['field_picture']);?>
      </div>
    </div>
    
	<section class="post-content">
	
    <header class="meta">
		   <ul>
          <li><?php //print render($content['field_media_type']);?></li>
		  <li><?php print date('M',$created); print " "; print date('d',$created).' '.date('Y',$created); ?></li>
		   </ul>
		  
		   <?php if(!is_null(render($content['field_external_link']))): ?>
		   <h2><a href="<?php echo $content['field_external_link']['#items'][0]['value'];?>" target="_blank">
		   
		   <?php print $title; ?></a></h2>
		   <?php else: ?>
		   <h2><a href="<?php print $node_url; ?>">
		   <?php print $title; ?></a></h2>
		   <?php endif ?>
    </header>
	  <?php
        // We hide the comments and links now so that we can render them later.
        hide($content['comments']);
        hide($content['links']);
		hide($content['field_media_tag']);
        print render($content);
        ?>
	<div class="more">
		<?php /* if(!is_null(render($content['field_external_link']))): ?>
			<p><a href="<?php echo $content['field_external_link']['#items'][0]['value'];?>" target="_blank">Discover more ></a></p>
	    <?php else: ?>
			<p><a href="<?php print $node_url; ?>">Discover more ></a></p>
		<?php endif */ ?>
	</div>
	</section>
  
</div> 

