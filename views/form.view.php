<?php
    include("parts/header.php");
?>

<h1 class="form-title"><?= $form_title ?></h1>

<div id="app" <?php if(isset($display) & ($display == 'modifier-categories' || $display == 'modifier-plat')){ echo 'v-cloak';}?>>
    <section class="form-section">
        <div class="form">
            <div class="messages-form">
                <?php
                    Errors::getMessage();
                    Success::getMessage();
                ?>
            </div>
                <?php
                    $this->displayForm($display);
                ?>
                <div class="retour"><a href="<?= $_SESSION['last_page'] ?>"><img src="public/images/back_arrow.png" alt="Flèche de retour arrière"></a></div>
                <?php
                    if(isset($display))
                    {
                        if($display == 'categorie' || $display == 'modifier-plat')
                        {
                            ?>
                                <div :class="getClass('add')" @click.prevent="affichage='add'">
                                    <a href="#">
                                        <?php
                                            if($display == 'categorie')
                                            {
                                                ?>Ajouter<?php
                                            }
                                            if($display == 'modifier-plat')
                                            {
                                                ?>Gérer les catégories<?php
                                            }
                                        ?>
                                    </a>
                                </div>
                                <div :class="getClass('modify')" @click.prevent="affichage='modify'"><a href="#">Modifier</a></div>
                                <script src="public/js/vueJS_modification.js" type="module"></script>
                            <?php
                        }
                    }
                    ;
                ?>
        </div>
        <div style="<?= $this->getBGimage($display) ?>" class="image"></div>
    </section>
</div>

<?php
    include("parts/footer.php");
?>