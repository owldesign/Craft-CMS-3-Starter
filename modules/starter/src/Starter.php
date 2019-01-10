<?php
/**
 * Starter module for Craft CMS 3.x
 *
 * Utilities for Craft CMS 3 Starter Project
 *
 * @link      https://owl-design.net
 * @copyright Copyright (c) 2019 owldesign
 */

namespace modules\starter;

use modules\starter\variables\Variables;
use modules\starter\module\Routes;
use modules\starter\module\Services;
use modules\starter\web\assets\Assets;

use Craft;
use craft\events\RegisterTemplateRootsEvent;
use craft\events\TemplateEvent;
use craft\i18n\PhpMessageSource;
use craft\web\View;
use craft\web\UrlManager;
use craft\web\twig\variables\CraftVariable;
use craft\events\RegisterUrlRulesEvent;
use craft\events\RegisterCpNavItemsEvent;
use craft\web\twig\variables\Cp;

use yii\base\Event;
use yii\base\InvalidConfigException;
use yii\base\Module;

/**
 * @author    owldesign
 * @package   Starter
 * @since     1.0.0
 *
 */
class Starter extends Module
{
    // Static Properties
    // =========================================================================

    public static $instance;

    // Trails
    // =========================================================================

    use Services;
    use Routes;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function __construct($id, $parent = null, array $config = [])
    {
        Craft::setAlias('@modules/starter', $this->getBasePath());
        $this->controllerNamespace = 'modules\starter\controllers';

        // Translation category
        $i18n = Craft::$app->getI18n();
        /** @noinspection UnSafeIsSetOverArrayInspection */
        if (!isset($i18n->translations[$id]) && !isset($i18n->translations[$id . '*'])) {
            $i18n->translations[$id] = [
                'class' => PhpMessageSource::class,
                'sourceLanguage' => 'en-US',
                'basePath' => '@modules/starter/translations',
                'forceTranslation' => true,
                'allowOverrides' => true,
            ];
        }

        // Base template directory
        Event::on(View::class, View::EVENT_REGISTER_CP_TEMPLATE_ROOTS, function (RegisterTemplateRootsEvent $e) {
            if (is_dir($baseDir = $this->getBasePath() . DIRECTORY_SEPARATOR . 'templates')) {
                $e->roots[$this->id] = $baseDir;
            }
        });

        // Set this as the global instance of this module class
        static::setInstance($this);

        parent::__construct($id, $parent, $config);
    }

    /**
     * Init
     */
    public function init()
    {
        parent::init();
        self::$instance = $this;
        $this->_registerCpRoutes();
        $this->_registerCpNavigation();
        // $this->_registerSiteRoutes();
        $this->_registerVariables();
        $this->_registerAssets();
    }

    /**
     * @param $message
     * @param array $params
     * @return string
     */
    public static function t($message, array $params = [])
    {
        return Craft::t('starter', $message, $params);
    }

    /**
     * @param $message
     * @param string $type
     */
    public static function log($message, $type = 'info')
    {
        Craft::$type(self::t($message), __METHOD__);
    }

    /**
     * @param $message
     */
    public static function info($message)
    {
        Craft::info(self::t($message), __METHOD__);
    }

    /**
     * @param $message
     */
    public static function error($message)
    {
        Craft::error(self::t($message), __METHOD__);
    }

    public function getSettingsResponse()
    {
        $url = UrlHelper::cpUrl('form-builder/settings');

        return Craft::$app->controller->redirect($url);
    }

    // Protected Methods
    // =========================================================================


    // Private Methods
    // =========================================================================

    private function _registerVariables()
    {
        // Register our variables
        Event::on(
            CraftVariable::class,
            CraftVariable::EVENT_INIT,
            function (Event $event) {
                /** @var CraftVariable $variable */
                $variable = $event->sender;
                $variable->set('starter', Variables::class);
            }
        );
    }

    private function _registerCpNavigation()
    {
        Event::on(
            Cp::class,
            Cp::EVENT_REGISTER_CP_NAV_ITEMS,
            function(RegisterCpNavItemsEvent $event) {
                $event->navItems[] = [
                    'url' => 'starter',
                    'label' => 'Starter',
                    'icon' => '@modules/starter/icon.svg',
                    'subnav' => [
                        'dashboard' => ['label' => Starter::t('Dashboard'), 'url' => 'starter'],
                        'theming' => ['label' => Starter::t('Theming'), 'url' => 'starter/theming'],
                    ]
                ];
            }
        );

        // Starter Navigation
    }

    private function _registerSiteRoutes()
    {
        // Register our site routes
        Event::on(
            UrlManager::class,
            UrlManager::EVENT_REGISTER_SITE_URL_RULES,
            function (RegisterUrlRulesEvent $event) {
                $event->rules['starter-module'] = 'modules/starter/default';
            }
        );
    }

    private function _registerAssets()
    {
        // Load our AssetBundle
        if (Craft::$app->getRequest()->getIsCpRequest()) {
            Event::on(
                View::class,
                View::EVENT_BEFORE_RENDER_TEMPLATE,
                function (TemplateEvent $event) {
                    try {
                        Craft::$app->getView()->registerAssetBundle(Assets::class);
                    } catch (InvalidConfigException $e) {
                        Craft::error(
                            'Error registering AssetBundle - ' . $e->getMessage(),
                            __METHOD__
                        );
                    }
                }
            );
        }
    }
}
