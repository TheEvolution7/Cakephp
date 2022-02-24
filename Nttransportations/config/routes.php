<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 * Cache: Routes are cached to improve performance, check the RoutingMiddleware
 * constructor in your `src/Application.php` file to change this behavior.
 *
 */
Router::defaultRouteClass(DashedRoute::class);

// $routes->connect('/', ['prefix' => 'acp', 'controller' => 'Pages', 'action' => 'dashboard', 'home']);

// Router::connect('acp/users/logout', ['plugin' => 'Acp', 'controller' => 'Users', 'action' => 'logout'], ['_name' => 'Acp.logout']);

Router::scope('/', function (RouteBuilder $routes) {
    // Register scoped middleware for in scopes.
    // $routes->registerMiddleware('csrf', new CsrfProtectionMiddleware([
    //     'httpOnly' => true
    // ]));

    /**
     * Apply a middleware to the current route scope.
     * Requires middleware to be registered via `Application::routes()` with `registerMiddleware()`
     */
    // $routes->applyMiddleware('csrf');

    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */


    // Home
    $routes->connect('/', ['controller' => 'Pages', 'action' => 'home'], ['routeClass' => 'ADmad/I18n.I18nRoute']);
    $routes->connect('/', ['controller' => 'Pages', 'action' => 'home']);

    $routes->connect('/contact', ['controller' => 'Pages', 'action' => 'contact'], ['routeClass' => 'ADmad/I18n.I18nRoute']);
    $routes->connect('/contact', ['controller' => 'Pages', 'action' => 'contact']);

    $routes->connect('/about-us', ['controller' => 'Pages', 'action' => 'about'], ['routeClass' => 'ADmad/I18n.I18nRoute']);
    $routes->connect('/about-us', ['controller' => 'Pages', 'action' => 'about']);

    $routes->connect('/terms-and-conditions', ['controller' => 'Pages', 'action' => 'terms'], ['routeClass' => 'ADmad/I18n.I18nRoute']);
    $routes->connect('/terms-and-conditions', ['controller' => 'Pages', 'action' => 'terms']);

    

    // Article
    $routes->connect(
        '/point-of-interest/',
        ['controller' => 'Articles', 'action' => 'index'], ['routeClass' => 'ADmad/I18n.I18nRoute']
    );
    $routes->connect(
        '/point-of-interest/',
        ['controller' => 'Articles', 'action' => 'index']
    );

    $routes->connect(
        '/services/',
        ['controller' => 'Products', 'action' => 'services'], ['routeClass' => 'ADmad/I18n.I18nRoute']
    );
    $routes->connect(
        '/services/',
        ['controller' => 'Products', 'action' => 'services']
    );

    $routes->connect(
        '/service/:slug',
        ['controller' => 'Products', 'action' => 'servicesDetails'], ['routeClass' => 'ADmad/I18n.I18nRoute']
    )
    ->setPass(['slug'])
    ->setPatterns([
        'slug' => '[a-z0-9-_]+'
    ]);
    $routes->connect(
        '/service/:slug',
        ['controller' => 'Products', 'action' => 'servicesDetails']
    )
    ->setPass(['slug'])
    ->setPatterns([
        'slug' => '[a-z0-9-_]+' 
    ]);

    // Product
    
    $routes->connect(
        '/tours/',
        ['controller' => 'Products', 'action' => 'tours'], ['routeClass' => 'ADmad/I18n.I18nRoute']
    );
    $routes->connect(
        '/tours/',
        ['controller' => 'Products', 'action' => 'tours']
    );

    
    $routes->connect(
        '/tour/:slug',
        ['controller' => 'Products', 'action' => 'details'], ['routeClass' => 'ADmad/I18n.I18nRoute']
    )
    ->setPass(['slug'])
    ->setPatterns([
        'slug' => '[a-z0-9-_]+',
        
    ]);
    $routes->connect(
        '/tour/:slug',
        ['controller' => 'Products', 'action' => 'details']
    )
    ->setPass(['slug'])
    ->setPatterns([
        'slug' => '[a-z0-9-_]+',
    ]);

    $routes->connect(
        '/article/:slug',
        ['controller' => 'Articles', 'action' => 'details'], ['routeClass' => 'ADmad/I18n.I18nRoute']
    )
    ->setPass(['slug'])
    ->setPatterns([
        'slug' => '[a-z0-9-_]+' 
    ]);
    $routes->connect(
        '/article/:slug',
        ['controller' => 'Articles', 'action' => 'details']
    )
    ->setPass(['slug'])
    ->setPatterns([
        'slug' => '[a-z0-9-_]+'
    ]);

    // Product
    
    $routes->connect(
        '/albums/',
        ['controller' => 'Albums', 'action' => 'index'], ['routeClass' => 'ADmad/I18n.I18nRoute']
    );
    $routes->connect(
        '/albums/',
        ['controller' => 'Albums', 'action' => 'index']
    );

    
    $routes->connect(
        '/albums/category/:slug-:id',
        ['controller' => 'Albums', 'action' => 'category'], ['routeClass' => 'ADmad/I18n.I18nRoute']
    )
    ->setPass(['id'])
    ->setPatterns([
        'slug' => '[a-z0-9-_]+',
        'id' => '[0-9]+',
    ]);
    $routes->connect(
        '/albums/category/:slug-:id',
        ['controller' => 'Albums', 'action' => 'category']
    )
    ->setPass(['id'])
    ->setPatterns([
        'slug' => '[a-z0-9-_]+',
        'id' => '[0-9]+',
    ]);

    $routes->connect(
        '/album/:slug-:id',
        ['controller' => 'Albums', 'action' => 'details'], ['routeClass' => 'ADmad/I18n.I18nRoute']
    )
    ->setPass(['id'])
    ->setPatterns([
        'slug' => '[a-z0-9-_]+',
        'id' => '[0-9]+',
    ]);
    $routes->connect(
        '/album/:slug-:id',
        ['controller' => 'Albums', 'action' => 'details']
    )
    ->setPass(['id'])
    ->setPatterns([
        'slug' => '[a-z0-9-_]+',
        'id' => '[0-9]+',
    ]);

    $routes->connect(
        '/anysize/',
        ['controller' => 'Pages', 'action' => 'anysize']
    );

    //User
    $routes->connect(
        '/login/',
        ['controller' => 'Users', 'action' => 'login']
    );

    $routes->connect(
        '/register/',
        ['controller' => 'Users', 'action' => 'register']
    );

    $routes->connect(
        '/logout/',
        ['controller' => 'Users', 'action' => 'logout']
    );
    
    $routes->connect(
        '/booking/',
        ['controller' => 'Carts', 'action' => 'booking']
    );
    $routes->connect(
        '/booking-step-2/',
        ['controller' => 'Carts', 'action' => 'bookingLeiGreeting']
    );
    $routes->connect(
        '/booking-step-3/',
        ['controller' => 'Carts', 'action' => 'pickup']
    );
    $routes->connect(
        '/booking-step-4/',
        ['controller' => 'Carts', 'action' => 'information']
    );
    $routes->connect(
        '/booking-step-4/checkout/',
        ['controller' => 'Carts', 'action' => 'confirm']
    );
    
    $routes->connect(
        '/confirm/',
        ['controller' => 'Carts', 'action' => 'confirm']
    );
    $routes->connect(
        '/payment/',
        ['controller' => 'Carts', 'action' => 'stripe']
    );
    
    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    // $routes
    //     ->connect('/:languageId/pages/:action/*', ['controller' => 'Pages'])
    //     ->setPass(['languageId'])
    //     ->setPatterns(['languageId' => '[a-z0-9-_]+']);



    // Router::scope('/', function ($routes) {
    //     $routes->connect(
    //         '/:controller',
    //         ['action' => 'index'],
    //         ['routeClass' => 'ADmad/I18n.I18nRoute']
    //     );
    //     $routes->connect(
    //         '/:controller/:action/*',
    //         [],
    //         ['routeClass' => 'ADmad/I18n.I18nRoute']
    //     );
    // });

    // Router::scope('/', function ($routes) {
    //     $routes->connect(
    //         '/:controller',
    //         ['action' => 'index']
    //     );
    //     $routes->connect(
    //         '/:controller/:action/*',
    //         []
    //     );
    // });



    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *
     * ```
     * $routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);
     * $routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);
     * ```
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    // $routes->fallbacks(DashedRoute::class);
});

/**
 * If you need a different set of middleware or none at all,
 * open new scope and define routes there.
 *
 * ```
 * Router::scope('/api', function (RouteBuilder $routes) {
 *     // No $routes->applyMiddleware() here.
 *     // Connect API actions here.
 * });
 * ```
 */