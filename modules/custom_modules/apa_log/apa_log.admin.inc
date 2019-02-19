<?php
/**
 * Create admin page to render drupal table view.
 * Display the log about member transaction
 */
function apa_log_admin_settings($form = array(), &$form_state= array()) {
  $form = array();
  $form['textfield_input'] = array(
    '#type' => 'fieldset',
    '#title' => t('Please search')
  );
  $form['textfield_input']['type'] = array(
    '#type' => 'textfield',
    '#default_value' => isset( $_GET['type']) ?  $_GET['type']  : 'PD',
    '#title' => t('type')
  ); 
  $form['textfield_input']['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Search'),
    '#submit'=>['log_submit']
  );
  if(isset( $_GET['type'] )) { $type =  $_GET['type'] ;} else {  $type = 'PD';}
  $variables = array();
  $header = array('ID', 'User ID', 'Type');
  $query = db_select('shopping_cart','s')
          ->fields('s', array('ID','userID','type'))
          ->condition('type', $type)
					->execute()
          ->fetchAll();
  if(sizeof($query)!=0){
    $arrayReturn = json_decode(json_encode($query), True);
  }
  $per_page = 10;
  $current_page = pager_default_initialize(count($arrayReturn), $per_page);
  $chunks = array_chunk($arrayReturn, $per_page, TRUE);
  $form['table'] = array(
	  '#theme' => 'table',
	  '#header' => $header,
    '#rows' => $chunks[$current_page],
    '#empty' => t('Empty Rows')
    );	 
  $form['pager'] = array('#markup' => theme('pager'), '#quantity' => count($arrayReturn));
  $form['#method'] = 'get';
  return $form;
}


