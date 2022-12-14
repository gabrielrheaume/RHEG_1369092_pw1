<?php

    // Associative array that associate a route with a controller's method
    // Structure: "route's name" => "method's name"
    $routes = [
        /***** View Display *****/
        "index" => "displayHomepage",
        "menu" => "displayMenu",
        "a-propos" => "displayAboutUs",
        "contact" => "displayContact",
        /***** Form Display *****/
        "infolettre" => "displayNewsletterForm",
        "connexion" => "displayLogIn",
        "creer-compte" => "displayAccountCreation",
        "modifier-plat" => "displayUpdateMeal",
        "ajouter-plat" => "displayAddMeal",
        "modifier-categories" => "displayUpdateCategories",
        /***** Submit Form *****/
        /* Users */
        "create_account_submit" => "createAccount",
        "log_in_submit" => "logIn",
        "log-out" => "logOut",
        /* Newsletter */
        "subscribe_newsletter_submit" => "subscribeNewsletter",
        /* Categories */
        "add_category_submit" => "addCategory",
        "modify_category_submit" => "modifyCategory",
        "delete_category_submit" => "deleteCategory",
        /* Meals */
        "add_meal_submit" => "addMeal",
        "delete_meal_submit" => "deleteMeal",
        "modify_meal_submit" => "modifyMeal",
        /* Meals and Categories */
        "add_category_submit" => "addNewCategory",
        "delete_category_of_meal_submit" => "deleteCategoryOfMeal",
    ];

?>