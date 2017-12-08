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

    function getPrenom($id){
        $query = "SELECT Prenom FROM Professeur WHERE id='$id'";
        $statement = $this->db->query($query);
        if($statement){
            $result = $statement->fetchAll();
            return $result;
        } else {
            die('Error reading on getPrenom():'+$statement);
        }
    }

    function getNom($id){
        $query = "SELECT Nom FROM Professeur WHERE id='$id'";
        $statement = $this->db->query($query);
        if($statement){
            $result = $statement->fetchAll();
            return $result;
        } else {
            die('Error reading on getNom():'+$statement);
        }
    }

    function getMail($id){
        $query = "SELECT Mail FROM Professeur WHERE id='$id'";
        $statement = $this->db->query($query);
        if($statement){
            $result = $statement->fetchAll();
            return $result;
        } else {
            die('Error reading on getMail():'+$statement);
        }
    }

    function getLogInInfo($mail){
        $query = "SELECT MotDePasse, Mail FROM Professeur WHERE Mail='$mail'";
        $statement = $this->db->query($query);
        if($statement){
            $result = $statement->fetchAll();
            return $result;
        } else {
            die('Error reading on getLogInInfo():'+$statement);
        }
    }

    function getInfoSessionProfesseur($mail){
        $query = "SELECT * FROM Professeur WHERE Mail='$mail'";
        $statement = $this->db->query($query);
        if($statement){
            $result = $statement->fetchAll();
            return $result;
        } else {
            die('Error reading on getInfoSessionProfesseur():'+$statement);
        }
    }
}