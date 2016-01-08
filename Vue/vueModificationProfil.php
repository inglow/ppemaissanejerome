<?php $this->titre = "Mon Blog - "; ?>
<form method="post" >
<h1> Modifier le profil.</h1>

<?php foreach ($profil as $profile): ?>
Nom :  <input type="text" name="nomp" value="<?= $profile['nomp'] ?>"><br>
prenom :  <input type="text" name="prenomp" value="<?= $profile['prenomp'] ?>"><br>
adresse :  <input type="text" name="adresse" value="<?= $profile['adresse'] ?>"><br>
Cp :  <input type="text" name="cp" value="<?= $profile['cp'] ?>"><br>
Téléphone :  <input type="text" name="telephone" value="<?= $profile['telephone'] ?>"><br>
Email :  <input type="text" name="email" value="<?= $profile['email'] ?>"><br>
Photos ou avatar :  <input type="text" name="avatar" value="<?= $profile['avatar'] ?>"><br>
Pseudo :  <input type="text" name="pseudo" value="<?= $profile['pseudo'] ?>"><br>
Mot de passe :  <input type="password" name="mdp" value="<?= $profile['mdp'] ?>">
<input type="hidden" name="idp" value="<?= $profile['idp'] ?>">

<input type="submit" name="Modifier" value="Modifier">

   
<?php endforeach; ?>



</form>
<?php
if(isset($_POST['Modifier'])){
 echo "Votre profil à été modifier";
}
 ?>