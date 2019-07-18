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
<?php if(isset($_SESSION['UserId']) && $_SESSION['MemberTypeID']!="1" && strtotime(date("d-m-Y",strtotime($_SESSION['payThroughDate'])))>= strtotime(date("d-m-Y",strtotime('-1 month')))): ?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix" <?php print $attributes; ?>>
	<?php //$result = MtypeContent($content['field_member_content_type'],$content['field_member_type_list']); ?>
	
	<?php //if ($result == "0"): ?>
	
		
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
	<div id="section-main-content">
		<div class="container">
			<div class="row">
				<div class="region region-content col-xs-12 col-sm-12 col-md-9 col-lg-9 MainContent">
					
				<?php
					// We hide the comments and links now so that we can render them later.
					hide($content['comments']);
					hide($content['links']);
					print render($content['body']);
					$current_url = $_SERVER['REQUEST_URI'];
					// if current page is choose physio campaign
					$choose_physio_page = false;
					if( strpos($current_url, 'choose-physio') == true ) {
						$choose_physio_page = true;
					}
					// if current page is tradies national health month
					$tradies_national_health_month_page = false;
					if(strpos($current_url, 'tradies-national-health-month') == true){
						$tradies_national_health_month_page = true;
					}
					?>
				
				</div>
				
				<!-- campaign_sidebar -->
				<div class="region region-right-sidebar col-xs-12 col-sm-12 col-md-3 col-lg-3">
					<!-- for consumer -->
					<?php
						$block = block_load('block', '297');
						$get = _block_get_renderable_array(_block_render_blocks(array($block)));
						$output = drupal_render($get);        
						print $output;
					?>

					<!-- for member -->
					<?php 
						$block = block_load('block', '298');
						$get = _block_get_renderable_array(_block_render_blocks(array($block)));
						$output = drupal_render($get);        
						print $output;
					?>
				</div>
			</div>
		</div>
	</div>

	<!-- campaign_parralax_section -->
	<?php
		$parralax_section = true;
		if( $choose_physio_page ){
			$parralax_section_block = block_load('block', '302');
		}
		else if( $tradies_national_health_month_page ){
			$parralax_section_block = block_load('block', '368');
		} else {
			$parralax_section = false;
		}
		// if parralax_section is true
		if( $parralax_section ) {
			$parralax_section_get = _block_get_renderable_array(_block_render_blocks(array($parralax_section_block)));
			$parralax_section_output = drupal_render($parralax_section_get); 
		}
	?>
	<?php if( $parralax_section ): ?>
	<div class="container full_width_section">
		<?php 
				print $parralax_section_output; 
		?>
	</div>
	<?php endif; ?>

	<!-- campaign_toolkit_section -->
	<?php 
		$toolkit_section = true;
		if( $choose_physio_page ){
			$toolkit_section_block = block_load('block', '303');
		}
		else if( $tradies_national_health_month_page ){
			$toolkit_section_block = block_load('block', '369');
		} else {
			$toolkit_section = false;
		}
		// if toolkit_section is true
		if( $toolkit_section ) {
			$toolkit_section_get = _block_get_renderable_array(_block_render_blocks(array($toolkit_section_block)));
			$toolkit_section_output = drupal_render($toolkit_section_get); 
		}
	?>
	<?php if( $toolkit_section ): ?>
	<div id="section-content-bottom-second">
		<div class="container">
			<div class="col-xs-12">
				<?php 
						print $toolkit_section_output; 
				?>
			</div>
		</div>
	</div>
	<?php endif; ?>

	<!-- campaign_tabbed_section -->
	<?php 
		$tabbed_section = true;
		if( $choose_physio_page ){
			$tabbed_section_block = block_load('block', '304');
		}
		else if( $tradies_national_health_month_page ){
			$tabbed_section_block = block_load('block', '370');
		} else {
			$tabbed_section = false;
		}
		// if tabbed_section is true
		if( $tabbed_section ){
			$tabbed_section_get = _block_get_renderable_array(_block_render_blocks(array($tabbed_section_block)));
			$tabbed_section_output = drupal_render($tabbed_section_get);        
		}
	?>
	
	<?php if( $tabbed_section ): ?>
	<div id="section-content-bottom-third" class="tabbed_section_container">
		<div class="container">
			<div class="col-xs-12">
				<?php print $tabbed_section_output; ?>
			</div>
		</div>
	</div>
	<?php endif; ?>

	<!-- caimpaign_find_a_physio_section -->
	<div id="section-content-bottom-fourth">
		<div class="container">
			<div class="col-xs-12">
				<!-- caimpaign_find_a_physio_section -->
				<?php 
					$find_a_physio_section_block = block_load('block', '305');
					$find_a_physio_section_get = _block_get_renderable_array(_block_render_blocks(array($find_a_physio_section_block)));
					$find_a_physio_section_output = drupal_render($find_a_physio_section_get);        
					print $find_a_physio_section_output;
				?>

				<div class="back-to-top">
					<span>Back to top</span>
				</div>

				<!-- caimpaign_faq_section -->
				<?php 
					$faq_section = false;
					if( $choose_physio_page ){
						$faq_section_block = block_load('block', '306');
					}
					else if( $tradies_national_health_month_page ){
						$faq_section = false;
					} else {
						$faq_section = false;
					}
					// if faq_section is true
					if( $faq_section ) {
						$faq_section_get = _block_get_renderable_array(_block_render_blocks(array($faq_section_block)));
						$faq_section_output = drupal_render($faq_section_get);        
					}
					
				?>
				<?php if( $faq_section ): ?>
					<?php 
						print $faq_section_output; 
					?>
				<?php endif; ?>
				
				<p>By using the campaign as a conversation starter within your own workplace and community, its penetration and impact on consumers will be greatly enhanced and will help us achieve our objective of increased awareness of the profession, its strong relationship with GPs and increased demand for services.</p>

				<div id="prev-btn"><a class="go-back-button button" href="javascript:history.go(-1)">Back to previous</a></div>
			</div>
		</div>
	</div>
	
	<?php else: $url = "{$_SERVER['REQUEST_URI']}";?>
	<!-- NON-MEMBER SECTION -->
	<div class="flex-container" id="non-member">
		<!-- LOGIN PROM -->
		<?php 
			$block = block_load('block', '358');
			$get = _block_get_renderable_array(_block_render_blocks(array($block)));
			$output = drupal_render($get);        
			print $output;
		?>

		<!-- DIGITAL ADS -->
		<?php 
			$block = block_load('block', '309');
			$get = _block_get_renderable_array(_block_render_blocks(array($block)));
			$output = drupal_render($get);        
			print $output;
		?>

	</div>

<?php endif; ?>
</div> 

