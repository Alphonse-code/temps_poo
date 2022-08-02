<?php
namespace App\Table;
use App\App;

class Prestation extends Table
{
    private $id_prestation;
    private $date;
    private $id_prj;
    private $id_user;
    private $heure_debut;
    private $heure_fin;
    private $total_minute;
    private $depense_supplementaire;
    private $description_dépense;

    //Liste des utilisateur par date et temps presté
    public static function list_user_temps()
    {
            $sql = "SELECT
            CONCAT(tmp_users.nom,' ',
            tmp_users.prenom) as users,
            tmp_prestation.id_user,
            tmp_prestation.date,
            SUM(tmp_prestation.total_minute) AS temp_preste,
            tmp_projets.nom AS nom_projet,
            SUM(
                tmp_prestation.depense_supplementaire
            ) AS depense_sup
        FROM
            tmp_prestation
        INNER JOIN tmp_users ON tmp_prestation.id_user = tmp_users.id_user
        INNER JOIN tmp_projets ON tmp_prestation.id_prj = tmp_projets.id_prj
        GROUP BY
            tmp_prestation.date AND tmp_users.nom,
            tmp_users.prenom
        ORDER BY
            tmp_prestation.date";
         return App::getDb()->query($sql);
    }

    //Nombre de minutes presté par user par projet
    public static function temps_prest_projet()
    {
        $sql = "SELECT
            tmp_projets.nom AS nom_prj,
            CONCAT(tmp_users.nom,' ',
            tmp_users.prenom) AS users,
            SUM(tmp_prestation.total_minute) AS total_minute
        FROM
            tmp_prestation
        INNER JOIN tmp_projets ON tmp_prestation.id_prj = tmp_projets.id_prj
        INNER JOIN tmp_users ON tmp_prestation.id_user = tmp_users.id_user
        GROUP BY
            (tmp_prestation.id_prj)";
            return App::getDb()->query($sql);
    }

    public static function insert_heur_debut($date, $id_user, $id_prj, $heure_debut)
    {
        $sql = "INSERT INTO tmp_prestation(`date`,`id_user`, `id_prj`,`heure_debut`) VALUES ('$date',$id_user,$id_prj,'$heure_debut')";
       
        App::getDb()->query($sql);
    }

    public static function update_prestation($date, $heure_debut, $heure_fin,$id_user)
    {
        $sql = "UPDATE tmp_prestation SET heure_fin = '$heure_fin',total_minute=(SELECT ROUND(time_to_sec((TIMEDIFF('$date $heure_fin','$date $heure_debut'))) / 60)) WHERE  heure_debut='$heure_debut' AND id_user='$id_user' AND date='$date';";
        App::getDb()->query($sql);
    }

    public static function calcule_cout_minute($date, $heure_debut, $heure_fin)
    {  
        return App::getDb()->query("SELECT ROUND(time_to_sec((TIMEDIFF('$date $heure_fin','$date $heure_debut'))) / 60) as cout_minute");
    }

    public static function total_minute($id, $date)
    {
        $total_min = "SELECT SUM(total_minute) as tot_min FROM tmp_prestation WHERE id_user='$id' AND date = '$date';";
        return App::getDb()->query($total_min); 
    }

}
