<?php


class Eleve{

    private $nom;
    private $prenom;
    private $id_classe;
    private $mot_de_passe;

    function __construct($nom, $prenom,$id_classe,$mot_de_passe){
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->id_classe = $id_classe;
        $this->mot_de_passe = $mot_de_passe;
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

    public function getId_classe(){
        return $this->id_classe;
    }
    public function setId_classe($id_classe){
        $this->id_classe = $id_classe;
    }

    public function getMot_de_passe(){
        return $this->mot_de_passe;
    }
    public function setMot_de_passe($mot_de_passe){
        $this->mot_de_passe = $mot_de_passe;
    }

}