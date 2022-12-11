<?php
    
    require_once("bases/Model.php");

    class Types extends Model
    {
        // Model has to specify his table
        protected $table = "types";

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