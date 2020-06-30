<?php

/**
 * @file
 * MBA Global Config form.
 */

define('SSO_DOMAIN', '');
define('SSO_URL', '');
define('CLIENT_ID', '');
define('CLIENT_SECRET', '');
define('CLIENT_GROUP', '');

/**
 * Admin settings form.
 */
function mba_sso_admin_settings() {
  $form = array();

  $form['mba_sso_configurations'] = array(
    '#type' => 'fieldset',
    '#title' => t('MBA SSO Configurations'),
  );
  $form['mba_sso_configurations']['mba_sso_domain'] = array(
    '#type' => 'textfield',
    '#title' => t('SSO Domain'),
    '#default_value' => variable_get('mba_sso_domain', SSO_DOMAIN),
  );
  $form['mba_sso_configurations']['mba_sso_url'] = array(
    '#type' => 'textfield',
    '#title' => t('SSO URL'),
    '#default_value' => variable_get('mba_sso_url', SSO_URL),
  );
  $form['mba_sso_configurations']['client_id'] = array(
    '#type' => 'textfield',
    '#title' => t('SSO Client ID'),
    '#default_value' => variable_get('client_id', CLIENT_ID),

  );

  $form['mba_sso_configurations']['client_secret'] = array(
    '#type' => 'textfield',
    '#title' => t('SSO Client Secret'),
    '#default_value' => variable_get('client_secret', CLIENT_SECRET),
  );

  $form['mba_sso_configurations']['client_group'] = array(
    '#type' => 'textfield',
    '#title' => t('SSO Client Group'),
    '#default_value' => variable_get('client_group', CLIENT_GROUP),
  );

   return system_settings_form($form);
}
