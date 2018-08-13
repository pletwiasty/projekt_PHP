<?php
umask(0002);

ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);

require_once dirname(dirname(__FILE__)).'/vendor/autoload.php';

$app = require_once dirname(dirname(__FILE__)).'/src/app.php';
require_once dirname(dirname(__FILE__)).'/src/controllers.php';

require_once dirname(dirname(__FILE__)).'/config/prod.php';

$app->run();
