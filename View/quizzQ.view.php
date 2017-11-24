<?php
session_start();
include('../Controler/quizzScript.ctrl.php');
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
            <div class="nav-tabs collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <!-- Les labels indiquent le nombre de questions répondus par domaine-->
                    <?php
                    foreach ($_SESSION['quizz']['domains'] as $key => $value) {
                        $domain = $value[0]['domain']; // Récupère le numéro du domaine
                        $nbQ = sizeof($value); // Récupère le nombre de questions
                        if ($domain == 1) {
                            echo('<li class="active"><a href="#domain' . $domain . '">Domaine ' . $domain . '<span class="label label-success"><b>0</b>/' . $nbQ . '</span></a></li>');
                        } else {
                            echo('<li><a href="#domain' . $domain . '">Domaine ' . $domain . '<span class="label label-success"><b>0</b>/' . $nbQ . '</span></a></li>');
                        }
                    }
                    ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a><span class="glyphicon glyphicon-user"></span> Nom Prénom</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<?php

/* Traitement des questions */
echo('<form id="formQuizz" action="quizzA.view.php" target="_blank" method="POST"><div class="tab-content form-group">');
//print_r(json_encode($_SESSION['quizz']));
foreach ($_SESSION['quizz']['domains'] as $key => $value) {
    $domain = $value[0]['domain'];
    if ($domain == 1) { // Premier domaine actif par défaut
        echo('<div class="tab-pane fade in active" id="domain' . $domain . '">');
    } else {
        echo('<div class="tab-pane fade in" id="domain' . $domain . '">');
    }
    echo('<h1>' . $_SESSION['domainsNames'][$value[0]['domain'] - 1] . '</h1>');
    foreach ($value as $k => $v) {
        if (sizeof($v['answer']) > 1) {
            echo('<div  class="panel panel-primary"><div class="panel-heading">' . $v['question'] . ' (Plusieurs réponses possibles)</div>');
        } else {
            echo('<div  class="panel panel-primary"><div class="panel-heading">' . $v['question'] . '</div>');
        }
        foreach ($v['options'] as $q => $r) {
            $id = $v['id'] . '.' . $q;
            //echo('<div class="checkbox"><label for="' . $id . '"><input type="checkbox" name="' . $id . '" value="' . $id . '" id="' . $id . '"><span class="cr"><i class="cr-icon fa fa-check"></i></span>' . $r . '</label></div>');
            if (in_array($q, $v['answer'])) {
                echo('<div class="checkbox"><label for="' . $id . '"><input checked type="checkbox" name="' . $id . '" value="' . $id . '" id="' . $id . '"><span class="cr"><i class="cr-icon fa fa-check"></i></span>' . $r . '</label></div>');
            } else {
                echo('<div class="checkbox"><label for="' . $id . '"><input type="checkbox" name="' . $id . '" value="' . $id . '" id="' . $id . '"><span class="cr"><i class="cr-icon fa fa-check"></i></span>' . $r . '</label></div>');
            }
        }
        echo('</div>');
    }
    echo('</div>');
}
echo('<input type="checkbox" name="sub" value="sub" checked style="display:none;">');
echo('</div></form>');
echo(' <button id="val" class="btn btn-success btn-lg btn-block" style="display: block">Valider le questionnaire</button>');

?>
<!-- Message d'alerte si l'utilisateur essaye de valider alors qu'il n'a pas répondu à toutes les questions -->
<div class="modal fade" id="warning" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Attention</h4>
            </div>
            <div class="modal-body">
                <p>Merci de répondre à toutes les questions avant de valider le questionnaire</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
            </div>
        </div>

    </div>
</div>
<!-- Sinon, on demande s'il veut vraiment valider le questionnaire -->
<div class="modal fade" id="validQuest" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Validation</h4>
            </div>
            <div class="modal-body">
                <p>Voulez-vous vraiment valider les réponses ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="valider">Valider</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
            </div>
        </div>

    </div>
</div>

<?php

include_once("../View/footer.view.php");
?>