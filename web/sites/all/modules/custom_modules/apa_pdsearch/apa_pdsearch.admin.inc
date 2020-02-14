<?php
/**
 * Create admin page to render drupal table view.
 * Display the log about member transaction
 */
function apa_pd_admin_settings($form = array(), &$form_state= array()) {
  $form = array();
  $form['textfield_input'] = array(
    '#type' => 'fieldset',
    '#title' => t('PD configuration')
  );
  return $form;

}
/**
 * Create admin page to render drupal table view.
 * Display the PD search criteria history
 */
function apa_pdsearch_admin_settings($form = array(), &$form_state= array()) {
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
  
  $form['textfield_input']['submit1'] = array(
    '#type' => 'submit',
    '#value' => t('Search'),
    '#submit'=>array('pdsearch_submit'),
  );
  $form['textfield_input']['submit3'] = array(
    '#type' => 'submit',
    '#value' => t('Clear Search'),
    '#submit'=>array('clear_allsearch'),
  );
  $form['textfield_input']['submit2'] = array(
    '#type' => 'submit',
    '#value' => t('Export'),
    '#submit'=>array('export_pd'),
  );
  
   // filter automatically
  $variables = array();
  $header = array('UserID', 'UserEmail', 'UserState', 'UserSuburb', 'UserNG', 'keyWord', 'Type','NG','State','Suburb', 'CreateDate');
  $query = db_select('pd_search','m');
  $query ->fields('m', array('UserID','UserEmail', 'UserState', 'UserSuburb', 'UserNG', 'keyWord','Type','NG','State','Suburb', 'CreateDate'));
  if(isset($_SESSION['filterconditions']["beginDate"]) && isset($_SESSION['filterconditions']["endDate"])) { 
    $query->condition('CreateDate', array($_SESSION['filterconditions']["beginDate"], $_SESSION['filterconditions']["endDate"]), 'BETWEEN'); }
  $query->orderBy('CreateDate', 'DESC');
  $queryResult = $query->execute();
  $arrayReturn = array();
  while ($row = $queryResult->fetchAssoc()) {$arrayReturn[] = $row;  }  
    // handle pagenation
    $arrayResult = array();
  if(sizeof($arrayReturn)!= 0){
      foreach($arrayReturn as $singleArr){
        $tempResult = array();
        $tempResult['UserID'] = $singleArr['UserID'];
        $tempResult['UserEmail'] = $singleArr['UserEmail'];
        $tempResult['UserState'] = $singleArr['UserState'];
        $tempResult['UserSuburb'] = $singleArr['UserSuburb'];
        $tempResult['UserNG'] = $singleArr['UserNG'];
        $tempResult['keyWord'] = $singleArr['keyWord'];
        $tempResult['Type'] = $singleArr['Type'];
        $tempResult['NG'] = $singleArr['NG'];
        $tempResult['State'] = $singleArr['State'];
        $tempResult['Suburb'] = $singleArr['Suburb'];
        $tempResult['CreateDate'] = $singleArr['CreateDate'];
        array_push($arrayResult, $tempResult);
      }
      $per_page = 30;
      $current_page = pager_default_initialize(count($arrayResult), $per_page);
      $chunks = array_chunk($arrayResult, $per_page, TRUE);
      $form['table'] = array(
        '#theme' => 'table',
        '#header' => $header,
        '#rows' => $chunks[$current_page],
        '#empty' => t('Empty Rows')
        );	 
      $form['pager'] = array('#markup' => theme('pager'), '#quantity' => count($arrayResult));
  }
  else{
    $form['textfield_input_1'] = array(
      '#type' => 'fieldset',
      '#title' => t('There is no result')
    );
  }
  return $form;

}


