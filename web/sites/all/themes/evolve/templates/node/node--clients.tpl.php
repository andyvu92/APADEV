<?php
if(!function_exists('drupal_session_started'))
{
  die("Unauthorized Access");
}
/**
* This template is only to restrict an access from users to this page.
* Normal customers/visitors should not see this page.
* This can be removed firstly as for Drupal updates.
*
* - Eddy
*/
global $user;
$userRole = $user->roles[3];
?>
<div id="node-<?php print $node->nid; ?>" style="margin-top:30px;" class="<?php print $classes; ?> clearfix post large flex-container" <?php print $attributes; ?>>
	<?php if($userRole == "administrator") { 
			print render($content['title']);
			hide($content['comments']);
			hide($content['links']);
			print render($content['field_image']);
			print render($content['body']);
			print render($content['field_externallinkclient']);
	} else {
		// We hide the comments and links now so that we can render them later.
		//redirect:
		$outLink = $content['field_externallinkclient']['#items'][0]["safe_value"];
		header("Location: ".$outLink);
		exit;
    } ?>
</div> 

