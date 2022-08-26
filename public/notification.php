<?php
//date_default_timezone_set('Europe/Paris');
date_default_timezone_set('Indian/Antananarivo');
$array = [];
$rows = [];
$id_user = $_SESSION['user']['id'];

$result = App\Table\Rappels::getNotificationByProject($_SESSION['user']['id_prj']);

$nom = App\Table\Projet::nom_projet($_SESSION['user']['id_prj']);
$date = date('Y-m-d');
$heure_debut= date('H:i:s');

$totalNotification = 0;
foreach ($result as $res) {
    $data['title'] = "Demmande de confirmation";
    $data['message'] = "Travaillez-vous toujours sur le projet \n\t".strtoupper($nom->getNom());
    $data['icon'] = 'https://icon-library.com/images/notifications-icon-png/notifications-icon-png-15.jpg';
    $data['url'] = 'http://localhost/temps_poo/public/Route.php?p=timer&lang=fr';
    $rows[] = $data;
    $nextime =date('Y-m-d H:i:s',strtotime(date('Y-m-d H:i:s')) + ($res->tps_rappel)/60 * 3600);

    App\Table\Rappels::updateNotification($res->id, $nextime);
    
    $totalNotification++;
    App\Table\Prestation::increment_confirmation($totalNotification, $date, $_SESSION['user']['heure_debut']);

} 
$array['notif'] = $rows;
$array['count'] = $totalNotification;
$array['result'] = true;
echo json_encode($array);
?>