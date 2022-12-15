<div class="modify" v-show="affichage == 'modify'">
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
                <div class="category-form">
                    <form action="modify_category_submit" method="post" class="modify-category">
                        <div class="input-infos">
                            <div class="input">
                                <input type="text" name="name" value="<?= $category["name"] ?>" required>
                            </div>
                            <input type="hidden" name="id" value="<?= $category["id"] ?>" required>
                            <input type="hidden" name="type" value="<?= $type ?>" required>
                            <input type="submit" value="🖊" class="submit">
                        </div>
                    </form>
                        
                    <form action="delete_category_submit" method="post" class="delete">
                        <div class="input-infos">
                            <input type="hidden" name="id" value="<?= $category["id"] ?>">
                            <input type="hidden" name="type" value="<?= $type ?>">
                            <input type="submit" value="🗑" class="submit">
                        </div>
                    </form>
                </div>
                <?php
            }
        }
    ?>
</div>

<form action="add_category_submit" method="post" v-show="affichage == 'add'">
    <div class="input-infos">
        <div class="input">
            <input type="text" name="category" placeholder="Burger">
            <span>Catégorie :</span>
        </div>
        <div class="input">
            <input type="text" name="type" placeholder="Dessert">
            <span>Type de plat :</span>
        </div>
    </div>
    <input type="submit" value="Soumettre" class="submit">
</form>
