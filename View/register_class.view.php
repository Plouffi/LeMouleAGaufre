<section id="formulaire">

                <section class="titre">
                    <h2>Inscrire une classe</h2>
                </section>
                <form method="post" action="" id="formulaire">
                    <p>
                        <label for="Nom">
                            <i class="fa  fa-user" aria-hidden="true"></i>
                        </label>
                        <input id="remplir" type="texte" name="Nom" value="" placeholder="Nom"  required/>
                    </p>
                    <p>
                        <label for="mon_fichier">
                            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                        </label>
                        <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
                        <input type="file" name="mon_fichier" id="mon_fichier" />
                    </p>
                    <p id="send">
                        <input id="send" type="submit" value="Envoyer" name="send" />
                    </p>
                </form>
</section>