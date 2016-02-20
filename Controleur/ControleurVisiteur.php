<?php
require_once 'Modele/Visiteur.php';
require_once 'Vue/Vue.php';

class ControleurVisiteur
{
protected $ip;
protected $agent;
protected $referent;
protected $date_fr;
protected $port;
protected $url;
protected $langue;

private $Visiteur;
public function __construct()
	{
    $this->Visiteur = new Visiteur();
    $ip=$this->getIp();
    $agent=$this->getAgent();
    $port=$this->getPort();
    $url=$this->getUrl();
    $langue=$this->getLangue();
    	$this->url=$_SERVER['REQUEST_URI'];
    	$this->langue=$_SERVER['HTTP_ACCEPT_LANGUAGE'];

    	$this->port=$_SERVER['REMOTE_PORT'];
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
				  $this->Visiteur->ajouterVisiteur($this->getIp(), $this->getAgent(), $this->getReferent(), $this->getPort(), $this->getLangue(), $this->getUrl());	
				$this->Visiteur->visiteurparjour();
				
	} //Fin construct
	  public function visiteur() {
     $resultat1=$this->Visiteur->getVisiteurs();

     $resultat2=$this->Visiteur->visiteurparjour();
       foreach ($resultat2 as $resultats) {
                 $result=$resultats['nb1'];
                    
                }
        $vue = new Vue("Visiteur");
        $vue->generer(array('result' => $result, 'resultat1' => $resultat1));
    }
	public function getPort()
	{
	return $this->port;
	}
	public function getLangue()
	{
	return $this->langue;
	}
	public function getUrl()
	{
	return $this->url;
	}
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
public function addToFile($file)
	{
	//Stockage sur disque dans un fichier Visites.txt
		$fichier=fopen($file,"a+"); //création si inexistant + Ajout en fin de fichier
		$ret_char=chr(13);
		$chaine_to_write=$this->getIp().";".$this->getAgent().";".$this->getReferent().";".$ret_char;
		$chaine=fwrite($fichier,$chaine_to_write);
		fclose($fichier);//Fin enregistrement sur disque
	}

} // Fin Visites
// Améliorations à apporter dans une prochaine version
// Utiliser les Expressions régulière pour travailler les chaines de caractères issues de la variable agent
// détection des robot des visiteurs PC/MAC/LINUX/TABLETTE/SMARTPHONES etc...
// Stockage disque sous format XML
?>
