<!DOCTYPE html>
<html>
 <head>
	<title>Example</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../Ressources/css/style.css" rel="stylesheet" type="text/css" />
     <link href="../Ressources/css/MediaQueries/MediaQueries.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

</head>

<?php
    require('header.view.php');

     if(isset($_POST["send"])){
            $form = array();
            if(!empty($_POST["email"]) && !empty($_POST["MotDePasse"]) && !empty($_POST["Civilite"]) && !empty($_POST["Nom"]) && !empty($_POST["Prenom"]) && !empty($_POST["Adresse"]) && !empty($_POST["CodePostale"]) && !empty($_POST["Pays"]) && !empty($_POST["Telephone"])){
                $form["email"] = addSlashes($_POST["email"]);
                $form["MotDePasse"] = md5(addSlashes($_POST["MotDePasse"])); //md5 type encodage du mot de passe, ici on décode le mot de passe
                $form["Civilite"] = addSlashes($_POST["Civilite"]);
                $form["Nom"] = addSlashes($_POST["Nom"]);
                $form["Prenom"] = addSlashes($_POST["Prenom"]);
                $form["Adresse"] = addSlashes($_POST["Adresse"]);
                $form["CodePostale"] = addSlashes($_POST["CodePostale"]);
                $form["Pays"] = addSlashes($_POST["Pays"]);
                $form["Telephone"] = addSlashes($_POST["Telephone"]);
            }
            else{
                $form ="";
            }
            if(!empty($form)){
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
                if(preg_match("#^[A-Z][a-z][0-9]{.}[A-Z][a-z][0-9]{@ac-poitier.fr}$#", $_POST["email"])){
                    //insérer les infos dans la base de donnée si regex ok
                    //si ok rediriger le client vers page accueil
                    header('Location: ../index.php');
                }
            }
        }
    }
?>
    
<body>
<!-- DEBUT de la page -->
                
	<section id="main">		 
        <section id="formulaire">
            
            <section class="titre">
                <h2>Creer compte</h2>
            </section>
            <form method="post" action="create_account.view.php" id="formulaire">
                <p>
                    <label for="Email">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </label>
                    <input id="remplir" type="mail" name="email" value="" placeholder="Email"  required/>
                </p>
                <p>
                    <label for="MotDePasse">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </label>
                    <input id="remplir" type="password" name="MotDePasse" value="" placeholder="Mot de passe"  required/>
                </p>
                <p>
                    <label for="Civilite">
                        <i class="fa fa-venus-mars" aria-hidden="true"></i>
                    </label>
                    <select name="Civilite" id="civilite" >
                        <option value="Mr">Mr</option>
                        <option value="Mme">Mme</option>
                    </select>
                </p>
                <p>
                    <label for="Nom">
                        <i class="fa  fa-user" aria-hidden="true"></i>
                    </label>
                    <input id="remplir" type="texte" name="Nom" value="" placeholder="Nom"  required/>
                </p>
                <p>
                    <label for="Prenom">
                        <i class="fa  fa-user-plus" aria-hidden="true"></i>
                    </label>
                    <input id="remplir" type="texte" name="Prenom" value="" placeholder="Prénom"  required/>
                </p>
                <p>
                    <label for="Adresse">
                        <i class="fa fa-address-book" aria-hidden="true"></i>
                    </label>
                    <input id="remplir" type="texte" name="Adresse" value="" placeholder="Adresse"  required/>
                </p>
                <p>
                    <label for="CodePostale">
                        <i class="fa fa-address-book" aria-hidden="true"></i>
                    </label>
                    <input id="remplir" type="number" name="CodePostale" value="Code postale" placeholder="17000" required/>
                </p>
                <p>
                    <label for="Ville">
                        <i class="fa fa-address-book" aria-hidden="true"></i>
                    </label>
                    <input id="remplir" type="texte" name="Ville" value="" placeholder="Ville" required/>
                </p>
                <p>
                    <label for="Pays">
                        <i class="fa fa-address-book" aria-hidden="true"></i>
                    </label>
                    <input id="remplir" type="texte" name="Pays" id="Pays"  value="" placeholder="Pays" required />
                </p>
                <p>
                    <label for="Telephone">
                        <i class="fa  fa-phone" aria-hidden="true"></i>
                    </label>
                    <input id="remplir" type="number" name="Telephone" value="" placeholder="0612345678"  required/>
                </p>
                <p id="send">
                    <input id="send" type="submit" value="Envoyer" name="send" />
                </p>
            </form>                
        </section>
    </section>	

</body>
    <?php
        require('footer.view.php');
    ?>
</html>