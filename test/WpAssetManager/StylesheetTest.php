<?php

namespace WpAssetManager;

use Encase\Container;

class StylesheetText extends \WP_UnitTestCase {

  public $container;
  public $stylesheet;
  public $pluginMeta;

  function setUp() {
    parent::setUp();

    $this->pluginMeta       = new PluginMeta();
    $this->pluginMeta->file = getcwd() . '/stylesheet-plugin.php';
    $this->pluginMeta->dir  = getcwd();
    $this->pluginMeta->slug = 'stylesheet_plugin';
    $this->pluginMeta->scriptOptions = array(
      'media' => 'screen'
    );

    $this->container = new Container();
    $this->container->singleton('stylesheet', 'WpAssetManager\\Stylesheet');
    $this->container->object('pluginMeta', $this->pluginMeta);

    $this->stylesheet = $this->container->lookup('stylesheet');
  }

  function test_it_has_css_dirname() {
    $actual = $this->stylesheet->dirname();
    $this->assertEquals('css', $actual);
  }

  function test_it_has_css_extension() {
    $actual = $this->stylesheet->extension();
    $this->assertEquals('.css', $actual);
  }

  function test_it_can_register_style() {
    $this->stylesheet->slug = 'foo';
    $this->stylesheet->register();
    $this->assertTrue(wp_style_is('foo', 'registered'));
  }

  function test_it_can_enqueue_style() {
    $this->stylesheet->slug = 'foo';
    $this->stylesheet->register();
    $this->stylesheet->enqueue();

    $this->assertTrue(wp_style_is('foo', 'enqueued'));
  }
}
