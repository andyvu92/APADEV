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
    '#default_value' => isset( $_SESSION["type"]) ?  $_SESSION["type"]  : 'PD',
    '#title' => t('type')
  ); 
  $form['textfield_input']['submit1'] = array(
    '#type' => 'submit',
    '#value' => t('Search'),
    '#submit'=>array('log_submit'),
  );
  $form['textfield_input']['submit2'] = array(
    '#type' => 'submit',
    '#value' => t('Show All'),
    '#submit'=>array('log_all'),
  );
  if(isset( $_SESSION["type"] )) { $type =  $_SESSION["type"] ;} else {  $type = 'PD';}
  $variables = array();
  $header = array('ID', 'User ID', 'Type');
  $query = db_select('shopping_cart','s');
  $query ->fields('s', array('ID','userID','type'));
  if(!isset($_SESSION["GetAll"])) {$query->condition('type', $type); }
  $queryResult = $query->execute();
  while ($row = $queryResult->fetchAssoc()) {$arrayReturn[] = $row;  }  
  $per_page = 30;
  $current_page = pager_default_initialize(count($arrayReturn), $per_page);
  $chunks = array_chunk($arrayReturn, $per_page, TRUE);
  $form['table'] = array(
	  '#theme' => 'table',
	  '#header' => $header,
    '#rows' => $chunks[$current_page],
    '#empty' => t('Empty Rows')
    );	 
  $form['pager'] = array('#markup' => theme('pager'), '#quantity' => count($arrayReturn));
  return $form;

}


