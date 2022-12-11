<?php
    
    require_once("bases/Model.php");
    require_once("models/Types.php");

    class Categories extends Types
    {
        // Model has to specify his table
        protected $table = "categories";

        /**
         * Return all results of model's table
         *
         * @return array|false Associative array or false if error
         */
        public function all()
        {
            $sql = "SELECT *
                    FROM $this->table
                    ORDER BY $this->table.name";

            // Préparation de la requête            
            $stmt = $this->pdo()->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        }

        /**
         * Get all Categories of a meal
         *
         * @param int $meal_id
         * @return array
         */
        public function getMealCategories(int $meal_id) : array
        {
            $sql = "SELECT $this->table.name
            FROM $this->table
            JOIN meals_categories
            ON categories.id = meals_categories.category_id
            WHERE meals_categories.meal_id = $meal_id
            ORDER BY $this->table.name";

            $stmt = $this->pdo()->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        }
    }
?>