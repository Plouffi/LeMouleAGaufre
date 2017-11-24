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
        $sourceMail = substr($email, '@');
        if(!in_array($sourceMail, $allSourceMail)){
            $error = "Erreur: L'email n'est pas reconnu pas notre service.";
        }
    } else {
        //If not, we create a variable error
        $error = "Erreur: L'email a été perdue dans la requête.";
    }

    if (isset($_POST['MotDePasse'])) {
        $motDePasse = md5(addSlashes($_POST['MotDePasse']));
    } else {
        //If not, we create a variable error
        $error = "Erreur: Le MotDePasse a été perdue dans la requête.";
    }
    /////////////////////////
    //2nd step: Handling data
    /////////////////////////

    if (!isset($error)) {
        $professeurs = new ProfesseurDAO($config["databasepath"]);
        $logInInfo = $professeurs->getLogInInfo();
        if($logInInfo['Mail'] == $email && md5(addSlashes($logInInfo["MotDePasse"])) == $motDePasse){
            //Initialize session
            session_start();
            $infoProfesseur = $personnes->getInfoSessionProfesseur();
            $_SESSION['id'] = $infoProfesseur['Id'];
            $_SESSION['nom'] = $infoProfesseur['Nom'];
            $_SESSION['prenom'] = $infoProfesseur['Prenom'];
            $_SESSION['mail'] = $email;
            $_SESSION['role'] = "professeur";
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
    } else {
        //We redirect on the main view of the professor if the authentification succeed
        include ("../View/mainProfesseur.view.php");
    }
?>