<!doctype html>
<html lang="en">

<?php include("theme/includes/header.php"); ?>
<title><?= $titre ?></title>
<body>

		<?php include("theme/includes/hautdepage.php"); ?>
		<?php include ("theme/includes/imageheader.php"); ?>


						<div class="jayjay">
								
												<div class="top">
													<?php
													
													if(isset($_GET['action'])&&($_GET['action']=='deconnexion'))
														{
															echo "Vous êtes à présent déconnecté.";
														}
													
													else if(isset($_SESSION['nomp']) && isset($_SESSION['prenomp']))
													{
														echo "Bienvenue M ou Mme     ".$_SESSION['nomp']." ".$_SESSION['prenomp']."   <a href =\"index.php?action=deconnexion\">Deconnexion</a>";
													}
						else{ ?>
								<form method="post" action="index.php?action=connexion">

	 <font class="rouge">Votre Pseudo*</font> : <input id="pseudo" name="pseudo" type="text" placeholder="Votre pseudo" 
					 required />
 <font class="rouge">Votre mot de passe : </font><input id="mdp" name="mdp" type="password" placeholder="Votre mot de passe" 
					 required />
		<input type="submit" class="btn btn-danger"value="Connexion" name="connexion" >

</form>
<?php } ?>


					</div>
					<br>
					<br>
					<br>
					<div class="contenubody">
		<?= $contenu ?>

					<div/> 
					<br>
					<br>
					<br>


								<div class="bas">

								Trouvez votre coach particulier grâce à supremcoach!
						</div>
						</div>
	<?php include("theme/includes/footer.php"); ?>


	<?php include("theme/includes/signup.php"); ?>

	<?php include("theme/includes/signup.php"); ?>
	<?php include("theme/includes/scriptend.php"); ?>

</body>

</html>