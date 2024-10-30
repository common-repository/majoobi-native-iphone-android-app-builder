<?php
/*
Plugin Name: Majoobi Native iPhone / iPad / Android App Builder
Plugin URI: http://www.majoobi.com/wordpress
Description: Create your own astonishing, feature-rich *native* mobile app that works seamlessly with iPhone, iPad and Android devices!
Version: 1.0.0
Author: Majoobi AS
Author URI: http://www.majoobi.com
License: GPL2
*/

// Name of plugin's folder under 'wp-content/plugins'
define('MJBAPP_PLUGIN_FOLDER', 'majoobi-native-iphone-android-app-builder');

// URL to plugin's folder.
define('MJBAPP_PLUGIN_URL', plugins_url(MJBAPP_PLUGIN_FOLDER));

// Add plugin to administration menu.
add_action( 'admin_menu', 'mjb_builder_plugin_menu' );

function mjb_builder_plugin_menu() {
  // Define admin menu items
  $pages = array(
    'mjb_majoobi_apps' => array(
      'Create an App',
      'Create an App',
      'mjb_plugin_options'
    )
  );

  // Add administration menu items.
  add_menu_page(
    'Create an App',
    'Create an App',
    'manage_options',
    'mjb_my_mobile_app',
    'mjb_plugin_options',
    MJBAPP_PLUGIN_URL . '/icons/menu-icon.png'
  );

  // Queue plugin's styles.
  wp_enqueue_style(MJBAPP_PLUGIN_FOLDER . '-style', MJBAPP_PLUGIN_URL . '/css/style.css');

  // For IE users, App Builder suggests to install Chrome Frame plugin.
  // This HTTP header will activate GCF once it's installed on client's computer.
  header('X-UA-Compatible: chrome=1');
}

function mjb_plugin_options() {
  if (!current_user_can('manage_options')) {
    wp_die(__('You do not have sufficient permissions to access this page.'));
  }

?>
<div id="MjbAppID-wrap" class="wrap">
  <div id="MjbAppID">
    <span class="loader">
      <h4>Majoobi App Builder</h4>
      <h5>for WordPress is loading</h5>
      <h5 class="wait">Please wait&#8230;</h5>
    </span>
  </div>
</div>
<script type="text/javascript" language="javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script type="text/javascript" language="javascript" src="http://builder.majoobi.com/engine.js"></script>
<script type="text/javascript" language="javascript">var WPMjbConfig = {base: '<?php echo MJBAPP_PLUGIN_URL; ?>', key: 'be8f5f1a14990b2c70c69c14186ea0f4', theme: 'flick'};</script>
<script type="text/javascript" language="javascript" src="<?php echo MJBAPP_PLUGIN_URL . '/js/builder.js'; ?>"></script>
<?php
}
