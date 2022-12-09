<?php
    include("parts/header.php");
?>
<div class="site-container-contact">
    <section class="left">
        <h1>PUB G4</h1>
        <div class="address">
            <h2>Adresse :</h2>
            <p>297, rue St-Georges, Saint-Jérôme (Québec) J7Z 5A2</p>
        </div>
        <div class="business-hours">
            <div class="openclose">
                <?php
                    if($this->isOpen())
                    {
                        ?>
                            <div class="circle open"></div>
                            <p class="open">Ouvert</p>
                        <?php
                    }
                    else
                    {
                        ?>
                            <div class="circle close"></div>
                            <p class="close">Fermé</p>
                        <?php
                    }
                ?>
            </div>
            <h2>Heures d'Ouverture :</h2>
            <div class="days">
                <div class="days-left">
                    <p>Lundi : Midi à 1h AM</p>
                    <p>Mardi : Midi à 1h AM</p>
                    <p>Mercredi : Midi à 1h AM</p>
                    <p>Jeudi : Midi à 1h AM</p>
                </div>
                <div class="days-right">
                    <p>Vendredi : Midi à 1h AM</p>
                    <p>Samedi : Midi à 2h AM</p>
                    <p>Dimanche : Midi à 2h AM</p>
                </div>
            </div>
        </div>
        <div class="phone">
            <h2>Téléphone :</h2>
            <p>450 436-1531</p>
        </div>
    </section>

    <section class="right">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2782.7695403343355!2d-74.00374924112224!3d45.77580868463563!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccf2ca136664c05%3A0x90430ecdc061500!2s297%20Rue%20St%20Georges%2C%20Saint-J%C3%A9r%C3%B4me%2C%20QC%20J7Z%205A2!5e0!3m2!1sfr!2sca!4v1669329182655!5m2!1sfr!2sca" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
</div>

<?php
    include("parts/footer.php");
?>