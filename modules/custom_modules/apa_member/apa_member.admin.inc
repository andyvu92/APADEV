<?php

/**
 * @file
 * Aptify Global Config form.
 */

define('MEMBER_EXPIRE_MONTH_DEFAULT', '1');

/**
 * Admin settings form.
 */
function apa_member_admin_settings() {
  $form = array();

  $form['member_criterial_configurations'] = array(
    '#type' => 'fieldset',
    '#title' => t('Member Criterial Configurations'),
  );

  $form['member_criterial_configurations']['member_expire_month_setting'] = array(
    '#type' => 'textfield',
    '#title' => t('Member Expire Month Setting'),
    '#default_value' => variable_get('member_expire_month_setting', MEMBER_EXPIRE_MONTH_DEFAULT),
  );

   return system_settings_form($form);
}
