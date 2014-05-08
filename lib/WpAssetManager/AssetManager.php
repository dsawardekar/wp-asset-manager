<?php

namespace WpAssetManager;

class AssetManager {

  function __construct($container) {
    $container
      ->factory('script', 'WpAssetManager\Script')
      ->factory('stylesheet', 'WpAssetManager\Stylesheet')

      ->singleton('scriptLoader', 'WpAssetManager\ScriptLoader')
      ->singleton('stylesheetLoader', 'WpAssetManager\StylesheetLoader')

      ->singleton('adminScriptLoader', 'WpAssetManager\AdminScriptLoader')
      ->singleton('adminStylesheetLoader', 'WpAssetManager\AdminStylesheetLoader');
  }

}
