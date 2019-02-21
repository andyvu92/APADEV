<?php
/**
 * Create admin page to render drupal table view.
 * Display the log about member transaction
 */
function apa_log_admin_settings($form = array(), &$form_state= array()) {
  //init form data
  // get the type drop down list
  $typelist = db_select('shopping_cart','s')
          ->fields('s', array('type'))
          ->execute()
          ->fetchAll();
  if(sizeof($typelist)!=0){
          $typelistReturn = json_decode(json_encode($typelist), True);
  }
  $tempArray = array();
  foreach ($typelistReturn as $singleType) {
    foreach ($singleType as $key => $value)
      if(!in_array($value,$tempArray)) {
        $tempArray[$value] = $value;
    }
  }
  $tempArray["ALL"] = "ALL";
  $defaultType = "ALL";
  $defaultError = "N";
  // generate form
  $form = array();
  $form['textfield_input'] = array(
    '#type' => 'fieldset',
    '#title' => t('Please search')
  );
  $format = 'Y-m-d';
  $date = date('Y-m-d');
  $form['textfield_input']['beginDate'] = array(
    '#type' => 'date_popup',
    '#prefix' => '<div class=""><div class="">',
    "#suffix" =>'</div>',
    '#date_format' => $format,
    '#default_value' => isset( $_SESSION['filterconditions']["beginDate"]) ?  $_SESSION['filterconditions']["beginDate"]  : $date, 
    '#title' => t('Begin Date')
  );

  $form['textfield_input']['endDate'] = array(
    '#type' => 'date_popup',
    '#prefix' => '<div class="">',
    "#suffix" =>'</div></div>',
    '#date_format' => $format,
    '#default_value' => isset( $_SESSION['filterconditions']["endDate"]) ?  $_SESSION['filterconditions']["endDate"]  : $date, 
    '#title' => t('End Date')
  );
  $form['textfield_input']['email'] = array(
    '#type' => 'textfield',
    '#default_value' => isset( $_SESSION['filterconditions']["email"]) ?  $_SESSION['filterconditions']["email"]  : '',
    '#title' => t('User Email')
  ); 
  $form['textfield_input']['error'] = array(
    '#type' => 'select',
    '#options' => $tempArray,
    '#default_value' => isset( $_SESSION['filterconditions']["error"]) ?  $_SESSION['filterconditions']["error"]  : $defaultError,
    '#title' => t('Is Error')
  ); 
  $form['textfield_input']['type'] = array(
    '#type' => 'select',
    '#options' => $tempArray,
    '#default_value' => isset( $_SESSION['filterconditions']["type"]) ?  $_SESSION['filterconditions']["type"]  : $defaultType,
    '#title' => t('Type')
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
   // filter automatically
  if(isset( $_SESSION["type"] )) { $type =  $_SESSION['filterconditions']["type"] ;} else {  $type = $defaultType;}
  $variables = array();
  $header = array('ID', 'User ID', 'Type');
  $query = db_select('shopping_cart','s');
  $query ->fields('s', array('ID','userID','type'));
  // handle display all data
  if(!isset($_SESSION["GetAll"])) {$query->condition('type', $type); }
  $queryResult = $query->execute();
  while ($row = $queryResult->fetchAssoc()) {$arrayReturn[] = $row;  }  
  // handle pagenation
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


