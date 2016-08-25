<?php
/**
 * ZF1 legacy application
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/zf1legacy
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

return [
    'session_config' => [
        'use_only_cookies' => 1,
        'save_path'        => realpath(PROJECT_ROOT . '/data/sessions'),
        'name'             => 'kitten_session',
        'gc_maxlifetime'   => 3600,
    ],
];
