<?php
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Query\QueryBuilder;
use App\ConnectionToDB;

ini_set('xdebug.var_display_max_depth', '10');
ini_set('xdebug.var_display_max_children', '256');
ini_set('xdebug.var_display_max_data', '1024');
require_once 'vendor/autoload.php';


//var_dump($_POST);
$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $namespace = '\App\Controllers\\';

    $r->addRoute('GET', '/product/add', $namespace . 'AddProductController@showAddProductForm');
    $r->addRoute('POST', '/product/add', $namespace . 'AddProductController@addProduct');

    $r->addRoute('GET', '/product/list', $namespace . 'ListController@index');
    $r->addRoute('DELETE', '/product/list/{id}', $namespace . 'ListController@delete');


    /*$r->addRoute('GET', '/articles', $namespace . 'ArticlesController@index');
    $r->addRoute('GET', '/articles/{id}', $namespace . 'ArticlesController@show');
    $r->addRoute('DELETE', '/articles/{id}', $namespace . 'ArticlesController@delete');

    $r->addRoute('GET', '/add', $namespace . 'AddArticleController@showAddArticleForm');
    $r->addRoute('POST', '/add', $namespace . 'AddArticleController@add');

    $r->addRoute('POST', '/articles/{id}/comments', $namespace . 'CommentsController@store');


    $r->addRoute('GET', '/register', $namespace . 'RegisterController@showRegistrationForm');
    $r->addRoute('POST', '/register', $namespace . 'RegisterController@register');

    $r->addRoute('GET', '/login', $namespace . 'LoginController@showLoginForm');
    $r->addRoute('POST', '/login', $namespace . 'LoginController@login');
    $r->addRoute('POST', '/logout', $namespace . 'LoginController@logout');*/
});

// Fetch method and URI from somewhere
$httpMethod = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        echo '404 PAGE NOT FOUND';
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        echo 'METHOD NOT ALLOWED';
        break;
    case FastRoute\Dispatcher::FOUND:
        [$controller, $method] = explode('@', $routeInfo[1]);
        $vars = $routeInfo[2];

        (new $controller)->$method($vars);

        break;
}
