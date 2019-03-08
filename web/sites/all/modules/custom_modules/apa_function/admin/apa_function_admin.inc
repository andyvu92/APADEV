<?php

/*
* Implementation of hook_admin.
*/
function apa_function_admin() {
    $form = [];
    global $base_url;


    // Fieldset for OrderUp Endpoint
    $form['saml_settings'] = [
        '#type' => 'fieldset',
        '#title' => t('SAML Settings'),
        '#weight' => 5,
        '#collapsible' => true,
        '#collapsed' => false,
    ];

    $form['saml_settings']['apa_sso_idp'] = [
        '#type'          => 'textfield',
        '#title'         => "IDP/Auth Server",
        '#default_value' => variable_get('apa_sso_idp', 'https://idp.apa.org.au/'),
        '#size'          => 100,
        '#description'   => "Site URL authorizing the generated token the token. Remote server e.g. http://idp.com",
    ];

    // You can add as many "Persistence Settings you want".
    // Refer to Drupal Form API for further fields.
    // https://api.drupal.org/api/drupal/developer%21topics%21forms_api_reference.html/7.x



    return system_settings_form($form);
}