
<?php 

use App\App;
    $sql = 'SELECT
           tmp_projets.nom,
              SUM(tmp_prestation.total_minute) AS total_minute
                 FROM
               tmp_prestation
          INNER JOIN tmp_projets ON tmp_prestation.id_prj = tmp_projets.id_prj
          GROUP BY tmp_prestation.id_prj';
    echo json_encode(App::getDb()->query($sql));
?>
