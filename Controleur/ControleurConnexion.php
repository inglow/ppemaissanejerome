<?php

require_once 'Modele/Connexion.php';
require_once 'Vue/Vue.php';

class ControleurConnexion {

    private $connexion;


    public function __construct() {
        $this->connexion = new Connexion();

    }
 public function deconnexion() {
      

       $vue = new Vue("Deconnexion");
        $vue->generer2();
 session_destroy();
    }
    // Affiche les détails sur un billet
  
       public function connexion() {
      
        $vue = new Vue("Connexion");
       

       
        $vue->generer2();
    }

     public function connecter($pseudo, $mdp) {

        $connexions=$this->connexion->wantConnexion($pseudo, $mdp);
                            $_SESSION['pseudo']=$connexions['pseudo'];
                            $_SESSION['idp']=$connexions['idp'];
                            $_SESSION['nomp']=$connexions['nomp'];
                            $_SESSION['prenomp']=$connexions['prenomp'];
                            $_SESSION['adresse']=$connexions['adresse'];
                            $_SESSION['cp']=$connexions['cp'];
                            $_SESSION['telephone']=$connexions['telephone'];
                            
                            $_SESSION['email']=$connexions['email'];
                            $_SESSION['avatar']=$connexions['avatar'];
                            $_SESSION['pseudo']=$connexions['pseudo'];







       return $connexions;
    }

}

?>
