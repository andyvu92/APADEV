<?php $link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";$base_path = base_path();
	$urlForthisArticle = $node_url;
	if(!is_null(render($content['field_url_article_link']))) {$urlForthisArticle = $content['field_url_article_link']['#items'][0]['value'];} 
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix post large single-article" <?php print $attributes; ?>>
	<div class="thumbnail" style='background:url("<?php echo $Link = $link.$base_path."sites/default/files/".str_replace("public://","",$node->field_prf_news_picture['und'][0]['file']->uri);?>")'></div>
	
	<div class="article-info">
		<h4><a href="<?php print $urlForthisArticle; ?>"><?php print $title; ?></a></h4>

		<div class="actions-wrapper">
			<div class="author">
				<?php if(!empty($content['field_prf_news_author'])): ?>
					<p>By <b><?php print render($content['field_prf_news_author']);?></b></p>
				<?php endif; ?>
				<time datetime="<?php print date('M',$created); print " "; print date('Y',$created); ?>"><?php print date('M',$created); print " "; print date('Y',$created); ?></time>
			</div>

			<div class="share"></div>
		</div>

		<p><?php print render($content['body']); ?></p>
		<a class="simple-link" href="<?php print $urlForthisArticle; ?>">READ MORE</a>
	</div>
</div> 

