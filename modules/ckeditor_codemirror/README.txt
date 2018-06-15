INTRODUCTION
------------

CKEditor CodeMirror module adds syntax highlighting for "Source View" in
CKEditor WYSIWYG editor using CodeMirror Plugin https://w8tcha.github.io/CKEdito
r-CodeMirror-Plugin.


INTEGRATION WITH CKEDITOR MODULE
--------------------------------

DEPENDENCIES
------------
- CKEditor module https://www.drupal.org/project/ckeditor
- Libraries API (2.x) module https://www.drupal.org/project/libraries
- CKEditor-CodeMirror-Plugin library https://github.com/w8tcha/CKEditor-CodeMir
  ror-Plugin

INSTALLATION
------------
1. Download and install CKEditor and Libraries API modules.
2. Download and install CKEditor CodeMirror module.
3. Download CKEditor-CodeMirror-Plugin library to the following directory
   "sites/all/libraries/ckeditor.codemirror". Path to "plugin.js" file should be
   "sites/all/libraries/ckeditor.codemirror/plugin.js".
   Note: Latest version of module will offer to do this for you automatically.
   Use "drush ckeditor-codemirror-download" (or "drush ccmd") command
   to download the library.

CONFIGURATION
-------------
1. Go to "Administration » Configuration » Content authoring"
   (admin/config/content/ckeditor) page and edit any CKEditor profile.
2. Under "Editor appearance" section scroll down to "Plugins" list, enable
   "CodeMirror (Source) Syntax Highlighting" plugin. Make sure that the current
   toolbar has the "Source" button. Save the profile.
3. Go to node create/edit page, choose the text format with CodeMirror plugin.
   Press the "Source" button.

FAQ
---

- How to change CodeMirror theme?
  1. Select the theme on https://codemirror.net/demo/theme.html page.
  2. Go to "Administration » Configuration » Content authoring"
     (admin/config/content/ckeditor) page and edit CKEditor profile with
     CodeMirror plugin.
  3. Add the following text in "Custom JavaScript configuration" textfield
     under the "Advanced options" section:

     config.codemirror_theme = 'ambiance';

     Replace "ambiance" to selected theme.


INTEGRATION WITH WYSIWYG MODULE
-------------------------------

DEPENDENCIES
------------
- Wysiwyg module https://www.drupal.org/project/wysiwyg
- CKEditor-CodeMirror-Plugin library https://github.com/w8tcha/CKEditor-CodeMir
  ror-Plugin

INSTALLATION
------------
1. Download and install Wysiwyg module.
2. Download and install CKEditor CodeMirror Wysiwyg module.
3. Download CKEditor-CodeMirror-Plugin library to the following directory
   "sites/all/libraries/ckeditor.codemirror". Path to "plugin.js" file should be
   "sites/all/libraries/ckeditor.codemirror/plugin.js".

CONFIGURATION
-------------
1. Enable CKEditor editor for at least one profile on "admin/config/content/
   wysiwyg" page.
2. Edit Wysiwyg profile and enable "CodeMirror: Source" button.
