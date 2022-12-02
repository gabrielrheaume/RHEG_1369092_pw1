<?php

    require_once("bases/Model.php");

    class Users extends Model
    {
        // Model has to specify his table
        protected $table = "users";   

        /**
         * Create account with received informations
         *
         * @param string $first_name
         * @param string $last_name
         * @param string $email
         * @param string $password
         * @return void
         */
        public function create(string $first_name, string $last_name, string $email, string $password)
        {
            $sql = "INSERT INTO $this->table (first_name, last_name, email, password)
                    VALUES (:first_name, :last_name, :email, :password)";
    
            $stmt = $this->pdo()->prepare($sql);
    
            return $stmt->execute([
                ":first_name" => $first_name,
                ":last_name" => $last_name,
                ":email" => $email,
                ":password" => password_hash($password, PASSWORD_DEFAULT)
            ]);
        }

        /**
         * Validate the informations given to connect user
         *
         * @param string $email
         * @param string $password
         * @return boolean
         */
        public function log($email, $password) : bool
        {
            $sql = "SELECT *
                    FROM users
                    WHERE email = :email";

            $stmt = $this->pdo()->prepare($sql);

            $stmt->execute(["email" => $email]);

            $user = $stmt->fetch();

            if(!$user) return false;

            $matching_password = password_verify($password, $user["password"]);

            if(!$matching_password) return false;

            $_SESSION["user_id"] = $user["id"];
            if($user["admin"]) $_SESSION["admin"] = true;
            
            return true;
        }
    }

?>