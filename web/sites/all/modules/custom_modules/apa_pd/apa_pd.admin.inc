<?php
/**
 * Create admin page to render drupal table view.
 * Display the non member register the PD course 
 */
function apa_pd_admin_settings($form = array(), &$form_state= array()) {
  ini_set('memory_limit', '512M');
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
  
   $form['textfield_input']['submit1'] = array(
    '#type' => 'submit',
    '#value' => t('Search'),
    '#submit'=>array('pd_submit'),
  );
  $form['textfield_input']['submit2'] = array(
    '#type' => 'submit',
    '#value' => t('Export'),
    '#submit'=>array('export_pd'),
  );
 
   // filter automatically
  $variables = array();
  $header = array('User ID', 'Email Address', 'Job', 'Date');
  $query = db_select('pdsurvey','pd');
  $query ->fields('pd', array('UserID','EmailAddress', 'Job', 'CreateDate'));
  // handle display all data
  $query->condition('Job', "Physiotherapist");
  if(isset($_SESSION['filterconditions']["beginDate"]) && isset($_SESSION['filterconditions']["endDate"])) { 
  $query->condition('CreateDate', array($_SESSION['filterconditions']["beginDate"], $_SESSION['filterconditions']["endDate"]), 'BETWEEN'); }
  $query->orderBy('CreateDate', 'DESC');
  $query->distinct('UserID');
  $queryResult = $query->execute();
  $arrayReturn = array();
  while ($row = $queryResult->fetchAssoc()) {$arrayReturn[] = $row;  }  
    // handle pagenation
    $arrayResult = array();
  if(sizeof($arrayReturn)!= 0){
      foreach($arrayReturn as $singleArr){
        $tempResult = array();
        $tempResult['UserID'] = $singleArr['UserID'];
        $tempResult['EmailAddress'] = $singleArr['EmailAddress'];
        $tempResult['Job'] = $singleArr['Job'];
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


