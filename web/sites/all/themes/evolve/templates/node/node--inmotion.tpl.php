<div class="border-10 full-width"></div>
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
        
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix post large" <?php print $attributes; ?>>
   
   <section class="post-content container" style="float:none; margin:auto;">
   <?php 
		$block = block_load('block', '281');
		$get = _block_get_renderable_array(_block_render_blocks(array($block)));
		$output = drupal_render($get);        
		print $output;
	?>
      <?php /*
         use this header as reference, but delete at the end
         <header class="meta">
         	   <ul>
                  <li><a href="#"><?php print t('Posted by'); ?><?php print theme('username', array('account' => $node)); ?></a></li>
      <li><?php print render($content['field_media_type']);?></li>
      <li><?php print date('M',$created); print " "; print date('d',$created).' '.date('Y',$created); ?></li>
      </ul>
      <h2><a href="<?php print $node_url; ?>">
         <?php print $title; ?></a>
      </h2>
      </header>
      */ //['field_emailauthor']['und'][0]['value']?>
      <?php /*print_r ($content['field_research_author']['#items']); */?>	
      <div class="left-content region col-xs-12 col-sm-12 col-md-8 col-lg-8">

        <!-- MOBILE POST FEATURED IMG -->
        <div class="post-img media mobile">
            <div class='mediaholder fullwidthimage'>
                <?php print render($content['field_inmotion_image']);?>
            </div>
            <div class="inmotion_video">
                <?php
                    if( !empty(render($content['field_video_url'])) ){
                        function get_string_between($string, $start, $end){
                            $string = ' ' . $string;
                            $ini = strpos($string, $start);
                            if ($ini == 0) return '';
                            $ini += strlen($start);
                            $len = strpos($string, $end, $ini) - $ini;
                            return substr($string, $ini, $len);
                        }
                        
                        $videoID = render($content['field_video_url']);
                        $videoID = get_string_between(render($content['field_video_url']), 'watch?v=', '</div>');
    
                        echo '<iframe id="inmotion-video" src="//www.youtube.com/embed/'.render($videoID).'?rel=0" frameborder="0" allow="autoplay" allowfullscreen></iframe>';
                        echo '<span class="play_button audio_play_icon"></span>';
                    }
                ?>
            </div>
        </div>

         <h1 class="SectionHeader"><?php print $node->title;?></h1>
         <div class="brd-headling">&nbsp;</div>
			
         <header class="meta">
            <div class="flex-container post-meta">

                <div class="flex-cell">
                    <div class="flex-col-6 meta-info">
                        <?php 
                            $only = ((array)$content['field_members_only']['#items'][0]['taxonomy_term'])["name"];
                            if($only == "Yes") {
                                echo "<div class='MonlyIconHolder'><div class='MonlyIcon'>Member only</div></div>";
                            } 
                        ?>
                        <?php //if(!is_null(render($content['field_members_only']))): ?> <?php //echo "<li><strong>";?>
                        <?php //print render($content['field_research_issue']);?><?php //echo "</strong></li>";?> <?php //endif?>
                        <div class="meta-author-date">
                            <?php
                            if ( !empty($content['field_inmotion_author']) ){
                                echo '<span class="meta-author">By <b>'. render($content['field_inmotion_author']) .'</b></span>';
                            }
                            ?>
                            <span class="meta-date"><?php print date('M',$created); print " "; print date('d',$created).' '.date('Y',$created); ?></span>
                        </div>
                    </div>

                    <div class="flex-col-6 meta-share-url">
                        <ul class="socialMediaIcon" style="float:right;margin-top:-3%;">
                            <li>
                                <div class="fb-share-button" data-layout="button_count" data-mobile-iframe="true" data-size="small">&nbsp;</div>
                            </li>
                            <li>
                                <a class="twitter-share-button" href="https://twitter.com/share">Tweet</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8">&nbsp;</script>
                            </li>
                            <li>
                                <script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script><script type="IN/Share" data-counter="right"></script>&nbsp;
                            </li>
                            <li>
                                <div class="g-plus" data-action="share" data-annotation="none">&nbsp;</div>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
         </header>
         
         <!-- DESKTOP POST FEATURED IMG -->
		<div class="post-img media">
			<div class='mediaholder fullwidthimage'>
				<?php print render($content['field_inmotion_image']);?>
			</div>
            <div class="inmotion_video">
                <?php
                    if( !empty(render($content['field_video_url'])) ){
                        echo '<iframe id="inmotion-video" src="//www.youtube.com/embed/'.render($videoID).'?rel=0" frameborder="0" allow="autoplay" allowfullscreen></iframe>';
                        echo '<span class="play_button audio_play_icon"></span>';
                    }
                ?>
            </div>
        </div>
        <div class="inmotion-content">
                <div class="content-loading">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                </div>
            <?php
                // We hide the comments and links now so that we can render them later.
                hide($content['comments']);
                hide($content['links']);
                //print render($content['body']);
                
                echo '<div class="inmotion-readmore-content">'. render($content['body']) .'</div>';
            ?>
        </div>
        
         <script src="https://apis.google.com/js/platform.js" async defer></script>
         
         <div id="fb-root">&nbsp;</div>
         <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.9";
            fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
         </script><script type="text/javascript">
            jQuery(document).ready(function($) {
				
            var x = $(location).attr('href');
            jQuery(document).ready(function($) {
            	$('.fb-share-button').html("<a class='fb-xfbml-parse-ignore' target='_blank' href='https://www.facebook.com/sharer/sharer.php?u=" +  x  +  "&amp;src=sdkpreparse'></a>")
            });
            
            })
              
         </script>
		<?php 
			$block = block_load('block', '288');
			$get = _block_get_renderable_array(_block_render_blocks(array($block)));
			$output = drupal_render($get);        
			print $output;
		?>
    
        <!-- SMALLER SCREEN AD BLOCK -->
        <div class="smaller-screen-ad">
            <?php 
                $block = block_load('block', '307');
                $get = _block_get_renderable_array(_block_render_blocks(array($block)));
                $output = drupal_render($get);        
                print $output;
            ?>
        </div>

      </div>
	  
      <div class="block CampaignSidebar contextual-links-region region-right-sidebar col-xs-12 col-sm-12 col-md-4 col-lg-4" style="margin:0 0 50px">
         <h3 class="headline">Most Popular</h3>
         <span class="brd-headling"></span>
         <div class="content">
            <?php echo views_embed_view('inmotioncategory', 'block_9');?>
         </div>
		 <h3 class="headline">Related</h3>
         <span class="brd-headling"></span>
         <div class="content">
            <?php echo views_embed_view('inmotioncategory', 'block_10');?>
         </div>
         <h3 class="headline">Archives</h3>
         <span class="brd-headling"></span>
         <div class="content">
            <ul class="inmotion_archive">
                <li><a href="/inmotion/archive#2019">2019</a></li>
                <li><a href="/inmotion/archive#2018">2018</a></li>
                <li><a href="/inmotion/archive#2017">2017</a></li>
                <li><a href="/inmotion/archive#2016">2016</a></li>  
            </ul>
         </div>
      </div>
    
    <!-- DESKTOP AD BLOCK -->
    <div class="large-screen-ad">
        <?php 
            $block = block_load('block', '307');
            $get = _block_get_renderable_array(_block_render_blocks(array($block)));
            $output = drupal_render($get);        
            print $output;
        ?>
    </div>
    
   </section>
	<a class="go-back-button button" href="javascript:history.go(-1)">Back to previous</a>
   <!---line-->
</div>
