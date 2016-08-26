<?php
/**
 * ZF1 legacy application
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/zf1legacy
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace Application\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use ZF1legacy_Model_KittenService;

/**
 * Class IndexControllerFactory
 *
 * @package Application\Controller
 */
class IndexControllerFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string             $requestedName
     * @param array|null|null    $options
     *
     * @return mixed
     */
    public function __invoke(
        ContainerInterface $container,
        $requestedName,
        array $options = null
    ) {
        $kittenService = $container->get(
            ZF1legacy_Model_KittenService::class
        );

        $controller = new IndexController();
        $controller->setKittenService($kittenService);

        return $controller;
    }

}