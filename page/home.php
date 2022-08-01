<?php

if (empty($_SESSION['user'])) {
    header('location:Route.php?p=login');
}
?>
