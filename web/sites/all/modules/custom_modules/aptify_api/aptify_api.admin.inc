<?php

/**
 * @file
 * Aptify Global Config form.
 */

define('APTIFY_API_BASE_URL_DEFAULT', 'https://aptifyweb.australian.physio/AptifyServicesAPI/services');
define('APTIFY_API_OOPS_DEFAULT', 'Communication error, Please contact site administrator');
define('APTIFY_API_INVALID_TOKEN_DEFAULT', 'Invalid Token Please contact administrator.');
define('APTIFY_SERVER_MAINTENANCE',0);
define('APTIFY_SERVER_MAINTENANCE_OOPS','We are currently experiencing an issue that may prevent members from logging into the APA website and accessing member-only content, including PD. We are working to resolve this issue as soon as possible. Thank you for your patience.');
/**
 * Admin settings form.
 */
function aptify_api_admin_settings() {
  $form = array();

  $form['aptify_api'] = array(
    '#type' => 'fieldset',
    '#title' => t('API Details'),
  );

  $form['aptify_api']['aptify_api_base_url'] = array(
    '#type' => 'textfield',
    '#title' => t('Base URL for Aptify API service'),
    '#default_value' => variable_get('aptify_api_base_url', APTIFY_API_BASE_URL_DEFAULT),
  );

  $form['aptify_api']['aptify_api_oops'] = array(
    '#type' => 'textfield',
    '#title' => t('General Error message for failure with the API'),
    '#default_value' => variable_get('aptify_api_oops', APTIFY_API_OOPS_DEFAULT),
  );

  $form['aptify_api']['aptify_api_invalid_token'] = array(
    '#type' => 'textfield',
    '#title' => t('Invalid token error message for failure from the API'),
    '#default_value' => variable_get('aptify_api_invalid_token', APTIFY_API_INVALID_TOKEN_DEFAULT),
  );

  $form['aptify_api']['aptify_api_debug'] = array(
    '#type' => 'checkbox',
    '#title' => t('Debug mode'),
    '#default_value' => variable_get('aptify_api_debug', 0),
  );
  $form['aptify_api']['aptify_server_maintenance'] = array(
    '#type' => 'checkbox',
    '#title' => t('Aptify Server Maintenance'),
    '#default_value' => variable_get('aptify_server_maintenance', APTIFY_SERVER_MAINTENANCE),
  );
  $form['aptify_api']['aptify_server_maitenance_oops'] = array(
    '#type' => 'textarea',
    '#title' => t('Pop up message for Aptify server maintenance mode'),
    '#default_value' => variable_get('aptify_server_maitenance_oops', APTIFY_SERVER_MAINTENANCE_OOPS),
  );
  return system_settings_form($form);
}
