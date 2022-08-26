<?php

namespace App\Table;
use App\App;


class Rappels extends Table
{
    private $id;
    private $id_prj;
    private $tps_rappel;
    private $publish_date;
    private $ntime;
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
    public function getId_prj()
    {
        return $this->id_prj;
    }
    public function setID_prj($id_prj): self
    {
        $this->id_prj = $id_prj;
        return $this;
    }
    public function getNtime()
    {
        return $this->ntime;
    }
    public function setNtime($ntime): self
    {
        $this->ntime = $ntime;
        return $this;
    }
    public function getTps_rappel()
    {
        return $this->tps_rappel;

    }
    public function setTps_rappel($tps_rappel): self
    {
        $this->tps_rappel = $tps_rappel;
        return $this;
    }
    public function getPublish_date()
    {
        return $this->publish_date;
    }
    public function setPublish_date($publish_date): self
    {
        $this->publish_date = $publish_date;
        return $this;
    }
    
    
    public static function getNotificationByProject($id_prj)
    {
        $query = "SELECT * FROM  tmp_temps_rappel WHERE id_prj= $id_prj AND ntime <= CURRENT_TIMESTAMP()";
        return App::getDb()->query($query);
    }

    public static function updateNotification($id, $nextime)
    {
        $updateQuery = "UPDATE tmp_temps_rappel SET ntime='$nextime' , publish_date=CURRENT_TIMESTAMP() WHERE id= $id";
        App::getDb()->query($updateQuery);
    }

    public static function delete_rappel($id) {
        App::getDb()->query("DELETE FROM tmp_temps_rappel  WHERE id= $id");
    }

   

    public static function get_notificationsById($id) {
        return App::getDb()->query("SELECT * FROM tmp_temps_rappel WHERE id=".$id,__CLASS__,true);
    }
                
}