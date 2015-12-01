<?php

header('Content-Type: text/html; charset=utf-8');
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));
define('VIEWS_PATH', ROOT.DS.'views');

require_once(ROOT.DS.'lib'.DS.'init.php');

Session::setFlash('Test flash messagem.');

App::run($_SERVER['REQUEST_URI']);

