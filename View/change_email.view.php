<?php
        if(isset($_SESSION['email'])){
            if(!empty($_SESSION['email'])){
                if(isset($_POST["send"])){
                    $form = array();
                    if(!empty($_POST["Email"]) && !empty($_POST["newEmail1"]) && !empty($_POST["newEmail2"])){

                        $form["Email"] = addSlashes($_POST["Email"]);
                        $form["newEmail1"] = addSlashes($_POST["newEmail1"]);
                        $form["newEmail2"] = addSlashes($_POST["newEmail2"]);
                        $form["EmailSession"] = addSlashes($_SESSION['email']);
                        if(!empty($form)){
                            $Email = $form['Email'];
                            $newEmail1 = $form['newEmail1'];
                            $newEmail2 = $form["newEmail2"];
                            $EmailSession = $form["EmailSession"];
                            if($Email != $EmailSession){
                                echo "<script>";
                                echo "alert('L'emails ne correspondent pas avec celui de la session !')";
                                echo "</script>";
                                if($newEmail1 != $newEmail2){
                                    echo "<script>";
                                    echo "alert('Les emails ne correspondent pas !')";
                                    echo "</script>";
                                }
                            }else{
                                //connexion à la base de donée pour faire une MAJ de l'email client
                            }
                        }
                        else{
                        $form =" ";
                        echo "<script>";
                        echo "alert('Le formulaire est incomplet !')";
                        echo "</script>";
                        }
                    }
                    else{
                        $form =" ";
                        echo "<script>";
                        echo "alert('Une erreur est survenue !')";
                        echo "</script>";
                    }
                }
            }
        }
?>
<section id="formulaire">

                <section class="titre">
                    <h2>Changer email</h2>
                </section>
                <form method="post" action="" id="formulaire">
                    <p>
                        <label for="Email">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </label>
                        <input id="remplir" type="mail" name="email" value="" placeholder="Email actuel"  required/>
                    </p>
                    <p>
                        <label for="newEmail1">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </label>
                        <input id="remplir" type="mail" name="email" value="" placeholder="Nouveau Email"  required/>
                    </p>
                    <p>
                        <label for="newEmail2">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </label>
                        <input id="remplir" type="mail" name="email" value="" placeholder="Nouveau Email"  required/>
                    </p>
                    <p id="send">
                        <input id="send" type="submit" value="Envoyer" name="send" />
                    </p>
                </form>
</section>