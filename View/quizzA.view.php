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
    <link rel="stylesheet" type="text/css" href="../Ressources/styleQuizz.css">
    <script src="../Ressources/quizzScript.js"></script>

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
                    <li><a><span class="glyphicon glyphicon-user"></span> Nom Prénom</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<?php

echo('<form><div class="form-group">');
foreach ($_SESSION['quizz']['domains'] as $key => $value) {
    echo('<div>');
    echo('<h1>Domaine ' . $value[0]['domain'] . '</h1>');
    foreach ($value as $k => $v) {
        if (sizeof($v['answer']) > 1) {
            echo('<div  class="panel panel-primary"><div class="panel-heading">' . $v['question'] . ' (Plusieurs réponses possibles)</div>');
        } else {
            echo('<div  class="panel panel-primary"><div class="panel-heading">' . $v['question'] . '</div>');
        }
        foreach ($v['options'] as $q => $r) {
            $numRep = $v['id'] . '.' . $q; // $numRep sous la forme idQuestion.idAnswer(16.C / 9.A)
            if (in_array($numRep, $_POST) && in_array($q, $v['answer'])) { //Good answer
                echo('<div class="alert alert-success"><div class="checkbox has-success"><label><input disabled checked type="checkbox"><span class="cr"><i class="cr-icon fa fa-check"></i></span>' . $r . '</label></div></div>');
            } elseif (in_array($numRep, $_POST) && !in_array($q, $v['answer'])) { //Bad answer
                echo('<div class="alert alert-danger"><div class="checkbox has-error"><label><input disabled checked type="checkbox"><span class="cr"><i class="cr-icon fa fa-times"></i></span>' . $r . '</label></div></div>');
            } elseif (!in_array($numRep, $_POST) && in_array($q, $v['answer'])) { //Pas répondu but in answer
                echo('<div class="alert alert-warning"><div class="checkbox has-warning"><label><input disabled checked type="checkbox"><span class="cr"><i class="cr-icon fa fa-check"></i></span>' . $r . '</label></div></div>');
            } else { //Pas répondu and not in answer
                echo('<div class="alert"><div class="checkbox"><label><input disabled type="checkbox"><span class="cr"><i class="cr-icon fa fa-check"></i></span>' . $r . '</label></div></div>');
            }
        }

        echo('</div>');
    }
    echo('</div>');
}
echo('</div></form>');

?>

<?php

include_once("../View/footer.view.php");
?>
