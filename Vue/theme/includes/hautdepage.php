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
                        <li><a   href="index.php"> <font class="glyphicon glyphicon-home"> Home</font></a>
                        
                        <li><a href="features.html">Features</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Votre espace membre<b class="caret"></b></a>
                         
                            <ul class="dropdown-menu">
                                <li>
                                </li>
                                <li><a href="index?action=voirprofil">Voir son profil</a>
                                </li>
                                <li><a href="index?action=profil">Modifier son</a>
                                <li><a href="index?action=profil">Deconnexion</a>

                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="blog.html">Blog Page</a>
                                </li>
                                <li><a href="single-blog.html">Single Post</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Portfolio <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="portfolio.html">Portfolio Page</a>
                                </li>
                                <li><a href="single-portfolio.html">Single Project</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="contact.html">Contact Us</a>
                        </li>
                        <li class="">
                            <a data-toggle="modal" href="#signUpModal" class="">Sign Up</a>
                        </li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">Sign In <b class="caret"></b></a>
                            <div class="dropdown-menu" style="padding: 15px;">
                                <form role="form" class="form-menu">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="checkbox">
                                        <label class="text-muted">
                                            <input type="checkbox">Remember me
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-block btn-purity">Submit</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>