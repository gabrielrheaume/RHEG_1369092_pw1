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
         * @param int $meal meal id
         * @param int $category meal category id
         * @param string $description
         * @param float $price
         * @param string $image_path
         * @return bool true if successful, false otherwise
         */
        function createMeal($name, $type, $category, $description, $price, $image_path) : bool
        {
            $id = $this->addMeals($name, $description, $price, $image_path, $type);
            if(!$id) return false;
        
            $success = $this->addCategoryToMeal($id, $category);

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
        public function addMeals($name, $description, $price, $image_path, $type_id) : int
        {
            $sql = "INSERT INTO meals (name, description, price, image, type_id)
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
         * Add informations about categories in the meals_categories table
         *
         * @param int $meal_id 
         * @param int $category
         * @return bool
         */
        public function addCategoryToMeal($meal_id, $category) : bool
        {
            $sql = "INSERT INTO meals_categories (meal_id, category_id)
                    VALUES ($meal_id, $category)";
            
            return $this->pdo()->prepare($sql)->execute();
        }

        /**
         * Get all meals with their meals and categories
         *
         * @return array all meals with their meals and categories
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
                $id = $meal["id"];

                $sql = "SELECT types.name
                        FROM $this->table
                        JOIN types
                        ON $this->table.type_id = types.id
                        WHERE $this->table.id = $id";

                $stmt = $this->pdo()->prepare($sql);

                $stmt->execute();

                $meals[$key]["type"] = $stmt->fetch()["name"];
    
                $sql = "SELECT categories.name
                        FROM meals_categories
                        JOIN categories
                        ON meals_categories.category_id = categories.id
                        WHERE meals_categories.meal_id = $id";

                $stmt = $this->pdo()->prepare($sql);
    
                $stmt->execute();

                $meals[$key]["categories"] = $this->betterDisplay($stmt->fetchAll());
            }

            return $meals;
        }

        /**
         * better display for categories array in each meal
         * 
         * @param array|bool $array, false if array is empty
         */
        public function betterDisplay($array)
        {
            if(empty($array)) return false;

            foreach($array as $item)
            {
                $result[] = $item["name"];
            }
            return $result;
        }

        /**
         * Delete meal of the specified id and associated datas in the database
         *
         * @param int $id
         * @return bool
         */
        public function delete($id)
        {
            $sql = "DELETE FROM meals_categories
                    WHERE meal_id = $id";

            $success = $this->pdo()->prepare($sql)->execute();

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
         * @param int $type
         * @param int $category
         * @param float $price
         * @param int $id
         * @return bool true if successful, false otherwise
         */
        public function modifyMeal($name, $description, $type, $category, $price, $id)
        {
            $sql = "UPDATE $this->table
                    SET name = :name, description = :description, type_id = $type, price = :price
                    WHERE id = $id";

            $success = $this->pdo()->prepare($sql)->execute([
                ":name" => $name,
                ":description" => $description,
                ":price" => $price
            ]);

            if(!$success) return false;

            $sql = "UPDATE meals_categories
                    SET category_id = $category
                    WHERE meal_id = $id";
                
            return $this->pdo()->prepare($sql)->execute();
        }

        /**
         * Get current type_id of a specific meal
         *
         * @param int $id
         * @return int type_id of the meal
         */
        public function getCurrentType($id)
        {
            $sql = "SELECT meals.type_id
                    FROM $this->table
                    WHERE meals.id = $id";
            
            $stmt = $this->pdo()->prepare($sql);
            
            $stmt->execute();

            return $stmt->fetch();
        }
        
        /**
         * Verify if the meal type or category is selected and echo "selected" if it is
         *
         * @param int $meal_id
         * @param int $type_id
         * @return string "selected" if true, empty string otherwise
         */
        public function isTypeSelected($meal_id, $type_id)
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
        public function isCategorySelected($selected_category_name, $category_name_to_display)
        {
            if($selected_category_name == $category_name_to_display) return "selected";
            return "";
        }

        /**
         * Verify is a category is already associated with a meal
         *
         * @param int $meal_id
         * @param int $category_id
         * @return string return "disabled" if it is already associated, empty string otherwise
         */
        public function isCategoryAssociated($meal_id, $category_id)
        {
            $sql = "SELECT *
                    FROM meals_categories
                    WHERE meal_id = $meal_id
                    AND category_id = $category_id";
            
            $stmt = $this->pdo()->prepare($sql);

            $stmt->execute();

            if($stmt->fetch()) return "disabled";
            return "";
        }

        /**
         * Add a new category to a meal
         *
         * @param int $category_id
         * @param int $meal_id
         * @return void
         */
        public function addNewCategory($category_id, $meal_id)
        {
            $sql = "INSERT INTO meals_categories (category_id, meal_id)
                    VALUES ($category_id, $meal_id)";
            
            return $this->pdo()->prepare($sql)->execute();
        }

        /**
         * Delete a specific category of a specific meal
         *
         * @param string $category_name
         * @param int $meal_id
         * @return bool true if successful, false otherwise
         */
        public function deleteCategoryOfMeal($category_name, $meal_id)
        {
            $sql = "SELECT categories.id
                    FROM categories
                    WHERE categories.name = '$category_name'";
            
            $stmt = $this->pdo()->prepare($sql);
            $stmt->execute();
            $category_id = $stmt->fetch()["id"];

            $sql = "DELETE FROM meals_categories
                    WHERE meals_categories.category_id = $category_id
                    AND meals_categories.meal_id = $meal_id";
            
            return $this->pdo()->prepare($sql)->execute();
        }
    }
?>