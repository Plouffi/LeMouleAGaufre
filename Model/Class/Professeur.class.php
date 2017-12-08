<?php


class Professeur{

    private $id;
    private $nom;
    private $prenom;
    private $mail;
    private $motDePasse;

    function __construct($id,$nom, $prenom, $mail, $motDePasse){
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mail = $mail;
        $this->motDePasse = $motDePasse;
    }

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }

    public function getNom(){
        return $this->nom;
    }
    public function setNom($nom){
        $this->nom = $nom;
    }

    public function getPrenom(){
        return $this->prenom;
    }
    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }

    public function getMail(){
        return $this->nom;
    }
    public function setMail($mail){
        $this->nom = $mail;
    }

    public function getMotDePasse(){
        return $this->motDePasse;
    }
    public function setMotDePasse($motDePasse){
        $this->motDePasse = $motDePasse;
    }

}