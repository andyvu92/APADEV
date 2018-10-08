<?php

/*
* Implementation of hook_admin.
*/
function apa_sso_admin() {
  $form = [];
  global $base_url;

  $form['target'] = [
    '#type' => 'fieldset',
    '#title' => t('Target Endpoint'),
    '#weight' => 5,
    '#collapsible' => true,
    '#collapsed' => false,
  ];

  $form['target']['apa_sso_target_aud'] = [
    '#type'          => 'textfield',
    '#title'         => "Target / Authorization Server",
    '#default_value' => variable_get('apa_sso_target_aud', 'http://siteauthorizingthis.com'),
    '#size'          => 100,
    '#description'   => "Site URL authorizing the generated token the token. Remote server e.g. http://siteauthorizingthis.com",
  ];

  $form['target']['apa_sso_target_sso_url'] = [
    '#type'          => 'textfield',
    '#title'         => "SSO Path",
    '#default_value' => variable_get('apa_sso_target_sso_url', 'sso'),
    '#size'          => 100,
    '#description'   => "3rd Party SSO Path e.g. /sso. This is a relative path.",
  ];

  $form['target']['apa_sso_target_sso_arg'] = [
    '#type'          => 'textfield',
    '#title'         => "URL Token Argument",
    '#default_value' => variable_get('apa_sso_target_sso_arg', 'token'),
    '#size'          => 100,
    '#description'   => "Token parameter name  to be appender to 3rd Party url. Typically 'token'.",
  ];

  $form['target']['apa_sso_target_key_url'] = [
    '#type' => 'textfield',
    '#title' => "URL For Rotating Target URLs",
    '#default_value' => variable_get('apa_sso_target_key_url', 'token'),
    '#size' => 100,
    '#description' => "Preferred with HTTPS, Please enter full url path https://example.com/jwks.",
  ];

  return system_settings_form($form);
}