<?php
require_once 'Modele/Visiteur.php';
class ControleurVisiteur
{
protected $ip;
protected $agent;
protected $referent;
protected $date_fr;
private $Visiteur;
public function __construct()
	{
    $this->Visiteur = new Visiteur();
    $ip=$this->getIp();
    $agent=$this->getAgent();
    $reference=$this->getReferent();


  $this->Visiteur->ajouterVisiteur($ip, $agent, $reference);
		$this->ip =gethostbyname($_SERVER['REMOTE_ADDR']); 	//Adresse IP Visiteur
		$this->agent =$_SERVER['HTTP_USER_AGENT'];			//Information Navigateur
		if(empty($_SERVER['HTTP_REFERER']))				//site référent ou accès direct au site
				{
					$this->referent='DIRECT ACCESS';
				}
				else
				{
					$this->referent= addslashes($_SERVER['HTTP_REFERER']);
				}//fin site référent
		$this->date_fr = date('j/m/Y;H:i:s',time());
	} //Fin construct
public function getIp()
	{
	return $this->ip;
	}
public function getAgent()
	{
	return $this->agent;
	}
public function getReferent()
	{
	return $this->referent;
	}
public function getDate_fr()
	{
	return $this->date_fr;
	}
public function addToFile($file)
	{
	//Stockage sur disque dans un fichier Visites.txt
		$fichier=fopen($file,"a+"); //création si inexistant + Ajout en fin de fichier
		$ret_char=chr(13);
		$chaine_to_write=$this->getIp().";".$this->getAgent().";".$this->getDate_fr().";".$this->getReferent().";".$ret_char;
		$chaine=fwrite($fichier,$chaine_to_write);
		fclose($fichier);//Fin enregistrement sur disque
	}
public function sendToBdd($hote,$utilisateur,$motdepasse,$basededonnees)
	{
	// Ajout d'un enregsitrement dans la base de données
	//Stucture : TABLE :visites CHAMPS (id,ip,agent,referent,date_visite)
	$mysqli = new mysqli($hote,$utilisateur,$motdepasse,$basededonnees);
	if ($mysqli->connect_errno)
		{echo "Echec lors de la connexion à MySQL : " . $mysqli->connect_error;}
		else
		{   //Connexion à la base de données établie
			$adresseIp=$this->getIp();$navigateur=$this->getAgent();$provenance=$this->getReferent();
			$requete = $mysqli->query("INSERT INTO stats_visites (id,ip,agent,reference,date_visite)
									   VALUES (NULL,'$adresseIp','$navigateur','$provenance',CURRENT_TIMESTAMP)");
		}
	$mysqli->close();
	}
} // Fin Visites
// Améliorations à apporter dans une prochaine version
// Utiliser les Expressions régulière pour travailler les chaines de caractères issues de la variable agent
// détection des robot des visiteurs PC/MAC/LINUX/TABLETTE/SMARTPHONES etc...
// Stockage disque sous format XML
?>
