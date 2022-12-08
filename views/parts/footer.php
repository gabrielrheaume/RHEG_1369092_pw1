    <footer>
        <?php
            if($_SESSION["actual_page"] != 'infolettre' && $_SESSION["actual_page"] != 'connexion' && $_SESSION["actual_page"] != 'creer-compte' && $_SESSION["actual_page"] != 'modifier-menu' && $_SESSION["actual_page"] != 'modifier-categories')
            {
                ?>
                    <div class="newsletter">
                        <span>Vous voulez être informé</span>
                        <span>des nouveaux plats ?</span>
                        <span><strong>Abonnez-vous !</strong></span>
                        <div class="newsletter-button"><a href="infolettre">S'inscrire</a></div>
                    </div>
                <?php
            }
        ?>

        <div id="footer">
            <p class="copyright">©</p>
            <p class="address">297, rue St-Georges, Saint-Jérôme (Québec) J7Z 5A2</p>
            <p class="phone">450 436-1531</p>
        </div>
    </footer>
</body>
</html>