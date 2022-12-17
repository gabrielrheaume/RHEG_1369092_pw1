<?php
    
    require_once("bases/Model.php");

    class Meals extends Model
    {
        // Model has to specify his table
        protected $table = "meals";

        /**
         * Add a new meal to the database
         *
         * @param string $name
         * @param int $type meal id
         * @param int $category meal category id
         * @param string $description
         * @param float $price
         * @param string $image_path
         * @return bool true if successful, false otherwise
         */
        function createMeal(string $name, int $type, int $category, string $description, float $price, string $image_path) : bool
        {
            $id = $this->addMeals($name, $description, $price, $image_path, $type);
            if(!$id) return false;
        
            $success = (new Meals_Categories)->addCategoryToMeal($id, $category);

            if(!$success) return false;
            return true;
        }

        /**
         * Add informations of the new meal in meals' table
         *
         * @param string $name
         * @param string $description   description of the new meal
         * @param float $price
         * @param string $image_path    image's source
         * @param int $type_id
         * @return int id of the new meal
         */
        public function addMeals(string $name, string $description, float $price, string $image_path, int $type_id) : int
        {
            $sql = "INSERT INTO $this->table (name, description, price, image, type_id)
                    VALUES (:name, :description, :price, :image_path, $type_id)";

            $success = $this->pdo()->prepare($sql)->execute([
                ":name" => $name,
                ":description" => $description,
                ":price" => $price,
                ":image_path" => $image_path
            ]);

            if(!$success) return 0;

            $sql = "SELECT LAST_INSERT_ID()";

            $stmt = $this->pdo()->prepare($sql);

            $stmt->execute();

            return $stmt->fetch()["LAST_INSERT_ID()"];
        }

        /**
         * Get all meals with their meals and categories
         *
         * @return array|false all meals with their meals and categories, false is there is no type result
         */
        public function getAllMealsAndCategories() : array
        {
            $sql = "SELECT *
                    FROM $this->table";
    
            $stmt = $this->pdo()->prepare($sql);
    
            $stmt->execute();
    
            $meals = $stmt->fetchAll();

            foreach ($meals as $key => $meal)
            {
                $success = (new Types)->getMealType($meal["id"]);
                if(!$success) return false;
                $meals[$key]["type"] = $success;

                $categories = (new Categories)->getMealCategories($meal["id"]);

                $meals[$key]["categories"] = (new SiteController)->betterDisplay($categories);
            }

            return $meals;
        }

        /**
         * Delete meal of the specified id and associated datas in the database
         *
         * @param int $id
         * @return bool
         */
        public function delete(int $id)
        {
            $success = (new Meals_Categories)->deleteLink($id);

            if(!$success) return false;

            $sql = "DELETE FROM $this->table
                    WHERE $this->table.id = $id";

            return $this->pdo()->prepare($sql)->execute();
        }

        /**
         * Modify informations about a meal in the database.
         *
         * @param string $name
         * @param string $description
         * @param int $type_id
         * @param int $category_id
         * @param float $price
         * @param int $id
         * @return bool true if successful, false otherwise
         */
        public function modifyMeal(string $name, string $description, int $type_id, int $category_id, float $price, int $id) : bool
        {
            $sql = "UPDATE $this->table
                    SET name = :name, description = :description, type_id = $type_id, price = :price
                    WHERE id = $id";

            $success = $this->pdo()->prepare($sql)->execute([
                ":name" => $name,
                ":description" => $description,
                ":price" => $price
            ]);

            if(!$success) return false;

            return (new Meals_Categories)->modifyLink($category_id, $id);
        }

        public function modifyMealPicture($image_path, $id)
        {
            $sql = "UPDATE $this->table
                    SET image = '$image_path'
                    WHERE id = $id";

            return $this->pdo()->prepare($sql)->execute();
        }
        
        /**
         * Verify if the meal type or category is selected and echo "selected" if it is
         *
         * @param int $meal_id
         * @param int $type_id
         * @return string "selected" if true, empty string otherwise
         */
        public function isTypeSelected(int $meal_id, int $type_id) : string
        {
            $sql = "SELECT *
                    FROM $this->table
                    WHERE $this->table.id = $meal_id
                    AND $this->table.type_id = $type_id";
                
            $stmt = $this->pdo()->prepare($sql);

            $stmt->execute();

            if($stmt->fetch()) return "selected";
            return "";
        }      

        /**
         * Verify is a category in select is selected or not 
         *
         * @param string $selected_category_name name of the current category to display as selected in the select
         * @param string $category_name_to_display name of the current category to add in the select
         * @return string "selected" if both are the same, empty string otherwise
         */
        public function isCategorySelected(string $selected_category_name, string $category_name_to_display) : string
        {
            if($selected_category_name == $category_name_to_display) return "selected";
            return "";
        }
    }
?>