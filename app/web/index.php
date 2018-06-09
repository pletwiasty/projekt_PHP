<?php
/**
 * Put comment here...
 */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);

require_once dirname(dirname(__FILE__)).'/vendor/autoload.php';

use Silex\Application;

$app = new Application();
$app['debug'] = true;

$app->get(
    '/hello/{name}',
    function ($name) use ($app) {
        return 'Hello '.$app->escape($name);
    }
);
// conifiguration and code goes here...

$app->run();
