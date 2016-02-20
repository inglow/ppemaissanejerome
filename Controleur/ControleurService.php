<?php


require_once 'Vue/Vue.php';

class ControleurService {
    
    public function vueservice() {

        $vue = new Vue("Service");
        $vue->generer2();
    }




}

?>
