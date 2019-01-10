<?php
/**
 * Starter module for Craft CMS 3.x
 *
 * Utilities for Craft CMS 3 Starter Project
 *
 * @link      https://owl-design.net
 * @copyright Copyright (c) 2019 owldesign
 */

namespace modules\starter\services;

use modules\starter\Starter;

use Craft;
use craft\base\Component;

/**
 * @author    owldesign
 * @package   Starter
 * @since     1.0.0
 *
 */
class StarterService extends Component
{
    // Public Methods
    // =========================================================================

    /**
     * This function can literally be anything you want, and you can have as many service
     * functions as you want
     *
     * From any other plugin/module file, call it like this:
     *
     *     StarterModule::$instance->starterModuleService->exampleService()
     *
     * @return mixed
     */
    public function exampleService()
    {
        $result = 'something';

        return $result;
    }
}
