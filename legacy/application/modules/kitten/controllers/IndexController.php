<?php

/**
 * ZF1 legacy application
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/zf1legacy
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */
class Kitten_IndexController extends Zend_Controller_Action
{
    public function indexAction()
    {
        $kittenService = new ZF1legacy_Model_KittenService();

        $this->view->assign(
            'allKitten', $kittenService->fetchAll()
        );
    }

    public function showAction()
    {
        $id = $this->getParam('id');

        $kittenService = new ZF1legacy_Model_KittenService();

        $kitten = $kittenService->fetchOneById($id);

        if (!$kitten) {
            $this->redirect(
                $this->getHelper('url')->url(
                    ['action' => 'index'], 'default', true
                )
            );
        }

        $this->view->assign(
            'kitten', $kitten
        );
    }
}
