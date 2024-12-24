<?php
define('ROOT_PATH', str_replace('public', '', $_SERVER['DOCUMENT_ROOT']));
require_once(ROOT_PATH.'libs/Smarty.class.php');
require_once(ROOT_PATH.'libs/route.php');


if (empty($_SERVER['REQUEST_URI'])) {
    exit();
}

$parse = parse_url($_SERVER['REQUEST_URI']);

$method = strtolower($_SERVER['REQUEST_METHOD']);


if (mb_substr($parse['path'], -1) === '/') {
    $path = 'home/index';
} else {
    $path = mb_substr($parse['path'], 1);
}
route($path, $method);

?>

