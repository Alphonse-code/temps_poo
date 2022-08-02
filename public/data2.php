
<?php

use App\App;

$date_deb = $_POST['datedebut'];
$date_final = $_POST['datefin'];

$sql = "SELECT
   CONCAT(tmp_users.nom, tmp_users.prenom) as users,
    SUM(tmp_prestation.total_minute) AS total_minute
FROM
    tmp_prestation
INNER JOIN tmp_users ON tmp_prestation.id_user = tmp_users.id_user
WHERE
    tmp_prestation.date BETWEEN '$date_deb' AND '$date_final'
GROUP BY
    tmp_users.id_user";
echo json_encode(App::getDb()->query($sql));
?>

