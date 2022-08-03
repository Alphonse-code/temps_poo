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
}

ob_start(); // démarre la temporisation de sortie
if ($p === 'home') {
    require ROOT . '/page/home.php';
} elseif ($p === 'login') {
    require ROOT . '/page/login.php';
} elseif ($p === 'list_projet') {
    require ROOT . '/page/list_projet.php';
} elseif ($p === 'new_projet') {
    require ROOT . '/page/new_projet.php';
} elseif ($p === 'edit_projet') {
    require ROOT . '/page/edit_projet.php';
}elseif ($p === 'delete_projet') {
    require ROOT . '/page/delete_projet.php';
}
elseif ($p == 'logout') {
    require ROOT . '/page/logout.php';
} elseif ($p == 'u_avantage') {
    require ROOT . '/page/avantage.php';
} elseif ($p == 'temps_rappel') {
    require ROOT . '/page/temps_rappel.php';
} elseif ($p == 'cout_min') {
    require ROOT . '/page/cout_min.php';
} elseif ($p == 'user_projet') {
    require ROOT . '/page/user_projet.php';
} elseif ($p == 'list_users') {
    require ROOT . '/page/list_users.php';
} elseif ($p == 'reporting') {
    require ROOT . '/page/reporting.php';
} elseif ($p == 'timer') {
    require ROOT . '/page/timer.php';
}
elseif ($p == 'notif'){
    require ROOT . '/public/notification.php';
}

$content = ob_get_clean();
require '../page/templates/layout.php';
