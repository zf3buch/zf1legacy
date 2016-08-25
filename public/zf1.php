<?php
/**
 * ZF1 legacy application
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/zf1legacy
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

defined('APPLICATION_PATH')
|| define(
    'APPLICATION_PATH', realpath(dirname(__FILE__) . '/../legacy/application')
);

define(
    'APPLICATION_ENV', (getenv('APPLICATION_ENV')
    ? getenv('APPLICATION_ENV')
    : 'production')
);

set_include_path(
    implode(
        PATH_SEPARATOR, [
            '.',
            dirname(dirname(__FILE__)) . '/legacy/library',
        ]
    )
);

// Load Zend_Application
require_once 'Zend/Application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);
$application->bootstrap();
$application->run();

