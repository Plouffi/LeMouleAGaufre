<?php
include("header.view.php");
?>

    <div class="container">
        <div class="container">
            <div class="classeProf col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3><?= $data['classe']['Nom']?></a></h3>
                    </div>
                    <div class="panel-primary">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-star-empty"></i>Niveau </span>
                        <label class="text-center"><?= $data['classe']['Niveau']?></label>
                    </div>
                    <div class="panel-primary">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i>Moyenne </span>
                        <label id="labelMoyenne" class="text-center">0</label>
                    </div>
                    <div class="panel-primary">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i>Elèves </span>
                        <div class="row m-b-xs m-t-xs">
                            <label class="text-center col-xs-2">Nom</label>
                            <label class="text-center col-xs-2">Prénom</label>
                            <label class="text-center col-xs-2">Identifiant</label>
                            <label class="text-center col-xs-2">Mot de Passe</label>
                            <label class="text-center col-xs-2">Nombre d'essais</label>
                            <label class="text-center col-xs-2">Meilleure note</label>
                        </div>
                        <hr>
                        <?php
                            $i = 0;
                            while(isset($data['eleves'][$i])){
                                if($data['eleves'][$i]['Note'] == null){
                                    $note = '<i class="glyphicon glyphicon-remove"></i>';
                                } else {
                                    $note = $data['eleves'][$i]['Note'];
                                }
                                echo '<div class="row detailEleve">'.
                                        '<label class="text-center col-xs-2">'.$data['eleves'][$i]['Nom'].'</label>'.
                                        '<label class="text-center col-xs-2">'.$data['eleves'][$i]['Prenom'].'</label>'.
                                        '<label class="text-center col-xs-2">'.$data['eleves'][$i]['Id'].'</label>'.
                                        '<label class="text-center col-xs-2">'.$data['eleves'][$i]['MotDePasse'].'</label>'.
                                        '<label class="text-center col-xs-2">'.$data['eleves'][$i]['Essai'].'</label>'.
                                        '<label class="text-center col-xs-2">'.$note.'</label>'.
                                    '</div>';
                                $i++;
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            var somme = 0;
            var size = 0;
            var res = $('.detailEleve > label:last-child').map(function() { return parseInt($(this).text()); }).get();
            for (var i = 0; i < res.length; i++) {
                if($.isNumeric(res[i])) {
                    somme += res[i] << 0;
                    size++;
                }
            }
            var moyenne = ((size != 0) ? somme/size : 0);
            $('#labelMoyenne').text(moyenne);
        });
    </script>
<?php
include("footer.view.php");
?>