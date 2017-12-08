<?php

    //Include required files below
    require_once ('../Model/Class/Eleve.class.php');
    require_once ('../Model/DAO/EleveDAO.class.php');
    //Data config
    $config = parse_ini_file('../Config/config.ini');

    ///////////////////////////////////
    //1st step: Get back data from view
    ///////////////////////////////////
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

    } else {
        //If not, we create a variable error
        $error = "Erreur: L'id a été perdue dans la requête.";
    }

    if (isset($_POST['password'])) {
        $motDePasse = $_POST['password'];
    } else {
        //If not, we create a variable error
        $error = "Erreur: Le MotDePasse a été perdue dans la requête.";
    }
    /////////////////////////
    //2nd step: Handling data
    /////////////////////////

    if (!isset($error)) {
        $eleves = new EleveDAO($config["databasepath"]);
        $logInInfo = $eleves->getLogInInfo($id)[0];
        if($logInInfo['Id'] == $id && $logInInfo["MotDePasse"] == $motDePasse){
            //Initialize session
            session_start();
            $infoEleve= $eleves->getInfoSessionEleve($id)[0];
            $_SESSION['Id'] = $id;
            $_SESSION['Nom'] = $infoEleve['Nom'];
            $_SESSION['Prenom'] = $infoEleve['Prenom'];
            $_SESSION['Role'] = "eleve";
        } else {
            //Wrong password or email
            $error = "Erreur: L'id ou mot de passe incorrect.";
        }
    }

    ////////////////////////////
    //3rd step: Return the view
    ////////////////////////////

    //Depending on the data valeur, we include the corresponding view
    if (isset($error)) {
        $data['error'] = $error;
        include ("../View/error.view.php");
    } else {

        include("../View/mainExample.view.php");
    }
?>