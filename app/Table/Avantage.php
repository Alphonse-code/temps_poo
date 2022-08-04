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

    public static function insert_avtg($nom, $montant)
    {
        $sql = "INSERT INTO `tmp_avantage` (`nom_avantage`, `montant_avantage`) VALUES ('$nom', $montant)";
        var_dump($sql);
        App::getDb()->query($sql);
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
        $sql = "UPDATE `tmp_avantage` SET `nom_avantage` = '$nom_avantage', `montant_avantage` = $motant_avantage WHERE `id_avantage` = $id_avantage";
       var_dump($sql);
        App::getDb()->query($sql);
    }

    public static function somme_avantage($id_user)
    {
        $som_avtg =
        "SELECT SUM(montant_avantage) total,usr.id_user from  tmp_avantage_user usr
        inner join  tmp_users t_us on t_us.id_user=usr.id_user
        inner join   tmp_avantage tmp_av  on tmp_av.id_avantage=usr.id_avantage
        WHERE usr.id_user=" . $id_user;
        return App::getDb()->query($som_avtg);
    }

    // avantage des utilisateurs
    public static function ListAvantageUsers() { 
        $sql = "SELECT
            tmp_avantage_user.id_avg_user,
            tmp_users.nom,
            tmp_users.prenom,
            tmp_avantage.nom_avantage,
            tmp_avantage.montant_avantage
        FROM
            `tmp_avantage_user`
        INNER JOIN tmp_users ON tmp_avantage_user.id_user = tmp_users.id_user
        INNER JOIN tmp_avantage ON tmp_avantage_user.id_avantage = tmp_avantage.id_avantage";
        return App::getDb()->query($sql);
    
    }
    public static function insert_user_avantage($id_user, $id_avantage) {
        App::getDb()->query("INSERT INTO tmp_avantage_user (id_user, id_avantage) VALUES ($id_user, $id_avantage)");
    }
    public static function delete_user_avtg($id)
    {
        App::getDb()->query("DELETE FROM tmp_avantage_user WHERE id_avg_user = $id");
    }

    public static function get_avtg_id($id)
    {
       return App::getDb()->query("SELECT * FROM tmp_avantage WHERE id_avantage = $id", __CLASS__, true);
    }

}
