<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix homeBottom"<?php print $attributes; ?>>
    <?php print render($title_prefix); ?>
    <?php print render($title_suffix); ?>
    <div class="content"<?php print $content_attributes; ?>>
        <?php
// We hide the comments and links now so that we can render them later.
        hide($content['comments']);
        hide($content['links']);
        //$original_image = file_create_url($node->field_portfolio_images['und'][0]['uri']);
        $lightboxrel = 'portfolio_' . $nid;
        $portfolio_images = field_get_items('node', $node, 'field_home_tile_image');
        $first_image = '';
        $other_image = '';
        if ($portfolio_images) {
            foreach ($portfolio_images as $k => $portfolio_image) {
                if ($k == 0) {
                    //$first_image = file_create_url($portfolio_image['uri']);
                } else {
                    $image_path = file_create_url($portfolio_image['uri']);
                    $other_image .= '<a href="' . $image_path . '" rel="lightbox[' . $lightboxrel . ']" style="display:none">&nbsp;</a>';
                }
            }
        }
        ?>
        	<span class="link-block"><?php if(is_null(render($content['field_url_for_page'])) && is_null(render($content['field_external_url_for_page']))): ?>
                <a href="<?php print $node_url; ?>">
                <?php elseif(!is_null(render($content['field_url_for_page']))): ?>
                <a href="<?php echo $content['field_url_for_page']['#items'][0]['value']; ?>">
                <?php elseif(!is_null(render($content['field_external_url_for_page']))): ?>
                <a href="<?php echo $content['field_external_url_for_page']['#items'][0]['value']; ?>" target="_blank">
                <?php endif; ?></a></span>
            
        <div class="portfolio-image">
			<div class="HomeType"><?php print render($content['field_tile_type']); ?></div>
            <?php print render($content['field_home_tile_image']); ?>
            <div class="mediaholder"></div>
            <div class="portfolio-image-zoom">
                <a href="<?php print $first_image; ?>" rel="lightbox[<?php print $lightboxrel; ?>]"><span class="fa fa-search"></span></a>
            </div>
			<?php
				if( !empty(render($content['field_video_url'])) ){
					echo '<span class="video_play_btn audio_play_icon"></span>';
                }
			?>
        </div>
        <div class="item-description">
			<div class="movSection">
				<div class="HomeType"><?php print render($content['field_tile_type']); ?></div>
				<?php 
					$only = ((array)$content['field_members_only']['#items'][0]['taxonomy_term'])["name"];
					if($only == "Yes") {
						echo "<div class='MonlyIconHolder'><div class='MonlyIcon'></div></div>";
					} else {
						echo "<div class='MonlyIconHolder'></div>";
					}
				?>
				<div class="lineBreak"></div>
			</div>
			<h5>
			<?php if(is_null(render($content['field_url_for_page'])) && is_null(render($content['field_external_url_for_page']))): ?>
            <a href="<?php print $node_url; ?>">
			<?php elseif(!is_null(render($content['field_url_for_page']))): ?>
			<a href="<?php echo $content['field_url_for_page']['#items'][0]['value']; ?>">
            <?php elseif(!is_null(render($content['field_external_url_for_page']))): ?>
            <a href="<?php echo $content['field_external_url_for_page']['#items'][0]['value']; ?>" target="_blank">
			<?php endif; ?>
			<?php print $title; ?>
			</a></h5>
			<div class="description">
				<div class="dateHome">
					<?php print date('d',$created); print " "; print date('M',$created).', '.date('Y',$created); ?>
				</div>
				<div class='NextIconHolder'><div class='NextIcon'></div></div>
				<?php 
					$only = ((array)$content['field_members_only']['#items'][0]['taxonomy_term'])["name"];
					if($only == "Yes") {
						echo "<div class='MonlyIconHolder'><div class='MonlyIcon'></div></div>";
					} else {
						echo "<div class='MonlyIconHolder'></div>";
					}
				?>
			</div>
        </div>
        <?php
        print $other_image;
        ?>
    </div>    
</div>
