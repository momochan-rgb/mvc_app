<?php

function route($path, $httpMethod)
{
    try {
        list($controller, $method) = explode('/', $path);
        $case = [$method, $httpMethod];
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
                $controllerName = 'UserController';
                switch ($case) {
                    case ['log-in', 'get']:
                        $methodName = 'logIn';
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

            case 'contact':
                $controllerName = 'ContactController';
                switch ($case) {
                    case ['index', 'get']:
                        $methodName = 'index';
                        break;
                    case ['confirm', 'post']:
                        $methodName = 'confirm';
                        break;
                    case ['submit', 'post']:
                        $methodName = 'submit';
                        break;
                    case ['complete', 'get']:
                        $methodName = 'complete';
                        break;
                    case ['edit', 'get']:
                        $methodName = 'edit';
                        break;
                    case ['update', 'post']:
                        $methodName = 'update';
                        break;
                    case ['delete', 'post']:
                        $methodName = 'delete';
                        break;
                    case ['findById', 'get']:
                        $methodName = 'findById';
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];  // idを取得
                            $obj = new $controllerName();
                            $obj->$methodName($id);  // findByIdを呼び出し
                        } else {
                            throw new Exception("ID parameter is missing");
                        }
                        break;
                    default:
                        throw new Exception("Invalid method: {$method} for controller: {$controller}");
                }
                break;
            case ['findById', 'get']:
                if (isset($_GET['id'])) {
                    $methodName = 'findById';
                    $id = $_GET['id'];  // リクエストパラメータからidを取得
                    $obj->$methodName($id);  // findByIdメソッドにidを渡す
                } else {
                    throw new Exception('ID parameter is missing');
                }
                break;
            default:
                    $controllerName = '';
                    $methodName = '';
                
        }
        
        $filePath = ROOT_PATH."Controllers/{$controllerName}.php";
        if (!file_exists($filePath)) {
            throw new Exception("Controller file not found: {$filePath}");
        }

        require_once($filePath);

        $obj = new $controllerName();
        if (isset($id)) {
            $obj->$methodName($id);
        } else {
            $obj->$methodName();
        }


    } catch (Throwable $e) {
        error_log($e->getMessage());
        header("HTTP/1.0 404 Not Found");
    }
}