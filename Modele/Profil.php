<?php

require_once 'Modele/Modele.php';
/**
 * Fournit les services d'accès aux genres musicaux
 *
 * @author Baptiste Pesquet
 */
class Profil extends Modele {

// Renvoie la liste des commentaires associés à un billet
    public function seeProfil($idp) {
        $sql = "SELECT nomp, prenomp , adresse, cp, telephone, email, avatar, pseudo, mdp, idpcl FROM client where idpcl=?;";
        $requete = $this->executerRequete($sql, array($idp));
        return $requete;
    }

    // Ajoute un commentaire dans la base
    public function updateProfil($nomp, $prenomp, $adresse, $cp, $telephone, $email, $pseudo, $avatar, $mdp, $idp) {
        $sql = "UPDATE client SET nomp=?, prenomp=?,  adresse=?, cp=?, telephone=?, email=?, pseudo=?, avatar=?, mdp=? WHERE idpcl=?;";
        
        $this->executerRequete($sql, array($nomp, $prenomp, $adresse, $cp, $telephone, $email, $pseudo, $avatar, $mdp, $idp));
    }
}
?>
