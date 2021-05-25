<?php $shows = ($content["field_tile_type"]['#items'][0]["taxonomy_term"]->name == "Podcast Shows")? true : false; 
if(!$shows): ?>
<div class="border-10 full-width"></div>
<?php endif;
  global $user;
$userRole = $user->roles[3]; // admin
if(is_null($userRole)) {
   $userRole = $user->roles[4]; // Media Editor
   if(is_null($userRole)) {
      $userRole = $user->roles[5]; // InMotion Editor
      if(is_null($userRole)) {
         $userRole = $user->roles[7]; // Content Editor
      }
   }
}
if(is_null($userRole)) {
   if(!is_null(render($content['field_url_for_page']))) {
      $outLink = $content['field_url_for_page']['#items'][0]['value'];
   } elseif(!is_null(render($content['field_external_url_for_page']))) {
      $outLink = $content['field_external_url_for_page']['#items'][0]['value'];
   }
   if(!is_null($outLink)) {
      header("Location: ".$outLink);
      exit;
   }
}
?>
<div style="height: 10px; width: 1px;">&nbsp;</div>
<div class="Pagination"></div>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix post large home-news-indiv" <?php print $attributes; ?>>
   <section class="post-content container" style="float:none; margin:auto;">
      <div class="region col-xs-12 col-sm-12 col-md-8 col-lg-8">
         <!-- MOBILE POST FEATURED IMG -->
         <div class="post-img media mobile">
               <div class='mediaholder fullwidthimage'>
                  <?php print render($content['field_home_tile_image']);?>
               </div>
         </div>
         <?php if(!$shows): ?>
         <h1 class="SectionHeader"><?php print $node->title;?></h1>
         <div class="brd-headling">&nbsp;</div>
			
         <header class="meta">
            <div class="flex-container post-meta">
               <div class="flex-cell">
                  <div class="flex-col-6 meta-info">
                     <?php 
                        $only = ((array)$content['field_members_only']['#items'][0]['taxonomy_term'])["name"];
                        if($only == "Yes") {
                           echo "<li><strong><div class='MonlyIconHolder'><div class='MonlyIcon'></div></div></strong></li>";
                        } 
                     ?>
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
         <!-- DESKTOP POST FEATURED IMG -->
         <div class="post-img media">
            <div class='mediaholder fullwidthimage'>
               <?php print render($content['field_home_tile_image']);?>
            </div>
         </div>
         <?php endif; ?>
         <?php
            // We hide the comments and links now so that we can render them later.
            hide($content['comments']);
            hide($content['links']);
            print render($content['body']);
         ?>
        <div id="prev-btn">
            <a class="go-back-button button" href="javascript:history.go(-1)">Back to previous</a>
        </div>
      </div>
      <div class="block CampaignSidebar contextual-links-region region-right-sidebar col-xs-12 col-sm-12 col-md-4 col-lg-4" style="margin:0 0 50px">
         <?php if($shows): ?>
         <h3 class="headline">Other podcasts</h3>
         <span class="brd-headling"></span>
         <div class="content">
            <ul class="nav views-row">
               <li><a href="/home/podcast-shows/conference-conversations">Conference Conversations</a></li>
               <li><a href="/home/podcast-shows/researchers-record">Researchers on the Record</a></li>
               <li><a href="/home/podcast-shows/deadly-physios">The Deadly Physios</a></li>
               <li><a href="/home/podcast-shows/physios-mic">Physios on the Mic</a></li>
            </ul>
         </div>
         <?php endif; ?>
         <?php if(!$shows): ?>
         <h3 class="headline">Most Popular</h3>
         <span class="brd-headling"></span>
         <div class="content">
            <?php echo views_embed_view('home_tile_view', 'block_6');?>
         </div>
         <?php endif; ?>
      </div>
   </section>
   <?php $img = "/sites/default/files".substr($content['field_home_tile_image']['#items'][0]["file"]->uri, 8); ?>
   <script type="text/javascript">
      jQuery(document).ready(function($) {
         $('#block-block-460').each(function(){
            $(this).css('background-image', "<?php echo $img; ?>");
            img = '<?php echo $img; ?>';
            $(this).append("<img data-speed='1' class='img-parallax' src=' " + img + "'>");
         })
      })
   </script>
</div>