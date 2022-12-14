<span>Ajouter un plat :</span>
<form action="add_meal_submit" method="post" enctype="multipart/form-data">
    <span>Nom du plat :</span>
    <input type="text" name="name" placeholder="Salade Tonkinoise">
    <span>Description :</span>
    <input type="textarea" name="description" placeholder="Ceci est une salade">
    <span>Type de plat :</span>
    <select name="type">
        <?php
            foreach($categories["types"] as $type)
            {
                ?>
                    <option value="<?= $type['id'] ?>"><?= $type["name"] ?></option>
                <?php
            }
        ?>
    </select>
    <span>Catégorie :</span>
    <select name="category">
        <?php
            foreach($categories["categories"] as $category)
            {
                ?>
                    <option value="<?= $category['id'] ?>"><?= $category["name"] ?></option>
                <?php
            }
        ?>
    </select>
    <span>Prix :</span>
    <input type="number" name="price" placeholder="14,99" step=".01">
    <span>Image :</span>
    <input type="file" name="image">
    <input type="submit" value="Soumettre">
</form>