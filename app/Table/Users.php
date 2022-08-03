<?php
namespace App\Table;
use App\App;

class Users extends Table
{
    private $id_user;
    private $nom;
    private $prenom;
    private $mail;
    private $level;
    private $tel;
    private $salaire;
    private $psw;

    public function getIdUser() {
        return $this->id_user;
    }
    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom($nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom): self
    {
        $this->prenom = $prenom;
        return $this;
    }
    public function getEmail()
    {
        return $this->mail;
    }

    public function setEmail($mail): self
    {
        $this->mail = $mail;
        return $this;
    }

    public function getLevel()
    {
        return $this->level;
    }

    public function setLevel($level): self
    {
        $this->level = $level;
        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel($tel): self
    {
        $this->tel = $tel;
        return $this;
    }

    public function getSalaire(): ?string
    {
        return $this->salaire;
    }

    public function setSalaire($salaire): self
    {
        $this->salaire = $salaire;
        return $this;
    }

    public function getPsw(): ?string
    {
        return $this->psw;
    }

    public function setPsw($psw): self
    {
        $this->psw = $psw;
        return $this;
    }

    public static function findByEmail($mail) {
        return App::getDb()->query('SELECT * FROM `tmp_users` WHERE mail LIKE ("'.$mail.'");',  __CLASS__, true);
    }

    public static function findByUserId($id_user)
    {
        return App::getDb()->query(
            'SELECT `id_user`, `nom`, `prenom`, `mail`, `level`, `tel`, `salaire`, `psw` FROM `tmp_users` WHERE `id_user`=' .
                $id_user,
            __CLASS__,
            true
        );
    }

    public static function listUsers(): ?array
    {
        $sql =
            'SELECT `id_user`, `nom`, `prenom`, `mail`, `level`, `tel`, `salaire`, `psw` FROM `tmp_users`';
        return App::getDb()->query($sql);
    }
    public static function list_utilisateur(){		
		$sql ="SELECT * FROM tmp_users WHERE level = '2'";
        return App::getDb()->query($sql);
	}	

    public static function updateUserInfo($id_user,$nom,$prenom,$mail,$level,$tel,$salaire,$psw) 
    {
        $user = Users::findByUserId($id_user);
        App::getDb()->query('UPDATE `tmp_users` 
            SET `nom`="'.strtoupper($nom).'",`prenom`="'.$prenom.'",`mail`="'.$mail.'",`level`="'.$level.'",`tel`="'.$tel.'",`salaire`="'.$salaire.'",`psw`="'.md5($psw).'" 
            WHERE id_user = "'.$user->id_user.'"');
    }

    public static function addUsers($nom,$prenom,$mail,$level,$tel,$salaire,$psw){
        
         App::getDb()->query('INSERT INTO `tmp_users`(`nom`, `prenom`, `mail`, `level`, `tel`, `salaire`, `psw`) 
        VALUES ("'.strtoupper($nom).'","'.$prenom.'","'.$mail.'","'.$level.'","'.$tel.'","'.$salaire.'","'.md5($psw).'")');
    }

    public static function deleteUsers($id_user) {
        App::getDb()->query('DELETE  FROM tmp_users WHERE id_user="'.$id_user.'"');
    }
    
    public static function getSalaireById($id_user) 
    { 
       return App::getDb()->query("SELECT salaire FROM tmp_users WHERE id_user = '$id_user'");
    }

}
