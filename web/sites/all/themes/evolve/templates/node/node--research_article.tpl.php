<div style="height: 10px; width: 1px;">&nbsp;</div>

<div class="Pagination">
<div class="WFpage">RESEARCH W1.3.1&W1.4</div>

<div class="Docpage">00.06.05.01</div>
</div> 

<div class="container">

<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix post large" <?php print $attributes; ?>>

   	<div class="post-img media mobile">
        <div class='mediaholder fullwidthimage'>
            <?php print render($content['field_research_article_image']);?>
        </div>
      </div>
      <?php /*print_r ($content['field_research_author']['#items']); */?>	
      <div class="region col-xs-12 col-sm-12 col-md-9 col-lg-9">
      
      <section class="post-content">

      <h1 class="SectionHeader"><?php print $node->title;?></h1>

         <header class="meta">
        <div class="flex-container post-meta">

            <div class="flex-cell">
                <div class="flex-col-6 meta-info">
                    <div class="meta-type-date">
                        <span class="meta-type category"><b><?php print render($content['field_research_article_category']);?></b></span>
                        <span class="meta-type"><b><?php print render($content['field_research_author']); ?></b></span>
                        
                        <?php if(!is_null(render($content['field_research_issue']))): ?> <?php echo '<span class="meta-date">';?>
                        <?php print render($content['field_research_issue']);?><?php echo '</span>';?> <?php endif?>
                        
                        <span class="meta-date"><?php //print date('M',$created); print " "; print date('d',$created).' '.date('Y',$created); ?></span>
                    </div>
                </div>

                <div class="flex-col-6 meta-share-url">
                    <ul class="socialMediaIcon" style="float:right;margin-top:-3%;">
                        <li>
                            <div class="fb-share-button" data-layout="button_count" data-mobile-iframe="true" data-size="small">&nbsp;</div>
                        </li>
                        <li>
                            <a class="twitter-share-button" data-show-count="false" href="https://twitter.com/share">Tweet</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8">&nbsp;</script>
                        </li>
                        <li>
                            <script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script><script type="IN/Share" data-counter="right"></script>&nbsp;
                        </li>
                  </ul>
               </div>
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
					});
					</script>
                </div>
            </div>

        </div>
      </header>

            <div class="post-img media">
			<div class='mediaholder fullwidthimage'>
                        <?php print render($content['field_research_article_image']);?>
			</div>
            </div>
            
            <?php
            // We hide the comments and links now so that we can render them later.
            hide($content['comments']);
            hide($content['links']);
            print render($content['body']);
            ?>
      </section>	

    <div class="space-30"></div>

    <div class="featured-block">
        <h4>About the author/s</h4>

        <?php if(sizeof($content['field_research_author']['#items'])==1): ?>
        <div class="author">
            <p class="author-name"><?php echo $content['field_research_author']['#items'][0]['taxonomy_term']->name; ?></p>
            <p class="author-education"><?php echo $content['field_research_author']['#items'][0]['taxonomy_term']->field_education['und'][0]['value']; ?></p>
            <div class="author-bio"><?php echo $content['field_research_author']['#items'][0]['taxonomy_term']->field_bio['und'][0]['value']?></div>
        </div>
        <?php endif; ?>

        <?php //if(sizeof($content['field_research_author']['#items'])>1): ?>

        <?php //endif; ?>
    </div>

    <div class="space-50"></div>

      <div id="prev-btn"><a class="go-back-button button" href="javascript:history.go(-1)">Back to previous</a></div>

      </div>

      <div class="block CampaignSidebar contextual-links-region region-right-sidebar col-xs-12 col-sm-12 col-md-3 col-lg-3" style="margin:0 0 50px">
         <h3 class="headline">Physiotherapy research</h3>
         <span class="brd-headling"></span>
         <div class="content">
         <?php
            $block = block_load('block', '404');
            $get = _block_get_renderable_array(_block_render_blocks(array($block)));
            $output = drupal_render($get);
            print $output;
         ?>
         </div>
      </div>

   </div>
   </div>
</div>

   <!--
   <div class="dexp-section" id="section-content-bottom-third">
      <div class="container">
         <div class="row">
            <div class="region region-content-bottom-third col-xs-12 col-sm-12 col-md-12 col-lg-12">
               <div id="block-views-team-block-7" class="block block-views main-headline dexp-animate" data-animate="fadeInUp" style="padding:50px 0 50px 0">
                  <h3 class="block-title"> About the author/s:</h3>

                  <?php //if(sizeof($content['field_research_author']['#items'])==1): ?>
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
                                                         <?php   //$link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";$base_path = base_path();$imgLink = $link.$base_path."sites/default/files/".$content['field_research_author']['#items'][0]['taxonomy_term']->field_profile_picture['und'][0]['filename']; 
                                                           // echo "<img src='".$imgLink."'/>"; ?>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="overlay"></div>
                                             </div>
                                             <div class="team-item-right team-member-info-wrp">
                                                <div class="team-name">
                                                   <h5><?php // echo $content['field_research_author']['#items'][0]['taxonomy_term']->name; ?></h5>
                                                   <span>
                                                      <div class="field field-name-field-team-position field-type-text field-label-hidden">
                                                         <div class="field-items">
                                                            <div class="field-item even"><?php // echo $content['field_research_author']['#items'][0]['taxonomy_term']->field_education['und'][0]['value']; ?>
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
                                                            <p><?php // echo $content['field_research_author']['#items'][0]['taxonomy_term']->field_bio['und'][0]['value']?></p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   </p>
                                                </div>
                                                <div class="team-email">
                                                   <i class="icon-envelope"></i> 
                                                   <div class="field field-name-field-team-email field-type-text field-label-hidden">
                                                      <div class="field-items">
                                                         <div class="field-item even">
                                                            <?php //echo $content['field_research_author']['#items'][0]['taxonomy_term']->field_emailauthor['und'][0]['value'];
                                                             ?>
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
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php //endif; ?>
 
                  <?php //if(sizeof($content['field_research_author']['#items'])>1): ?>
                  <div class="content">
                     <div class="view view-team view-id-team view-display-id-block_7 view-dom-id-4ff5a51ef6d43d50dc3f1537f4ee9ee1">
                        <div class="view-content">
						 	
                           <div id="team-block-7" class="dexp-bxslider">
                              <?php //$number = sizeof($content['field_research_author']['#items']);
                                 //for($i=0; $i<$number; $i++):
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
                                                      <?php //$link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";$base_path = base_path();$imgLink = $link.$base_path."sites/default/files/".$content['field_research_author']['#items'][0]['taxonomy_term']->field_profile_picture['und'][0]['filename'];  
                                                         //echo "<img src='".$imgLink."'/>"; ?>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="overlay"></div>
                                          </div>
                                          <div class="team-item team-member-info-wrp">
                                             <div class="team-name">
                                                <h5><?php //echo $content['field_research_author']['#items'][$i]['taxonomy_term']->name; ?></h5>
                                                <span>
                                                   <div class="field field-name-field-team-position field-type-text field-label-hidden">
                                                      <div class="field-items">
                                                         <div class="field-item even"><?php //echo $content['field_research_author']['#items'][$i]['taxonomy_term']->field_education['und'][0]['value']; ?></div>
                                                      </div>
                                                   </div>
                                                </span>
                                             </div>
                                             <div class="team-about">
                                                <p></p>
                                                <div class="field field-name-body field-type-text-with-summary field-label-hidden">
                                                   <div class="field-items">
                                                      <div class="field-item even" property="content:encoded">
                                                         <p><?php //echo $content['field_research_author']['#items'][$i]['taxonomy_term']->field_bio['und'][0]['value']?></p>
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
                                                         <?php //echo $content['field_research_author']['#items'][$i]['taxonomy_term']->field_emailauthor['und'][0]['value']; ?>
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
                              <?php //endfor; ?>
                           </div>	   
                        </div>
                     </div>
                  </div>
                  <?php //endif; ?>

               </div>
            </div>
         </div>
      </div>
   </div>

</div>
