<?php
/**
 * ZF1 legacy application
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/zf1legacy
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace Kitten;

use Zend\Config\Config;
use Zend\Config\Factory;

define('KITTEN_MODULE_ROOT', __DIR__ . '/..');

/**
 * Class ConfigProvider
 *
 * @package Kitten
 */
class ConfigProvider
{
    /**
     * Read configuration
     *
     * @return array|Config
     */
    public function __invoke()
    {
        return Factory::fromFile(
            KITTEN_MODULE_ROOT . '/config/module.config.php'
        );
    }
}