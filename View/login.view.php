
<?php
require 'header.view.php';

?>
    <div class="container">
        <div class="panel panel-default col-md-5 col-xs-12">
            <div class="panel-heading">
                <h2>Identification - Professeur</h2>
            </div>
            <form method="post" action="../Controler/logInProf.ctrl.php" id="formulaire">
                <br>
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input id="email" type="text" class="form-control" name="email" placeholder="Email">
                </div>
                <br>
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                  <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <br>
                <div class="block-center">
                    <input class="btn" id="send" type="submit" value="Valider" name="send"/>
                </div>
            </form>
            <!--<a href="create_account.view.php">Créer un compte</a>-->
        </div>
        <div class="panel panel-default col-md-5 col-md-offset-2 col-xs-12">
            <div class="panel-heading">
                <h2>Identification - Elève</h2>
            </div>
            <form method="post" action="../Controler/logInEleve.ctrl.php" id="formulaire">
                <br>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="id" type="text" class="form-control" name="id" placeholder="Identifiant">
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <br>
                <div class="block-center">
                    <input class="btn" id="send" type="submit" value="Valider" name="send"/>
                </div>
            </form>
            <!--<a href="create_account.view.php">Créer un compte</a>-->
        </div>
    </div>

<?php
require('footer.view.php');
?>