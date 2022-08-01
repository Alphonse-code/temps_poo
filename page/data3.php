<?php

use App\App;

$sql = "SELECT
   CONCAT(tmp_users.nom, tmp_users.prenom) as users,
   
    SUM(tmp_prestation.total_minute) AS total_minute
FROM
    tmp_prestation
INNER JOIN tmp_users ON tmp_prestation.id_user = tmp_users.id_user

GROUP BY
    tmp_users.id_user ";
echo json_encode(App::getDb()->query($sql));
?>
