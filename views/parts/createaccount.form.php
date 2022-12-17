<form action="create_account_submit" method="post">
    <div class="input-infos">
        <div class="input">
            <input type="email" name="email" placeholder="email@example.com" autofocus required>
            <span>E-mail :</span>
        </div>
        <div class="input">
            <input type="text" name="first_name" placeholder="James" required>
            <span>Prénom :</span>
        </div>
        <div class="input">
            <input type="text" name="last_name" placeholder="Smith" required>
            <span>Nom :</span>
        </div>
        <div class="input">
            <input type="password" name="password" placeholder="Mot de passe" required>
            <span>Mot de Passe :</span>
        </div>
    </div>
    <input type="submit" value="Créer" class="submit">
</form>