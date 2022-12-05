<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv=M'X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title><?= $title ?></title>
    <link rel='stylesheet' href='public/css/style.css'>
</head>
<body>
    <header>
        <a href="index">Accueil</a>
        <a href="menu">Menu</a>
        <a href="a-propos">À Propos</a>
        <a href="contact">Contact</a>
        <a href="https://www.facebook.com/">Facebook</a>
        <a href="https://twitter.com/">Twitter</a>
        <a href="https://www.instagram.com/">Instagram</a>
        <?php
            if(isset($_SESSION["user_id"]))
            {
                if($_SESSION["user_id"] > 0)
                {
                    ?>
                        <a href="log-out">Déconnexion</a>
                    <?php
                }
            }
        ?>
    </header>
    <?php
        Success::getMessage();
    ?>