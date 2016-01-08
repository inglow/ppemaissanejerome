<?php

require_once 'Modele/Coach.php';
require_once 'Vue/Vue.php';

class ControleurCoach{

    private $coach;


    public function __construct() {
        $this->coach = new Coach();

    }

    // Affiche les détails sur un billet
  
       public function coach() {
      
        $vue = new Vue("Connexion");
       

       
        $vue->generer2();
    }
    public function ajouterrdv() {
      
        $vue = new Vue("ajouterrdv");
       

       
        $vue->generer2();
    }



}

?>
