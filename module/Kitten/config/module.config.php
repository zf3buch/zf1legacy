<?php
/**
 * ZF1 legacy application
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/zf1legacy
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Kitten\Controller\IndexController;
use Kitten\Controller\IndexControllerFactory;
use Kitten\Model\KittenService;
use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'kitten' => [
                'type'          => Literal::class,
                'options'       => [
                    'route'    => '/kitten',
                    'defaults' => [
                        'controller' => IndexController::class,
                        'action'     => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes'  => [
                    'action' => [
                        'type'    => Segment::class,
                        'options' => [
                            'route'       => '/index[/:action[/id[/:id]]]',
                            'constraints' => [
                                'action' => '(show)',
                                'id'     => '[1-9][0-9]*',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],

    'controllers' => [
        'factories' => [
            IndexController::class => IndexControllerFactory::class,
        ],
    ],

    'service_manager' => [
        'factories' => [
            KittenService::class => InvokableFactory::class,
        ],
    ],

    'view_manager' => [
        'template_path_stack'      => [
            KITTEN_MODULE_ROOT . '/view',
        ],
    ],
];
