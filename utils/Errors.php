<?php

    require_once("bases/Messages.php");
    
    class Errors extends Messages
    {
        /**
         * get and verify error and success in url to display a message
         * 
         * @return void
         */
        public static function getMessage()
        {
            if(isset($_GET["error"])) self::errorSwitch($_GET["error"]);
        }

        /**
         * display chosen error message
         * 
         * @param int $error_number number of the error's message to display
         * @return void
         */
        public static function errorSwitch(int $error_number)
        {
            ?> <div class='error'><p> <?php
            switch($error_number)
            {
                case 1 : ?> Un ou plusieurs champs sont manquants <?php break;
                case 2 : ?> Une erreur est survenue lors de la création du compte <?php break;
                case 3 : ?> Cet email a déjà été utilisé <?php break;
                case 4 : ?> Information(s) incorrecte(s) <?php break;
                case 5 : ?> Une erreur est survenue lors de la création du compte <?php break;
                case 6 : ?> Le formulaire demandé n'a pas pu être affiché <?php break;
                case 7 : ?> Les champs sont vides <?php break;
                case 8 : ?> Le champ est vid <?php break;
                case 9 : ?> Une erreur est survenue lors de l'exécution de la requête <?php break;
                case 10 : ?> L'image n'a pas pu être traitée <?php break;
                default : return null;
            }
            ?> </p></div> <?php
        }
    }
    
?>