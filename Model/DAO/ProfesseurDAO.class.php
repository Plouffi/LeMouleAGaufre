<?php

class ProfesseurDAO{
    private $db;

    // Constructeur chargé d'ouvrir la BD
    function __construct($path){
        $database = 'sqlite:'.$path;
        try{
            $this->db = new PDO($database);
        } catch (PDOException $error){
            die($error->getMessage());
        }
    }

    function getPrenom($nom){
        $query = "SELECT prenom FROM Professeur WHERE nom='$nom'";
        $statement = $this->db->query($query);
        if($statement){
            $result = $statement->fetchAll();
            return $result;
        } else {
            die('Error reading on getPrenom():'+$statement);
        }
    }

    function getNom($prenom){
        $query = "SELECT nom FROM Professeur WHERE prenom='$prenom'";
        $statement = $this->db->query($query);
        if($statement){
            $result = $statement->fetchAll();
            return $result;
        } else {
            die('Error reading on getNom():'+$statement);
        }
    }

    function getMail($id){
        $query = "SELECT mail FROM Professeur WHERE id='$id'";
        $statement = $this->db->query($query);
        if($statement){
            $result = $statement->fetchAll();
            return $result;
        } else {
            die('Error reading on getMail():'+$statement);
        }
    }
}