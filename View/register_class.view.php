
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Enregistrer une classe</h2>
            </div>

            <form method="post" action="create_account.view.php" id="formulaire">
                <br>
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input id="remplir" type="texte" class="form-control" name="Nom" value="" placeholder="Nom"  required/>
                </div>
                <br>
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
                  <input type="file"  class="form-control" name="mon_fichier" id="mon_fichier" />
                </div>
                <br>
                <div class="block-center">
                    <input id="send" type="submit" value="Valider" name="send"/>
                </div>
                <br>
            </form>
        </div>
