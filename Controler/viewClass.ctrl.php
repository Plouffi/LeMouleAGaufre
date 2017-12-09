<?php
/**
 * Created by PhpStorm.
 * User: Plouffi
 * Date: 23/11/2017
 * Time: 15:14
 */

    //Include required files below
    require_once ('../Model/Class/Eleve.class.php');
    require_once ('../Model/DAO/EleveDAO.class.php');
    require_once ('../Model/Class/Classe.class.php');
    require_once ('../Model/DAO/ClasseDAO.class.php');

    //Data config
    $config = parse_ini_file('../Config/config.ini');
    session_start();
    ///////////////////////////////////
    //1st step: Get back data from view
    ///////////////////////////////////
    if (isset($_GET['idClasse'])) {
        $idClasse = $_GET['idClasse'];
    } else {
        //If not, we create a variable error
        $error = "Erreur: L'id de la classe a été perdue dans la requête.";
    }

    if(isset($_SESSION['Id'])){
        if ($_SESSION['Role'] != "professeur") {
            $error = "Erreur: Vous n'avez pas accès à cette ressource.";
        }
    }

    /////////////////////////
    //2nd step: Handling data
    /////////////////////////

    if (!isset($error)) {
        $eleves = new EleveDAO($config["databasepath"]);
        $elevesClasse = $eleves->getEleveFromIdClasse($idClasse);

        $classes = new ClasseDAO($config["databasepath"]);
        $classe = $classes->getClasseFromId($idClasse)[0];
    }

    ////////////////////////////
    //3rd step: Return the view
    ////////////////////////////

    //Depending on the data valeur, we include the corresponding view
    if (isset($error)) {
        include ("../View/error.view.php");
    } else {
        //We create an assosiative array to gather data in a unique place
        $data['eleves'] = $elevesClasse;
        $data['classe'] = $classe;
        include("../View/detailClasse.view.php");
    }
?>