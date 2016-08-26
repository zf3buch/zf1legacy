<?php
/**
 * ZF1 legacy application
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/zf1legacy
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Interop\Container\ContainerInterface;

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

/** @var ContainerInterface $container */
$container = require PROJECT_ROOT . '/config/container.php';

// run the application
$app = $container->get(Zend\Expressive\Application::class)->run();
