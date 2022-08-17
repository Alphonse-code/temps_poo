<?php
namespace App\Table;
use App\App;

class Confirmation extends Table
{
    private $id;
    private $id_user;
    private $id_prj;
    private $nb_validation;

    public function getId()
    {
        return $this->id;
    }
    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }
    public function getIdUser()
    {
        return $this->id_user;
    }
    public function setIdUser($id_user): self
    {
        $this->id_user = $id_user;
        return $this;
    }
    public function getIdPrj()
    {
        return $this->id_prj;
    }
    public function setIdPrj($id_prj): self
    {
         $this->id_prj = $id_prj;
         return $this;
    }
    public function getNbValidation()
    {
        return $this->$nb_validation
    }
    public function setNbValidation($nb_validation): self
    {
        $this->nb_validation = $nb_validation
        return $this;
    }

    public function insert_validation($id_user, $id_prj, $nb_validation)
    {
        $sql = "INSERT INTO `tmp_confirm` (`id`, `id_user`, `id_prj`, `nb_validation`) VALUES (NULL, '$id_user', '$id_prj', '$nb_validation');";
        App::getDb()->query($sql);
    }

}