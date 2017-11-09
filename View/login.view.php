<!DOCTYPE html>
<html>
 <head>
    <title>Example</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../Ressources/css/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

</head>
    
<?php

     if(isset($_POST["send"])){
            $form = array();
            if(!empty($_POST["email"]) && !empty($_POST["MotDePasse"])){
                $form["email"] = addSlashes($_POST["email"]);
                $form["MotDePasse"] = md5(addSlashes($_POST["MotDePasse"]));
            }
            else{
                $form ="";
            }
            if(!empty($form)){
                //faire une recherche dans la base de donnée
                /*$info = $connexion->query('SELECT email, MotDePasse FROM client');
                $client = $info->fetchAll(PDO::FETCH_ASSOC);
                $test = false;
                foreach($client as $val){
                    $mdp= md5(addSlashes($_POST["MotDePasse"]));
                    if($val["email"] == $_POST["email"] && $val["MotDePasse"] == $mdp){ //recherche correspondance mot de passe/email
                        //ouvrir une session
                        $test = true;
                        session_start();
                        $_SESSION['email'] = $_POST["email"];
                        $mail = $_POST["email"];
                        //On doit récupérer toute les infos du client depuis la base de donnée
                        $info = $connexion->query("SELECT id_client, civilite, nom, prenom, email, mdp FROM client WHERE email = '$mail'");
                        $client = $info->fetchAll(PDO::FETCH_ASSOC);
                        foreach($client as $val){
                            $_SESSION['Mdp'] = $val['mdp'];
                            $_SESSION['id'] = $val['id_client'];
                            $_SESSION['nom'] = $val['nom'];
                            $_SESSION['prenom'] = $val['prenom'];
                            $_SESSION['civilite'] = $val['civilite'];
                        }
                        header ("location: index.php");
                    }
                }*/
            }
            if($test == false){
                echo "<script>";
                echo "alert('Le mot de passe ou l identifiant est incorrect !')";
                echo "</script>";
            }

        }
    }
?>
    
    <?php
        require 'header.view.php';
    ?>

<body>
<!-- DEBUT de la page -->

    <section id="main">
        <section id="formulaire">

                <section class="titre">
                    <h2>Identification</h2>
                </section>
                <form method="post" action="login.view.php" id="formulaire">
                    <p>
                        <label for="id">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </label>
                        <input id="remplir" type="texte" name="email" placeholder="Identifiant ou Email" value=""  />
                    </p>
                    <p>
                        <label for="MotDePasse">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </label>
                        <input id="remplir" type="password" placeholder="Mot de passe" name="MotDePasse" value=""  />
                    </p>
                    <p id="send">
                        <input id="send" type="submit" value="Valider" name="send" />
                    </p>
                </form> 
                <a href="create_account.view.php">Créer un compte</a>
        </section>
    </section>

</body>
    <?php
        require('footer.view.php');
    ?>
</html>