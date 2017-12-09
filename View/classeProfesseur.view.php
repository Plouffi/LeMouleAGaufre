<?php
    include("header.view.php");
?>

    <div class="container">
        <div  class="container">
            <a href="../View/nouvelleClasse.view.php"><button class="btn btn-primary col-xs-12 m-b-md">Enregistrer une nouvelle classe</button></a>
        </div>
        <div class="container">
            <?php
                $i = 0;
                while(isset($data['classes'][$i])){
                    echo '<div class="classeProf col-xs-12 col-md-4">'.
                            '<div class="panel panel-default">'.
                                '<div class="panel-heading">'.
                                    '<h3><a href="../Controler/viewClass.ctrl.php?idClasse='.$data['classes'][$i]['IdClasse'].'">'.$data['classes'][$i]['Nom'].'</a></h3>'.
                                '</div>'.
                                '<div class="panel-primary">'.
                                    '<span class="input-group-addon"><i class="glyphicon glyphicon-star-empty"></i>Niveau </span>'.
                                    '<label class="text-center">'.$data['classes'][$i]['Niveau'].'</label>'.
                                '</div>'.
                            '</div>'.
                        '</div>';
                    $i++;
                }
            ?>

        </div>
    </div>
<?php
    include("footer.view.php");
?>