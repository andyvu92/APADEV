<?php
/**
* @file
* Default theme implementation to display a node.
*
* Available variables:
* - $title: the (sanitized) title of the node.
* - $content: An array of node items. Use render($content) to print them all,
* or print a subset such as render($content['field_example']). Use
* hide($content['field_example']) to temporarily suppress the printing of a
* given element.
* - $user_picture: The node author's picture from user-picture.tpl.php.
* - $date: Formatted creation date. Preprocess functions can reformat it by
* calling format_date() with the desired parameters on the $created variable.
* - $name: Themed username of node author output from theme_username().
* - $node_url: Direct URL of the current node.
* - $display_submitted: Whether submission information should be displayed.
* - $submitted: Submission information created from $name and $date during
* template_preprocess_node().
* - $classes: String of classes that can be used to style contextually through
* CSS. It can be manipulated through the variable $classes_array from
* preprocess functions. The default values can be one or more of the
* following:  
* - node: The current template type; for example, "theming hook".
* - node-[type]: The current node type. For example, if the node is a
* "Blog entry" it would result in "node-blog". Note that the machine
* name will often be in a short form of the human readable label.
* - node-teaser: Nodes in teaser form.
* - node-preview: Nodes in preview mode.
* The following are controlled through the node publishing options.
* - node-promoted: Nodes promoted to the front page.
* - node-sticky: Nodes ordered above other non-sticky nodes in teaser
* listings.
* - node-unpublished: Unpublished nodes visible only to administrators.
* - $title_prefix (array): An array containing additional output populated by
* modules, intended to be displayed in front of the main title tag that
* appears in the template.
* - $title_suffix (array): An array containing additional output populated by
* modules, intended to be displayed after the main title tag that appears in
* the template.
*
* Other variables:
* - $node: Full node object. Contains data that may not be safe.
* - $type: Node type; for example, story, page, blog, etc.
* - $comment_count: Number of comments attached to the node.
* - $uid: User ID of the node author.
* - $created: Time the node was published formatted in Unix timestamp.
* - $classes_array: Array of html class attribute values. It is flattened
* into a string within the variable $classes.
* - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
* teaser listings.
* - $id: Position of the node. Increments each time it's output.
*
* Node status variables:
* - $view_mode: View mode; for example, "full", "teaser".
* - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
* - $page: Flag for the full page state.
* - $promote: Flag for front page promotion state.
* - $sticky: Flags for sticky post setting.
* - $status: Flag for published status.
* - $comment: State of comment settings for the node.
* - $readmore: Flags true if the teaser content of the node cannot hold the
* main body content.
* - $is_front: Flags true when presented in the front page.
* - $logged_in: Flags true when the current user is a logged-in member.
* - $is_admin: Flags true when the current user is an administrator.
*
* Field variables: for each field instance attached to the node a corresponding
* variable is defined; for example, $node->body becomes $body. When needing to
* access a field's raw values, developers/themers are strongly encouraged to
* use these variables. Otherwise they will have to explicitly specify the
* desired field language; for example, $node->body['en'], thus overriding any
* language negotiation rule that was previously applied.
*
* @see template_preprocess()
* @see template_preprocess_node()
* @see template_process()
*
* @ingroup themeable
*/
?>
<div id="node-<?php print $node->nid; ?>" style="margin-top:30px;" class="<?php print $classes; ?> clearfix post large" <?php print $attributes; ?>>
	
	<section class="post-content">
    
	<?php /*
	use this header as reference, but delete at the end
	<header class="meta">
		   <ul>
          <li><a href="#"><?php print t('Posted by'); ?><?php print theme('username', array('account' => $node)); ?></a></li>
          <li><?php print render($content['field_media_type']);?></li>
		  <li><?php print date('M',$created); print " "; print date('d',$created).' '.date('Y',$created); ?></li>
		   </ul>
		   <h2><a href="<?php print $node_url; ?>">
		   <?php print $title; ?></a></h2>
    </header>
		*/ ?>
	<div class="region region-right-sidebar col-xs-12 col-sm-12 col-md-9 col-lg-9">
		<h1 class="SectionHeader"><?php print render($content['field_contenttitle']);?></h1>
		<div class="brd-headling">&nbsp;</div>
	  <?php
        // We hide the comments and links now so that we can render them later.
        hide($content['comments']);
        hide($content['links']);
        print render($content['body']);
        ?>
	</div>
	<div class="block SidebarNav contextual-links-region region-right-sidebar col-xs-12 col-sm-12 col-md-3 col-lg-3" style="margin:0 0 50px">
		<h3 class="headline">Quick links</h3>
		<span class="brd-headling"></span>
		<div class="content">
		<div class="view view-current-apa-campaign view-id-current_apa_campaign view-display-id-block_1 view-dom-id-32635ceaef40fd2d990939d49ac29284">
		<div class="view-content">
		  
			<div class="dexp-grid-items row">
			<?php 
			$rens = render($content['field_quicklinks']);
			$linksList = explode("\n", $rens);
			$count = 0;
			$total = count($linksList);
			foreach($linksList as $ren) {
				$count++;
				// when it reached the max, break;
				if($count == $total) { break; }
				// get rid of <p> tags
				$ren = str_replace("<p>","",$ren);
				$ren = str_replace("</p>","",$ren);
				// get rid of &nbsp;
				$string = htmlentities($ren, null, 'utf-8');
				$checks = str_replace("&nbsp;", " ", $string);
				$checks = html_entity_decode($checks);
				//
				if($count != 1) {
					if(strcmp($checks, " ") == 0) {
						print '<div class="views-field"><span class="field-content"><br>';
					} else {
						print '<div class="views-field SidebarItems"><span class="field-content">';
					}
					print $ren;
					print '</span>  </div>';
				}
			}
			?>
			</div>
		  
		</div></div></div>
	</div>
	</section>
  
</div> 

