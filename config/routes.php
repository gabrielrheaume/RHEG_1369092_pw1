<?php

    // Associative array that associate a route with a controller's method
    // Structure: "route's name" => "method's name"
    $routes = [
        "index" => "displayHomepage",
        "menu" => "displayMenu",
        "a-propos" => "displayAboutUs",
        "contact" => "displayContact",
        "infolettre" => "displayNewsletterForm",
        "connexion" => "displayLogIn",
        "creer-compte" => "displayAccountCreation",
        "modifier-menu" => "displayUpdateMenu",
        "modifier-categories" => "displayUpdateCategories",
        "create_account_submit" => "createAccount",
        "log_in_submit" => "logIn",
        "subscribe_newsletter_submit" => "subscribeNewsletter",
        "add_category_submit" => "addCategory",
        "modify_category_submit" => "modifyCategory",
        "delete_category_submit" => "deleteCategory",
        "add_meal_submit" => "addMeal",
        "delete_meal_submit" => "deleteMeal",
        "modify_meal_submit" => "modifyMeal",
        "add_category_submit" => "addNewCategory",
        "delete_category_of_meal_submit" => "deleteCategoryOfMeal",
    ];

?>