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
<div style="height: 10px; width: 1px;">&nbsp;</div>

<div class="Pagination">
<div class="WFpage">RESEARCH W1.3.1&W1.4</div>

<div class="Docpage">00.06.05.01</div>
</div> 
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix post large" <?php print $attributes; ?>>
   <div class="post-img media">
      <div class='mediaholder fullwidthimage'>
         <?php print render($content['field_research_article_image']);?>
      </div>
   </div>
   <section class="post-content container" style="float:none; margin:auto;">
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
      <div class="region col-xs-12 col-sm-12 col-md-9 col-lg-9">
         <h1 class="SectionHeader"><?php print $node->title;?></h1>
         <div class="brd-headling">&nbsp;</div>
         <header class="meta">
            <ul>
               <li><strong><?php print render($content['field_research_author']); ?></strong></li>
               <li><strong><?php print render($content['field_research_article_category']);?></strong></li>
			    <?php if(!is_null(render($content['field_research_issue']))): ?> <?php echo "<li><strong>";?>
			   <?php print render($content['field_research_issue']);?><?php echo "</strong></li>";?> <?php endif?>
               <li><strong><?php print date('M',$created); print " "; print date('d',$created).' '.date('Y',$created); ?></strong></li>
            </ul>
         </header>
         <?php
            // We hide the comments and links now so that we can render them later.
            hide($content['comments']);
            hide($content['links']);
            print render($content['body']);
            ?>
         <p>&nbsp;</p>
         <p>&nbsp;</p>
         <script src="https://apis.google.com/js/platform.js" async defer></script>
         <ul class="socialMediaIcon">
            <li>Share this page:</li>
            <li>
               <div class="fb-share-button" data-layout="button_count" data-mobile-iframe="true" data-size="small">&nbsp;</div>
            </li>
            <li>
               <a class="twitter-share-button" data-show-count="false" href="https://twitter.com/share">Tweet</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8">&nbsp;</script>
            </li>
            <li>
               <script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script><script type="IN/Share" data-counter="right"></script>&nbsp;
            </li>
            <li>
               <!-- Place this tag where you want the share button to render. -->
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
            }(document, 'script', 'facebook-jssdk'));
         </script><script type="text/javascript">
            jQuery(document).ready(function($) {
				
            var x = $(location).attr('href');
            jQuery(document).ready(function($) {
            	$('.fb-share-button').html("<a class='fb-xfbml-parse-ignore' target='_blank' href='https://www.facebook.com/sharer/sharer.php?u=" +  x  +  "&amp;src=sdkpreparse'></a>")
            });
            
            })
              
         </script>
		 
      </div>
      <div class="region-right-sidebar col-xs-12 col-sm-12 col-md-3 col-lg-3" style="margin:0 0 50px">
         <!--<h3 class="headline">RELATED ARTICLES</h3>
         <span class="brd-headling"></span>-->
         <!--<div class="content">-->
            <?php //echo views_embed_view('current_apa_campaign', 'block_4');
                  $block = block_load('block', '223');
                  $get = _block_get_renderable_array(_block_render_blocks(array($block)));
                  $output = drupal_render($get);        
                  print $output;
            ?>
          
            <?php 
                  $block = block_load('block', '225');
                  $get = _block_get_renderable_array(_block_render_blocks(array($block)));
                  $output = drupal_render($get);        
                  print $output;
            
            ?>
         <!--</div>-->
      </div>
   </section>
   <div class="dexp-section" id="section-content-bottom-third">
      <div class="container">
         <div class="row">
            <div class="region region-content-bottom-third col-xs-12 col-sm-12 col-md-12 col-lg-12">
               <div id="block-views-team-block-7" class="block block-views main-headline dexp-animate" data-animate="fadeInUp" style="padding:50px 0 50px 0">
                  <h3 class="block-title"> About the author/s:</h3>
                  <!----line--->
                  <?php if(sizeof($content['field_research_author']['#items'])==1): ?>
                  <div class="content" style="padding:50px 0 50px 0">
                     <div class="view view-team view-id-team view-display-id-block_4 team-style-1 view-dom-id-433fc8a824a3e8fb0c7a672ba6bd61d2">
                        <div class="view-content">
                           <div class="dexp-grid-items">
                              <div class="row">
                                 <div class="dexp-grid-item col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div id="node-11" class="node node-team node-teaser view-mode-teaser clearfix" about="/evolve/content/john-smith" typeof="sioc:Item foaf:Document">
                                       <span property="dc:title" content="John Smith" class="rdf-meta element-hidden"></span><span property="sioc:num_replies" content="0" datatype="xsd:integer" class="rdf-meta element-hidden"></span> 
                                       <div class="content">
                                          <div class="team">
                                             <div class="team-item-left img-wrp">
                                                <div class="field field-name-field-team-image field-type-image field-label-hidden">
                                                   <div class="field-items">
                                                      <div class="field-item even">
                                                         <?php   $link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";$base_path = base_path();$imgLink = $link.$base_path."sites/default/files/".$content['field_research_author']['#items'][0]['taxonomy_term']->field_profile_picture['und'][0]['filename']; 
                                                            echo "<img class='display-none' src='".$imgLink."'/>"; ?>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="overlay"></div>
                                             </div>
                                             <div class="team-item-right team-member-info-wrp">
                                                <div class="team-name">
                                                   <h5><?php echo $content['field_research_author']['#items'][0]['taxonomy_term']->name; ?></h5>
                                                   <span>
                                                      <div class="field field-name-field-team-position field-type-text field-label-hidden">
                                                         <div class="field-items">
                                                            <div class="field-item even"><?php echo $content['field_research_author']['#items'][0]['taxonomy_term']->field_education['und'][0]['value']; ?>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </span>
                                                </div>
                                                <div class="team-about">
                                                   <p>
                                                   <div class="field field-name-body field-type-text-with-summary field-label-hidden">
                                                      <div class="field-items">
                                                         <div class="field-item even" property="content:encoded">
                                                            <p><?php echo $content['field_research_author']['#items'][0]['taxonomy_term']->field_bio['und'][0]['value']?></p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   </p>
                                                </div>
                                                <!--<div class="team-email">
                                                   <i class="icon-envelope"></i> 
                                                   <div class="field field-name-field-team-email field-type-text field-label-hidden">
                                                      <div class="field-items">
                                                         <div class="field-item even">
                                                            <?php //echo $content['field_research_author']['#items'][0]['taxonomy_term']->field_emailauthor['und'][0]['value'];
                                                             ?>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>-->
                                             </div>
                                             <div class="clearfix"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php endif; ?>
                  <!----line--->
                  <?php if(sizeof($content['field_research_author']['#items'])>1): ?>
                  <div class="content">
                     <div class="view view-team view-id-team view-display-id-block_7 view-dom-id-4ff5a51ef6d43d50dc3f1537f4ee9ee1">
                        <div class="view-content">
						 
						
                           <div id="team-block-7" class="dexp-bxslider">
                              <?php $number = sizeof($content['field_research_author']['#items']);
                                 for($i=0; $i<$number; $i++):
                                   ?>
                              <div class="bxslide bx-clone" style="float: left; list-style: none; position: relative; width: 270px; margin-right: 20px;">
                                 <div id="node-14" class="node node-team node-teaser view-mode-teaser clearfix" about="/evolve/content/jane-smith-0" typeof="sioc:Item foaf:Document">
                                    <span property="dc:title" content="Jane Smith" class="rdf-meta element-hidden"></span><span property="sioc:num_replies" content="0" datatype="xsd:integer" class="rdf-meta element-hidden"></span>
                                    <div class="content">
                                       <div class="team">
                                          <div class="team-item img-wrp">
                                             <div class="field field-name-field-team-image field-type-image field-label-hidden">
                                                <div class="field-items">
                                                   <div class="field-item even">
                                                      <?php $link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";$base_path = base_path();$imgLink = $link.$base_path."sites/default/files/".$content['field_research_author']['#items'][0]['taxonomy_term']->field_profile_picture['und'][0]['filename'];  
                                                         echo "<img class='display-none' src='".$imgLink."'/>"; ?>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="overlay"></div>
                                          </div>
                                          <div class="team-item team-member-info-wrp">
                                             <div class="team-name">
                                                <h5><?php echo $content['field_research_author']['#items'][$i]['taxonomy_term']->name; ?></h5>
                                                <span>
                                                   <div class="field field-name-field-team-position field-type-text field-label-hidden">
                                                      <div class="field-items">
                                                         <div class="field-item even"><?php echo $content['field_research_author']['#items'][$i]['taxonomy_term']->field_education['und'][0]['value']; ?></div>
                                                      </div>
                                                   </div>
                                                </span>
                                             </div>
                                             <div class="team-about">
                                                <p></p>
                                                <div class="field field-name-body field-type-text-with-summary field-label-hidden">
                                                   <div class="field-items">
                                                      <div class="field-item even" property="content:encoded">
                                                         <p><?php echo $content['field_research_author']['#items'][$i]['taxonomy_term']->field_bio['und'][0]['value']?></p>
                                                      </div>
                                                   </div>
                                                </div>
                                                <p></p>
                                             </div>
                                             <div class="team-email">
                                                <i class="icon-envelope"></i> 
                                                <div class="field field-name-field-team-email field-type-text field-label-hidden">
                                                   <div class="field-items">
                                                      <div class="field-item even">
                                                         <?php echo $content['field_research_author']['#items'][$i]['taxonomy_term']->field_emailauthor['und'][0]['value']; ?>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="clearfix"></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <?php endfor; ?>
                           </div>
						   
						   
						   
                        </div>
                     </div>
                  </div>
                  <?php endif; ?>
                  <!--line-->
               </div>
            </div>
         </div>
      </div>
   </div>
   <!---line-->
   <!----line--->
</div>
