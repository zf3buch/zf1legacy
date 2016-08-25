<?php
/**
 * ZF1 legacy application
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/zf1legacy
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace Application;

use Zend\EventManager\EventInterface;
use Zend\ModuleManager\ModuleManagerInterface;
use Zend\Mvc\MvcEvent;
use Zend\Session\Config\ConfigInterface;

/**
 * Class Module
 *
 * @package Application
 */
class Module
{
    /**
     * @param ModuleManagerInterface $manager
     */
    public function init(ModuleManagerInterface $manager)
    {
        if (!defined('APPLICATION_MODULE_ROOT')) {
            define('APPLICATION_MODULE_ROOT', realpath(__DIR__ . '/../'));
        }
    }

    /**
     * @param EventInterface|MvcEvent $e
     */
    public function onBootstrap(EventInterface $e)
    {
        $serviceManager = $e->getApplication()->getServiceManager();

        $serviceManager->get(ConfigInterface::class);
    }

    /**
     * @return mixed
     */
    public function getConfig()
    {
        return include APPLICATION_MODULE_ROOT
            . '/config/module.config.php';
    }
}
