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
<?php 
$rens = render($content['field_member_type_category']);
$rens = str_replace('<div class="field field-name-field-member-type-category field-type-text field-label-hidden">',"",$rens);
$rens = str_replace('<div class="field-items">',"",$rens);
$rens = str_replace('<div class="field-item even">',"",$rens);
$rens = str_replace('</div>',"",$rens);
?>
<div id="node-<?php print $node->nid; ?>" style="display: none; margin-top:30px;" class="<?php print $classes; echo ' '.$rens; ?> clearfix large" <?php print $attributes; ?>>
	<section class="post-content">
	<h2 class="MTtitle"><?php print $title; ?></h2>
	<div class="contents">
		<div class="MTcontent">
			<div class="MTcontentTitle">Category:</div>
			<?php 
				print '<div style="text-transform: uppercase;">'.$rens.'</div>';
			?>
		</div>
		<div class="MTcontent">
			<div class="MTcontentTitle">Price:</div>
			<?php
			$TypePrice = file_get_contents("sites/all/themes/evolve/json/TypePrice.json");
			$TypePrice = json_decode($TypePrice, true);
			foreach ($TypePrice as $key => $value) {
				if($TypePrice[$key]["Code"] == strtoupper($rens)) {
					print '<div class="MTprice">$'.$TypePrice[$key]["Price"].": Pro-rata price as of ".date("d/m/y")." valid until 31/12/19".'<span class="info_icon" popup-target="ProrataExplaination"></span></div>';
					print '<div class="MTprice">$'.$TypePrice[$key]["UnitPrice"].": Full price".'</div>';
					print '<div class="MTid" style="display: none;">'.$TypePrice[$key]["ID"].'</div>';
				}
			}
			?>
		</div>
		<?php 
			$rens = render($content['field_what_is_it']);
			$linksList = explode("\n", $rens);
			$count = 0;
			$total = count($linksList);
			if($total > 1) {
				echo '<div class="MTcontent">
				<div class="MTcontentTitle">What is it?</div><br />';
				print '<ul>';
				foreach($linksList as $ren) {					
					$count++;
					if($count == $total) {
						// get rid of </div>;
						$ren = str_replace("</div>","",$ren);
					}
					// get rid of &nbsp;
					$string = htmlentities($ren, null, 'utf-8');
					$checks = str_replace("&nbsp;", " ", $string);
					$checks = html_entity_decode($checks);
					print '<li>';
					print $ren;
					print '</li>';
				}
				print '</ul></div>';
			} elseif($total == 1 && strlen($linksList[0]) > 200) {
				echo '<div class="MTcontent">
				<div class="MTcontentTitle">What is it?</div><br />';
				print '<ul>';
				foreach($linksList as $ren) {					
					// get rid of &nbsp;
					$string = htmlentities($ren, null, 'utf-8');
					$checks = str_replace("&nbsp;", " ", $string);
					$checks = html_entity_decode($checks);
					print '<li>';
					print $ren;
					print '</li>';
					break;
				}
				print '</ul></div>';
			}
		?>
		<?php 
			$rens = render($content['field_eligibility']);
			$linksList = explode("\n", $rens);
			$count = 0;
			$total = count($linksList);
			if($total > 1) {
				echo '<div class="MTcontent">
					<div class="MTcontentTitle">You are eligible if you:</div><br />';
				print '<ul>';
				foreach($linksList as $ren) {					
					$count++;
					if($count == $total) {
						// get rid of </div>;
						$ren = str_replace("</div>","",$ren);
					}
					// get rid of &nbsp;
					$string = htmlentities($ren, null, 'utf-8');
					$checks = str_replace("&nbsp;", " ", $string);
					$checks = html_entity_decode($checks);
					print '<li>';
					print $ren;
					print '</li>';
				}
				print '</ul></div>';
			} elseif($total == 1 && strlen($linksList[0]) > 200) {
				echo '<div class="MTcontent">
				<div class="MTcontentTitle">You are eligible if you:</div><br />';
				print '<ul>';
				foreach($linksList as $ren) {					
					// get rid of &nbsp;
					$string = htmlentities($ren, null, 'utf-8');
					$checks = str_replace("&nbsp;", " ", $string);
					$checks = html_entity_decode($checks);
					print '<li>';
					print $ren;
					print '</li>';
					break;
				}
				print '</ul></div>';
			}
		?>
		<?php 
			$rens = render($content['body']);
			$rens = str_replace('<div class="field field-name-body field-type-text-with-summary field-label-hidden">',"",$rens);
			$rens = str_replace('<div class="field-items">',"",$rens);
			$rens = str_replace('<div class="field-item even" property="content:encoded">',"",$rens);
			$rens = str_replace('</div>',"",$rens);
			$rens = str_replace('<p>',"",$rens);
			$rens = str_replace('</p>',"",$rens);
			$string = htmlentities($rens, null, 'utf-8');
			$checks = str_replace("&nbsp;", " ", $string);
			$checks = html_entity_decode($checks);
			$linksList = explode("\n", $checks);
			$count = 0;
			$total = count($linksList);
			if($total > 1) {
				echo '<div class="MTcontent">
					<div class="MTcontentTitle">You are not eligible if you:</div><br />';
				print '<ul>';
				foreach($linksList as $ren) {					
					$count++;
					if($count == $total) break;
					print '<li>';
					print $ren;
					print '</li>';
				}
				print '</ul></div>';
			} elseif($total == 1 && strlen($linksList[0]) > 10) {
				echo '<div class="MTcontent">
					<div class="MTcontentTitle">You are not eligible if you:</div><br />';
				print '<ul>';
				foreach($linksList as $ren) {					
					print '<li>';
					print $ren;
					print '</li>';
				}
				print '</ul></div>';
			}
		?>
	</div>
	  <?php
        // We hide the comments and links now so that we can render them later.
        hide($content['comments']);
        hide($content['links']);
		hide($content['field_media_tag']);
        //print render($content);
        ?>
	</section>
  
</div> 

