
<?php session_destroy(); $this->titre = "Mon Blog - "; ?>
<article>
    <header>
        <h1>Vous avez étais deconnecté. Vous pouvez vous reconnectez ci-dessous.</h1>
    </header>


<header>

<form method="post" action="index.php?action=connexion">
   Votre Pseudo* : <input id="pseudo" name="pseudoc" type="text" placeholder="Votre pseudo" 
           required /><br/>
 Votre mot de passe : <input id="mdp" name="mdpc" type="text" placeholder="Votre mot de passe" 
           required /><br/>
    <input type="submit" value="Connexion" name="connexion">
</form>

