<?php

    //Include required files below
    require_once ('../Model/Class/Professeur.class.php');
    require_once ('../Model/DAO/ProfesseurDAO.class.php');
    require_once ('../Model/Class/Classe.class.php');
    require_once ('../Model/DAO/ClasseDAO.class.php');
    require_once ('../Model/Class/Eleve.class.php');
    require_once ('../Model/DAO/EleveDAO.class.php');
    //Data config
    $config = parse_ini_file('../Config/config.ini');
    session_start();

///////////////////////////////////
//1st step: Get back data from view
///////////////////////////////////

    if($_SESSION['Role'] != "professeur"){
        $error = "Erreur: Vous n'avez pas accès à cette ressource.";
    }
    //We get all info from the class form
    if (isset($_POST['nomClasse'])) {
        $nomClasse = $_POST['nomClasse'];
    } else {
        $error = "Erreur: Le nomClasse a été perdue dans la requête.";
    }

    if (isset($_POST['niveau'])) {
        $niveau = $_POST['niveau'];
    } else {
        $error = "Erreur: Le niveau a été perdue dans la requête.";
    }

    $i = 1;
    $noms = [];
    $prenom = [];
    while(isset($_POST['nom'.$i]) && isset($_POST['nom'.$i]) && !isset($error)){
        if($_POST['nom'.$i] != '' && $_POST['prenom'.$i] != ''){
            $noms[$i] = $_POST['nom'.$i];
            $prenoms[$i] = $_POST['prenom'.$i];
        } else {
            $error = "Erreur: Un nom/prenom a été perdue dans la requête.";
        }
        $i++;
    }

/////////////////////////
//2nd step: Handling data
/////////////////////////

    if (!isset($error)) {
        $nbEleve = $i;
        $i = 1;
        //Classe
        $classes = new ClasseDAO($config["databasepath"]);
        $nbClasse = $classes->getNbClasse($_SESSION['Id'])[0][0];
        $idClasse = $_SESSION['Id'].
            substr($_SESSION['Nom'],0,1).
            substr($_SESSION['Prenom'],0,1).
            ($nbClasse+1);
        $classes->insertClasse($idClasse, intval($_SESSION['Id']), $niveau, $nomClasse);
        //Eleves
        $eleves = new EleveDAO($config["databasepath"]);
        while($i < $nbEleve){
            $idEleve = $noms[$i].substr($prenoms[$i],0,2).$i;
            $password = chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)).intval( "0" . rand(1,9) . rand(0,9) . rand(0,9) . rand(0,9));
            $eleve = new Eleve($idEleve,$noms[$i],$prenoms[$i],$idClasse,$password, 0);
            $eleves->insertEleve($eleve->getId(), $eleve->getNom(), $eleve->getPrenom(), $eleve->getIdClasse(), $eleve->getMotDePasse(), $eleve->getEssai());
            $i++;
        }
        $classesProf = $classes->getAllClasseProf($_SESSION['Id'])[0];
    }

////////////////////////////
//3rd step: Return the view
////////////////////////////

    //Depending on the data valeur, we include the corresponding view
    if (isset($error)) {
        $data['error'] = $error;
        include ("../View/error.view.php");
    } else {
        $data['classes'] = $classesProf;
        include("../View/classeProfesseur.view.php");
    }
?>