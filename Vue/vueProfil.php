<?php $this->titre = "Mon Profil - "; ?>
<form method="post" >
<h1> Son profil.</h1>






</form>
<?php
foreach ($profil as $profile)
{
 	echo "Nom : ".$profile['nomp']." <a href=\"index?action=profil\">modifier</a>"."<br>".
 	"prenom : ".$profile['prenomp']." <a href=\"index?action=profil\">modifier</a>"."<br>".
 	"adresse : ".$profile['adresse']." <a href=\"index?action=profil\">modifier</a>"."<br>".
 	"cp : ".$profile['cp']." <a href=\"index?action=profil\">modifier</a>"."<br>".
 	"telephone : ".$profile['telephone']." <a href=\"index?action=profil\">modifier</a>"."<br>".
 	"email : ".$profile['email']." <a href=\"index?action=profil\">modifier</a>"."<br>".
 	"avatar : ".$profile['avatar']." <a href=\"index?action=profil\">modifier</a>"."<br>".
 	"pseudo : ".$profile['pseudo']." <a href=\"index?action=profil\">modifier</a>"."<br>";

}
 ?>