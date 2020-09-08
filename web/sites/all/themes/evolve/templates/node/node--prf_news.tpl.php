<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix post large" <?php print $attributes; ?>>	
	<section class="post-content">
		<div class="region col-xs-12 col-sm-12 col-md-9 col-lg-9">
			<div class="post-img media mobile">
				<div class='mediaholder fullwidthimage'>
					<?php print render($content['field_prf_news_picture']);?>
				</div>
			</div>
			
			<h1 class="SectionHeader"><?php print $title; ?></h1>

			<header class="meta">
				<div class="flex-container post-meta">

					<div class="flex-cell">
						<div class="flex-col-6 meta-info">
							<div class="meta-type-date">
								<?php /*<span class="meta-type"><b><?php print render($content['field_media_type']);?></b></span> */ ?>
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
					<?php print render($content['field_prf_news_picture']);?>
				</div>
			</div>

			<?php
				// We hide the comments and links now so that we can render them later.
				hide($content['comments']);
				hide($content['links']);
				print render($content['body']);
			?>

			<div class="space-20">&nbsp;</div>

			<div id="prev-btn"><a class="go-back-button button dynamic-back-to-prev-btn" href="/research/prf/news">Back to previous</a></div>
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

					// most popular
					// echo views_embed_view('media', 'block_19');

				?>
			</div>
		</div>
		<div class="space-50">&nbsp;</div>

</section>
  
</div> 

