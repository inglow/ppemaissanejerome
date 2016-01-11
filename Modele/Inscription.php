<?php

require_once 'Modele/Modele.php';

class Inscription extends Modele {

// Renvoie la liste des commentaires associés à un billet


    // Ajoute un commentaire dans la base
    public function ajouterPersonne($nomp, $prenomp, $adresse, $cp, $telephone, $email, $pseudos, $avatar, $mdp) {
        $sql = 'insert into personne(nomp, prenomp, adresse, cp, telephone, email, pseudo, avatar, mdp)'
            . ' values(?, ?, ?, ?, ?, ?, ?, ?, ?)';

        $this->executerRequete($sql, array($nomp, $prenomp, $adresse, $cp, $telephone, $email, $pseudos, $avatar, $mdp));
    }
    
    public function verifmail($email) 
    {
        $sql='SELECT email FROM personne  WHERE email=?';
        $resultats->setFetchMode(PDO::FETCH_OBJ);
        $this->executeRequete($sql, $email);
    }
    
    public function verifpseudo($pseudo) 
    {
        $sql='SELECT pseudo FROM personne  WHERE pseudo=?';
        $resultats->setFetchMode(PDO::FETCH_OBJ);
        $this->executeRequete($sql, $pseudo);
    }
}
?>
