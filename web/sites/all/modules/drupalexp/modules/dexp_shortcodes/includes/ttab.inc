<?php



function dexp_shortcodes_ttabs_shortcode_info(&$shortcodes) {

  $shortcodes['ttabs'] = array(

      'title' => t('Ttabs'),

      'description' => t('Ttabs wrapper'),

      'process callback' => 'dexp_shortcodes_ttabs',

      'tips callback' => 'dexp_shortcodes_ttab_tips',

  );

}



/**

 * Shortcode tab group definition

 */

function dexp_shortcodes_ttabs( $attrs, $content = null ) {

   extract(shortcode_attrs(array('class' => '',), $attrs));

   global $shortcode_ttabs_stack;

   $tab_wrapper_id = "dexp_tab_wrapper_";

   $tab_wrapper_id .= rand();

   if ($class == "" || ($class != "noboder" && $class != "horizontal")) {

      $class = "default";

   }

   $output = '<div id="'.$tab_wrapper_id.'" class="dexp_tab_wrapper '.$class.'"> <ul class="nav nav-tabs">';

   $tabCount = 1;

   

   foreach ($shortcode_ttabs_stack as $tab) {

      if($tabCount == 1) { 

        $output .= '<li class="active"><a href="#'.$tab["id"].'" data-toggle="tab"><i class="tab-icon fa '.$tab["icon"].'"></i>'.$tab["title"].'</a></li>';

      } else {

        $output .= '<li><a href="#'.$tab["id"].'" data-toggle="tab"><i class="tab-icon fa '.$tab["icon"].'"></i>'.$tab["title"].'</a></li>';  

      }

      $tabCount = $tabCount + 1;

   }

   

   $output .= '</ul>';

   $output .='<div class="tab-content">';

   

   $tabCount = 1;

   foreach ($shortcode_ttabs_stack as $tab) {

      if($tabCount == 1) {  

        $output .= '<div id="'.$tab["id"].'" class="active tab-pane">';

      } else {

        $output .= '<div id="'.$tab["id"].'" class="tab-pane">';  

      }

      $tabCount = $tabCount + 1;

      $output .= $tab["contents"]["#markup"].'</div>';

   }

   $output .='</div></div>';

   $shortcode_ttabs_stack = null;

   return $output;  

}



function dexp_shortcodes_ttab_shortcode_info(&$shortcodes) {

  $shortcodes['ttab'] = array(

      'title' => t('Ttab'),

      'description' => t('Tab item'),

      'process callback' => 'dexp_shortcodes_ttab',

  );

}



/**

 * Shortcode tab item definition

 */

function dexp_shortcodes_ttab( $attrs, $content = null ) {

  extract(shortcode_attrs(array('title' => '', 'icon' => '',), $attrs));

  $id_tab_item = "dexp_tab_item_";

  $id_tab_item .= rand();

  global $shortcode_ttabs_stack;

  if (!is_array($shortcode_ttabs_stack)) $shortcode_ttabs_stack = array();

  $tabPane = array(

    'title' => $title,

    'icon'  => $icon,

    'id'    => $id_tab_item,

    'contents' => array(

      '#markup' => $content,

    ),

    'weight' => count($shortcode_ttabs_stack),

  );

  $shortcode_ttabs_stack[] = $tabPane;

}



function dexp_shortcodes_ttab_tips($format, $long) {

  $output = '[ttabs class="horizontal OR vertical"][ttab title="Tab Title 1" icon="Icon name 1"] Your content1 here [/tab][tab title="Tab Title 2" icon="icon name 2"] Your content2 here [/tab][/tabs]';

  return $output;

}