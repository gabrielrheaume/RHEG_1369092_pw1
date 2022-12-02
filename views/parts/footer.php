    <?php
        if($_SESSION["actual_page"] != 'infolettre' && $_SESSION["actual_page"] != 'connexion' && $_SESSION["actual_page"] != 'creer-compte' && $_SESSION["actual_page"] != 'modifier-menu' && $_SESSION["actual_page"] != 'modifier-categories')
        {
            ?> <a href="infolettre">Infolettre</a> <?php
        }
        else
        {
            ?> <a href="<?= $_SESSION['last_page'] ?>">Retour</a> <?php
        }
    ?>
    <footer></footer>
</body>
</html>