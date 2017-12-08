<?php

class ClasseDAO{
    private $db;

    // Constructeur chargé d'ouvrir la BD
    function __construct($path){
        $database = 'sqlite:'.$path;
        try{
            $this->db = new PDO($database);
            $this->db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
        } catch (PDOException $error){
            die($error->getMessage());
        }
    }

    function insertClasse($IdClasse, $idProf, $niveau,$nomClasse){
        $query = "INSERT INTO Classe VALUES ('$IdClasse', $idProf,'$niveau', '$nomClasse')";
        $statement = $this->db->query($query);
        if ($statement) {
            $statement->fetchAll();
        } else {
            die('Error writing on insertClasse():' +$statement);
        }
    }
    function getNbClasse($idProf){
        $query = "SELECT count(*) FROM Classe WHERE idProf='$idProf'";
        $statement = $this->db->query($query);
        if($statement){
            $result = $statement->fetchAll();
            return $result;
        } else {
            die('Error reading on getNbClasse():'+$statement);
        }
    }
    function getAllClasseProf($idProf){
        $query = "SELECT * FROM Classe WHERE idProf='$idProf'";
        $statement = $this->db->query($query);
        if($statement){
            $result = $statement->fetchAll();
            return $result;
        } else {
            die('Error reading on getAllClasseProf():'+$statement);
        }
    }
}