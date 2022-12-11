<?php
    
    require_once("bases/Model.php");

    class Types extends Model
    {
        // Model has to specify his table
        protected $table = "types";
        
        /**
         * Insert new category into the database
         *
         * @param string $category name of the category
         * 
         * @return bool true if successful, false otherwise
         */
        public function insert(string $category) : bool
        {
            $sql = "INSERT INTO $this->table (name)
                    VALUES (:category)";

            $stmt = $this->pdo()->prepare($sql);
    
            return $stmt->execute([
                ":category" => $category
            ]);
        }

        /**
         * Edit the name in the database
         *
         * @param int $id
         * @param string $name
         * 
         * @return bool true if successful, false otherwise
         */
        public function edit(int $id, string $name) : bool
        {
            $sql = "UPDATE $this->table
                    SET name = :name
                    WHERE id = $id";
            
            $stmt = $this->pdo()->prepare($sql);

            return $stmt->execute([
                ":name" => $name
            ]);
        }

        /**
         * Delete an item in the database
         *
         * @param int $id
         * 
         * @return bool
         */
        public function delete(int $id) : bool
        {
            $sql = "DELETE FROM $this->table
                    WHERE id = $id";
                
            $stmt = $this->pdo()->prepare($sql);

            return $stmt->execute();
        }

        /**
         * Get the type of a meal
         *
         * @param int $meal_id
         * @return string|false false if no result
         */
        public function getMealType(int $meal_id)
        {
            $sql = "SELECT $this->table.name
                    FROM $this->table
                    JOIN meals
                    ON $this->table.id = meals.type_id
                    WHERE meals.id = $meal_id";

            $stmt = $this->pdo()->prepare($sql);

            $stmt->execute();

            $result = $stmt->fetch();

            if(!$result) return false;
            return $result["name"];
        }
    }
?>