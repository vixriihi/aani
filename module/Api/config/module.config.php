<?php

return array(
    'router' => array(
        'routes' => array(
            'api_client' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/client[/:action[/:id]]',
                    'defaults' => array(
                        'controller' => 'Api\Controller\Client',
                        'action' => 'index',
                    ),
                ),
            ),
            'api_room' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/room[/:room[/:action]]',
                    'defaults' => array(
                        'controller' => 'Api\Controller\Room',
                        'action' => 'index',
                    ),
                ),
            ),
        )
    ),
    'controllers' => array(
        'invokables' => array(
            'Api\Controller\Index' => 'Api\Controller\IndexController',
            'Api\Controller\Client' => 'Api\Controller\ClientController',
            'Api\Controller\Room' => 'Api\Controller\RoomController',
        )
    ),
    'view_manager' => array(
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
);
