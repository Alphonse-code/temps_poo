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
}
