<?php

class PersonneDAO{
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
        $query = "SELECT prenom FROM Personne WHERE nom='$nom'";
        $statement = $this->db->query($query);
        if($statement){
            $result = $statement->fetchAll();
            return $result;
        } else {
            die('Error reading on getPrenom():'+$statement);
        }
    }
}