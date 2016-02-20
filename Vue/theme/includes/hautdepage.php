<div class="navbar-wrapper">
        <nav class="navbar navbar-default navbar-fixed-top navbar-purity" role="navigation">
            <!-- We use the fluid option here to avoid overriding the fixed width of a normal container within the narrow content columns. -->
            <div class="container">
                 <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="Vue/theme/images/logo.png" width="225" id="logokhan" alt="...">
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="main-navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a   href="index.php"> <font class="glyphicon glyphicon-home"> Accueil</font></a>
                        
                        <li><a href="index.php?action=entreprise">Notre entreprise</a>
                        </li>
                        <?php if(isset($_SESSION['idp'])){ ?>

                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Votre espace membre<b class="caret"></b></a>
                         
                            <ul class="dropdown-menu">
                                <li>
                                </li>
                                <li><a href="index?action=voirprofil">Voir son profil</a>
                                </li>
                                <li><a href="index?action=profil">Modifier son</a>
                                <li><a href="index?action=deconnexion">Deconnexion</a>

                                </li>
                            </ul>
                        </li>
                     <?php   }
                        else
                        {
                        }
                        ?>
                        <li><a href="index.php?action=service">Nos Services</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Les coachs<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="portfolio.html">Rendez-vous disponible</a>
                                </li>
                                <li><a href="single-portfolio.html">Liste des coachs disponible</a>
                                </li>
                                <li><a href="single-portfolio.html">Profil des coachs</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="index.php?action=contact">Contactez nous</a>
                        </li>
                          <?php if(isset($_SESSION['idp'])){

                        }
                        else
                        {

                        ?>
                        <li class="">
                            <a data-toggle="modal" href="index.php?action=inscription" class="">Inscription</a>
                        </li>
                     <li class="">
                            <a data-toggle="modal" href="#signUpModal" class="">Sign Up</a>
                        </li>
                    
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">Connexion <b class="caret"></b></a>
                            <div class="dropdown-menu" style="padding: 15px;">
                                <form role="form" class="form-menu" method="post" action="index.php?action=connexion">
                                    
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="pseudo" name="pseudoc" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control"  id="mdp" name="mdpc"placeholder="Password">
                                    </div>
                                    <div class="checkbox">
                                        <label class="text-muted">
                                            <input type="checkbox">Souvenez vous de moi!
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-block btn-purity" value="Connexion" name="connexion">Connexion</button>
                                </form>
                            </div>
                        </li>
                    <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>