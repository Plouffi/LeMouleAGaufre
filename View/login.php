<!DOCTYPE html>
<html>
 <head>
    <title>Example</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../Ressources/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style/styleMain.css">
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

</head>
    
    <?php
        require 'header.view.php'
    ?>

<body>
<!-- DEBUT de la page -->

    <section id="container">
        <section id="login">

                <section class="titre">
                    <h2>Identification</h2>
                </section>
                <form method="post" action="login.php" id="login">
                    <p><label for="id"><i class="fa fa-envelope" aria-hidden="true"></i>
</label><input id="remplir" type="texte" name="email" placeholder="Identifiant ou Email" value=""  /></p>
                    <p><label for="MotDePasse"><i class="fa fa-unlock-alt" aria-hidden="true"></i>
</label><input id="remplir" type="password" placeholder="Mot de passe" name="MotDePasse" value=""  /></p>
                    <p id="send"><input id="send" type="submit" value="Valider" name="send" /></p>
                </form> 
                <a href="creer_compte.php">Créer un compte</a>
        </section>
    </section>

</body>
    <?php
        require('footer.view.php');
    ?>
</html>