<?php
/**
 * Starter module for Craft CMS 3.x
 *
 * Utilities for Craft CMS 3 Starter Project
 *
 * @link      https://owl-design.net
 * @copyright Copyright (c) 2019 owldesign
 */

namespace modules\starter\controllers;

use modules\starter\Starter;

use Craft;
use craft\web\Controller;

/**
 * @author    owldesign
 * @package   Starter
 * @since     1.0.0
 *
 */
class StarterController extends Controller
{

    // Protected Properties
    // =========================================================================

    /**
     * @var    bool|array Allows anonymous access to this controller's actions.
     *         The actions must be in 'kebab-case'
     * @access protected
     */
    protected $allowAnonymous = true;

    // Public Methods
    // =========================================================================

    /**
     * Handle a request going to our module's index action URL,
     * e.g.: actions/starter/starter
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->renderTemplate('starter/index');
    }

    /**
     * Handle a request going to our module's actionDoSomething URL,
     * e.g.: actions/starter/starter/do-something
     *
     * @return mixed
     */
    public function actionDoSomething()
    {
        $result = 'Welcome to the DefaultController actionDoSomething() method';

        return $result;
    }
}
