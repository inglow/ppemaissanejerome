<?php

require_once 'Modele/Inscription.php';
require_once 'Vue/Vue.php';

class ControleurInscription {

    private $personne;


    public function __construct() {
        $this->personne = new Inscription();

    }

    // Affiche les détails sur un billet
    public function inscription() {

        $vue = new Vue("Inscription");
        $vue->generer2();
    }


    public function personne($nomp, $prenomp, $adresse, $cp, $telephone, $email, $pseudo, $avatar, $mdp) {

        $this->personne->ajouterPersonne($nomp, $prenomp, $adresse, $cp, $telephone, $email, $pseudo, $avatar, $mdp);

    }
    public function uploadavatar()
    {
        if( isset($_POST['Inscription']) ) // si formulaire soumis
{
    $content_dir = '../Vue/avatar'; // dossier où sera déplacé le fichier

    $tmp_file = $_FILES['avatar']['tmp_name'];

    if( !is_uploaded_file($tmp_file) )
    {
        exit("Le fichier est introuvable");
    }

    // on vérifie maintenant l'extension
    $type_file = $_FILES['avatar']['type'];

    if( !strstr($type_file, 'jpg') && !strstr($type_file, 'jpeg') && !strstr($type_file, 'bmp') && !strstr($type_file, 'gif') )
    {
        exit("Le fichier n'est pas une image");
    }

    // on copie le fichier dans le dossier de destination
    $name_file = $_FILES['avatar']['name'];

    if( !move_uploaded_file($tmp_file, $content_dir . $name_file) )
    {
        exit("Impossible de copier le fichier dans $content_dir");
    }

    echo "Le fichier a bien été uploadé";
}
    }

}

?>
