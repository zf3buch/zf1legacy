<?php
/**
 * ZF1 legacy application
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/zf1legacy
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace Application\Controller;

use Kitten\Model\KittenService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Class IndexController
 *
 * @package Application\Controller
 */
class IndexController extends AbstractActionController
{
    /**
     * @var KittenService
     */
    private $kittenService;

    /**
     * @param KittenService $kittenService
     */
    public function setKittenService($kittenService)
    {
        $this->kittenService = $kittenService;
    }

    /**
     *
     */
    public function indexAction()
    {
        $viewModel = new ViewModel();
        $viewModel->setVariable(
            'randomKitten', $this->kittenService->fetchRandomKitten()
        );

        return $viewModel;
    }
}
