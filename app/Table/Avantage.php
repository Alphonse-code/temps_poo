<?php
namespace App\Table;
use App\App;

class Avantage extends Table
{
    private $id_avantage;
    private $nom_avantage;
    private $montant_avantage;

    public function getIdAvantage()
    {
        return $this->id_avantage;
    }

    public function getNomAvantage()
    {
        return $this->nom_avantage;
    }

    public function setNomAvantage( $nom_avantage ): self
    {
        $this->nom_avantage = $nom_avantage;
        return $this;
    }

    public function getMontantAvantage()
    {
        return $this->montant_avantage;
    }

    public function setMotantAvantage( $motant_avantage ): self
    {
        $this->motant_avantage = $motant_avantage;
        return $this;
    }

    public static function list_avt()
    {
        return App::getDb()->query('SELECT * FROM `tmp_avantage`');
    }

    public static function delete_avantage($id_avantage)
    {
        App::getDb()->query('DELETE FROM `tmp_avantage` WHERE `id_avantage` = ' . $id_avantage);
    }

    public static function update_avantage($id_avantage, $nom_avantage,$motant_avantage)
    {
        App::getDb()->query("UPDATE `tmp_avantage` SET `nom_avantage` = $nom_avantage, `motant_avantage` = $motant_avantage WHERE `id_avantage` = $id_avantage");
    }

}
