<?php

namespace App\Table;
use App\App;

class Tache extends Table
{
    private $id;
    private $id_user;
    private $id_prj;

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    public function getIdUser()
    {
        return $this->id_user;
    }
    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
        return $this;
    }
    public function getIdPrj()
    {
        return $this->id_prj;
    }
    public function setIdPrj($id_prj)
    {
        $this->id_prj = $id_prj;
        return $this;
    }

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
    public static function newTask($id_user, $id_prj)
    {
        App::getDb()->query("INSERT INTO tmp_user_prj (id_user, id_prj) VALUES ('$id_user','$id_prj')");
    }

    
}
