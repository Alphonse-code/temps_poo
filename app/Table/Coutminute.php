<?php
namespace App\Table;
use App\App;

class Coutminute extends Table
{
    public static function list_cou()
    {
       $sql = "SELECT CONCAT(tmp_users.nom,' ' , tmp_users.prenom) AS users,
    tmp_cout.id_user,
    date,
    SUM(cout_minute) AS montant
FROM
    tmp_cout
INNER JOIN tmp_users ON tmp_cout.id_user = tmp_users.id_user
GROUP BY
    tmp_cout.id_user ";
                return App::getDb()->query($sql);
    }
}
