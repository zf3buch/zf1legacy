<?php
/**
 * ZF1 legacy application
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/zf1legacy
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace Kitten\Action;

use Kitten\Model\KittenService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

/**
 * Class KittenShowAction
 *
 * @package Kitten\Action
 */
class KittenShowAction
{
    /**
     * @var TemplateRendererInterface
     */
    private $renderer;

    /**
     * @var RouterInterface
     */
    private $router;

    /**
     * @var KittenService
     */
    private $kittenService;

    /**
     * KittenShowAction constructor.
     *
     * @param TemplateRendererInterface $renderer
     * @param RouterInterface           $router
     * @param KittenService             $kittenService
     */
    public function __construct(
        TemplateRendererInterface $renderer,
        RouterInterface $router,
        KittenService $kittenService
    ) {
        $this->renderer      = $renderer;
        $this->router        = $router;
        $this->kittenService = $kittenService;
    }

    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface      $response
     * @param callable|null          $next
     *
     * @return HtmlResponse|RedirectResponse
     */
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        callable $next = null
    ) {
        $id = $request->getAttribute('id');

        $kitten = $this->kittenService->fetchOneById($id);

        if (!$kitten) {
            return new RedirectResponse(
                $this->router->generateUri('kitten-list')
            );
        }

        $data = [
            'kitten' => $kitten
        ];

        return new HtmlResponse(
            $this->renderer->render('kitten::show', $data)
        );
    }
}
