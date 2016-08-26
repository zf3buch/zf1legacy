<?php
/**
 * ZF1 legacy application
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/zf1legacy
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

return [
    'modules' => [
    ],

    'module_listener_options' => [
        'config_glob_paths' => [
            PROJECT_ROOT
            . '/config/autoload/{,*.}{global,development,local}.php',
        ],

        'config_cache_enabled'     => false,
        'module_map_cache_enabled' => false,
    ],
];
