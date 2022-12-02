<?php
    
    require_once("bases/Model.php");

    class Categories extends Model
    {
        // Model has to specify his table
        protected $table = "categories";

        /**
         * Insert new category into the database
         *
         * @param string $category name of the category
         * @return bool true if successful, false otherwise
         */
        public function insert($category)
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
         */
        public function edit($id, $name)
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
         */
        public function delete($id)
        {
            $sql = "DELETE FROM $this->table
                    WHERE id = $id";
                
            $stmt = $this->pdo()->prepare($sql);

            return $stmt->execute();
        }
    }
?>