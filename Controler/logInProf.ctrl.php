<?php

    //Include required files below
    require_once ('../Model/Class/Professeur.class.php');
    require_once ('../Model/DAO/ProfesseurDAO.class.php');
    //List of academic mail label
    $allSourceMail = array("univ-lr.fr");
    //Data config
    $config = parse_ini_file('../Config/config.ini');

    ///////////////////////////////////
    //1st step: Get back data from view
    ///////////////////////////////////

    //We check if the have a email and password in the POST_ array (from the html form)
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $sourceMail = substr($email, strpos($email,'@')+strlen('@'));
        if(!in_array($sourceMail, $allSourceMail)){
            $error = "Erreur: L'email n'est pas reconnu pas notre service.";
        }

    } else {
        //If not, we create a variable error
        $error = "Erreur: L'email a été perdue dans la requête.";
    }

    if (isset($_POST['password'])) {
        $motDePasse = md5(addSlashes($_POST['password']));
    } else {
        //If not, we create a variable error
        $error = "Erreur: Le MotDePasse a été perdue dans la requête.";
    }
    /////////////////////////
    //2nd step: Handling data
    /////////////////////////

    if (!isset($error)) {
        $professeurs = new ProfesseurDAO($config["databasepath"]);
        $logInInfo = $professeurs->getLogInInfo($email)[0];
        if($logInInfo['Mail'] == $email && $logInInfo["MotDePasse"] == $motDePasse){
            //Initialize session
            session_start();
            $infoProfesseur = $professeurs->getInfoSessionProfesseur($email)[0];
            $_SESSION['Id'] = $infoProfesseur['Id'];
            $_SESSION['Nom'] = $infoProfesseur['Nom'];
            $_SESSION['Prenom'] = $infoProfesseur['Prenom'];
            $_SESSION['Mail'] = $email;
            $_SESSION['Role'] = "professeur";
        } else {
            //Wrong password or email
            $error = "Erreur: L'email ou mot de passe incorrect.";
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
        //We redirect on the main view of the professor if the authentification succeed
        include("../View/classeProfesseur.view.php");
    }
?>