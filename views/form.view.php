<?php
    include("parts/header.php");
?>

<div class="header-size"></div>

<?php
    Errors::getMessage();
    Success::getMessage();
    $this->displayForm($display);
?>

<div class="retour"><a href="<?= $_SESSION['last_page'] ?>"><img src="image.png" alt="" srcset=""></a></div>

<?php
    include("parts/footer.php");
?>