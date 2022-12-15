<?php
    include("parts/header.php");
?>

<div class="menu-container" id="app">
    <?php
        Errors::getMessage();
        Success::getMessage();
    ?>
    <h1>Menu</h1>
    <div class="choices-and-admin">
        <div class="choices">
            <p class="all" @click="selectAll">Tous</p>
            <div class="type" @click="getMenu('type')">
                <p class="type">Type de Plat</p>
                <p class="arrow">{{ menu_arrow_type }}</p>

                <div class="type-menu" v-show="type_menu">
                    <div v-for='type of types' class="choice" @click="selectChoice('type', type['id'])">
                        <div class="empty-circle" v-show="type['id'] != chosen_type"></div>
                        <div class="full-circle" v-show="type['id'] == chosen_type"></div>
                        <p>{{ type['name'] }}</p>
                    </div>
                </div>
            </div>
            <div class="category" @click="getMenu('category')">
                <p class="category">Catégorie</p>
                <p class="arrow">{{ menu_arrow_category }}</p>

                <div class="category-menu" v-show="category_menu">
                    <div v-for='category of categories' class="choice" @click="selectChoice('category', category['name'])">
                        <div class="empty-circle" v-show="category['name'] != chosen_category"></div>
                        <div class="full-circle" v-show="category['name'] == chosen_category"></div>
                        <p>{{ category['name'] }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="admin">
            <?php
                if($this->verifyUser())
                {
                    ?> 
                        <a href="modifier-categories">Modifier les catégories</a>
                        <a href="ajouter-plat">Ajouter un plat</a>
                    <?php
                }
                if($this->verifyAdmin())
                {
                    ?> <a href="creer-compte">Créer un compte</a> <?php
                }
            ?>
        </div>
    </div>

    <div class="meals">
        <h2 v-show="display_entree">Entrée</h2>
        <div v-for="meal of menu.filter(filterEntree)" class="meal entree">
            <img :src="meal['image']" alt="meal['description']">
            <div class="infos">
                <h3>{{ meal['name'] }}</h3>
                <p class="description">{{ meal["description"] }}</p>
                <p class="price">{{meal["price"] }}$</p>
                <p class="meal-categories">{{ typeCategories(meal) }}</p>
            </div>
            <?php
                if($this->verifyUser())
                {
                    ?>
                        <p class="modify-link"><a :href="getLink(meal['id'])">Modifier</a></p>
                        <!-- delete meal -->
                        <form action="delete_meal_submit" method="post" class='delete'>
                            <div class="input-infos">
                                <input type="hidden" name="id" value="<?= $meal['id'] ?>">
                                <input type="submit" value="🗑" class="delete-meal">
                            </div>
                        </form>
                    <?php
                }
            ?>
        </div>
        <div class="no-meal" v-show="noEntree() && display_entree">Il n'y a aucune entrée correspondant au(x) critère(s) sélectionné(s)</div>
        
        <h2 v-show="display_main">Repas</h2>
        <div v-for="meal of menu.filter(filterMain)" class="meal main">
            <img :src="meal['image']" alt="meal['description']">
            <div class="infos">
                <h3>{{ meal['name'] }}</h3>
                <p class="description">{{ meal["description"] }}</p>
                <p class="price">{{meal["price"] }}$</p>
                <p class="meal-categories">{{ typeCategories(meal) }}</p>
            </div>
            <?php
                if($this->verifyUser())
                {
                    ?>
                        <p class="modify-link"><a :href="getLink(meal['id'])">Modifier</a></p>
                    <?php
                }
            ?>
        </div>
        <div class="no-meal" v-show="noMain() && display_main">Il n'y a aucune entrée correspondant au(x) critère(s) sélectionné(s)</div>

        <h2 v-show="display_dessert">Dessert</h2>
        <div v-for="meal of menu.filter(filterDessert)" class="meal dessert">
            <img :src="meal['image']" alt="meal['description']">
            <div class="infos">
                <h3>{{ meal['name'] }}</h3>
                <p class="description">{{ meal["description"] }}</p>
                <p class="price">{{meal["price"] }}$</p>
                <p class="meal-categories">{{ typeCategories(meal) }}</p>
            </div>
            <?php
                if($this->verifyUser())
                {
                    ?>
                        <p class="modify-link"><a :href="getLink(meal['id'])">Modifier</a></p>
                    <?php
                }
            ?>
        </div>
        <div class="no-meal" v-show="noDessert() && display_dessert">Il n'y a aucune entrée correspondant au(x) critère(s) sélectionné(s)</div>
    </div>

    <div class="voir-plus" @click="seeMore()" v-show="nb_meals >= nb_meals_display"><p>Voir Plus</p></div>
</div>



<script src="public/js/menu.js" type="module"></script>

<?php
    include("parts/footer.php");
?>