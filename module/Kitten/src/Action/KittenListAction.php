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
use Zend\Expressive\Template\TemplateRendererInterface;

/**
 * Class KittenListAction
 *
 * @package Kitten\Action
 */
class KittenListAction
{
    /**
     * @var TemplateRendererInterface
     */
    private $renderer;

    /**
     * @var KittenService
     */
    private $kittenService;

    /**
     * KittenListAction constructor.
     *
     * @param TemplateRendererInterface $renderer
     * @param KittenService             $kittenService
     */
    public function __construct(
        TemplateRendererInterface $renderer, KittenService $kittenService
    ) {
        $this->renderer      = $renderer;
        $this->kittenService = $kittenService;
    }

    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface      $response
     * @param callable|null          $next
     *
     * @return HtmlResponse
     */
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        callable $next = null
    ) {
        $data = [
            'allKitten' => $this->kittenService->fetchAll()
        ];

        return new HtmlResponse(
            $this->renderer->render('kitten::list', $data)
        );
    }
}
