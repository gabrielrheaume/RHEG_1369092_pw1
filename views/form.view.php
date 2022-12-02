<?php
    include("parts/header.php");
?>

<?php
    // mettre dans une fonction ???
    Errors::getMessage();
    switch($display)
    {
        case "infolettre": include("parts/newsletter.form.php"); break;
        case "connexion": include("parts/connection.form.php"); break;
        case "compte": include("parts/createaccount.form.php"); break;
        case "menu": include("parts/menu.form.php"); break;
        case "categorie": include("parts/categories.form.php"); break;
        default: Errors::errorSwitch(6); // call directly the switch with all error messages
    }
?>

<?php
    include("parts/footer.php");
?>