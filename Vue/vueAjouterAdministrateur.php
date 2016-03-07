<?php $this->titre = "Mon Blog - "?>


<header>
    <h1>Ajouter un administrateur</h1>
</header>

<form method="post" action="index.php?action=ajouteradmin">
  Le pseudo:  <input id="pseudo" name="pseudo" type="text" placeholder="Votre pseudo"><br/>
  Le mot de passe:  <input id="mdp" name="mdp" type="password" placeholder="Votre mot de passe"><br/>
  Le email:  <input id="email" name="email" type="email" placeholder="Votre email"><br/>
  Le nom:  <input id="nomp" name="nomp" type="text" placeholder="Votre nom"><br/>
  Le prenom:  <input id="prenomp" name="prenomp" type="text" placeholder="Votre prenom"><br/>

  L' adresse:  <input id="adresse" name="adresse" type="text" placeholder="Votre adresse"><br/>
  Le code postal:  <input id="cp" name="cp" type="text" placeholder="Votre Code postal"><br/>
  Le téléphone:  <input id="telephone" name="telephone" type="text" placeholder="Votre téléphone"><br/>

  L'avatar ou la photos:  <input id="avatar" name="avatar" type="text" placeholder="Votre avatar"><br/>





    <input type="submit" value="Ajouter" name="Ajouter" />
</form>
