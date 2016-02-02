<div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
            <span class="navbar-brand"><strong>NOS VEHICULES</strong></span>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="accueil.php">Accueil</a></li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" href="accueil.php">Tri<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="partype.php">Par type</a></li>
                            <li><a href="parcouleur.php">Par couleur</a></li>
                            <li><a href="parimmat.php">Par immatriculation</a></li>
                            <li><a href="parproprietaire.php">Par propriétaire</a></li>
                        </ul>
                    </li>
                    <li><a href="ajout_veh.php">Ajout</a></li>
                </ul>   
                <form class="navbar-form inline-form navbar-right" method="post" action="result_recherche.php">
                    <div class="form-group">
                        <input type="search" name="chercher" id="chercher" class="input-sm form-control" placeholder="Recherche">
                            <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>