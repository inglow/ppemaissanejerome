<?php

require_once 'Modele/Profil.php';
require_once 'Vue/Vue.php';

class ControleurProfil {

    private $profil;

   

    public function __construct() {
        $this->profil = new Profil();
    }
  public function voirprofil() {
        $profil = $this->profil->seeProfil($_SESSION['idp']);
        $vue = new Vue("Profil");
        
        $vue->generer(array('profil' => $profil));
    }
    // Affiche les détails sur un billet
    public function profil() {
        $profil = $this->profil->seeProfil($_SESSION['idp']);
        $vue = new Vue("ModificationProfil");
        
        $vue->generer(array('profil' => $profil));
    }

    // Ajoute un commentaire à un billet
    public function modifierProfil($nomp, $prenomp, $adresse, $cp, $telephone, $email, $pseudo, $avatar, $mdp, $idp) {
        // Sauvegarde du commentaire

        $this->profil->updateProfil($nomp, $prenomp, $adresse, $cp, $telephone, $email, $pseudo, $avatar, $mdp, $idp);
        
    }

}

