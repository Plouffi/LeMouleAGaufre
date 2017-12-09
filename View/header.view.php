<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Example</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!--If you need to include some files (css, js), do it below-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Ressources/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Ressources/css/styleMain.css">


</head>
<body>
<header>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#"><img src="../Ressources/img/logoGITpetit.png" class="img-responsive"></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="#">Ressources</a></li>
                    <?php
                        if(!isset($_SESSION['Id'])) {
                            session_start();
                        }
                        //Checking if an user is log in
                        if(isset($_SESSION['Id'])){
                            //Checking his role
                            if($_SESSION['Role'] == "professeur"){
                                //If the user is a teacher, we add a button to view his classes
                                echo '<li><a href="../Controler/viewClasses.ctrl.php">Mes classes</a></li>';
                            } else {
                                //If the user is a student, we add a button to go to the quizz
                                echo '<li><a href="../View/quizz.view.php">Quizz</a></li>';
                            }
                        }
                    ?>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php if(isset($_SESSION['Id'])){ echo $_SESSION['Nom'].' '. $_SESSION['Prenom']; } else { echo "Nom Prénom"; }?></a></li>
                    <?php
                    //We change the login button state if a user is log in or not
                    if(!isset($_SESSION['Id'])){
                        echo '<li><a href="../View/login.view.php"><span class="glyphicon glyphicon-log-in"></span> Connexion</a></li>';
                    } else {
                        echo '<li><a href="../Controler/logout.ctrl.php"><span class="glyphicon glyphicon-log-out"></span> Déconnexion</a></li>';
                    }
                    ?>

                </ul>
            </div>
        </div>
    </nav>
</header>


<!-- Body and html balise are closed in footer.view.php file-->
