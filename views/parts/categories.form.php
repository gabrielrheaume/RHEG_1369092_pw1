<form action="add_category_submit" method="post">
    <span>Ajouter une catégorie :</span>
    <input type="text" name="category" placeholder="Burger">
    <span>Ajouter un type de plat :</span>
    <input type="text" name="type" placeholder="Dessert">
    <input type="submit" value="Soumettre">
</form>

<?php
    foreach($categories as $types_or_categories)
    {
        if($categories["types"] == $types_or_categories) $type = "type";
        else $type = "categories";
        ?>
        <?php
        foreach($types_or_categories as $category)
        {
            ?>
                <form action="modify_category_submit" method="post">
                    <span>
                        <?php
                            if($type == "type")
                            {
                                ?> Modifier un Type de Plat : <?php
                            }
                            else
                            {
                                ?> Modifier une Catégorie : <?php
                            }
                        ?>
                    </span>
                    <input type="text" name="name" value="<?= $category["name"] ?>" required>
                    <input type="hidden" name="id" value="<?= $category["id"] ?>" required>
                    <input type="hidden" name="type" value="<?= $type ?>" required>
                    <input type="submit" value="Soumettre">
                </form>
                
                <form action="delete_category_submit" method="post">
                    <input type="hidden" name="id" value="<?= $category["id"] ?>">
                    <input type="hidden" name="type" value="<?= $type ?>">
                    <input type="submit" value="🗑">
                </form>
            <?php
        }
    }
?>