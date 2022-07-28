<?php
namespace App\Classe;

class User extends Classe{

    private $nom;
    private $prenom;
    private $email;
    private $level;
    private $tel;
    private $salaire;
    private $password;

    
    public function __construct() {}

    /**
     *
     * @return string|null
     */
    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom($nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail($email): self
    {
        $this->email = $email;
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
        $this->tel= $tel;
        return $this;
    }

    public function getSalaire(): ?string
    {
        return $this->salaire;
    }

    public function setSalaire($salaire): self
    {
        $this->salaire= $salaire;
        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword($password): self
    {
        $this->password= $password;
        return $this;
    }

    public static function listUsers(): ?array
    {
        
    }
 


}