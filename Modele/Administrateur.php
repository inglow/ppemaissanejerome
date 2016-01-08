<?php

require_once 'Modele/Modele.php';

class Admin extends Modele {

// Renvoie la liste des commentaires associés à un billet


    // Ajoute un commentaire dans la base
    public function addAdmin($nomp, $prenomp, $adresse, $cp, $telephone, $email, $pseudo, $avatar, $mdp) {
        $sql = 'insert into administrateur(nomp, prenomp, adresse, cp, telephone, email, pseudo, avatar, mdp)'
            . ' values(?, ?, ?, ?, ?, ?, ?, ?, ?)';

        $this->executerRequete($sql, array($nomp, $prenomp, $adresse, $cp, $telephone, $email, $pseudo, $avatar, $mdp));
    }
}
?>
