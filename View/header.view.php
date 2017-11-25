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
    <link href="../Ressources/css/style.css" rel="stylesheet" type="text/css"/>

    
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
      <a href="mainExample.view.php"><img src="../Ressources/img/greenIt.jpg"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Accueil</a></li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Quiz
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="quizz.view.php#domain1">Domaine 1</a></li>
                <li><a href="quizz.view.php#domain2">Domaine 2</a></li>
                <li><a href="quizz.view.php#domain3">Domaine 3</a></li>
                <li><a href="quizz.view.php#domain4">Domaine 4</a></li>
                <li><a href="quizz.view.php#domain5">Domaine 5</a></li>
            </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Nom Prénom</a></li>
        <li><a href="login.view.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
        </header>




<!-- Body and html balise are closed in footer.view.php file-->
