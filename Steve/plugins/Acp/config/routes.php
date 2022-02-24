<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::extensions(['json', 'xml']);

Router::scope('/acp', ['plugin' => 'Acp'], function ($routes) {

    $routes->connect(
        '/:controller',
        ['action' => 'index'],
        ['routeClass' => 'ADmad/I18n.I18nRoute']
    );
    $routes->connect(
        '/:controller/:action/*',
        [],
        ['routeClass' => 'ADmad/I18n.I18nRoute']
    );
});

Router::plugin(
    'Acp',
    ['path' => '/acp'],
    function (RouteBuilder $routes) {
        $routes->fallbacks(DashedRoute::class);
    }
);



Router::connect('acp/users/logout', ['plugin' => 'Acp', 'controller' => 'Users', 'action' => 'logout'], ['_name' => 'Acp.logout']);
Router::connect('/acp', ['plugin' => 'Acp', 'controller' => 'Pages', 'action' => 'dashboard'], ['routeClass' => 'ADmad/I18n.I18nRoute']);
Router::connect('/acp', ['plugin' => 'Acp', 'controller' => 'Pages', 'action' => 'dashboard']);



// Route root
Router::scope('/', function ($routes) {

    $routes->connect(
        '/:controller',
        ['action' => 'index'],
        ['routeClass' => 'ADmad/I18n.I18nRoute']
    );
    $routes->connect(
        '/:controller/:action/*',
        [],
        ['routeClass' => 'ADmad/I18n.I18nRoute']
    );
    
    $routes->fallbacks(DashedRoute::class);
});