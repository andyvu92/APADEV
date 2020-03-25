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
<?php $link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";$base_path = base_path();?>
<div class="dexp-section" id="section-banner">
	<div class="dexp-container">
		<div class="row">
			<!-- .region-banner-->
			<div class="region region-banner col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="block block-block jarallax border-10 dexp-animate" data-animate="fadeInLeft" style='background-image:url(<?php echo $imgLink = $link.$base_path."sites/default/files/".str_replace("public://","",$node->field_policyimage["und"][0]["uri"]);?>);background-position:center center;background-size:cover'>
					<div class="content">
					&nbsp;
					</div>
				</div>  
			</div>
		<!-- END .region-banner-->
		</div>
	</div>
</div>

<div class="space-70"></div>

<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix post large policybottom" <?php print $attributes; ?>>

	<section class="post-content">
    	<div class="flex-container">
			<div class="flex-cell">

	<div class="flex-col-9 left-content">
		<?php
			if ( !empty($content['field_contenttitle']) ) {
				echo '<h2 class="lead-heading">'.render($content['field_contenttitle']).'</h2>';
			}
		?>
		<?php
			// We hide the comments and links now so that we can render them later.
			hide($content['comments']);
			hide($content['links']);
			print render($content['body']);
		?>

		<div id="prev-btn"><a class="go-back-button button" href="javascript:history.go(-1)">Back to previous</a></div>
	</div>

	<div class="flex-col-3 right-sidebar">
		<span class="underline-heading">Our work</span>
		<?php 
			if(!empty($content['field_member_content_type'])) {
				echo '<div class="nav">';
				echo views_embed_view('our_priorities', 'block_3');
			 	echo '</div>';
			} else {
				$block = block_load('block', '340');
				$get = _block_get_renderable_array(_block_render_blocks(array($block)));
				$output = drupal_render($get);        
				print $output; 
			}
		?>
	</div>

			</div>
		</div> 

	
	</section>
	<style type="text/css">
	.simple_accordion{
		margin-top: 45px;
	}

	.simple_accordion .accordion{
		position: relative;
		padding: 15px;
	    border: 1px solid rgba(0,0,0,0.03);
	    border-bottom-width: 0;
	}

	.simple_accordion .accordion:last-of-type{
		border-bottom-width: 1px;
	}

	.simple_accordion .accordion .label{
		color: #333;
		font-weight: 500;
		font-size: 1.2em;
	    display: flex;
	    flex-direction: row;
	    align-items: center;
	    padding: 0;
	    cursor: pointer;
	    transition: all .3s ease;
	   text-align: left;
	   white-space: pre-wrap;
	   line-height: 1.3em;
	}

	.simple_accordion .accordion:hover .label{
		color: #019fda;
	}

	.simple_accordion .accordion .label .icon{
		margin-right: 10px;
	}

	.simple_accordion .accordion .label .icon svg{
		transition: all .5s linear;
		margin: 0;
		transform: rotate(0deg);
	}

	.simple_accordion .accordion .content{
		display: none;
		padding-left: 25px;
		padding-top: 20px;
	}

	.simple_accordion .accordion .content > *:last-child{
		margin-bottom: 0;
	}

	.simple_accordion .accordion .content p, .simple_accordion .accordion .content ul, .simple_accordion .accordion .content ol{
		margin-bottom: 10px;
		opacity: 0;
		transition: all 1s linear;
	}

	.simple_accordion .accordion{
		transition: all .5s ease;
	}

	.simple_accordion .accordion.active{
		padding-bottom: 30px;
	}

	.simple_accordion .accordion.active .content p, .simple_accordion .accordion.active .content ul, .simple_accordion .accordion.active .content ol{
		opacity: 1;
		transition: all .5s linear;
	}

	.simple_accordion .accordion.active .label{
		color: #019fda;
	}

	.simple_accordion .accordion.active .label .icon svg{
		transform: rotate(90deg);
	}

	.important{
		position: relative;
	    display: block;
	    padding: 25px;
	    border: 1px solid #f3f3f3;
	    background: #fefefe;
	    margin-top: 40px;
	}

	.important h4{
		font-weight: 400;
	    font-size: 1.5em;
	    color: #009fda;
	    margin-top: 0;
	}

	.important ul{
		margin-bottom: 0!important;
	    padding-left: 15px;
	}
</style>
<script type="text/javascript">
	jQuery(document).ready(function(){
		$('.simple_accordion .label').on('click', function(){
			if( $(this).parent().is('.active') ){
				$(this).parent().removeClass('active');
				$(this).parent().find('.content').slideUp();
			} else {
				$(this).parent().siblings().removeClass('active');
				$(this).parent().siblings().find('.content').slideUp();
				$(this).parent().addClass('active');
				$(this).parent().find('.content').slideDown();
			}
		});
	});
</script>
</div> 

