<?php
/**
 * ZF1 legacy application
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/zf1legacy
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Zend\ServiceManager\ServiceManager;

$config = require PROJECT_ROOT . '/config/config.php';

$container = new ServiceManager($config['dependencies']);
$container->setService('config', $config);

return $container;
