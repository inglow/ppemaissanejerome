<?php

require_once 'Modele/Inscription.php';
require_once 'Vue/Vue.php';

class ControleurInscription {

    private $personne;


    public function __construct() {
        $this->personne = new Inscription();

    }

    // Affiche les détails sur un billet
    public function inscription() {

        $vue = new Vue("Inscription");
        $vue->generer2();
        $this->verif($email,$pseudo);
    }


    public function personne($nomp, $prenomp, $adresse, $cp, $telephone, $email, $pseudo, $avatar, $mdp) {

        $this->personne->ajouterPersonne($nomp, $prenomp, $adresse, $cp, $telephone, $email, $pseudo, $avatar, $mdp);

    }

}

?>
