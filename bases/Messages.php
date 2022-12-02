<?php
    
    class Messages
    {
        /**
         * get and verify error and success in url to display a message
         * 
         * @return void
         */
        public static function getMessage()
        {
            if(isset($_GET["error"])) self::errorSwitch($_GET["error"]);
            if(isset($_GET["success"])) self::successSwitch($_GET["success"]);
        }

        /**
         * display chosen error message
         * 
         * @param int $error_number the number associated with an error message
         * 
         * @return void
         */
        static function errorSwitch(int $error_number)
        {
            ?> <p class='error'> <?php
            switch($error_number)
            {
                default : ?> You should not see that message <?php
            }
            ?> </p> <?php
        }

        /**
         * display chosen success message
         * 
         * @param int $success_number the number associated with a success message
         * 
         * @return void
         */
        static function successSwitch($success_number)
        {
            ?> <p class='error'> <?php
            switch($success_number)
            {
                default : ?> You should not see that message <?php
            }
            ?> </p> <?php
        }
    }
?>