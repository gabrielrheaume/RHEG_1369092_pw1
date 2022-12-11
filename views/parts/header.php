<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv=M'X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title><?= $title ?></title>
    
    <link rel="stylesheet" href="https://use.typekit.net/dfq0qcq.css">
    <link rel='stylesheet' href='public/css/font.css'>
    <link rel='stylesheet' href='public/css/style.css'>
</head>
<body>
    <header>
        <div class="logo"><a href="index"><img src="public/images/logo.png" alt="Logo du restaurant PUB G4"></a></div>
        <nav>
            <a href="menu" <?php if($_SESSION["actual_page"] && $_SESSION["actual_page"] == 'menu') {echo 'class="active"';} ?>>Menu</a>
            <a href="a-propos" <?php if($_SESSION["actual_page"] && $_SESSION["actual_page"] == 'a-propos') {echo 'class="active"';} ?>>À Propos</a>
            <a href="contact" <?php if($_SESSION["actual_page"] && $_SESSION["actual_page"] == 'contact') {echo 'class="active"';} ?>>Contact</a>
        </nav>
        <div class="reseaux">
            <a href="https://www.facebook.com/"><img src="public/images/facebook.png" alt="Logo de Facebook"></a>
            <a href="https://twitter.com/"><img src="public/images/twitter.png" alt="Logo de Twitter"></a>
            <a href="https://www.instagram.com/"><img src="public/images/instagram.png" alt="Logo d'Instagram"></a>
        </div>
        <div class="logout">
            <?php
                if(isset($_SESSION["user_id"]) && $_SESSION["user_id"] > 0)
                {
                    ?>
                        <a href="log-out">
                            <span>Déconnexion</span>
                            <img src="public/images/logout.png" alt="Logo de déconnexion blanc" class="logout_img">
                            <img src="public/images/logout_hover.png" alt="Logo de déconnexion orange" class="logout_img_hover">
                        </a>
                    <?php
                }
            ?>
        </div>
    </header>