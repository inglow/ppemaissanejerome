<?php

require_once 'Modele/Administrateur.php';
require_once 'Vue/Vue.php';

class ControleurAdmin {

    private $admin;


    public function __construct() {
        $this->admin = new Admin();

    }

    // Affiche les détails sur un billet
    public function ajouteradministrateur() {

        $vue = new Vue("ajouteradministrateur");
        $vue->generer2();
    }


    public function admin($nomp, $prenomp, $adresse, $cp, $telephone, $email, $pseudo, $avatar, $mdp) {

        $this->admin->AddAdmin($nomp, $prenomp, $adresse, $cp, $telephone, $email, $pseudo, $avatar, $mdp);

    }

}

?>
