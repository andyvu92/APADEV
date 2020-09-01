<div class="border-10 full-width"></div>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix post large" <?php print $attributes; ?>>
   
   <section class="post-content container" style="float:none; margin:auto;">
      <div class="left-content region col-xs-12 col-sm-12 col-md-8 col-lg-8">
        <!-- MOBILE POST FEATURED IMG -->
        <div class="post-img media mobile">
            <div class='mediaholder fullwidthimage'>
                <?php print render($content['field_prf_news_picture']);?>
            </div>
        </div>

         <h1 class="SectionHeader"><?php print $node->title;?></h1>
         <div class="brd-headling">&nbsp;</div>
			
         <header class="meta">
            <div class="flex-container post-meta">

                <div class="flex-cell">
                    <div class="flex-col-6 meta-info">
                        <div class="meta-author-date">
                            <?php
                            if ( !empty($content['field_prf_news_author']) ){
                                echo '<span class="meta-author">By <b>'. render($content['field_prf_news_author']) .'</b></span>';
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
                        </ul>
                    </div>
                </div>

            </div>
         </header>
         
         <!-- DESKTOP POST FEATURED IMG -->
		<div class="post-img media">
			<div class='mediaholder fullwidthimage'>
				<?php print render($content['field_prf_news_picture']);?>
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
	  
	<div class="block CampaignSidebar contextual-links-region region-right-sidebar col-xs-12 col-sm-12 col-md-4 col-lg-4" style="margin:0 0 50px">
		<span class="underline-heading">PHYSIOTHERAPY RESEARCH</span> 
		<?php 
			$block = block_load('block', '394');
			$get = _block_get_renderable_array(_block_render_blocks(array($block)));
			$output = drupal_render($get);        
			print $output; 
		?>
	</div>
   </section>
	<a class="go-back-button button" href="javascript:history.go(-1)">Back to previous</a>
   <!---line-->
</div>
