<?php
namespace App\Table;
use App\App;
class Projet extends Table
{
    private $id_prj;
    private $nom;
    private $localisation;
    private $date_debut;
    private $date_fin_theorique;
    private $date_fin_reel;
    private $statut;
    private $rappel;

    public function getIdPrj()
    {
        return $this->id_prj;
    }
    public function getRappel()
    {
        return $this->rappel;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }
    public function getLocalisation()
    {
        return $this->localisation;
    }

    public function setLocalisation($localisation): self
    {
        $this->localisation = $localisation;
        return $this;
    }

    public function getDateDebut()
    {
        return $this->date_debut;
    }
    public function setDateDebut($date_debut): self
    {
        $this->date_debut = $date_debut;
        return $this;
    }

    public function getDateFin()
    {
        return $this->date_fin_reel;
    }
    public function getDateFinTheorique()
    {
        return $this->date_fin_theorique;
    }

    public function setDateFin($date_fin_reel): self
    {
        $this->date_fin_reel = $date_fin_reel;
        return $this;
    }

    public static function nom_projet($id)
    {
        return App::getDb()->query("SELECT nom FROM tmp_projets WHERE id_prj = $id", __CLASS__, true);
    }
    public static function findByName($nom,$date_debut)
    {
        return App::getDb()->query("SELECT * FROM `tmp_projets` WHERE `nom` ='$nom' AND `date_debut`='$date_debut'");
    }
    
    public static function findByProjectId($id_prj)
    {
        return App::getDb()->query('SELECT * FROM `tmp_projets` WHERE `id_prj` =' . $id_prj, __CLASS__, true);
    }
    public static function createProject($nom,$localisation,$date_debut,$date_fin_theorique,$date_fin_reel,$rappel_minute)
    {
        $sql = "INSERT INTO `tmp_projets`(`nom`, `localisation`, `date_debut`, `date_fin_theorique`, `date_fin_reel`,`rappel`) 
        VALUES ('$nom','$localisation','$date_debut','$date_fin_theorique','$date_fin_reel','$rappel_minute')";
         App::getDb()->query($sql);
    }

    public static function updateProjet($id_prj,$nom,$localisation,$date_debut,$date_fin_theorique,$date_fin_reel,$rappel_minute)
    {
       $projet = Projet::findByProjectId($id_prj);
       $sql = "UPDATE `tmp_projets` SET `nom`='$nom',`localisation`='$localisation',`date_debut`='$date_debut',`date_fin_theorique`='$date_fin_theorique',`date_fin_reel`='$date_fin_reel',`rappel`= '$rappel_minute' WHERE `id_prj`='$id_prj'";
       $sql1= "UPDATE `tmp_temps_rappel` SET `tps_rappel` = '$rappel_minute' WHERE `tmp_temps_rappel`.`id_prj`=$id_prj";
       
       App::getDb()->query($sql);
       App::getDb()->query($sql1);
       
    }

     public static function deleteProject($id_prj) 
     {
        App::getDb()->query('DELETE  FROM tmp_projets WHERE id_prj="'.$id_prj.'"');
    }

    public static function listProjects()
    {
        return App::getDb()->query('SELECT * FROM tmp_projets');
    }

    
    
}
