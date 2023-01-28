<?php

namespace clarknelson\craftnewuseradminnotification\web\assets\assetbundle;

use Craft;
use craft\web\AssetBundle;

/**
 * Asset Bundle asset bundle
 */
class AssetBundleAsset extends AssetBundle
{
    public $sourcePath = __DIR__ . '/dist';
    public $depends = [];
    public $js = [];
    public $css = [];
}
