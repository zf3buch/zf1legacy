<?php
/**
 * ZF1 legacy application
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/zf1legacy
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace Kitten\Action;

use Interop\Container\ContainerInterface;
use Kitten\Model\KittenService;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

/**
 * Class KittenShowFactory
 *
 * @package Kitten\Action
 */
class KittenShowFactory
{
    /**
     * @param ContainerInterface $container
     *
     * @return KittenShowAction
     */
    public function __invoke(ContainerInterface $container)
    {
        $renderer      = $container->get(TemplateRendererInterface::class);
        $router        = $container->get(RouterInterface::class);
        $kittenService = $container->get(KittenService::class);

        return new KittenShowAction($renderer, $router, $kittenService);
    }
}
