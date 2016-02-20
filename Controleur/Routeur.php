<?php

require_once 'Controleur/ControleurAccueil.php';
require_once 'Controleur/ControleurBillet.php';
require_once 'Controleur/ControleurInscription.php';
require_once 'Controleur/ControleurVisiteur.php';
require_once 'Controleur/ControleurProfil.php';
require_once 'Controleur/ControleurConnexion.php';
require_once 'Controleur/ControleurAdministrateur.php';



require_once 'Vue/Vue.php';
class Routeur {

    private $ctrlAccueil;
    private $ctrlBillet;
    private $ctrlInscription;
    private $ctrlProfil;
    private $ctrlConnexion;
    private $ctrlAdmin;
    private $ctrlVisiteur;


    public function __construct() {
        $this->ctrlAccueil = new ControleurAccueil();
        $this->ctrlBillet = new ControleurBillet();
        $this->ctrlInscription = new ControleurInscription();
        $this->ctrlProfil= new ControleurProfil();
        $this->ctrlConnexion= new ControleurConnexion();
        $this->ctrlAdmin= new ControleurAdmin();
        $this->ctrlVisiteur= new ControleurVisiteur();


      session_start();
    }

    // Route une requête entrante : exécution l'action associée
    public function routerRequete() {
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'billet') {
                    $idBillet = intval($this->getParametre($_GET, 'id'));
                    if ($idBillet != 0) {
                        $this->ctrlBillet->billet($idBillet);
                    }

                    else
                        throw new Exception("Identifiant de billet non valide");
                }
                elseif ($_GET['action']=='inscription') {
                    $this->ctrlInscription->inscription();

                }
                else if ($_GET['action'] == 'connexion') {
                
                    if(isset($_POST['connexion']))
                    {
                        $pseudo = $this->getParametre($_POST, 'pseudo');
                        $mdp = $this->getParametre($_POST, 'mdp');
                        $mdp=md5($mdp);
                    $connexions=$this->ctrlConnexion->connecter($pseudo, $mdp);


                         if (is_array($connexions))
                         {
                            echo "vous êtes connecté.";
                     
                         }
                         else
                         {
                            echo "Mauvais mot de passe ou mausvais pseudo.";
                         }
                    }
                    $this->ctrlConnexion->connexion();
                    
                }
                elseif ($_GET['action']=='ajouteradmin') {
                    $this->ctrlAdmin->ajouteradministrateur();
                    if(isset($_POST['Ajouter'])){
                     $nomp = $this->getParametre($_POST, 'nomp');
                    $prenomp = $this->getParametre($_POST, 'prenomp');
                    $adresse = $this->getParametre($_POST, 'adresse');
                    $cp = $this->getParametre($_POST, 'cp');

                    $telephone = $this->getParametre($_POST, 'telephone');
                   
                    $email = $this->getParametre($_POST, 'email');
                    $pseudo = $this->getParametre($_POST, 'pseudo');
                    $avatar = $this->getParametre($_POST, 'avatar');
                    $mdp = $this->getParametre($_POST, 'mdp');
                    $mdp =md5($mdp);
                    $this->ctrlAdmin->admin($nomp, $prenomp, $adresse, $cp, $telephone, $email, $pseudo, $avatar, $mdp);
                }
                }
                elseif ($_GET['action']=='deconnexion') {
                    $this->ctrlConnexion->deconnexion();
                
                }
                 elseif ($_GET['action']=='visiteur') {
     $this->ctrlVisiteur->visiteur("Visiteur");
            
                
                }
                else if ($_GET['action'] == 'commenter') {
                    $auteur = $this->getParametre($_POST, 'auteur');
                    $contenu = $this->getParametre($_POST, 'contenu');
                    $idBillet = $this->getParametre($_POST, 'id');
                    $this->ctrlBillet->commenter($auteur, $contenu, $idBillet);
                }
                else if ($_GET['action'] == 'sinscrire') {
                    $nomp = $this->getParametre($_POST, 'nomp');
                    $prenomp = $this->getParametre($_POST, 'prenomp');
                    $adresse = $this->getParametre($_POST, 'adresse');
                    $cp = $this->getParametre($_POST, 'cp');

                    $telephone = $this->getParametre($_POST, 'telephone');
                   
                    $email = $this->getParametre($_POST, 'email');
                    $pseudo = $this->getParametre($_POST, 'pseudo');
                    $avatar = $this->getParametre($_POST, 'avatar');
                    $mdp = $this->getParametre($_POST, 'mdp');
                    $mdp =md5($mdp);
                    


                    $this->ctrlInscription->personne($nomp, $prenomp, $adresse, $cp, $telephone,  $email, $pseudo, $avatar, $mdp);
                    if(isset($_POST['Inscription']))
                    {
                    $this->verif($email,$pseudo);
                    if($etat != 0)
                    {
                    echo 'Ce mail / pseudo existe déjà';
                    }
                    else{
                    $this->ctrlConnexion->connexion();
                    }

                    }
                }
                elseif ($_GET['action']=='profil') {
                  if(isset($_POST['Modifier']))

                  {
                    $nomp = $this->getParametre($_POST, 'nomp');
                    $prenomp = $this->getParametre($_POST, 'prenomp');
                    $adresse = $this->getParametre($_POST, 'adresse');
                    $cp = $this->getParametre($_POST, 'cp');

                    $telephone = $this->getParametre($_POST, 'telephone');
                    $email = $this->getParametre($_POST, 'email');
                    $pseudo = $this->getParametre($_POST, 'pseudo');
                    $avatar = $this->getParametre($_POST, 'avatar');
                    $mdp = $this->getParametre($_POST, 'mdp');
                    $idp = $this->getParametre($_POST, 'idp');

                    $mdp =md5($mdp);
                    $this->ctrlProfil->modifierProfil($nomp, $prenomp, $adresse, $cp, $telephone, $email, $pseudo, $avatar, $mdp, $idp);
                   $this->ctrlProfil->voirprofil();
                  }
                  else 
                  {
                  $this->ctrlProfil->profil();

                  }

                }
                 elseif ($_GET['action']=='voirprofil') {
                  $this->ctrlProfil->voirprofil();

                }
                else
                    throw new Exception("Action non valide");
            }
            else {  // aucune action définie : affichage de l'accueil
                $this->ctrlAccueil->accueil();
            } 
        }
        catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }

    // Affiche une erreur
    private function erreur($msgErreur) {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }

    // Recherche un paramètre dans un tableau
    private function getParametre($tableau, $nom) {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        }
        else
            throw new Exception("Paramètre '$nom' absent");
    }

}
