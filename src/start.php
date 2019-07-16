<?php

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {

    //Employee
    $r->addRoute('POST', '/employee/create',["App\controllers\EmployeeController", "create"]);
    $r->addRoute('GET', '/employee/create',["App\controllers\EmployeeController", "create"]);
    $r->addRoute('POST', '/employee/update/{id:\d+}',["App\controllers\EmployeeController", "update"]);
    $r->addRoute('GET', '/employee/update/{id:\d+}',["App\controllers\EmployeeController", "update"]);
    $r->addRoute('GET', '/employee/delete/{id:\d+}',["App\controllers\EmployeeController", "delete"]);
    //auth
    $r->addRoute('POST', '/',["App\controllers\AuthController", "login"]);
    $r->addRoute('GET', '/',["App\controllers\AuthController", "login"]);
    $r->addRoute('GET', '/logout',["App\controllers\AuthController", "logout"]);
    //Events
    $r->addRoute('POST', '/book/create',["App\controllers\EventController", "create"]);
    $r->addRoute('GET', '/book/create',["App\controllers\EventController", "create"]);
    $r->addRoute('POST', '/book/change',["App\controllers\EventController", "changeEvent"]);
    $r->addRoute('GET', '/book/change',["App\controllers\EventController", "changeEvent"]);
    $r->addRoute('GET', '/book/delete/{id:\d+}',["App\controllers\EventController", "delete"]);

    //pages
    $r->addRoute('GET', '/employee',["App\controllers\HomeController", "employeeList"]);
    $r->addRoute('GET', '/rooms',["App\controllers\HomeController", "rooms"]);
    //----------------------------------------------------------

});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        echo "404 Not Found";
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        echo "405 Method Not Allowed";
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        list($class, $method) = $handler;
        call_user_func_array([new $class, $method], $vars);
        break;
}