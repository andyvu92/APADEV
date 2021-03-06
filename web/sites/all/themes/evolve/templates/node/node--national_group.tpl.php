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
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> post" <?php print $attributes; ?>>
<div class="bottom-space-50 border-10 full-width"></div>
<div class="flex-container">
	<div class="flex-cell">

		<div class="flex-col-9 left-content">

		<h2 class="lead-heading"><?php print $node->title;?></h2>
			<div class="intro">
			  
				<?php print $node->body['und'][0]['summary'];?>
				<?php 
				   
					$ngtag = ((array)$content['field_nationalgrouptag']['#items'][0]["taxonomy_term"])['tid'];
					$PID = findPID($ngtag);
				?>
			</div>

			<div class="space-30">&nbsp;</div>

			<div class="post-img media">
			  <div class='mediaholder'>
				<?php print render($content['field_ngimage']);?>
			  </div>
			</div>

			<div class="space-30">&nbsp;</div>

		<?php
        // We hide the comments and links now so that we can render them later.
        hide($content['comments']);
        hide($content['links']);
        print render($content['body']);
		
        ?>
		<?php
			// ToDoAfterGoLive - 09.Nov.2018
			/**
			 * This message will only display until the 31st of December 2018.
			 * May need to update this again for 2019 or
			 * Fixed the join issue with Aptify later
			 */
			if(date("Y") == date("2018")) {
				echo '<div class="messages">
					<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<span>National Group memberships are based on a calendar year and fees listed are relevant to the end of the current year.</span>
						</div>
				</div>';
			}
		?>
		<a class="accent-btn" href="/joinnationalgroup?ProductID=<?php echo $PID;?>" id="ng-join-btn"><span>Join now</span></a>

		<div id="prev-btn"><a class="go-back-button button" href="javascript:history.go(-1)">Back to previous</a></div>	

		</div>

		<div class="flex-col-3 right-sidebar">
			<span class="underline-heading">National Groups</span>

							<?php 
								$block = block_load('block', '350');
								$get = _block_get_renderable_array(_block_render_blocks(array($block)));
								$output = drupal_render($get);        
								print $output; 
							?>

		</div>
	</div>
</div>

</div> 

