<?php
/**
 * Database Configuration
 *
 * All of your system's database connection settings go in here. You can see a
 * list of the available settings in vendor/craftcms/cms/src/config/DbConfig.php.
 *
 * @see craft\config\DbConfig
 */


$environment = getenv('ENVIRONMENT');

if ($environment == 'heroku-dev') {
    $url = getenv('JAWSDB_URL');
    $dbparts = parse_url($url);

    return array(
        'server' => $dbparts['host'],
        'user' => $dbparts['user'],
        'password' => $dbparts['pass'],
        'database' => ltrim($dbparts['path'],'/'),
        'tablePrefix' => 'craft',
        'port' => $dbparts['port'],
    );
} else {
    return [
        'driver' => getenv('DB_DRIVER'),
        'server' => getenv('DB_SERVER'),
        'user' => getenv('DB_USER'),
        'password' => getenv('DB_PASSWORD'),
        'database' => getenv('DB_DATABASE'),
        'schema' => getenv('DB_SCHEMA'),
        'tablePrefix' => getenv('DB_TABLE_PREFIX'),
        'port' => getenv('DB_PORT')
    ];
}
