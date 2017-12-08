<?php


class Eleve{

    private $id;
    private $nom;
    private $prenom;
    private $idClasse;
    private $motDePasse;
    private $essai;

    function __construct($id, $nom, $prenom,$idClasse,$motDePasse, $essai){
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->idClasse = $idClasse;
        $this->motDePasse = $motDePasse;
        $this->essai = $essai;
    }

    public function getId(){
        return $this->id;
    }
    public function setId($nom){
        $this->nom = $id;
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

    public function getIdClasse(){
        return $this->idClasse;
    }
    public function setIdClasse($idClasse){
        $this->idClasse = $idClasse;
    }

    public function getMotDePasse(){
        return $this->motDePasse;
    }
    public function setMotDePasse($motDePasse){
        $this->motDePasse = $motDePasse;
    }

    public function getEssai(){
        return $this->essai;
    }
    public function setEssai($essai){
        $this->essai = $essai;
    }

}