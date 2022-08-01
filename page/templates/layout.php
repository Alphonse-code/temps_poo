<?php
if (isset($_SESSION['user']['nom'])) {
    $username = $_SESSION['user']['nom'];
}
setlocale(LC_ALL, 'fr_FR');
?>

<?= $content ?>
