<?php $this->titre = "Mon Blog - "; ?>
<article>
    <header>
        <h1>Connexion</h1>

    </header>


<header> 
<?php 

if(isset($_SESSION['idp'])){echo "Vous êtes connecté";}else {?>
<form method="post" action="index.php?action=connexion">
   Votre Pseudo* : <input id="pseudoc" name="pseudoc" type="text" placeholder="Votre pseudo" 
           required /><br/>
 Votre mot de passe : <input id="mdpc" name="mdpc" type="password" placeholder="Votre mot de passe" 
           required /><br/>
    <input type="submit" value="Connexion" name="connexion">
</form>
<?php }


if(isset($_POST['pseudoc']) && $_POST['mdpc'] != ''){
    echo 'OK';
}
else{
    echo 'Veuillez remplir correctement les champs';
}
?>
