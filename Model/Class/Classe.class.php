<?php


class Classe{

    private $id;
    private $id_prof;
    private $id_etablissement;


    function __construct($id, $id_prof,$id_etablissement){
        $this->id = $id;
        $this->id_prof = $id_prof;
        $this->id_etablissement = $id_etablissement;
    }

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }

    public function getId_prof(){
        return $this->id_prof;
    }
    public function setId_prof($id_prof){
        $this->id = $id_prof;
    }

    public function getId_etablissement(){
        return $this->id_etablissement;
    }
    public function setId_etablissement($id_etablissement){
        $this->id = $id_etablissement;
    }


}