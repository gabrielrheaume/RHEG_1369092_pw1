<?php

    require_once("bases/Messages.php");
    
    class Success extends Messages
    {
        /**
         * get and verify error and success in url to display a message
         * 
         * @return void
         */
        public static function getMessage()
        {
            if(isset($_GET["success"])) self::successSwitch($_GET["success"]);
        }

        /**
         * display chosen success message
         * 
         * @param int $success_number number of the success' message to display
         * @return void
         */
        public static function successSwitch($success_number)
        {
            ?> <div class='success'><p> <?php
            switch($success_number)
            {
                case 1 : ?> Votre abonnement à l'infolettre a été validé ! <?php break;
                case 2 : ?> Le compte a bien été créé ! <?php break;
                case 3 : ?> La catégorie a été modifiée <?php break;
                case 4 : ?> La catégorie a été supprimée <?php break;
                case 5 : ?> Le plat à été ajouté <?php break;
                case 6 : ?> Le plat a été supprimé <?php break;
                case 7 : ?> Le plat a été modifié avec succès ! <?php break;
                case 8 : ?> La catégorie a été ajoutée <?php break;
                case 9 : ?> La catégorie a été retirée du plat <?php break;
                default : return null;
            }
            ?> </p></div> <?php
        }
    }
?>