<?php
    include("parts/header.php");
?>

<?php
    // mettre dans une fonction ???
    Errors::getMessage();
    $this->displayForm($display);
?>

<div class="retour"><a href="<?= $_SESSION['last_page'] ?>">Retour</a></div>

<?php
    include("parts/footer.php");
?>