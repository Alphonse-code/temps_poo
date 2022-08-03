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

    public function getIdPrj()
    {
        return $this->id_prj;
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

    public static function findByProjectId($id_prj)
    {
        return App::getDb()->query('SELECT * FROM `tmp_projets` WHERE `id_prj` =' . $id_prj, __CLASS__, true);
    }
    public static function createProject($nom,$localisation,$date_debut,$date_fin_theorique,$date_fin_reel)
    {
        $sql = "INSERT INTO `tmp_projets`(`nom`, `localisation`, `date_debut`, `date_fin_theorique`, `date_fin_reel`) 
        VALUES ('$nom','$localisation','$date_debut','$date_fin_theorique','$date_fin_reel')";
         App::getDb()->query($sql);
    }

    public static function updateProjet($id_prj,$nom,$localisation,$date_debut,$date_fin_theorique,$date_fin_reel)
    {
       $projet = Projet::findByProjectId($id_prj);
       $sql = "UPDATE `tmp_projets` SET `nom`='$nom',`localisation`='$localisation',`date_debut`='$date_debut',`date_fin_theorique`='$date_fin_theorique',`date_fin_reel`='$date_fin_reel' WHERE `id_prj`='$id_prj'";
       App::getDb()->query($sql);
       
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
