<?php
if(!function_exists('drupal_session_started'))
{
  die("Unauthorized Access");
}
/**
* This template is only to restrict an access from users to see this page.
* Normal customers/visitors should not be able to see this page.
* This can be removed firstly as for Drupal updates.
*
* - Eddy
*/
?>
<div id="node-<?php print $node->nid; ?>" style="margin-top:30px;" class="<?php print $classes; ?> clearfix post large flex-container" <?php print $attributes; ?>>
	<?php
		global $user;
		$userRole = $user->roles[3];
	?>
	<?php if($userRole == "administrator"): ?>
		<?php
		$rens = render($content['field_member_type_category']);
		$rens = str_replace('<div class="field field-name-field-member-type-category field-type-text field-label-hidden">',"",$rens);
		$rens = str_replace('<div class="field-items">',"",$rens);
		$rens = str_replace('<div class="field-item even">',"",$rens);
		$rens = str_replace('</div>',"",$rens);
		?>
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
					//echo $TypePrice[$key]["Code"]." vs ".strtoupper($rens)."<br>";
					if($TypePrice[$key]["Code"] == strtoupper($rens)) {
						//echo "ever?????????????????!!!!!!!!!!!!!!!!!!";
						print '<div class="MTprice">$'.$TypePrice[$key]["Price"].'</div>';
						print '<div class="MTid" style="display: none;">'.$TypePrice[$key]["ID"].'</div>';
					}
				}
				?>
			</div>
			<?php //print render($content['field_what_is_it']);?>
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
	<?php else: 
			//redirect:
			$memberCategory = $content['field_membershipcategory'][0]["#title"];//['#formatter'];//[0]["taxonomy_term"]["name"];
			//var_dump($memberCategory);
			$urlReturns = aptify_return_membertype_url($memberCategory);
			header("Location: ".$urlReturns);
			exit;
		endif; ?>
</div> 


<?php
/**
 * Temp function
 * This function will return member type related pages' url by its categories.
 * @param Type
 * @return url
 */
function aptify_return_membertype_url($categoryType) {
	$baseURLcategory = "/membership/categories-fees/";
	switch($categoryType) {
		case "Full time":
			return $baseURLcategory."full-time-membership";
		case "Part time":
			return $baseURLcategory."part-time-membership";
		case "Reduced":
			return $baseURLcategory."reduced-membership";
		case "Graduate":
			return $baseURLcategory."graduate-membership";
		case "Student":
			return $baseURLcategory."student-membership";
		case "Retired":
			return $baseURLcategory."retired-membership";
		case "Physio assistant":
			return $baseURLcategory."physio-assistant-membership";
		case "Associate":
			return $baseURLcategory."associate-membership";
		case "Affiliate":
			return $baseURLcategory."affiliate-subscriber-membership";
	}
}
?>