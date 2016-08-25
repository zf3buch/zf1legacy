<?php

/**
 * ZF1 legacy application
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/zf1legacy
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    protected $_docRoot;

    protected function _initPath()
    {
        $this->_docRoot = realpath(APPLICATION_PATH . '/../');
        Zend_Registry::set('docRoot', $this->_docRoot);
    }

    protected function _initLoaderResource()
    {
        $resourceLoader = new Zend_Loader_Autoloader_Resource(
            [
                'basePath'  => $this->_docRoot . '/application',
                'namespace' => 'ZF1legacy'
            ]
        );
        $resourceLoader->addResourceTypes(
            [
                'model' => [
                    'namespace' => 'Model',
                    'path'      => 'models'
                ]
            ]
        );
    }

    protected function _initView()
    {
        $view = new Zend_View();

        return $view;
    }

    protected function _initSession()
    {
        $session = $this->getPluginResource('session');
        $session->init();

        Zend_Session::start();
    }
}
