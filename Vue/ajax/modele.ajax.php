<?php

require_once '../../Modele/Modele.php';

class Ajax extends Modele {

// Renvoie la liste des commentaires associés à un billet


    // Ajoute un commentaire dans la base
    public function verifpseudo($pseudo) {
        $sql = 'SELECT pseudo, idpcl FROM client WHERE pseudo =?;';

        $pseudo1=$this->executerRequete($sql, array($pseudo));
     	
     	return $pseudo1->fetchall();
    }
    public function verifemail($email) {
        $sql = 'SELECT email, idpcl FROM client WHERE email =?;';

        $email=$this->executerRequete($sql, array($email));
     	
     	return $email->fetchall();
    }
}
?>
