<?php
date_default_timezone_set('Europe/Paris');

$array = [];
$rows = [];
$id_user = $_SESSION['user']['id'];

$result = App\Table\Notification::getNotificationByUser($id_user);

$totalNotification = 0;
foreach ($result as $res) {
    $data['title'] = $res->title;
    $data['message'] = $res->message;
    $data['icon'] =
        'https://icon-library.com/images/notifications-icon-png/notifications-icon-png-15.jpg';
    $data['url'] = 'https://tanit.tech/so/adine_temps';
    $rows[] = $data;
    $nextime = date(
        'Y-m-d H:i:s',
        strtotime(date('Y-m-d H:i:s')) + $res->repeat * 3600
    );
    App\Table\Notification::updateNotification($res->id_notif, $nextime);
    $totalNotification++;
}
$array['notif'] = $rows;
$array['count'] = $totalNotification;
$array['result'] = true;
echo json_encode($array);

?>
