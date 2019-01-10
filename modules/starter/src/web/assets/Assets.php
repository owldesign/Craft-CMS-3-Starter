<?php
/**
 * Starter module for Craft CMS 3.x
 *
 * Utilities for Craft CMS 3 Starter Project
 *
 * @link      https://owl-design.net
 * @copyright Copyright (c) 2019 owldesign
 */

namespace modules\starter\web\assets;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * @author    owldesign
 * @package   Starter
 * @since     1.0.0
 *
 */
class Assets extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * Initializes the bundle.
     */
    public function init()
    {
        // define the path that your publishable resources live
        $this->sourcePath = "@modules/starter/web/assets";

        // define the dependencies
        $this->depends = [
            CpAsset::class,
        ];

        // define the relative path to CSS/JS files that should be registered with the page
        // when this asset bundle is registered
        $this->js = [
            'js/starter.js',
        ];

        $this->css = [
            'css/starter.css',
        ];

        parent::init();
    }
}
