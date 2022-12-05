<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv=M'X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title><?= $title ?></title>
    <link href='https://fonts.googleapis.com/css?family=GFS Didot' rel='stylesheet'>
    <link rel='stylesheet' href='public/css/style.css'>
</head>
<body>
    <header>
        <div class="header-elements">
            <a href="index"><img src="public/images/logo.png" alt=""></a>
            <a href="menu">Menu</a>
            <a href="a-propos">À Propos</a>
            <a href="contact">Contact</a>
            <a href="https://www.facebook.com/"><img src="public/images/facebook.png" alt=""></a>
            <a href="https://twitter.com/"><img src="public/images/twitter.png" alt=""></a>
            <a href="https://www.instagram.com/"><img src="public/images/instagram.png" alt=""></a>
            <?php
                if(isset($_SESSION["user_id"]) && $_SESSION["user_id"] > 0)
                {
                    ?>
                        <a href="log-out">Déconnexion</a>
                    <?php
                }
            ?>
        </div>
    </header>
    <?php
        Success::getMessage();
    ?>