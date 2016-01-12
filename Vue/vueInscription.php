<?php $this->titre = "Mon Blog - "?>


<header>
    <h1>Inscription</h1>
</header>

<form method="post" action="index.php?action=sinscrire">
  Votre pseudo:  <input id="pseudo" name="pseudo" type="text" minlength="6" placeholder="Votre pseudo" required><br/>
  Votre mot de passe:  <input id="mdp" name="mdp" type="password" minlength="6" placeholder="Votre mot de passe" required><br/>
  Votre email:  <input id="email" name="email" type="email" placeholder="Votre email" required><br/>
  Votre nom:  <input id="nomp" name="nomp" type="text" minlength="2" placeholder="Votre nom" required><br/>
  Votre prenom:  <input id="prenomp" name="prenomp" type="text" minlength="3" placeholder="Votre prenom" required><br/>

  Votre adresse:  <input id="adresse" name="adresse" type="text" placeholder="Votre adresse" required><br/>
  Votre code postal:  <input id="cp" name="cp" minlength="5" type="text" placeholder="Votre Code postal" required><br/>
  Votre téléphone:  <input id="telephone" name="telephone" minlength="10" type="text" placeholder="Votre téléphone" required><br/>

  Votre avatar ou photos:  <input id="avatar" name="avatar" type="text" placeholder="Votre avatar"><br/>





    <input type="submit" value="Inscription" name="Inscription" />
</form>
