<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page while offline.
 *
 * All the available variables are mirrored in html.tpl.php and page.tpl.php.
 * Some may be blank but they are provided for consistency.
 *
 * @see template_preprocess()
 * @see template_preprocess_maintenance_page()
 *
 * @ingroup themeable
 */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">

<head>

  <title><?php print $head_title; ?></title>
  <?php print $head; ?>
  <?php print $styles; ?>
  <?php print $scripts; ?>
  <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cairo:regular|Roboto:100,300,700&amp;subset=latin,greek,cyrillic" media="all">
  <style>	.background {
	    position: fixed; overflow: hidden;background-image: url('/sites/default/files/PARALLAX_HOME.jpg');background-size: cover;background-repeat:  no-repeat;left:  0;top:  0;margin: 0;background-position:  center; right: 0; bottom: 0;
    }
    .background:before {
        content: ''; height: 100%; position: absolute; width: 100%; background-color: rgba(0,0,0,0.3); z-index: 2; top: 0; left: 0; bottom: 0; right: 0;
    }
</style>
</head>
<body class="<?php print $classes; ?>">
  <div id="page">
    <div id="header">
      <?php /*
	  <div id="logo-title">
		*/ ?>
      <?php if (!empty($header)): ?>
        <div id="header-region">
          <?php print $header; ?>
        </div>
      <?php endif; ?>

    </div> <!-- /header -->

    <div id="container" class="clearfix">

      <?php if (!empty($sidebar_first)): ?>
        <div id="sidebar-first" class="column sidebar">
          <?php print $sidebar_first; ?>
        </div> <!-- /sidebar-first -->
      <?php endif; ?>

      <div id="main" class="column"><div id="main-squeeze">
        <div class="background">&nbsp;</div>
        <div id="content" style="padding: 50px; position: relative; z-index: 5;">
          <?php /*if (!empty($title)): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif;*/ ?>
          <?php if (!empty($messages)): print $messages; endif; ?>
          <div id="content-content" class="clearfix" style="font-size: 45px;font-family: arial;color: rgb(0,159,218);">
		  
		  <div id="logo-title">
			  <?php /*<a href="<?php //print $base_path; ?>https://choose.physio" title="<?php print t('Home'); ?>" rel="home" id="logo">*/ ?>
        <img alt="" src="/sites/default/files/APA_185x2242.png">
			  <?php /* </a> */ ?>
		  </div> <!-- /logo-title -->
		  
          <?php /*print $content;*echo "This website is currently undergoing maintenance.<br />We apologies for any inconvenience, please come back soon.";*/ ?>
            <div style="width: 56%; margin: auto;">
              <p style="margin-top: 0; margin-bottom: 50px; font-weight: 700; color: white; font-family: 'roboto';">
              This website is presently unavailable while we undergo maintenance.<br />Please come back soon
        or phone the APA Member Hub on 1300 306 622.
              </p>
              <p style="margin-top: 0; font-weight: 100; font-size: 36px; font-family: 'roboto'; color: white;">
                
              </p>
            </div>
          </div> <!-- /content-content -->
        </div> <!-- /content -->

      </div></div> <!-- /main-squeeze /main -->

      <?php if (!empty($sidebar_second)): ?>
        <div id="sidebar-second" class="column sidebar">
          <?php print $sidebar_second; ?>
        </div> <!-- /sidebar-second -->
      <?php endif; ?>

    </div> <!-- /container -->

    <div id="footer-wrapper">
      <div id="footer">
        <?php if (!empty($footer)): print $footer; endif; ?>
      </div> <!-- /footer -->
    </div> <!-- /footer-wrapper -->

  </div> <!-- /page -->

</body>
</html>
