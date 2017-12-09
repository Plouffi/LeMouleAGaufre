<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Quizz</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Bootstrap-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <!--Script JQuery/Bootstrap-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!--If you need to include some files (css, js), do it below-->
    <link rel="stylesheet" type="text/css" href="../Ressources/css/styleQuizz.css">
    <script src="../Ressources/js/quizzScript.js"></script>

</head>
<body class="container">
<header><!--This is header will be the navigation menu bar-->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../View/mainExample.view.php">Accueil</a></li>
                    <?php
                    if(isset($_SESSION['Id'])){
                        echo('<li><a>'.$_SESSION['Nom'].' '.$_SESSION['Prenom'].'</a></li> ');
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</header>

<form id="beginQuizz" action="quizzQ.view.php" method="POST"></form>

    <?php
        if(isset($_SESSION['Id'])){

            echo('<div class="container"><h1>Cliquer sur le bouton ci-dessous pour commencer le quizz.</h1></div><button id="begin" class="btn btn-success btn-lg btn-block">Commencer le questionnaire</button>');
        }
        else {
            echo('<div class="container"><h1>Merci de vous connecter pour accéder au quizz.</h1>');
            echo('<button id="log" class="btn btn-success btn-lg btn-block"><a href="../View/login.view.php">Se connecter</a></button></div>');
        }


    ?>




<div class="modal fade" id="beginQuizzModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Attention</h4>
            </div>
            <div class="modal-body">
                <p>Une fois le questionnaire lancé, vous avez 1h pour répondre à toutes les questions.<br>Si vous n'y
                    avez pas complètement répondu, le questionnaire sera automatiquement validé et les questions non
                    répondues seront considérées comme fausses.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="valBeginQuizz">Valider</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
            </div>
        </div>

    </div>
</div>
</body>
</html>