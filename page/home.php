<?php
if (empty($_SESSION['user'])) {
    header('location:Index.php?p=login');
}
?>
