

<?php

if (isset($_POST["send"])) {
    $form = array();
    if (!empty($_POST["email"]) && !empty($_POST["MotDePasse"])) {
        $form["email"] = addSlashes($_POST["email"]);
        $form["MotDePasse"] = md5(addSlashes($_POST["MotDePasse"]));
    } else {
        $form = "";
    }
    if (!empty($form)) {
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
    if ($test == false) {
        echo "<script>";
        echo "alert('Le mot de passe ou l identifiant est incorrect !')";
        echo "</script>";
    }


}
?>

<?php
require 'header.view.php';
?>

    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Identification</h2>
            </div>
        <form method="post" action="login.view.php" id="formulaire">
            <br>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input id="email" type="text" class="form-control" name="email" placeholder="Email">
            </div>
            <br>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input id="password" type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <br>
            <div class="block-center">
                <input id="send" type="submit" value="Valider" name="send"/>
            </div>
        </form>
        <a href="create_account.view.php">Créer un compte</a>
    </div>
    </div>

<?php
require('footer.view.php');
?>