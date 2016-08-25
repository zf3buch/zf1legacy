<?php
/**
 * ZF1 legacy application
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/zf1legacy
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace Kitten\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use ZF1legacy_Model_KittenService;

/**
 * Class IndexController
 *
 * @package Kitten\Controller
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
            'allKitten', $this->kittenService->fetchAll()
        );

        return $viewModel;
    }

    public function showAction()
    {
        $id = $this->params()->fromRoute('id');

        if (!$id) {
            return $this->redirect()->toRoute('kitten');
        }

        $kitten = $this->kittenService->fetchOneById($id);

        if (!$kitten) {
            return $this->redirect()->toRoute('kitten');
        }

        $viewModel = new ViewModel();
        $viewModel->setVariable(
            'kitten', $kitten
        );

        return $viewModel;
    }
}
