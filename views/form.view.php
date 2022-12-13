<?php
    include("parts/header.php");
?>

<h1 class="form-title"><?= $form_title ?></h1>

<section class="form-section">
    <div class="form">
            <?php
            Errors::getMessage();
            Success::getMessage();
            $this->displayForm($display);
            ?>
            <div class="retour"><a href="<?= $_SESSION['last_page'] ?>"><img src="public/images/back_arrow.png" alt="Flèche de retour arrière"></a></div>
    </div>
    <div class="image"></div>
</section>


<?php
    include("parts/footer.php");
?>