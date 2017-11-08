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
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!--If you need to include some files (css, js), do it below-->
        <link rel="stylesheet" type="text/css" href="../Ressources/styleQuizz.css">

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
echo('<form id="formQuizz"><div class="tab-content form-group">');

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
            echo('<div class="checkbox"><label for="' . $id . '"><input type="checkbox" id="' . $id . '"><span class="cr"><i class="cr-icon fa fa-check"></i></span>' . $r . '</label></div>');
            /*if (in_array($q, $v['answer'])) {
                echo('<div class="checkbox"><label for="' . $id . '"><input type="checkbox" id="' . $id . '" checked><span class="cr"><i class="cr-icon fa fa-check"></i></span>
            ' . $r . '</label></div>');
            } else {
                echo('<div class="checkbox"><label for="' . $id . '"><input type="checkbox" id="' . $id . '"><span class="cr"><i class="cr-icon fa fa-check"></i></span>
            ' . $r . '</label></div>');
            }*/
        }
        echo('</div>');
    }
    echo('</div>');
}


echo('</div></form>');
echo(' <button id="val" class="btn btn-success btn-lg btn-block" style="display: block">Valider le questionnaire</button>');

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
                <p>Merci de répondre à toutes les questions avant de valider le questionnaire</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
            </div>
        </div>

    </div>
</div>
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
<script>

    $(document).ready(function () {
        var tabRep = [0, 0, 0, 0, 0];

        $('#val').click(function (e) {
            var nbQuest = 0;
            for (var i = 1; i < 6; i++) {
                nbQuest += parseInt($('.navbar-nav li:nth-child(' + i + ') b').text());
            }
            if (nbQuest == 32) {
                $('#validQuest').modal('show');
                $("#valider").click(function () {
                    $("#formQuizz").submit();
                });
            }
            else {
                $('#warning').modal('show');
            }


        });

        $(":checkbox").click(function () {
            countAnswer($(this).parent().parent().parent().parent().attr('id'));
        });

        function countAnswer(domain) {
            nb = domain.charAt(6);
            tabRep[nb] = 0;
            $.each($('#' + domain).find('.panel'), function () {
                if ($(this).find(':checkbox:checked').length > 0) {
                    tabRep[nb] += 1;
                }
            });
            $('.navbar-nav li:nth-child(' + nb + ') b').text(tabRep[nb]);
        }

        //Fonction qui permet afficher seulement le domaine cliqué
        $(".nav-tabs a").click(function () {
            $(this).tab('show');
            $('html, body').animate({scrollTop: 0});
        });
    });
</script>
<?php

include_once("../View/footer.view.php");
?>