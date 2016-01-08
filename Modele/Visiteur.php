<?php

require_once 'Modele/Modele.php';
/**
 * Fournit les services d'accès aux genres musicaux
 *
 * @author Baptiste Pesquet
 */
class Visiteur extends Modele {

// Renvoie la liste des commentaires associés à un billet

    // Ajoute un commentaire dans la base
    public function ajouterVisiteur($ip, $agent, $reference) {
        $sql = "INSERT INTO stats_visites (id,ip,agent,reference,date_visite)
  									   VALUES (NULL,?,?,?,CURRENT_TIMESTAMP)";

        $this->executerRequete($sql, array($ip, $agent, $reference));
    }
}
?>
