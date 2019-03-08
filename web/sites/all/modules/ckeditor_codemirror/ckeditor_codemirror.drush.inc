<?php

/**
 * @file
 * Drush integration for CKEditor CodeMirror module.
 */

/**
 * The CKEditor CodeMirror plugin URI.
 */
define('CKEDITOR_CODEMIRROR_DEFAULT_DOWNLOAD_URL', 'https://github.com/w8tcha/CKEditor-CodeMirror-Plugin/releases/download/v1.13/CKEditor-CodeMirror-Plugin.zip');
define('CKEDITOR_CODEMIRROR_GITHUB_URL', 'https://api.github.com/repos/w8tcha/CKEditor-CodeMirror-Plugin/releases/latest');

/**
 * Implements hook_drush_command().
 */
function ckeditor_codemirror_drush_command() {
  $commands = array();

  $commands['ckeditor-codemirror-download'] = array(
    'aliases' => array(
      'ckeditor_codemirror-download',
      'ckeditor_codemirror_download',
      'ccmd',
    ),
    'bootstrap' => DRUSH_BOOTSTRAP_NONE,
    'description' => dt('Download CKEditor CoreMirror plugin.'),
    'arguments' => array(
      'path' => dt('Optional. A path where to install the CKEditor CodeMirror plugin. If omitted Drush will use the default location (sites/all/libraries).'),
    ),
    'examples' => array(
      'drush ckeditor-codemirror-download' => dt('Download CKEditor CoreMirror Plugin into libraries folder.'),
    ),
    'callback' => 'drush_ckeditor_codemirror_download',
  );

  return $commands;
}

/**
 * Implements hook_drush_help().
 */
function ckeditor_codemirror_drush_help($subject) {
  switch ($subject) {
    case 'drush:ckeditor-codemirror-download':
      return dt('Downloads the CKEditor CodeMirror plugin from https://github.com/w8tcha/CKEditor-CodeMirror-Plugin. Takes an optional path argument.');
  }
}

/**
 * Implements drush_MODULE_post_pm_enable().
 *
 * Auto-download plugin if module enabled via drush.
 */
function drush_ckeditor_codemirror_post_pm_enable() {
  $modules = func_get_args();
  if (in_array('ckeditor_codemirror', $modules)) {
    drush_ckeditor_codemirror_download();
  }
}

/**
 * Command to download CKEditor CoreMirror Plugin.
 */
function drush_ckeditor_codemirror_download() {
  $args = func_get_args();
  if (!empty($args[0])) {
    $path = $args[0];
  }
  else {
    $path = 'sites/all/libraries';
  }

  // Check whether the user wants to install the library.
  if (!drush_confirm(dt('Do you want to install CKEditor CoreMirror plugin in @path?', array('@path' => $path)))) {
    return drush_user_abort();
  }

  // Create the directory if it does not exist.
  if (!is_dir($path)) {
    if (!drush_mkdir($path)) {
      return FALSE;
    }
    drush_log(dt('Directory @path was created', array('@path' => $path)), 'notice');
  }

  // Set the directory to the download location.
  $old_dir = getcwd();
  chdir($path);

  // Directory name with CKEditor CoreMirror Plugin.
  $codemirror_dir_name = 'ckeditor.codemirror';
  // Path to CKEditor CoreMirror Plugin directory.
  $codemirror_path = $path . '/' . $codemirror_dir_name;

  $url = CKEDITOR_CODEMIRROR_DEFAULT_DOWNLOAD_URL;

  // Check the latest version.
  $response = drupal_http_request(CKEDITOR_CODEMIRROR_GITHUB_URL);
  if ($response->code == 200) {
    $response_data = drupal_json_decode($response->data);
    // Set new url.
    if (isset($response_data['assets'][0]['browser_download_url'])) {
      $url = $response_data['assets'][0]['browser_download_url'];
    }
  }

  // Download the zip archive.
  if ($file_patch = drush_download_file($url)) {
    // Remove any existing CKEditor CoreMirror plugin directory.
    if (is_dir($codemirror_dir_name)) {
      if (drush_confirm(dt('The folder "ckeditor.codemirror" in @path already exists. Do you want to delete and re-download it again?', array('@path' => $path)))) {
        drush_delete_dir($codemirror_dir_name, TRUE);
        drush_log(dt('A existing CKEditor CoreMirror plugin was deleted from @path.', array('@path' => $codemirror_path)), 'notice');
      }
      else {
        return drush_user_abort(dt('CKEditor CoreMirror plugin is already installed.'));
      }
    }

    $file_name = basename($file_patch);
    $temp_dir = drush_tempdir();
    // Extract downloaded file in temp directory.
    drush_tarball_extract($file_name, $temp_dir);

    // Change the directory name to "ckeditor.codemirror".
    drush_move_dir($temp_dir . '/codemirror', $codemirror_dir_name, TRUE);
  }

  if (is_file($codemirror_dir_name . '/plugin.js')) {
    drush_log(dt('CKEditor CoreMirror plugin has been installed in @path', array('@path' => $codemirror_path)), 'success');
  }
  else {
    drush_log(dt('Drush was unable to install the CKEditor CoreMirror plugin to @path', array('@path' => $codemirror_path)), 'error');
  }

  // Set working directory back to the previous working directory.
  chdir($old_dir);
}
