## WP Asset Manager [![Build Status](https://travis-ci.org/dsawardekar/wp-asset-manager.svg?branch=develop)](https://travis-ci.org/dsawardekar/wp-asset-manager) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/dsawardekar/wp-asset-manager/badges/quality-score.png?s=7c4b42b84f0372074de7b7e03afe16d2f76ab6d9)](https://scrutinizer-ci.com/g/dsawardekar/wp-asset-manager/)

An Object Oriented Approach to Asset Management in WordPress.

# Usage

```php
$container->factory('script', 'WpAssetManager\Script');
$container->factory('scriptLoader', 'WpAssetManager\ScriptLoader');

$scriptLoader = $container->lookup('scriptLoader');
$scriptLoader->schedule('my-script-slug');
$scriptLoader->load();
```
