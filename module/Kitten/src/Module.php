<?php
/**
 * ZF1 legacy application
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/zf1legacy
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace Kitten;

use Zend\ModuleManager\ModuleManagerInterface;

/**
 * Class Module
 *
 * @package Kitten
 */
class Module
{
    /**
     * @param ModuleManagerInterface $manager
     */
    public function init(ModuleManagerInterface $manager)
    {
        if (!defined('KITTEN_MODULE_ROOT')) {
            define('KITTEN_MODULE_ROOT', realpath(__DIR__ . '/../'));
        }
    }

    /**
     * @return mixed
     */
    public function getConfig()
    {
        return include KITTEN_MODULE_ROOT
            . '/config/module.config.php';
    }
}
