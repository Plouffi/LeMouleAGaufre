<?php


class Professeur{

    private $id;
    private $nom;
    private $prenom;
    private $mail;
    private $mot_de_passe;

    function __construct($id,$nom, $prenom, $mail, $mot_de_passe){
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mail = $mail;
        $this->mot_de_passe = $$mot_de_passe;
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

    public function getmot_de_passe(){
        return $this->mot_de_passe;
    }
    public function setmot_de_passe($mot_de_passe){
        $this->mot_de_passe = $mot_de_passe;
    }

}