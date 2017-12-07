<?php

class EtablissementDAO{
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

    function getNom($id){
        $query = "SELECT prenom FROM Etablissement WHERE id='$id'";
        $statement = $this->db->query($query);
        if($statement){
            $result = $statement->fetchAll();
            return $result;
        } else {
            die('Error reading on getPrenom():'+$statement);
        }
    }
}