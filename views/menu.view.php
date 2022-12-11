<?php
    include("parts/header.php");
?>
    
<div class="header-size"></div>

<?php
    Errors::getMessage();
    Success::getMessage();
?>

<?php
    if($this->verifyAdmin())
    {
        ?> <a href="creer-compte">Créer un compte</a> <?php
    }
    if($this->verifyUser())
    {
        ?> 
            <a href="modifier-categories">Modifier les catégories</a>
            <a href="modifier-menu">Modifier le menu</a>
        <?php
    }
?>

<?php
    include("parts/footer.php");
?>