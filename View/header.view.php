<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Example</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../Ressources/css/MediaQueries/MediaQueries.css" rel="stylesheet" type="text/css" />
        <link href="../Ressources/css/style.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

    <!--If you need to include some files (css, js), do it below-->

    </head>

        <body>
            <header>
                <a href="../index.php"><img src="img/greenIt.jpg"></a>
                <nav id="menu-categorie">
                    <ul>
                        <li class="smenu"><a href="#">Accueil<i class="fa fa-chevron-down"></i></a></li>
                        <li class="smenu"><a href="#">Quiz<i class="fa fa-chevron-down"></i></a></li>
                    </ul>
                </nav>  
                    <?php 
                        session_start(); 
                        if(isset($_SESSION['id']) && isset($_SESSION['civilite']) && isset($_SESSION['nom']) && isset($_SESSION['prenom'])){
                            if(!empty($_SESSION['id']) && !empty($_SESSION['civilite']) && !empty($_SESSION['nom']) && !empty($_SESSION['prenom'])){
            ?>
                            <nav id="connexion">
                                <a href="#" id="connexion"><?php echo $_SESSION['civilite'].' '.$_SESSION['nom'];?>  <!-- href="my_account.view.php"-->
                                    <i class="fa fa-user"></i>
                                </a>
                            </nav>
                    <?php
                            }
                        }
                        else{ ?>
                            <nav id="connexion">
                                <a href="login.view.php" id="connexion">Connexion 
                                    <i class="fa fa-power-off"></i>
                                </a>
                            </nav>
                    <?php
                        }
                    ?>
            </header>
        </body>
</html>
    <!-- Body and html balise are closed in footer.view.php file-->
