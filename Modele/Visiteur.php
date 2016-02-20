<?php

require_once 'Modele/Modele.php';
/**
 * Fournit les services d'accès aux genres musicaux
 *
 * @author Baptiste Pesquet
 */
class Visiteur extends Modele {

// Renvoie la liste des commentaires associés à un billet
public $visite;
    // Ajoute un commentaire dans la base
    public function ajouterVisiteur($ip, $agent, $reference, $port ,$langue, $url) {

        $sql = "INSERT INTO stats_visites (id,ip,agent,reference,port,langue,url,date_visite)
  									   VALUES (NULL,?,?,?,?,?,?,CURDATE())";

        $this->executerRequete($sql, array($ip, $agent, $reference, $port, $langue, $url));
    }
public function visiteurparjour() {

        $sql = "SELECT COUNT(*) as nb1 FROM stats_visites where date_visite=curdate();";
$resultat2=$this->executerRequete($sql);

            return $resultat2;
				

        
    }
public function getVisiteurs() {
        $sql = 'select * from stats_visites'
             
                . ' order by id desc limit 1;';
        $visiteurs = $this->executerRequete($sql);
        return $visiteurs;
    }
}
?>
