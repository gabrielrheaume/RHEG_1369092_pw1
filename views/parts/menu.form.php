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

<span>Modifier un plat :</span>
<?php
    if($meals)
    {
        foreach($meals as $meal)
        {
            ?>
                <!-- modify meal -->
                <form action="modify_meal_submit" method="post">
                    <span>Nom du plat :</span>
                    <input type="text" name="name" value="<?= $meal['name'] ?>">
                    <span>Description :</span>
                    <input type="textarea" name="description" value="<?= $meal['description'] ?>">
                    <select name="type">
                        <?php
                            foreach($categories["types"] as $type)
                            {
                                ?>
                                    <option value="<?= $type['id'] ?>" <?= (new Meals)->isTypeSelected($meal["id"], $type["id"]) ?>><?= $type["name"] ?></option>
                                <?php
                            }
                        ?>
                    </select>
                    <?php
                    if($meal["categories"])
                    {
                        foreach($meal["categories"] as $category_of_meal)
                        {
                            ?>
                            <select name="category">
                                <?php
                                    foreach($categories["categories"] as $category)
                                    {
                                        ?>
                                            <option value="<?= $category['id'] ?>" <?= (new Meals)->isCategorySelected($category_of_meal, $category["name"]) ?>><?= $category["name"] ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                            <?php
                        }
                    }
                    ?>
                    <span>Prix :</span>
                    <input type="number" name="price" value="<?= $meal['price'] ?>" step=".01">
                    <input type="hidden" name="id" value="<?= $meal['id'] ?>">
                    <input type="submit" value="Soumettre">
                </form>
    
                <?php
                    if($meal["categories"])
                    {
                        foreach($meal["categories"] as $category_of_meal)
                        {
                            ?>
                            <!-- delete meal's category -->
                            <form action="delete_category_of_meal_submit" method="post">
                                <input type="hidden" name="category_name" value="<?= $category_of_meal ?>">
                                <input type="hidden" name="meal_id" value="<?= $meal['id'] ?>">
                                <input type="submit" value="🗑">
                            </form>
                            <?php
                        }
                    }
                ?>
                
                <!-- add a category to the actual meal -->
                <form action="add_category_submit" method="post">
                    <span>Ajouter une catégorie :</span>
                    <select name="category">
                        <?php
                            foreach($categories["categories"] as $category)
                            {
                                ?>
                                    <option value="<?= $category['id'] ?>" <?= (new Meals_Categories)->isCategoryAssociated($meal["id"], $category["id"])?>><?= $category["name"] ?></option>
                                <?php
                            }
                        ?>
                    </select>
                    <input type="hidden" name="meal" value="<?= $meal['id'] ?>">
                    <input type="submit" value="Soumettre">
                </form>
    
                <!-- delete meal -->
                <form action="delete_meal_submit" method="post">
                    <input type="hidden" name="id" value="<?= $meal['id'] ?>">
                    <input type="submit" value="🗑">
                </form>
            <?php
        }
    }
?>