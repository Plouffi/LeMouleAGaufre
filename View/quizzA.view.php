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
                    <?php echo('<li><a>'.$_SESSION['Nom'].' '.$_SESSION['Prenom'].'</a></li>'); ?>
                </ul>
            </div>
        </div>
    </nav>
</header>
<?php

echo('<h2 id="note" class="text-center center-block alert"></h2>');
echo('<form><div class="form-group">');
$note = 0;
foreach ($_SESSION['quizz']['domains'] as $key => $value) {
    $noteDomain = 0;
    //echo('<div><h1>Domaine ' . $value[0]['domain'] . '</h1>');
    echo('<div><h1>' . $_SESSION['domainsNames'][$value[0]['domain'] - 1] . '</h1>');
    foreach ($value as $k => $v) {
        $noteQuestion = 0;
        if (sizeof($v['answer']) > 1) {
            echo('<div  class="panel panel-primary"><div class="panel-heading">' . $v['question'] . ' (Plusieurs réponses possibles)</div>');
        } else {
            echo('<div  class="panel panel-primary"><div class="panel-heading">' . $v['question'] . '</div>');
        }
        foreach ($v['options'] as $q => $r) {
            $numRep = $v['id'] . '.' . $q; // $numRep sous la forme idQuestion.idAnswer(16.C / 9.A)
            if (in_array($numRep, $_POST) && in_array($q, $v['answer'])) { //Good answer
                echo('<div class="alert alert-success"><div class="checkbox has-success"><label><input disabled checked type="checkbox"><span class="cr"><i class="cr-icon fa fa-check"></i></span>' . $r . '</label></div></div>');
                $noteQuestion += 1 / sizeof($v['answer']);
            } elseif (in_array($numRep, $_POST) && !in_array($q, $v['answer'])) { //Bad answer
                echo('<div class="alert alert-danger"><div class="checkbox has-error"><label><input disabled checked type="checkbox"><span class="cr"><i class="cr-icon fa fa-times"></i></span>' . $r . '</label></div></div>');
                $noteQuestion -= 1 / sizeof($v['answer']);
            } elseif (!in_array($numRep, $_POST) && in_array($q, $v['answer'])) { //Unchecked but in answer
                echo('<div class="alert alert-warning"><div class="checkbox has-warning"><label><input disabled checked type="checkbox"><span class="cr"><i class="cr-icon fa fa-check"></i></span>' . $r . '</label></div></div>');
            } else { //Unchecked and not in answer
                echo('<div class="alert"><div class="checkbox"><label><input disabled type="checkbox"><span class="cr"><i class="cr-icon fa fa-check"></i></span>' . $r . '</label></div></div>');
            }
        }

        if ($noteQuestion < 0) {
            $noteQuestion = 0;
        } else {
            $noteDomain += $noteQuestion;
        }

        echo('</div>');
    }
    $note += $noteDomain;
    $note = round($note * 2) / 2;
    $_SESSION['note'] = $note;
    echo('</div>');
}
echo('</div></form>');

?>
<script>
    $(document).ready(function () {
        note = <?php echo($note)?>;
        nbQ = <?php echo($_SESSION['nbQuest'])?>;

        if (note / nbQ > 0.65) {
            $('#note').addClass('alert-success');
            $('#note').append("Félicitation vous avez validé la certification avec une note de <b>" + note + "</b> sur " + nbQ + ".<br>Vous pouvez imprimer votre certification en cliquant sur <a href='certificat.view.php'>ce lien</a>.");
        } else {
            $('#note').addClass('alert-danger');
            $('#note').append("Vous avez une note de <b>" + note + "</b> sur " + nbQ + ".<br> Malheureusement, vous n'avez pas obtenu la certification.");
        }
    });
</script>

<footer>
    <h1>Site GreenIT Version © 2017</h1>
</footer>

</body>
</html>
