<?php $this->titre = "Mon Blog - "; ?>
<article>
    <header>
        <h1>Connexion</h1>

    </header>


<header> 
<?php 

if(isset($_SESSION['idp'])){echo "Vous êtes connecté";}else {?>
<form method="post" action="index.php?action=connexion">
   Votre Pseudo* : <input id="pseudo" name="pseudo" minlength="6" type="text" placeholder="Votre pseudo" 
           required /><br/>
 Votre mot de passe : <input id="mdp" name="mdp" type="password" minlength="6" placeholder="Votre mot de passe" 
           required /><br/>
    <input type="submit" value="Connexion" name="connexion">
</form>
<?php }


if(isset($_POST['pseudo']) && $_POST['mdp'] != ''){
    echo 'OK';
}
else{
    echo 'Veuillez remplir correctement les champs';
}
?>
