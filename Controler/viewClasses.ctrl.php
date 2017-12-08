<?php
/**
 * Created by PhpStorm.
 * User: Plouffi
 * Date: 23/11/2017
 * Time: 15:14
 */

    //Include required files below
    require_once ('../Model/Class/Classe.class.php');
    require_once ('../Model/DAO/ClasseDAO.class.php');
    //Data config
    $config = parse_ini_file('../Config/config.ini');
    if(!isset($_SESSION['Id'])) {
        session_start();
    }
///////////////////////////////////
//1st step: Get back data from view
///////////////////////////////////
    if($_SESSION['Role'] != "professeur"){
        $error = "Erreur: Vous n'avez pas accès à cette ressource.";
    }

/////////////////////////
//2nd step: Handling data
/////////////////////////

    if (!isset($error)) {
        $classes = new ClasseDAO($config["databasepath"]);
        $classeProf = $classes->getAllClasseProf($_SESSION['Id']);
    }

////////////////////////////
//3rd step: Return the view
////////////////////////////

    //Depending on the data valeur, we include the corresponding view
    if (isset($error)) {
        include ("../View/error.view.php");
    } else {

        $data['classes'] = $classeProf;
        include ("../View/classeProfesseur.view.php");
    }
?>