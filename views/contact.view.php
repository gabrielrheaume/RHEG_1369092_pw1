<?php
    include("parts/header.php");
?>

<?php
    if($this->isOpen())
    {
        ?>Ouvert<?php
    }
    else
    {
        ?>Fermé<?php
    }
?>

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2782.7695403343355!2d-74.00374924112224!3d45.77580868463563!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccf2ca136664c05%3A0x90430ecdc061500!2s297%20Rue%20St%20Georges%2C%20Saint-J%C3%A9r%C3%B4me%2C%20QC%20J7Z%205A2!5e0!3m2!1sfr!2sca!4v1669329182655!5m2!1sfr!2sca" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

<?php
    include("parts/footer.php");
?>