<?php

    class Model {
        /**
         * Every instance contain the same connection
         *
         * @var PDO|null
         */
        private static $pdo = null;

        // It's a better practice to add it here even if it's not used by Model
        // "null" value can generate an error if it's not defined by a child-model
        protected $table = null;

        /**
         * Constructor  
         */
        public function __construct()
        {
            
        }

        /**
         * Return PDO connection and connect if needed
         *
         * @return PDO
         */
        protected function pdo()
        {
            // Verify if we have to connect
            if(static::$pdo == null){
                // Include connecton informations
                require "config/database.php";

                // Connexction
                static::$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

                // OConnection options
                static::$pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8'");
                static::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                static::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            }

            // Error message to developer if table's name is not defined in child-model
            if($this->table == null)
            {
                trigger_error("Table name is not defined in the model" . get_called_class(), E_USER_ERROR);
            }

            // return $this->pdo;
            return static::$pdo;
        }

        /**
         * Return all results of model's table
         *
         * @return array|false Associative array or false if error
         */
        public function all()
        {
            $sql = "SELECT *
                    FROM $this->table";

            // Préparation de la requête            
            $stmt = $this->pdo()->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        }

        /**
         * Return a model's element by ID
         *
         * @param integer $id
         * @return array|false Associative array or false if error
         */
        public function byId(int $id)
        {
            $sql = "SELECT *
                    FROM $this->table
                    WHERE id = :id";
            
            $stmt = $this->pdo()->prepare($sql);
            $stmt->execute([
                ":id" => $id
            ]);

            return $stmt->fetch();
        }

        /**
         * Return a model's element by name
         *
         * @param string $name
         * @return int|false Associative array or false if error
         */
        public function byName(string $name)
        {
            $sql = "SELECT $this->table.id
                    FROM $this->table
                    WHERE $this->table.name = '$name'";
            
            $stmt = $this->pdo()->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch();
            if(!$result) return false;
            return $result["id"];
        }

        /**
         * Verify if an email is unique
         *
         * @param string $email
         * @return boolean true if unique, false otherwise
         */
        public function verifyUniqueEmail(string $email) : bool
        {
            $sql = "SELECT email
                    FROM $this->table
                    WHERE email = :email";

            $stmt = $this->pdo()->prepare($sql);

            $stmt->execute(["email" => $email]);

            // if there is a result, it is not unique
            if($stmt->fetch()) return false;
            return true;
        }
    }

?>