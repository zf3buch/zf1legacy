<?php
/**
 * ZF1 legacy application
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/zf1legacy
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Zend\Expressive\ConfigManager\ConfigManager;
use Zend\Expressive\ConfigManager\PhpFileProvider;

$cachedConfigFile = PROJECT_ROOT . '/data/cache/app_config.php';

$pattern = PROJECT_ROOT . '/config/autoload/{{,*.}global,{,*.}'
    . APPLICATION_ENV . ',{,*.}local}.php';

$configManager = new ConfigManager(
    [
        Zend\Filter\ConfigProvider::class,
        Zend\I18n\ConfigProvider::class,
        Zend\Router\ConfigProvider::class,
        Zend\Validator\ConfigProvider::class,
        Application\ConfigProvider::class,
        Kitten\ConfigProvider::class,
        new PhpFileProvider($pattern),
    ],
    $cachedConfigFile
);

return new ArrayObject(
    $configManager->getMergedConfig(), ArrayObject::ARRAY_AS_PROPS
);
