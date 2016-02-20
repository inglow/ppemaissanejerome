<?php
$nomp=$_POST['nomp'];
$prenomp=$_POST['prenomp']; 
$pseudo=$_POST['pseudo']; 
$email=$_POST['email']; 
$telephone=$_POST['telephone']; 
$cp=$_POST['cp'];
$mdp=$_POST['mdp'];

if(strlen($nomp)>=3 && strlen($prenomp)>=3 && strlen($cp)>=5 && strlen($pseudo)>=6 && strlen($telephone)==10 && strlen($mdp)>=6 )
	{
		echo "0";
	} 
	else
		{
		echo "1";

		}
?>