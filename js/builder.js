// Sandbox this process.
(function(window, $, WPMjbConfig, MjbApp, MjbAppConfig, undefined) {
  // Run only after document is ready.
  $(window.document).ready(function() {
    // App Builder Configuration.
    var config = new MjbAppConfig();

    // API Key for WordPress Plugin.
    config.key = WPMjbConfig.key;

    // WYSIWYG editor's engine URL.
    config.editorURI = WPMjbConfig.base + "/js/wysiwyg/engine.min.js";

    // Name of theme to use, default is "flick".
    config.themeUIName = WPMjbConfig.theme;

    // Path to CSS file loaded last and contains overrides.
    config.cssOverridesURI = WPMjbConfig.base + "/css/overrides.css";

    // Embed App Builder.
    (new MjbApp("MjbAppID", config)).launch();

    // Garbage collection.
    config = undefined;
  });
})(window, jQuery, WPMjbConfig, MjbApp, MjbAppConfig);
