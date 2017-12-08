<?php
include("header.view.php");
?>

    <script type="text/javascript">
        function addInputEleve(){
            //Get the number of student
            var numLastStudent = $(".eleveInput").length+1;
            var newInput = ' <div class="input-group col-xs-10 col-xs-offset-1 eleveInput m-b-xs">\n' +
                                '<span class="input-group-addon"><i class="glyphicon glyphicon glyphicon-user"></i></span>\n' +
                                '<input id="nom'+numLastStudent+'" type="text" class="form-control" name="nom'+numLastStudent+'" placeholder="Nom de l\'élève">\n' +
                                '<input id="prenom'+numLastStudent+'" type="text" class="form-control" name="prenom'+numLastStudent+'" placeholder="Prénom de l\'élève">\n' +
                            '</div>';
            $(newInput).insertBefore($(".addInputEleve"));
        }
    </script>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Nouvelle classe</h2>
            </div>
            <form method="post" action="../Controler/registerClasse.ctrl.php" id="formulaire">
                <br>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
                    <input id="nomClasse" type="text" class="form-control" name="nomClasse" placeholder="Nom de la classe">
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-star-empty"></i></span>
                    <input id="niveau" type="text" class="form-control" name="niveau" placeholder="Niveau de la classe: 6ème, 5ème, ...">
                </div>
                <hr>
                <br>
                <div class="input-group col-xs-10 col-xs-offset-1 eleveInput m-b-xs">
                    <span class="input-group-addon"><i class="glyphicon glyphicon glyphicon-user"></i></span>
                    <input id="nom1" type="text" class="form-control" name="nom1" placeholder="Nom de l'élève">
                    <input id="prenom1" type="text" class="form-control" name="prenom1" placeholder="Prénom de l'élève">
                </div>

                <div class=" row m-t-md m-b-md addInputEleve m-b-md p-l">
                    <button class="btn btn-primary col-xs-10 col-xs-offset-1" type="button" onClick="addInputEleve()">Ajouter un élève</button>
                </div>
                <hr>
                <div class="block-center">
                    <input class="btn" id="send" type="submit" value="Valider" name="send"/>
                </div>
            </form>
        </div>
    </div>
<?php
include("footer.view.php");
?>