<?php
/**
 * ZF1 legacy application
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/zf1legacy
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace Application\Action;

use Interop\Container\ContainerInterface;
use Kitten\Model\KittenService;
use Zend\Expressive\Template\TemplateRendererInterface;

/**
 * Class HomePageFactory
 *
 * @package Application\Action
 */
class HomePageFactory
{
    /**
     * @param ContainerInterface $container
     *
     * @return HomePageAction
     */
    public function __invoke(ContainerInterface $container)
    {
        $renderer      = $container->get(TemplateRendererInterface::class);
        $kittenService = $container->get(KittenService::class);

        return new HomePageAction($renderer, $kittenService);
    }
}
