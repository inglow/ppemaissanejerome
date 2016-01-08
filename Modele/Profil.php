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
        $sql = "SELECT nomp, prenomp , adresse, cp, telephone, email, avatar, pseudo, mdp, idp FROM personne where idp=?;";
        $commentaires = $this->executerRequete($sql, array($idp));
        return $commentaires;
    }

    // Ajoute un commentaire dans la base
    public function updateProfil($nomp, $prenomp, $adresse, $cp, $telephone, $email, $pseudo, $avatar, $mdp, $idp) {
        $sql = "UPDATE personne SET nomp=?, prenomp=?, idp=?, adresse=?, cp=?, telephone=?, email=?, pseudo=?, avatar=?, mdp=? WHERE idp=?;";
        
        $this->executerRequete($sql, array($nomp, $prenomp, $idp, $adresse, $cp, $telephone, $email, $pseudo, $avatar, $mdp, $idp));
    }
}
?>
