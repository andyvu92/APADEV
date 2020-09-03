<?php $link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";$base_path = base_path();?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix post large single-article" <?php print $attributes; ?>>
	<div class="thumbnail" style='background:url("<?php echo $Link = $link.$base_path."sites/default/files/".str_replace("public://","",$node->field_prf_news_picture['und'][0]['file']->uri);?>")'></div>
	
	<div class="article-info">
		<h4><?php print $title; ?></h4>

		<div class="actions-wrapper">
			<div class="author">
				<p>By <b><?php print render($content['field_prf_news_author']);?></b></p>
				<time datetime="<?php print date('M',$created); print " "; print date('Y',$created); ?>"><?php print date('M',$created); print " "; print date('Y',$created); ?></time>
			</div>

			<div class="share">
				
			</div>
		</div>

		<p><?php print render($content['body']); ?></p>
		<a class="simple-link" href="<?php print $node_url; ?>">READ MORE</a>
	</div>
</div> 

