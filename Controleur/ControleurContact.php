<?php


require_once 'Vue/Vue.php';

class ControleurContact {
    
    public function vuecontact() {

        $vue = new Vue("Contact");
        $vue->generer2();
    }




}

?>
