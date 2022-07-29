<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);

define('ROOT', dirname(__DIR__));

session_start();
if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = [];
}

require '../app/Autoloader.php';
App\Autoloader::register();

if (isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = 'home';
    echo $p;
}
echo $p;
ob_start();
if ($p === 'home') {
    require ROOT . '/page/home.php';
} elseif ($p === 'login') {
    require ROOT . '/page/login.php';
} elseif ($p === 'list_projet') {
    require ROOT . '/page/list_projet.php';
}

$content = ob_get_clean();
require '../page/templates/layout.php';
