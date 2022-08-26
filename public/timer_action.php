<?php
//date_default_timezone_set('Europe/Paris');
date_default_timezone_set('Indian/Antananarivo');
$heure_fin = date('H:i:s');
$date = date('Y-m-d');
$id_user = $_SESSION['user']['id'];
$heure_debut = $_POST['heure'];
$id_prj = $_POST['id'];

/*
$heure_debut = $_GET['hd'];
$id_prj = $_GET['id_prj'];
*/

// maitre à jour prestaion
App\Table\Prestation::update_prestation(
    $date,
    $heure_debut,
    $heure_fin,
    $id_user
);
$salair_user = App\Table\Users::getSalaireById($id_user);
$karama = null;
$cout = null;
foreach ($salair_user as $sl) {
    $karama = iconv('UTF-8', 'ISO-8859-1//IGNORE', $sl->salaire);
}
App\Table\Prestation::update_actif($heure_debut,$date);
$cout_min = App\Table\Prestation::calcule_cout_minute(
    $date,
    $heure_debut,
    $heure_fin
);
foreach ($cout_min as $cm) {
    $cout = $cm->cout_minute;
}
// somme avantage par user
$somme_avt = App\Table\Avantage::somme_avantage($id_user);
$total = null;
foreach ($somme_avt as $cm) {
    $total = $cm->total;
}

$co_par_min = ($karama * 12 + $total) / 80640;

// total nombre de minute par user dans une date donné
$total_minute = App\Table\Prestation::total_minute($id_user, $date);
$total_min = null;
foreach ($total_minute as $tm) {
    $total_min = $tm->tot_min;
}
$coutmin = $co_par_min * $total_min;
$existe = App\Table\Cout::selectByID_Date($id_user, $date);
if(!$existe){
    App\Table\Cout::insert_cout($id_user, $date, $coutmin);
}
else {
    App\Table\Cout::update_cout($id_user, $date, $coutmin);
}
header('Location:Route.php?p=home&lang=' . $_SESSION['lang']);
