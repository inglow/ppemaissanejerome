<?php


require_once 'Vue/Vue.php';

class ControleurEntreprise {
    
    public function vueentreprise() {

        $vue = new Vue("Entreprise");
        $vue->generer2();
    }




}

?>
