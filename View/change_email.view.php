<?php
if (isset($_SESSION['email'])) {
    if (!empty($_SESSION['email'])) {
        if (isset($_POST["send"])) {
            $form = array();
            if (!empty($_POST["Email"]) && !empty($_POST["newEmail1"]) && !empty($_POST["newEmail2"])) {

                $form["Email"] = addSlashes($_POST["Email"]);
                $form["newEmail1"] = addSlashes($_POST["newEmail1"]);
                $form["newEmail2"] = addSlashes($_POST["newEmail2"]);
                $form["EmailSession"] = addSlashes($_SESSION['email']);
                if (!empty($form)) {
                    $Email = $form['Email'];
                    $newEmail1 = $form['newEmail1'];
                    $newEmail2 = $form["newEmail2"];
                    $EmailSession = $form["EmailSession"];
                    if ($Email != $EmailSession) {
                        echo "<script>";
                        echo "alert('L'emails ne correspondent pas avec celui de la session !')";
                        echo "</script>";
                        if ($newEmail1 != $newEmail2) {
                            echo "<script>";
                            echo "alert('Les emails ne correspondent pas !')";
                            echo "</script>";
                        }
                    } else {
                        //connexion à la base de donée pour faire une MAJ de l'email client
                    }
                } else {
                    $form = " ";
                    echo "<script>";
                    echo "alert('Le formulaire est incomplet !')";
                    echo "</script>";
                }
            } else {
                $form = " ";
                echo "<script>";
                echo "alert('Une erreur est survenue !')";
                echo "</script>";
            }
        }
    }
}
?>    
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Changer email</h2>
            </div>

            <form method="post" action="create_account.view.php" id="formulaire">
                <br>
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input id="email" type="text" class="form-control" name="email" placeholder="Email">
                </div>
                <br>
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input id="email" type="text" class="form-control" name="email" placeholder="Nouveau Email">
                </div>
                <br>
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input id="email" type="text" class="form-control" name="email" placeholder="Nouveau Email">
                </div>
                <br>
                <div class="block-center">
                    <input id="send" type="submit" value="Valider" name="send"/>
                </div>
                <br>
            </form>
        </div>
