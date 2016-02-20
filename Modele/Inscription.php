<?php

require_once 'Modele/Modele.php';

class Inscription extends Modele {

// Renvoie la liste des commentaires associés à un billet


    // Ajoute un commentaire dans la base
    public function ajouterPersonne($nomp, $prenomp, $adresse, $cp, $telephone, $email, $pseudos, $avatar, $mdp) {
        $sql = 'insert into client(nomp, prenomp, adresse, cp, telephone,etat,email, pseudo, avatar, mdp)'
            . ' values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
            $etat="actif";
        $this->executerRequete($sql, array($nomp, $prenomp, $adresse, $cp, $telephone, $etat ,$email, $pseudos, $avatar, $mdp));
    }
}
?>
