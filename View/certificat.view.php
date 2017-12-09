<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Certificat</title>
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
    <link rel="stylesheet" type="text/css" href="../Ressources/css/certificat.css">
</head>
<body>
<div><p class="personne"><?php echo($_SESSION['Nom']." ".$_SESSION['Prenom']);?></p></div>
<div><p class="note"><?php echo($_SESSION['note']."/".$_SESSION['nbQuest']);?></p></div>

<img src="../Ressources/img/Certificate%20of%20Participation.png" alt="">
</body>
<script>
    $(document).ready(function () {
        // window.print();
    })
</script>
</html>