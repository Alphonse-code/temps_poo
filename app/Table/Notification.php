<?php
namespace App\Table;
use App\App;

class Notification extends Table
{
    public $id_notif;
    public $title;
    public $message;
    public $ntime;
    public $repeat;
    public $publish_date;
    public $username;

    public function getTitle(){
        return $this->title;
    }
    public function setTitle($title){
        $this->title = $title;
        return $this;
    }
    public function getMessage(){
        return $this->message;
    }
    public function setMessage($message){
        $this->message = $message;
        return $this;
    }
    public function getRepeat(){
        return $this->repeat;
    }
    public function setRepeat($repeat){
        $this->repeat = $repeat;
        return $this;
    }
        
    public static function listNotification()
    {
        $sql = "SELECT
                tmp_notifications.id_notif,
                tmp_users.nom,
                tmp_projets.nom AS nomP,
                tmp_notifications.repeat,
                tmp_notifications.message,
                tmp_notifications.title
                
                FROM
                    tmp_notifications
                INNER JOIN tmp_user_prj ON tmp_user_prj.id_user = tmp_notifications.id_user
                INNER JOIN tmp_projets ON tmp_projets.id_prj=tmp_user_prj.id_prj
                INNER JOIN tmp_users ON tmp_users.id_user=tmp_user_prj.id_user";

        return App::getDb()->query($sql);
    }
    public static function saveNotification($title, $message, $ntime, $repeat,$id_user){	
		$insertQuery = "INSERT INTO tmp_notifications ( `title`, `message`, `ntime`, `repeat`, `id_user`) VALUES ('".$title."', '".$message."', '".$ntime."', $repeat, $id_user)";
        App::getDb()->query($insertQuery);		
	}		
	
    public static function getNotificationByUser($id_user)
    {
        $query = "SELECT * FROM  tmp_notifications WHERE id_user= $id_user AND ntime <= CURRENT_TIMESTAMP()";
        return App::getDb()->query($query);
    }

    public static function updateNotification($id_notif, $nextime)
    {
        $updateQuery = "UPDATE tmp_notifications SET ntime='$nextime' , publish_date=CURRENT_TIMESTAMP() WHERE id_notif= $id_notif";
        App::getDb()->query($updateQuery);
    }

    public static function delete_rappel($id_notif) {
        App::getDb()->query("DELETE FROM tmp_notifications  WHERE id_notif= $id_notif");
    }

    public static function editNotification($id_notif, $title, $message, $repeat)
    {
         $sql = "UPDATE tmp_notifications SET title='" .$title. "', message='" . $message ."' ,`repeat`='$repeat' WHERE id_notif='" .$id_notif . "'"; 
         App::getDb()->query($sql);
    }

    public static function get_notificationsById($id) {
        return App::getDb()->query("SELECT * FROM tmp_notifications WHERE id_notif=".$id,__CLASS__,true);
    }


}
