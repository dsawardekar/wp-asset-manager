<?php

namespace WpAssetManager;

class PluginMeta {

  public $file;
  public $slug;
  public $dir;

  function getFile() {
    return $this->file;
  }

  function getSlug() {
    return $this->slug;
  }

  function getDir() {
    return $this->dir;
  }

}
