<?php
require 'header.view.php';
?>
    <section id="main">
        <section id="account">
            <nav>
                <ul>
                    <li class="up"><a href="#">Mon Compte</a>
                        <ul>
                            <li><a href="#" id="mdp">Changer Mot De Passe</a></li>
                            <li><a href="#" id="email">Changer Email</a></li>
                            <li><a href="#">point</a></li>
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
        </section>
        <section id="view">

        </section>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
    <script src="../View/js/my_account.js" type="text/javascript"></script>
<?php
require('footer.view.php');
?>