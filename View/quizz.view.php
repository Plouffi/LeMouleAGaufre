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
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="#domain1">Domaine 1</a></li>
                    <li><a href="#domain2">Domaine 2</a></li>
                    <li><a href="#domain3">Domaine 3</a></li>
                    <li><a href="#domain4">Domaine 4</a></li>
                    <li><a href="#domain5">Domaine 5</a></li>
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


$json = file_get_contents("../Ressources/quizz.json");

$quizz = (json_decode($json, true));
$quizz = $quizz['quizz']['questions'];
asort($quizz);

$tmp = array("domains" => array(array(), array(), array(), array(), array()));

foreach ($quizz as $key => $value) {
    array_push($tmp["domains"][$value['domain'] - 1], $value);
}
$quizz = $tmp;


echo('<form><div class="container form-group">');

foreach ($quizz['domains'] as $key => $value) {
    echo('<h1 id="domain' . $value[0]['domain'] . '">Domaine ' . $value[0]['domain'] . '</h1>');
    echo('<div>');
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
echo('<button type="submit" class="btn btn-success btn-lg btn-block">Valider le questionnaire</button>');
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


<?php
include_once("../View/footer.view.php");
?>