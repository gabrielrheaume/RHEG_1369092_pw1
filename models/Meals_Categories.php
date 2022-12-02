<?php
    
    include_once("bases/Model.php");

    class Meals_Categories extends Model
    {
        // Model has to specify his table
        protected $table = "meals_categories";
        
        /**
         * Add informations about categories in the meals_categories table
         *
         * @param int $meal_id 
         * @param int $category_id
         * @return bool
         */
        public function addCategoryToMeal(int $meal_id, int $category_id) : bool
        {
            $sql = "INSERT INTO meals_categories (meal_id, category_id)
                    VALUES ($meal_id, $category_id)";
            
            return $this->pdo()->prepare($sql)->execute();
        }

        /**
         * Delete a link between a meal and a category
         *
         * @param int $meal_id
         * @return bool
         */
        public function deleteLink(int $meal_id) : bool
        {            
            $sql = "DELETE FROM $this->table
                    WHERE $this->table.meal_id = $meal_id";

            return $this->pdo()->prepare($sql)->execute();
        }

        /**
         * Modify a link between a meal and a category
         *
         * @param int $category_id
         * @param int $meal_id
         * @return bool true if successful, false otherwise
         */
        public function modifyLink(int $category_id, int $meal_id) : bool
        {
            $sql = "UPDATE $this->table
                    SET category_id = $category_id
                    WHERE meal_id = $meal_id";
        
            return $this->pdo()->prepare($sql)->execute();
        }

        /**
         * Verify if a category is already associated with a meal
         *
         * @param int $meal_id
         * @param int $category_id
         * @return string return "disabled" if it is already associated, empty string otherwise
         */
        public function isCategoryAssociated(int $meal_id, int $category_id) : string
        {
            $sql = "SELECT *
                    FROM $this->table
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
         * @return bool true if successful, false otherwise
         */
        public function addNewCategory(int $category_id, int $meal_id) : bool
        {
            $sql = "INSERT INTO $this->table (category_id, meal_id)
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
        public function deleteCategoryOfMeal(string $category_name, int $meal_id) : bool
        {
            $category_id = (new Categories)->byName($category_name);

            if(!$category_id) return false;

            $sql = "DELETE FROM $this->table
                    WHERE $this->table.category_id = $category_id
                    AND $this->table.meal_id = $meal_id";
            
            return $this->pdo()->prepare($sql)->execute();
        }
    }
?>