<?php
    include("parts/header.php");
?>

<?php
    Errors::getMessage();
    Success::getMessage();
?>

<?php
    //$comments
?>

<!-- Heading Image -->
<div class="heading-image">
    <div class="text-area">
        <h1>PUB G4</h1>
        <h4 class="slogan">Si réel, mais <br>pourtant surréaliste<br></h4>
        <div class="paragraph">
            <p>Des plats succulents et variés vous attendent !</p>
        </div>
    </div>
</div>

<!-- Try Us Section -->
<section class="try-us">
    <div class="bloc-texte">
        <h2>Testez notre cuisine !</h2>
        <p>Maudit que ça l'air bon ! <br> Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio expedita molestias totam minus aut amet consectetur eum ut! Tempora iure nemo dolore repellendus officia ut culpa. Ea asperiores adipisci omnis!
        Nostrum cum maiores praesentium rerum, eius unde repudiandae alias a autem ad ex fuga neque quia porro blanditiis officia modi. Repellendus corrupti, reprehenderit optio doloribus maxime quos error molestias cumque.
        Error unde doloremque beatae, autem consectetur aperiam fugiat consequuntur exercitationem veniam nemo porro similique nulla. Porro dolorem eos nam doloribus aspernatur et nostrum sequi tenetur, quisquam quae natus veritatis dolorum.
        Nemo iusto dolorum corrupti asperiores.</p>
        <a href="menu">Notre Menu</a>
    </div>

    <div class="images">
        <div class="img1" alt="Un potage succulent !"></div>
        <div class="img2" alt="Un burger bien gras avec ses frites"></div>
        <div class="img3" alt="Un carré de brownie, servi avec son chapeau de crème glacée à la vanille transpercé d'un biscuit roulé, le tout arrosé d'un filet de chocolat et de caramel"></div>
        <div class="img4" alt="Une salade césar qui fera le bonheur des plus herboristes d'entre nous"></div>
    </div>
</section>

<!-- Experience Section -->
<section class="experience">
    <div class="exp-container">
        <img src="public/images/experience.png" alt="Un alléchant tartare aux légumes au centre de son assiette accompagné d'un gateau au fromage avec coulis de caramel">
    </div>

    <div class="bloc-texte">
        <h2>Une expérience !</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste porro ea excepturi ipsam vel officiis eligendi eaque odit molestiae deserunt delectus quas eius quo sapiente dignissimos, vitae aspernatur est hic.</p>
    </div>
</section>

<script src="public/js/experience.js"></script>

<?php
    include("parts/footer.php");
?>