<?php
/**
 * ZF1 legacy application
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/zf1legacy
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use ZF1legacy_Model_KittenService;

/**
 * Class IndexController
 *
 * @package Application\Controller
 */
class IndexController extends AbstractActionController
{
    /**
     * @var ZF1legacy_Model_KittenService
     */
    private $kittenService;

    /**
     * @param ZF1legacy_Model_KittenService $kittenService
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
