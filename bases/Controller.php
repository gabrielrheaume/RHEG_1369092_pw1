<?php

    abstract class Controller {
        public function __construct(){}

        /**
         * Display error 404 if user goes in a non existant route
         * 
         * @return void
         */
        public function error404()
        {
            echo "Error 404";
        }

        /**
         * redirect to the specified route
         * 
         * @param string $route
         * 
         * @return void
         */
        public function redirect(string $route)
        {
            header("location:$route");
            exit;
        }

        /**
         * verify every items in POST array and redirect to the specified route if needed
         * 
         * @param string $route route to use if the user is not supposed to be here
         * @param string $error_route route to use if there is an empty value
         * 
         * @return void
         */
        public function verifyPOST(string $route, string $error_route)
        {
            if(empty($_POST)) $this->redirect($route);
            foreach($_POST as $param)
            {
                if(empty($param)) $this->redirect($error_route);
            }
        }

        /**
         * Keep track of the last and current pages
         *
         * @param string $actual_page
         * 
         * @return void
         */
        protected function setSessionPages($actual_page)
        {
            $_SESSION["last_page"] = $_SESSION["actual_page"];
            $_SESSION["actual_page"] = $actual_page;
        }
    }

?>