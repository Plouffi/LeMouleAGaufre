<?php


if (isset($_POST["send"])) {
    $form = array();
    if (!empty($_POST["email"]) && !empty($_POST["MotDePasse"]) && !empty($_POST["Civilite"]) && !empty($_POST["Nom"]) && !empty($_POST["Prenom"]) && !empty($_POST["Adresse"]) && !empty($_POST["CodePostale"]) && !empty($_POST["Pays"]) && !empty($_POST["Telephone"])) {
        $form["email"] = addSlashes($_POST["email"]);
        $form["MotDePasse"] = md5(addSlashes($_POST["MotDePasse"])); //md5 type encodage du mot de passe, ici on décode le mot de passe
        $form["Civilite"] = addSlashes($_POST["Civilite"]);
        $form["Nom"] = addSlashes($_POST["Nom"]);
        $form["Prenom"] = addSlashes($_POST["Prenom"]);
        $form["Adresse"] = addSlashes($_POST["Adresse"]);
        $form["CodePostale"] = addSlashes($_POST["CodePostale"]);
        $form["Pays"] = addSlashes($_POST["Pays"]);
        $form["Telephone"] = addSlashes($_POST["Telephone"]);
    } else {
        $form = "";
    }
    if (!empty($form)) {
        $email = $form["email"];
        $MotDePasse = $form["MotDePasse"];
        $Civilite = $form["Civilite"];
        $Nom = $form["Nom"];
        $Prenom = $form["Prenom"];
        $Adresse = $form["Adresse"];
        $CodePostale = $form["CodePostale"];
        $Pays = $form["Pays"];
        $Telephone = $form["Telphone"];
        //faire une regex pour la verification de l'email
        if (preg_match("#^[A-Z][a-z][0-9]{.}[A-Z][a-z][0-9]{@ac-poitier.fr}$#", $_POST["email"])) {
            //insérer les infos dans la base de donnée si regex ok
            //si ok rediriger le client vers page accueil
            header('Location: ../index.php');
        }
    }
}
require('header.view.php');
?>

    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Creer compte</h2>
            </div>

            <form method="post" action="create_account.view.php" id="formulaire">
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
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input id="remplir" type="texte" class="form-control" name="Nom" value="" placeholder="Nom" required/>
                </div>
                <br>
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input id="remplir" type="texte" class="form-control" name="Prenom" value="" placeholder="Prenom" required/>
                </div>
                <br>
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                  <input id="remplir" type="texte" class="form-control" name="Ville" value="" placeholder="Ville" required/>
                </div>
                <br>
                <div class="block-center">
                    <input id="send" type="submit" value="Valider" name="send"/>
                </div>
                <br>
            </form>
        </div>
</div>


<?php
require('footer.view.php');
?>
</html>