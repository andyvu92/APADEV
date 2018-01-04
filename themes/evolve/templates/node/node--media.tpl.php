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
    <div class="post-img media">
      <div class='mediaholder'>
        <?php print render($content['field_picture']);?>
      </div>
    </div>
    
	<section class="post-content">
    <header class="meta">
		   <ul>
          <?php /*
		  <li><a href="#"><?php print t('Posted by'); ?><?php print theme('username', array('account' => $node)); ?></a></li>
          */ ?>
		  <li><?php print render($content['field_media_type']);?></li>
		  <li><?php print date('M',$created); print " "; print date('d',$created).' '.date('Y',$created); ?></li>
		   </ul>
		   <h2><?php print $title; ?></h2>
    </header>
	<!-- hamburger init -->
	<div class="col-lg-1 col-md-1 col-xs-1 col-sm-1 HamburgerTesterButton"><span class="fa dexp-menu-toggle">
		<div class="hamburger hamburger--arrowalt-r" type="button">
			<div class="hamburger-box HamburgerTester">
				<div class="hamburger-inner"></div>
			</div>
		</div>
	</span></div>
	<script>
		jQuery(document).ready(function($) {
			$('.hamburger').click(function() {
				$(this).toggleClass("is-active");
			});
			$('.page-node-273 #section-main-content .container .region-right-sidebar').attr('id', "out");
			$('.HamburgerTester').click(function() {
				var HamChanger = $('.page-node-273 #section-main-content .container .region-right-sidebar').attr('id');
				if(HamChanger == "out") {
					$('.page-node-273 #section-main-content .container .region-right-sidebar').attr('id', "in");
				} else {
					$('.page-node-273 #section-main-content .container .region-right-sidebar').attr('id', "out");
				}
				/*
				var rightVal = $('.page-node-273 #section-main-content .container .region-right-sidebar').css("right");
				if(rightVal != "0px") {
					$('.page-node-273 #section-main-content .container .region-right-sidebar').animate({ right: "0px" }, 700 )
				} else {
					$('.page-node-273 #section-main-content .container .region-right-sidebar').animate({ right: "-800px" }, 700 )
				}
				*/
			});
		});
	</script
	<!-- hamburger done -->
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<ul class="socialMediaIcon">
		<li>
		<div class="fb-share-button" data-layout="button_count" data-mobile-iframe="true" data-size="small">&nbsp;</div>
		</li>
		<li><a class="twitter-share-button" data-show-count="false" href="https://twitter.com/share">Tweet</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8">&nbsp;</script></li>
		<li><script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script><script type="IN/Share" data-counter="right"></script>&nbsp;</li>
		<li><!-- Place this tag where you want the share button to render. -->
		<div class="g-plus" data-action="share" data-annotation="none">&nbsp;</div>
		</li>
	</ul>
	<div id="fb-root">&nbsp;</div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.9";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script><script type="text/javascript">
	jQuery(document).ready(function($) {
	var x = $(location).attr('href');
	jQuery(document).ready(function($) {
		$('.fb-share-button').html("<a class='fb-xfbml-parse-ignore' target='_blank' href='https://www.facebook.com/sharer/sharer.php?u=" +  x  +  "&amp;src=sdkpreparse'></a>")
	});

	})
	  </script>
	  <?php
        // We hide the comments and links now so that we can render them later.
        hide($content['comments']);
        hide($content['links']);
        print render($content['body']);
        ?>
		
	<?php if($content['field_media_type']['#items'][0]['taxonomy_term']->name == 'Media Release') {
		$block = block_load('block', '219');      
		$output = drupal_render(_block_get_renderable_array(_block_render_blocks(array($block))));        
		print $output;
	} ?>
	<?php print render($content['field_media_tag']); ?>
	</section>
  
</div> 

