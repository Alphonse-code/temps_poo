<?php
namespace App\Table;
use App\App;

class Cout extends Table
{
    private $id;
    private $id_user;
    private $date;
    private $cout_minute;

    public static function insert_cout($id_user, $date, $cout_minute)
    {
        $sql_cout = "INSERT INTO tmp_cout VALUES (null,'$id_user','$date','$cout_minute')";
        App::getDb()->query($sql_cout);
    }

    public static function selectByID_Date($id_user, $date)
    {
        $sql = "SELECT * FROM tmp_cout WHERE id_user='$id_user' AND date='$date'";
        return App::getDb()->query($sql);
    }
    
    public static function update_cout($id_user, $date, $cout_minute)
    {
        $sql = "UPDATE `tmp_cout` SET `cout_minute` = '$cout_minute' WHERE id_user='$id_user' AND date='$date'";
        App::getDb()->query($sql);
    }
}
