<?php

class EleveDAO{
    private $db;

    // Constructeur chargé d'ouvrir la BD
    function __construct($path){
        $database = 'sqlite:'.$path;
        try{
            $this->db = new PDO($database);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
        } catch (PDOException $error){
            die($error->getMessage());
        }
    }

    function getPrenom($id){
        $query = "SELECT prenom FROM Eleve WHERE id='$id'";
        $statement = $this->db->query($query);
        if($statement){
            $result = $statement->fetchAll();
            return $result;
        } else {
            die('Error reading on getPrenom():'+$statement);
        }
    }

    function getNom($id){
        $query = "SELECT nom FROM Eleve WHERE id='$id'";
        $statement = $this->db->query($query);
        if($statement){
            $result = $statement->fetchAll();
            return $result;
        } else {
            die('Error reading on getNom():'+$statement);
        }
    }

    function insertEleve($id, $nom, $prenom, $idClasse, $motDePasse, $essai){
        $query = "INSERT INTO Eleve VALUES('$id', '$nom' , '$prenom' , '$motDePasse',  '$idClasse', $essai, NULL)";
        $statement = $this->db->query($query);
        if($statement){
            $statement->fetchAll();
        } else {
            die('Error reading on getPrenom():'+$statement);
        }
    }

    function getLogInInfo($id){
        $query = "SELECT MotDePasse, Id FROM Eleve WHERE Id='$id'";
        $statement = $this->db->query($query);
        if($statement){
            $result = $statement->fetchAll();
            return $result;
        } else {
            die('Error reading on getLogInInfo():'+$statement);
        }
    }

    function getInfoSessionEleve($id){
        $query = "SELECT * FROM Eleve WHERE Id='$id'";
        $statement = $this->db->query($query);
        if($statement){
            $result = $statement->fetchAll();
            return $result;
        } else {
            die('Error reading on getInfoSessionEleve():'+$statement);
        }
    }

    function getEleveFromIdClasse($idClasse){
        $query = "SELECT * FROM Eleve WHERE IdClasse='$idClasse'";
        $statement = $this->db->query($query);
        if($statement){
            $result = $statement->fetchAll();
            return $result;
        } else {
            die('Error reading on getClasseFromIdClasse():'+$statement);
        }
    }
}