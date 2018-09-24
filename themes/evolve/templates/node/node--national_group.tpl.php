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
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix post large policybottom" <?php print $attributes; ?>>
		
	<section class="post-content">
   
	<div class="region main-content col-xs-12 col-sm-12 col-md-9 col-lg-9">
		<h1 class="SectionHeader"><?php print $node->title;?></h1>
		<div class="intro">
		  
			<?php print $node->body['und'][0]['summary'];?>
			<?php 
			   
				$ngtag = ((array)$content['field_nationalgrouptag']['#items'][0]["taxonomy_term"])['tid'];
				$PID = findPID($ngtag);
			?>
		</div>
		<div class="post-img media">
		  <div class='mediaholder'>
			<?php print render($content['field_ngimage']);?>
		  </div>
		</div>


		<?php
        // We hide the comments and links now so that we can render them later.
        hide($content['comments']);
        hide($content['links']);
        print render($content['body']);
		
        ?>
		<a class="accent-btn" href="/joinnationalgroup?ProductID=<?php echo $PID;?>" id="ng-join-btn"><span>Join now</span></a>

		<div class="bottom-nav"><a class="go-back-button button" href="javascript:history.go(-1)">&lt; Back to previous</a></div>
	</div>
	<div class="block contextual-links-region region-right-sidebar col-xs-12 col-sm-12 col-md-3 col-lg-3" style="margin:0 0 50px">
		<h3 class="headline">National Groups</h3>
		<span class="brd-headling"></span>
		<div class="content">
		<div class="view view-current-apa-campaign view-id-current_apa_campaign view-display-id-block_1 view-dom-id-32635ceaef40fd2d990939d49ac29284">
		<div class="view-content">
		  
			<div class="dexp-grid-items">
			<?php //echo views_embed_view('blog_categories', 'block_5');?>
			<ul class="side-nav">
				<li><a href="/nationalgroups/acupuncture-and-dry-needling">Acupuncture and dry needling</a></li>
				<li><a href="/nationalgroups/animal">Animal</a></li>
				<li><a href="/nationalgroups/aquatic">Aquatic</a></li>
				<li><a href="/nationalgroups/business">Business</a></li>
				<li><a href="/nationalgroups/cancer-palliative-care-and-lymphoedema">Cancer, Palliative Care and Lymphoedema</a></li>
				<li><a href="/nationalgroups/cardiorespiratory">Cardiorespiratory</a></li>
				<li><a href="/nationalgroups/disability">Disability</a></li>
				<li><a href="/nationalgroups/educators">Educators</a></li>
				<li><a href="/nationalgroups/emergency-department">Emergency Department</a></li>
				<li><a href="/nationalgroups/gerontology">Gerontology</a></li>
				<li><a href="/nationalgroups/leadership-and-management">Leadership and Management</a></li>
				<li><a href="/nationalgroups/mental-health-physiotherapy">Mental Health Physiotherapy</a></li>
				<li><a href="/nationalgroups/musculoskeletal">Musculoskeletal</a></li>
				<li><a href="/nationalgroups/neurology">Neurology</a></li>
				<li><a href="/nationalgroups/occupational-health">Occupational Health</a></li>
				<li><a href="/nationalgroups/orthopaedic">Orthopaedic</a></li>
				<li><a href="/nationalgroups/paediatric">Paediatric</a></li>
				<li><a href="/nationalgroups/pain">Pain</a></li>
				<li><a href="/nationalgroups/sports-and-exercise">Sports and Exercise</a></li>
				<li><a href="/nationalgroups/womens-mens-and-pelvic-health">Women's, Men's and Pelvic Health</a></li>
			<ul>
			</div>
		  
		</div></div></div>
	</div>
	</section>
</div> 

