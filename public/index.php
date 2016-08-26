<?php
/**
 * ZF1 legacy application
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/zf1legacy
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Zend\Mvc\Application;
use Zend\Stdlib\ArrayUtils;

define('PROJECT_ROOT', realpath(__DIR__ . '/..'));

defined('APPLICATION_PATH')
|| define(
    'APPLICATION_PATH', PROJECT_ROOT . '/legacy/application'
);

define(
    'APPLICATION_ENV', (getenv('APPLICATION_ENV')
    ? getenv('APPLICATION_ENV')
    : 'production')
);

require_once PROJECT_ROOT . '/vendor/autoload.php';

chdir(dirname(__DIR__));

$appConfig = require PROJECT_ROOT . '/config/application.config.php';

$configFile = PROJECT_ROOT . '/config/' . APPLICATION_ENV . '.config.php';
if (file_exists($configFile)) {
    $appConfig = ArrayUtils::merge($appConfig, require $configFile);
}

Application::init($appConfig)->run();
