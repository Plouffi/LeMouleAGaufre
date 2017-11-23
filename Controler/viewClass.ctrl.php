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
    //Data config
    $config = parse_ini_file('../Config/config.ini');
    ///////////////////////////////////
    //1st step: Get back data from view
    ///////////////////////////////////
    if (isset($_POST['idClasse'])) {
        $idClasse = $_POST['idClasse'];
    } else {
        //If not, we create a variable error
        $error = "Erreur: L'id de la classe a été perdue dans la requête.";
    }

    if($_SESSION['role'] != "professeur"){
        $error = "Erreur: Vous n'avez pas accès à cette ressource.";
    }

    /////////////////////////
    //2nd step: Handling data
    /////////////////////////

    if (!isset($error)) {
        $eleves = new EleveDAO($config["databasepath"]);
        $classe = $eleves->getClasseFromIdCP($_SESSION['id'],$idClasse);

    }

    ////////////////////////////
    //3rd step: Return the view
    ////////////////////////////

    //Depending on the data valeur, we include the corresponding view
    if (isset($error)) {
        include ("../View/error.view.php");
    } else {
        //We create an assosiative array to gather data in a unique place
        $data['classe'] = $classe;
        include ("../View/viewclass.view.php");
    }
?>