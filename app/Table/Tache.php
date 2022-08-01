<?php

namespace App\Table;
use App\App;

class Tache extends Table
{
    private $id;
    private $id_user;
    private $id_prj;

    public static function listUsersProject()
    {
        return App::getDb()->query("SELECT
            CONCAT(tmp_users.nom,' ',
            tmp_users.prenom) as users,
            tmp_projets.nom AS nP
            FROM
                tmp_user_prj
            INNER JOIN tmp_projets ON tmp_projets.id_prj = tmp_user_prj.id_prj
            INNER JOIN tmp_users ON tmp_users.id_user = tmp_user_prj.id_user");
    }
}
