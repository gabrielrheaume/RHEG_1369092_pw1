<?php

    require_once("bases/Controller.php");
    require_once("utils/Upload.php");
    require_once("models/Users.php");
    require_once("models/Newsletter.php");
    require_once("models/Categories.php");
    require_once("models/Types.php");
    require_once("models/Comments.php");
    require_once("models/Meals.php");

    class SiteController extends Controller
    {
        /**
         * Display home page
         * 
         * @return void
         */
        public function displayHomepage()
        {
            $this->setSessionPages("index");
            $title = "Homepage";
            $comments = (new Comments)->all();
            include("views/homepage.view.php");
        }

        /**
         * Display menu page
         *
         * @return void
         */
        public function displayMenu()
        {
            $this->setSessionPages("menu");
            $title = "Menu";
            include("views/menu.view.php");
        }

        /**
         * Display about us page
         *
         * @return void
         */
        public function displayAboutUs()
        {
            $this->setSessionPages("a-propos");
            $title = "À Propos de PUB G4";
            include("views/aboutus.view.php");
        }

        /**
         * Display contact page
         *
         * @return void
         */
        public function displayContact()
        {
            $this->setSessionPages("contact");
            $title = "Contact";
            include("views/contact.view.php");
        }
        
        /**
         * Get informations to display the requested form
         * 
         * @return void
         */
        public function displayNewsletterForm()
        {
            $this->setSessionPages("infolettre");
            $title = "S'inscrire à l'infolettre";
            $display = "infolettre";
            $this->displayFormPage($title, $display);
        }
        
        /**
         * Get informations to display the requested form
         * 
         * @return void
         */
        public function displayLogIn()
        {
            $this->setSessionPages("connexion");
            $title = "Connexion";
            $display = "connexion";
            $this->displayFormPage($title, $display);
        }
        
        /**
         * Get informations to display the requested form
         * 
         * @return void
         */
        public function displayAccountCreation()
        {
            if(!$this->verifyAdmin()) $this->redirect("index");
            $this->setSessionPages("creer-compte");
            $title = "Créer un compte";
            $display = "compte";
            $this->displayFormPage($title, $display);
        }

        /**
         * Get informations to display the requested form
         * 
         * @return void
         */
        public function displayUpdateMenu()
        {
            if(!$this->verifyUser()) $this->redirect("index");
            $this->setSessionPages("modifier-menu");
            $title = "Modification du menu";
            $display = "menu";
            // add query for categories and UNIQUE types
            $meals = (new Meals)->getAllMealsAndCategories();
            $this->displayFormPage($title, $display);
        }

        /**
         * Get informations to display the requested form
         * 
         * @return void
         */
        public function displayUpdateCategories()
        {
            if(!$this->verifyUser()) $this->redirect("index");
            $this->setSessionPages("modifier-categorie");
            $title = "Modification des catégories";
            $display = "categorie";
            $this->displayFormPage($title, $display);
        }

        /**
         * Display forms' page with specified form
         *
         * @param string $title
         * @param string $display name of the specified form
         * @return void
         */
        public function displayFormPage($title, $display)
        {
            // not enough datas to do queries only when it's used
            $categories["types"] = (new Types)->all();
            $categories["categories"] = (new Categories)->all();
            $meals = (new Meals)->getAllMealsAndCategories();
            include("views/form.view.php");
        }

        /**
         * Process informations to create an account
         *
         * @return void
         */
        public function createAccount()
        {
            $this->verifyPOST("creer-compte", "creer-compte?error=1");

            $email = $_POST["email"];
            $newsletter = new Users();
            
            if(!$newsletter->verifyUniqueEmail($email)) $this->redirect("creer-compte?error=3");

            $first_name = $_POST["first_name"];
            $last_name = $_POST["last_name"];
            $password = $_POST["password"];

            $success = $newsletter->create($first_name, $last_name, $email, $password);

            if($success) $this->redirect("menu?success=2");
            $this->redirect("creer-compte?error=2");
        }

        /**
         * Submit log in with email and password
         *
         * @return void
         */
        public function logIn()
        {
            $this->verifyPOST("connexion", "connexion?error=1");

            $email = $_POST["email"];
            $password = $_POST["password"];
            $success = (new Users)->log($email, $password);

            if(!$success) $this->redirect("connexion?error=4");
            $this->redirect("menu");
        }

        /**
         * Process users email and name to add in Newsletter_info database
         *
         * @return void
         */
        public function subscribeNewsletter()
        {
            $this->verifyPOST("infolettre", "infolettre?error=1");

            $email = $_POST["email"];
            $newsletter = new Newsletter();

            if(!$newsletter->verifyUniqueEmail($email)) $this->redirect("infolettre?error=3");

            $name = $_POST["name"];

            $success = $newsletter->subscribe($email, $name);

            if(!$success) $this->redirect("infolettre?error=5");
            $this->redirect($_SESSION["last_page?success=1"]);
        }

        /**
         * Process new categories and meal type to add into the databse
         *
         * @return void
         */
        public function addCategory()
        {
            if(empty($_POST)) $this->redirect("modifier-categories");
            if(empty($_POST["category"]) && empty($_POST["type"])) $this->redirect("modifier-categories?error=1");

            $success = false;
            if(!empty($_POST["category"])) $success = (new Categories)->insert($_POST["category"]);
            if(!empty($_POST["type"])) $success = (new Types)->insert($_POST["type"]);

            if($success) $this->redirect("modifier-menu?success=2");
            $this->redirect("modifier-menu?error=9");
        }

        /**
         * Process modifications on a specifif category
         *
         * @return void
         */
        public function modifyCategory()
        {
            $this->verifyPOST("modifier-categories", "modifier-categories?error=1");

            $type = $_POST["type"];
            $id = $_POST["id"];
            $name = $_POST["name"];

            if($type == "type") $success = (new Types)->edit($id, $name);
            else $success = (new Categories)->edit($id, $name);

            if($success) $this->redirect("modifier-categories?success=3");
            $this->redirect("modifier-categories?error=8");
        }

        /**
         * Process delete query of a category or type of meal
         *
         * @return void
         */
        public function deleteCategory()
        {
            $this->verifyPOST("modifier-categories", "modifier-categories?error=1");
            
            $type = $_POST["type"];
            $id = $_POST["id"];

            if($type == "type") $success = (new Types)->delete($id);
            else $success = (new Categories)->delete($id);

            if($success) $this->redirect("modifier-categories?success=4");
            $this->redirect("modifier-categories?error=8");
        }

        /**
         * Process new meal to add it in the database
         *
         * @return void
         */
        public function addMeal()
        {
            $this->verifyPOST("modifier-menu", "modifier-menu?error=1");

            $upload = new Upload("image", ["jpg", "jpeg", "png", "webp"]);
            if(!$upload->isValid()) $this->redirect("modifier-menu?error=10");

            $name = $_POST["name"];
            $type = $_POST["type"];
            $category = $_POST["category"];
            $description = $_POST["description"];
            $price = $_POST["price"];
            $image_path = $upload->moveTo("public/uploads");

            $success = (new Meals)->createMeal($name, $type, $category, $description, $price, $image_path);

            if($success) $this->redirect("menu?success=5");
            $this->redirect("modifier-menu?error=9");
        }

        /**
         * Process delete query of a meal
         *
         * @return void
         */
        public function deleteMeal() : bool
        {
            $this->verifyPOST("modifier-menu", "modifier-menu?error=1");

            $id = $_POST["id"];

            $success = (new Meals)->delete($id);

            if($success) $this->redirect("menu?success=6");
            $this->redirect("menu?error=9");
        }

        /**
         * Process modifications query of a meal
         * 
         * @return void
         */
        public function modifyMeal()
        {
            $this->verifyPOST("modifier-menu","modifier-menu?error=1");

            $name = $_POST["name"];
            $description = $_POST["description"];
            $type = $_POST["type"];
            $category = $_POST["category"];
            $price = $_POST["price"];
            $id = $_POST["id"];

            $success = (new Meals)->modifyMeal($name, $description, $type, $category, $price, $id);

            if(!$success) $this->redirect("modifier-menu?error=9");
            $this->redirect("modifier-menu?success=7");
        }

        /**
         * Process addition of a new category to a meal
         *
         * @return void
         */
        public function addNewCategory()
        {
            $this->verifyPOST("modifier-menu", "modifier-menu?error=1");

            $category_id = $_POST["category"];
            $meal_id = $_POST["meal"];

            if((new Meals)->addNewCategory($category_id, $meal_id)) $this->redirect("modifier-menu?success=8");
            $this->redirect("modifier-menu?error=9");
        }

        /**
         * Process delete query of a category for a specified meal
         *
         * @return void
         */
        public function deleteCategoryOfMeal()
        {
            $this->verifyPOST("modifier-menu", "modifier-menu?error=1");

            $category_name = $_POST["category_name"];
            $meal_id = $_POST["meal_id"];

            if((new Meals)->deleteCategoryOfMeal($category_name, $meal_id)) $this->redirect("modifier-menu?success=9");
            $this->redirect("modifier-menu?error=9");
        }

        /**
         * Verify is the user is an admin
         *
         * @return bool true if the user is an admin, false otherwise
         */
        public function verifyAdmin()
        {
            if(!$this->verifyUser()) return false;
            if(!isset($_SESSION["admin"]) || $_SESSION["admin"] != true) return false;
            return true;
        }

        /**
         * Verify if the user is a connected user
         *
         * @return bool true if the user is connected, false otherwise
         */
        public function verifyUser()
        {
            if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == 0) return false;
            return true;
        }

        /**
         * Log out the user
         *
         * @return void
         */
        public function logOut()
        {
            $_SESSION["user_id"] = 0;
            $this->redirect("index");
        }
    }

?>