<?php
require 'header.view.php';
?>
    <div class="container">
        <div class="panel panel-default">
            <nav>
                <ul>
                    <li class="up"><a href="#">Mon Compte</a>
                        <ul>
                            <li><a href="#" id="mdp">Changer Mot De Passe</a></li>
                            <li><a href="#" id="email">Changer Email</a></li>
                        </ul>
                    </li>
                    <li class="up"><a href="#">Classe</a>
                        <ul>
                            <li><a href="#" id="register">Inscrire une classe</a></li>
                            <li><a href="#">Gérer classe</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
        <section id="view">

        </section>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
    <script src="../Ressources/js/my_account.js" type="text/javascript"></script>
<?php
require('footer.view.php');
?>