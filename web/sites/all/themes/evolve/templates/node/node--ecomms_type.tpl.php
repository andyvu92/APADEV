<div class="border-10 full-width"></div>
<div style="height: 10px; width: 1px;">&nbsp;</div>
<div class="Pagination"></div> 
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix post large" <?php print $attributes; ?>>
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
      <div class="region col-xs-12 col-sm-12 col-md-8 col-lg-8">
        <!-- MOBILE POST FEATURED IMG -->
        <div class="post-img media mobile">
            <div class='mediaholder fullwidthimage'>
                <?php print render($content['field_commsimage']);?>
            </div>
        </div>

         <h1 class="SectionHeader"><?php print $node->title;?></h1>
         <div class="brd-headling">&nbsp;</div>
			
         <header class="meta">
            <div class="flex-container post-meta">

                <div class="flex-cell">
                    <div class="flex-col-6 meta-info">
                        <div class="meta-author-date">
                            <!-- <span class="meta-author">By <b><?php //print render($content['field_inmotion_author']); ?></b></span> -->
                            <span class="meta-date"><?php print date('M',$created); print " "; print date('d',$created).' '.date('Y',$created); ?></span>
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
                </div>
            </div>
        </header>
         
        <!-- DESKTOP POST FEATURED IMG -->
		<div class="post-img media">
			<div class='mediaholder fullwidthimage'>
				<?php print render($content['field_commsimage']);?>
			</div>
		</div>
		 <?php
            // We hide the comments and links now so that we can render them later.
            hide($content['comments']);
            hide($content['links']);
            print render($content['body']);
        ?>
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
        
        <div id="prev-btn">
            <a class="go-back-button button" href="javascript:history.go(-1)">Back to previous</a>
        </div>
      </div>
	  
      <div class="block CampaignSidebar contextual-links-region region-right-sidebar col-xs-12 col-sm-12 col-md-4 col-lg-4" style="margin:0 0 50px">
         <h3 class="headline">Most Popular</h3>
         <span class="brd-headling"></span>
         <div class="content">
            <?php echo views_embed_view('home_tile_view', 'block_6');?>
         </div>
      </div>	
	
   </section>

   <!---line-->
   <!----line--->
</div>