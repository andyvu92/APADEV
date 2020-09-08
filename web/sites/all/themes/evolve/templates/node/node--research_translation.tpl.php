
<?php
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
   ?>
<div class="Pagination"></div>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix post large" <?php print $attributes; ?>>
<?php if(is_null(render($content['field_podcast_url']))): ?>
   <section class="post-content" style="float:none; margin:auto;">
      <div class="region col-xs-12 col-sm-12 col-md-9 col-lg-9">

        <!-- MOBILE POST FEATURED IMG -->
        <div class="post-img media mobile">
            <div class='mediaholder fullwidthimage'>
                <?php print render($content['field_translation_image']);?>
            </div>
        </div>

         <h1 class="SectionHeader"><?php print $node->title;?></h1>
			
         <header class="meta">
            <div class="flex-container post-meta">

               <div class="flex-cell">
                     <div class="flex-col-6 meta-info">
                                 <?php 
                                 /*
                              $only = ((array)$content['field_members_only']['#items'][0]['taxonomy_term'])["name"];
                              if($only == "Yes") {
                                 echo "<li><strong><div class='MonlyIconHolder'><div class='MonlyIcon'></div></div></strong></li>";
                              } 
                           ?>
                           <?php if(!is_null(render($content['field_members_only']))): ?> 
                           <?php endif */ ?>
                        <div class="meta-type-date">
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
               <?php print render($content['field_translation_image']);?>
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
            <a class="go-back-button button dynamic-back-to-prev-btn" href="/research/prf/translation">Back to previous</a>
        </div>
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
            // echo views_embed_view('research_translation', 'block_4');

         ?>
         </div>
      </div>
   </section>
   <?php else: ?>
      <?php if(!is_null($userRole)): // has 'editing roll ?>
         <section class="post-content container" style="float:none; margin:auto;">
            <div class="region col-xs-12 col-sm-12 col-md-9 col-lg-9">

            <!-- MOBILE POST FEATURED IMG -->
            <div class="post-img media mobile">
                  <div class='mediaholder fullwidthimage'>
                     <?php print render($content['field_translation_image']);?>
                  </div>
            </div>

               <h1 class="SectionHeader"><?php print $node->title;?></h1>
               <div class="brd-headling">&nbsp;</div>
               
               <header class="meta">
                  <div class="flex-container post-meta">

                     <div class="flex-cell">
                           <div class="flex-col-6 meta-info">
                                       <?php 
                                       /*
                                    $only = ((array)$content['field_members_only']['#items'][0]['taxonomy_term'])["name"];
                                    if($only == "Yes") {
                                       echo "<li><strong><div class='MonlyIconHolder'><div class='MonlyIcon'></div></div></strong></li>";
                                    } 
                                 ?>
                                 <?php if(!is_null(render($content['field_members_only']))): ?> 
                                 <?php endif */ ?>
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
                     <?php print render($content['field_translation_image']);?>
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
                  <a class="go-back-button button dynamic-back-to-prev-btn" href="/research/prf/translation">Back to previous</a>
            </div>
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
         </section>
      <?php else: ?>
         <?php
            // We hide the comments and links now so that we can render them later.
            //redirect:
            $outLink = "";
            $outLink = $content['field_podcast_url']['#items'][0]['value'];
            header("Location: ".$outLink);
            exit;
         endif; ?>
   <?php endif; ?>
</div>