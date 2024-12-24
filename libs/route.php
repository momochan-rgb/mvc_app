<?php

function route($path, $httpMethod)
{
    try {
        var_dump('test0');
        list($controller, $method) = explode('/', $path);
        $case = [$method, $httpMethod];
        var_dump('test1');
        switch ($controller) {
            case 'home':
                $controllerName = 'HomeController';
                switch ($case) {
                    case ['index', 'get']:
                        $methodName = 'index';
                        break;
                    default:
                        $controllerName = '';
                        $methodName = '';
                }
                break;

            case 'user':
                var_dump('test2');
                $controllerName = 'UserController';
                switch ($case) {
                    case ['log-in', 'get']:
                        $methodName = 'logIn';
                        var_dump('test3');
                        break;
                    case ['sign-up', 'get']:
                        $methodName = 'signUp';
                        break;
                    case ['create', 'post']:
                        $methodName = 'create';
                        break;
                    case ['log-out', 'get']:
                        $methodName = 'logOut';
                        break;
                    case ['certification', 'post']:
                        $methodName = 'certification';
                        break;
                    case ['my-page', 'get']:
                        $methodName = 'myPage';
                        break;
                    case ['edit', 'get']:
                        $methodName = 'edit';
                        break;
                    case ['update', 'post']:
                        $methodName = 'update';
                        break;
                    case ['delete', 'get']:
                        $methodName = 'delete';
                        break;
                    default:
                        $controllerName = '';
                        $methodName = '';
                }
                break;

        }
        require_once(ROOT_PATH."Controllers/{$controllerName}.php");

        $obj = new $controllerName();
        $obj->$methodName();

    } catch (Throwable $e) {
        error_log($e->getMessage());
        header("HTTP/1.0 404 Not Found");
    }
}
