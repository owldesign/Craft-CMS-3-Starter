<?php
/**
 * Starter module for Craft CMS 3.x
 *
 * Utilities for Craft CMS 3 Starter Project
 *
 * @link      https://owl-design.net
 * @copyright Copyright (c) 2019 owldesign
 */

namespace modules\starter\variables;

use modules\startermodule\StarterModule;

use Craft;

/**
 * @author    owldesign
 * @package   Starter
 * @since     1.0.0
 *
 */
class Variables
{
    // Public Methods
    // =========================================================================

    /**
     * Whatever you want to output to a Twig template can go into a Variable method.
     * You can have as many variable functions as you want.  From any Twig template,
     * call it like this:
     *
     *     {{ craft.starterModule.exampleVariable }}
     *
     * Or, if your variable requires parameters from Twig:
     *
     *     {{ craft.starterModule.exampleVariable(twigValue) }}
     *
     * @param null $optional
     * @return string
     */
    public function exampleVariable($optional = null)
    {
        $result = "And away we go to the Twig template...";
        if ($optional) {
            $result = "I'm feeling optional today...";
        }
        return $result;
    }
}
