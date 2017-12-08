<?php


class Classe{

    private $id;
    private $idProf;
    private $niveau;
    private $nomClasse;


    function __construct($id, $idProf, $niveau, $nomClasse){
        $this->id = $id;
        $this->idProf = $idProf;
        $this->niveau = $niveau;
        $this->nomClasse = $nomClasse;
    }

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }

    public function getIdProf(){
        return $this->id_prof;
    }
    public function setIdProf($idProf){
        $this->idProf = $idProf;
    }

    public function getNiveau(){
        return $this->niveau;
    }
    public function setNiveau($niveau){
        $this->niveau = $niveau;
    }

    public function getNomClasse(){
        return $this->nomClasse;
    }
    public function setNomClasse($nomClasse){
        $this->nomClasse = $nomClasse;
    }

}