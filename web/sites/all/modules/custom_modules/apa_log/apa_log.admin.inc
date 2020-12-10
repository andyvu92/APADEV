<?php
/**
 * Create admin page to render drupal table view.
 * Display the log about member transaction
 */
function apa_log_admin_settings($form = array(), &$form_state= array()) {
  ini_set('memory_limit', '512M');
  //init form data
  // get the type drop down list
  $typelist = db_select('member_log','m')
          ->fields('m', array('Type'))
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
  // get the error drop down list
  $errorlist = db_select('member_log','m')
          ->fields('m', array('LogError'))
          ->execute()
          ->fetchAll();
  if(sizeof($errorlist)!=0){
          $errorlistReturn = json_decode(json_encode($errorlist), True);
  }
  $tempErrorArray = array();
  foreach ($errorlistReturn as $singleError) {
    foreach ($singleError as $pair => $errorValue)
      if(!in_array($errorValue,$tempErrorArray)) {
        $tempErrorArray[$errorValue] = $errorValue;
    }
  }
   $defaultError = 1;
   $tempErrorArray["ALL"] = "ALL";
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
    '#options' => $tempErrorArray,
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
  $form['textfield_input']['submit3'] = array(
    '#type' => 'submit',
    '#value' => t('Clear Search'),
    '#submit'=>array('clear_all'),
  );
  $form['textfield_input']['submit2'] = array(
    '#type' => 'submit',
    '#value' => t('Show All'),
    '#submit'=>array('log_all'),
  );
  $form['textfield_input']['submit4'] = array(
    '#type' => 'submit',
    '#value' => t('Export'),
    '#submit'=>array('export_all'),
  );

   // filter automatically
  if(isset( $_SESSION['filterconditions']["type"] )) { $type =  $_SESSION['filterconditions']["type"] ;} else {  $type = $defaultType;}
  $variables = array();
  $header = array('User ID', 'Order ID', 'Message', 'DateTime', 'Type', 'Error','Date');
  $query = db_select('member_log','m');
  $query ->fields('m', array('UserID','OrderID', 'JsonMessage', 'TimeStamp', 'Type', 'LogError','CreateDate'));
  // handle display all data
  if(isset($_SESSION['filterconditions']["email"])) {$query->condition('UserID', $_SESSION['filterconditions']["email"]); }
  if(!isset($_SESSION["GetAll"])) {$query->condition('Type', $type); }
  if(isset($_SESSION['filterconditions']["beginDate"]) && isset($_SESSION['filterconditions']["endDate"])) {
    //$bTime = strtotime(date('Y-m-d H:i:s',strtotime($_SESSION['filterconditions']["beginDate"])));
    //$eTime = strtotime(date('Y-m-d H:i:s', strtotime("+1 day",strtotime($_SESSION['filterconditions']["endDate"]))));
    //$query->condition('TimeStamp', array($bTime, $eTime), 'BETWEEN'); }
    $query->condition('CreateDate', array($_SESSION['filterconditions']["beginDate"], $_SESSION['filterconditions']["endDate"]), 'BETWEEN'); }
  else{
    $query->condition('CreateDate', array($date, $date), 'BETWEEN');
  }
  if(!isset($_SESSION["AllError"])) {if(isset($_SESSION['filterconditions']["error"])) {$query->condition('LogError', $_SESSION['filterconditions']["error"]); }}
  $query->orderBy('CreateDate', 'DESC');
  $query->orderBy('TimeStamp', 'DESC');
  $queryResult = $query->execute();
  $arrayReturn = array();
  while ($row = $queryResult->fetchAssoc()) {$arrayReturn[] = $row;  }
    // handle pagenation
    $arrayResult = array();
  if(sizeof($arrayReturn)!= 0){
      foreach($arrayReturn as $singleArr){
        $tempResult = array();
        $tempResult['UserID'] = $singleArr['UserID'];
        $tempResult['OrderID'] = $singleArr['OrderID'];
        $tempResult['JsonMessage'] = $singleArr['JsonMessage'];
        $tempResult['TimeStamp'] = date('Y-m-d H:i:s',$singleArr['TimeStamp']);
        $tempResult['Type'] = $singleArr['Type'];
        $tempResult['LogError'] = $singleArr['LogError'];
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


