<?php
/**
 * ZF1 legacy application
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/zf1legacy
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Kitten\Action\KittenListAction;
use Kitten\Action\KittenListFactory;
use Kitten\Action\KittenShowAction;
use Kitten\Action\KittenShowFactory;
use Kitten\Model\KittenService;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'dependencies' => [
        'factories' => [
            KittenService::class => InvokableFactory::class,

            KittenListAction::class => KittenListFactory::class,
            KittenShowAction::class => KittenShowFactory::class,
        ],
    ],

    'routes' => [
        [
            'name'            => 'kitten-list',
            'path'            => '/kitten',
            'middleware'      => KittenListAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name'            => 'kitten-show',
            'path'            => '/kitten/index/show/id/:id',
            'middleware'      => KittenShowAction::class,
            'allowed_methods' => ['GET'],
            'options'         => [
                'constraints' => [
                    'id' => '[1-9][0-9]*',
                ],
            ],
        ],
    ],

    'templates' => [
        'paths' => [
            'kitten' => [KITTEN_MODULE_ROOT . '/templates/kitten'],
        ],
    ],
];
