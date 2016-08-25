<?php

/**
 * ZF1 legacy application
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/zf1legacy
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */
class IndexController extends Zend_Controller_Action
{
    public function indexAction()
    {
        $kittenService = new ZF1legacy_Model_KittenService();

        $this->view->assign(
            'randomKitten', $kittenService->fetchRandomKitten()
        );
    }
}
