<?php

require_once 'Modele/Modele.php';

class Connexion extends Modele {


    public function wantConnexion($pseudo, $mdp) {
        $sql = "SELECT nomp, pseudo, prenomp , adresse, cp, mdp, telephone, email, avatar, pseudo, idpcl FROM client where pseudo='$pseudo' and mdp='$mdp';";
        $connexions = $this->executerRequete($sql);


        return $connexions->fetch();
    }


}
?>
