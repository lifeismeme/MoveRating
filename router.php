<?php

function View(string $page, string $viewName, $vmodel = null)
{
    $_bodyFileName = "src/Pages/$page/Views/$viewName.php";
    return require 'src/Pages/_template.php';
}

$url = trim($_SERVER['REDIRECT_URL'] ?? '', '/');

if ($url === '') {
    $controller = new \Pages\Login\LoginController();
    return $controller->index();
} else {
    $path = explode('/', $url);

    $controllerName = $path[0];

    $action;
    if (isset($path[1]) === true)
        $action = $path[1];
    else
        $action = 'index';

    $controllerFullName = 'Pages\\' . $controllerName . '\\' . $controllerName . 'Controller';

    if (
        class_exists($controllerFullName) === false
        || method_exists($controllerFullName, $action) === false
    ) {
        http_response_code(404);
        return;
    }
    
    session_start();
    $controller = new $controllerFullName();
    if($controller->isAllowAccess() === false)
    {
        http_response_code(403);
        return;
    }

    $response = $controller->$action();
    
    session_write_close();

    return $response;
}
