<?php

/**
 * Create admin page to render drupal table view.
 * Display the log about member transaction
 */
function apa_log_admin_settings() {
  $variables = array();
  $header = array('ID', 'User ID', 'Type');
  $query = db_select('shopping_cart','s')
          ->fields('s', array('ID','userID','type'))
          ->condition('type', 'PD')
					->execute()
          ->fetchAll();
  if(sizeof($query)!=0){
    $arrayReturn = json_decode(json_encode($query), True);
  }
  $per_page = 15;
  $current_page = pager_default_initialize(count($arrayReturn), $per_page);
  $chunks = array_chunk($arrayReturn, $per_page, TRUE);
  $variables['header'] = $header;
  $variables['rows'] =  $chunks[$current_page];
  $output = theme('table', $variables);
  $output .= theme('pager', array('quantity',count($arrayReturn)));
  return $output;
 
}
