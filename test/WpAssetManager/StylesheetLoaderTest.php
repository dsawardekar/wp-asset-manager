<?php

namespace WpAssetManager;

use WpAssetManager\AssetLoader;
use Encase\Container;

class StylesheetLoaderTest extends \WP_UnitTestCase {

  public $container;
  public $loader;
  public $pluginMeta;

  function setUp() {
    parent::setUp();

    $this->pluginMeta       = new PluginMeta();
    $this->pluginMeta->file = getcwd() . '/stylesheet-loader-plugin.php';
    $this->pluginMeta->dir  = getcwd();
    $this->pluginMeta->slug = 'stylesheet-loader-plugin';
    $this->pluginMeta->stylesheetOptions = array(
      'media' => '0.1.0'
    );

    $this->container = new Container();
    $this->container->factory('stylesheet', 'WpAssetManager\\Stylesheet');
    $this->container->object('pluginMeta', $this->pluginMeta);
    $this->container->singleton('loader', 'WpAssetManager\\StylesheetLoader');

    $this->loader = $this->container->lookup('loader');
  }

  function test_it_has_stylesheet_asset_type() {
    $this->assertEquals('stylesheet', $this->loader->assetType());
  }

  function test_it_can_enqueue_stylesheets() {
    $this->loader->schedule('foo');
    $this->loader->load();

    do_action('wp_enqueue_scripts');

    $this->assertTrue(wp_style_is('foo', 'enqueued'));
  }

  function test_it_can_stream_stylesheets() {
    $this->loader->stream('foo');
    $this->assertTrue(wp_style_is('foo', 'enqueued'));
  }

  function test_it_can_load_and_stream_stylesheets_simultaneously() {
    $this->loader->stream('bar');
    $this->loader->schedule('foo');
    $this->loader->load();

    do_action('wp_enqueue_scripts');

    $this->assertTrue(wp_style_is('foo', 'enqueued'));
    $this->assertTrue(wp_style_is('bar', 'enqueued'));
  }
}
