<?php
if (isset($_SESSION['email'])) {
    if (!empty($_SESSION['email'])) {
        if (isset($_POST["send"])) {
            $form = array();
            if (!empty($_POST["Mdp"]) && !empty($_POST["newMdp1"]) && !empty($_POST["newMdp2"])) {

                $form["Mdp"] = addSlashes($_POST["Mdp"]);
                $form["newMdp1"] = addSlashes($_POST["newMdp1"]);
                $form["newMdp2"] = addSlashes($_POST["newMdp2"]);
                $form["MdpSession"] = addSlashes($_SESSION['Mdp']);
                if (!empty($form)) {
                    $Mdp = $form['Mdp'];
                    $newMdp1 = $form['newMdp1'];
                    $newMdp2 = $form["newMdp2"];
                    $MdpSession = $form["MdpSession"];
                    if ($Mdp != $MdpSession) {
                        echo "<script>";
                        echo "alert('Les mots de passe ne correspondent pas avec celui de la session !')";
                        echo "</script>";
                        if ($newMdp1 != $newMdp2) {
                            echo "<script>";
                            echo "alert('Les mots de passe ne correspondent pas !')";
                            echo "</script>";
                        }
                    } else {
                        //connexion à la base de donée pour faire une MAJ du Mdp client
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
<section id="formulaire">

    <section class="titre">
        <h2>Changer mot de passe</h2>
    </section>
    <form method="post" action="" id="formulaire">
        <p>
            <label for="MotDePasse">
                <i class="fa fa-lock" aria-hidden="true"></i>
            </label>
            <input id="remplir" type="password" name="MotDePasse" value="" placeholder="Mot de passe actuel" required/>
        </p>
        <p>
            <label for="MotDePasse">
                <i class="fa fa-lock" aria-hidden="true"></i>
            </label>
            <input id="remplir" type="password" name="MotDePasse" value="" placeholder="Nouveau mot de passe" required/>
        </p>
        <p>
            <label for="MotDePasse">
                <i class="fa fa-lock" aria-hidden="true"></i>
            </label>
            <input id="remplir" type="password" name="MotDePasse" value="" placeholder="Nouveau mot de passe" required/>
        </p>
        <p id="send">
            <input id="send" type="submit" value="Envoyer" name="send"/>
        </p>
    </form>
</section>