<form action="add_meal_submit" method="post" enctype="multipart/form-data">
    <div class="input-infos">
        <div class="input">
            <input type="text" name="name" placeholder="Salade Tonkinoise">
            <span>Nom du plat :</span>
        </div>
        <div class="input">
            <input type="textarea" name="description" placeholder="Ceci est une salade">
            <span>Description :</span>
        </div>
        <div class="selects">
            <div class="input">
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
                <span>Catégorie :</span>
            </div>
            <div class="input">
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
                <span>Type :</span>
            </div>
        </div>
        <div class="input">
            <input type="number" name="price" placeholder="14,99" step=".01">
            <span>Prix :</span>
        </div>
        <div class="input">
            <input type="file" name="image" class="file" id="file">
            <label for="file">Choisir un Fichier</label>
            <span>Image :</span>
        </div>
    </div>
    <input type="submit" value="Soumettre" class="submit">
</form>