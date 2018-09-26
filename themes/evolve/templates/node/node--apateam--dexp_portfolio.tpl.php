<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix homeBottom"<?php print $attributes; ?>>
   <div class="content"<?php print $content_attributes; ?>>
        <?php
// We hide the comments and links now so that we can render them later.
        hide($content['comments']);
        hide($content['links']);
        ?>
        <a class="block-cover" href="<?php print $node_url; ?>"></a>
        <div class="block-container">
            <div class="portfolio-image">
                
            <a href="<?php print $node_url; ?>">
                <?php print render($content['field_apateamimage']); ?></a>
                
            </div>
            <div class="item-description">
                <div class="member-header">
                    <h5 class="member-name"> <a href="<?php print $node_url; ?>"><?php print render($content['field_apateamname']); ?></a></h5>
                    <span class="member-title"><?php print render($content['field_apateamposition']); ?></span>
                </div>
                <span class="separater"></span>
                <div class="description">
                    <p><?php print $node->body['und'][0]['summary']; ?></p>
                    <h5><?php print render($content['field_nac_state']); ?></h5>
                </div>
            </div>
        </div>
    </div>    
</div>
