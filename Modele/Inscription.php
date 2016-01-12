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
    
    public function verif($email,$pseudo) 
    {
        $sql='SELECT email, pseudo FROM personne  WHERE email=? and pseudo=?';
        $sql->bindParam(':pseudo', $pseudo);
        $sql->bindParam(':email', $email);
        $sql->execute();
        return $sql;
    }
}
?>
