<?php
/* Récupération et réorganisation des questions */
$json = file_get_contents("../Ressources/quizz.json");
$quizz = (json_decode($json, true));
$quizz = $quizz['quizz']['questions'];
asort($quizz);

//On réorganise les questions par domaine
$tmp = array("domains" => array(array(), array(), array(), array(), array()));

foreach ($quizz as $key => $value) {
    array_push($tmp["domains"][$value['domain'] - 1], $value);
}
$quizz = $tmp;
?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <title>Quizz</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!--If you need to include some files (css, js), do it below-->
        <link rel="stylesheet" type="text/css" href="../Ressources/styleQuizz.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

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

                    foreach ($quizz['domains'] as $key => $value) {
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
<!-- Body and html balise are closed in footer.view.php file-->


<?php


/* Traitement des questions */
echo('<form><div class="tab-content form-group">');

foreach ($quizz['domains'] as $key => $value) {
    $domain = $value[0]['domain'];
    if ($domain == 1) {
        echo('<div class="tab-pane fade in active" id="domain' . $domain . '">');
    } else {
        echo('<div class="tab-pane fade in" id="domain' . $domain . '">');
    }
    echo('<h1>Domaine ' . $domain . '</h1>');
    //echo('<div class="progress"><div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">70%</div></div>');
    shuffle($value);
    foreach ($value as $k => $v) {
        echo('<div  class="panel panel-default"><div class="panel-heading">' . $v['question'] . '</div>');
        shuffle_assoc($v['options']);
        foreach ($v['options'] as $q => $r) {
            $id = $v['id'] . '.' . $q;
            if (in_array($q, $v['answer'])) {
                echo('<div class="checkbox"><label for="' . $id . '"><input type="checkbox" id="' . $id . '" checked><span class="cr"><i class="cr-icon fa fa-check"></i></span>
            ' . $r . '</label></div>');
            } else {
                echo('<div class="checkbox"><label for="' . $id . '"><input type="checkbox" id="' . $id . '"><span class="cr"><i class="cr-icon fa fa-check"></i></span>
            ' . $r . '</label></div>');
            }
        }
        echo('</div>');
    }
    echo('</div>');
}


echo(' <button type="submit" id="submit" class="btn btn-success disabled btn-lg btn-block">Valider le questionnaire</button>');
echo('</div></form>');

function shuffle_assoc(&$array)
{
    $keys = array_keys($array);

    shuffle($keys);

    foreach ($keys as $key) {
        $new[$key] = $array[$key];
    }

    $array = $new;

    return true;
}

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
                <p>Merci de répondre à toutes les questions pour valider le questionaire.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
            </div>
        </div>

    </div>
</div>
<script>
    $(document).ready(function () {
        $("#submit").click(function () {
            if ($(this).hasClass('disabled')) {
                $('html, body').animate({scrollTop: 0});
                $("#warning").modal();
            }
        });
    });
    $(document).ready(function () {
        $(".nav-tabs a").click(function () {
            $(this).tab('show');
            $('html, body').animate({scrollTop: 0});
        });
    });
</script>
<?php

include_once("../View/footer.view.php");
?>