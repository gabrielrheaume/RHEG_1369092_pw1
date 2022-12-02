<?php
    
    require_once("bases/Model.php");

    class Comments extends Model
    {
        // Model has to specify his table
        protected $table = "comments";
    }
?>