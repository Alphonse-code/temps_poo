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
    $p = 'notif';
}

ob_start(); // démarre la temporisation de sortie
if ($p == 'notif') {
    require ROOT . '/public/notification.php';
} elseif ($p == 'data') {
    require ROOT . '/public/data.php';
} elseif ($p == 'data2') {
    require ROOT . '/public/data2.php';
} elseif ($p == 'data3') {
    require ROOT . '/public/data3.php';
} elseif ($p == 'timer_action') {
    require ROOT . '/public/timer_action.php';
}

$content = ob_get_clean();
require '../page/templates/donne.php';
