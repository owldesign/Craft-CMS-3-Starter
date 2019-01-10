<?php
/**
 * General Configuration
 *
 * All of your system's general configuration settings go in here. You can see a
 * list of the available settings in vendor/craftcms/cms/src/config/GeneralConfig.php.
 *
 * @see craft\config\GeneralConfig
 */

return [
    '*' => [
        'defaultWeekStartDay' => 0,
        'enableCsrfProtection' => true,
        'omitScriptNameInUrls' => true,
        'cpTrigger' => getenv('CP_TRIGGER') ?: 'admin',
        'securityKey' => getenv('SECURITY_KEY'),
        'useProjectConfigFile' => true
    ],
    'dev' => [
        'devMode' => true,
    ],
    'staging' => [
        'siteUrl' => null,
    ],
    'production' => [
        'siteUrl' => null,
        // Disable project config changes on production
        'allowAdminChanges' => false,
    ],
];
