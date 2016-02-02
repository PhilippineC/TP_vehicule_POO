<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Ajout d'un véhicule</title>
    <!--Police-->
    <link href='https://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
    <!-- Bootstrap -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

     <!-- Style personnalisés -->
    <link rel="stylesheet" type="text/css" href="style.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </style>
    </head>
 
    <body>

<!-- Barre de naviguation fixe en haut de la page -->
  <?php include('navbar.php'); ?>
    
<!-- FORMULAIRE D'AJOUT -->
<h1>Ajouter un nouveau véhicule</h1><br />

    <div class="container-fluid">
          <form class="form-horizontal" method="post" action="trait_ajout_prop.php">
            <fieldset>
                <div class="form-group">
                  <label class="control-label" for="type">Type du véhicule</label>  
                    <select name="type" id="type" class="form-control">
                    <option value="voiture">Voiture</option>
                    <option value="moto">Moto</option>
                    </select>
                </div>

                <div class="form-group">
                <label class="control-label" for="marque">Marque</label>  
                    <select name="marque" id="marque" class="form-control">
                    <optgroup label="Voiture">
                       <option value="Audi">Audi</option>
                        <option value="BMW">BMW</option>
                        <option value="Citroen">Citroen</option>
                        <option value="Peugeot">Peugeot</option>
                    </optgroup>
                    </optgroup>
                    <optgroup label="Moto">
                            <option value="Aprilia">Aprilia</option>
                            <option value="Benelli">Benelli</option>
                            <option value="Cagiva">Cagiva</option>
                            <option value="Kawasaki">Kawasaki</option>
                    </optgroup>
                    </select>
                </div>

                <div class="form-group">
                <label class="control-label" for="modele">Modèle</label>  
                    <select name="modele" id="modele" class="form-control">
                    <optgroup label="<---------Voiture--------------->">
                        <optgroup label="Audi">
                            <option value="A1">A1</option>
                            <option value="A2">A2</option>
                            <option value="A3">A3</option>
                            <option value="A4">A4</option>
                        </optgroup>
                        <optgroup label="BMW">
                            <option value="X1">X1</option>
                            <option value="X2">X2</option>
                            <option value="X3">X3</option>
                            <option value="X5">X5</option>
                        </optgroup>
                         <optgroup label="Citroen">
                            <option value="C1">C1</option>
                            <option value="C2">C2</option>
                            <option value="C3">C3</option>
                            <option value="C4">C4</option>
                        </optgroup>
                        <optgroup label="Peugeot">
                            <option value="106">106</option>
                            <option value="206">206</option>
                            <option value="308">308</option>
                            <option value="2008">2008</option>
                        </optgroup>
                    </optgroup>
                    <optgroup label="<-------------Moto--------------->">
                        <optgroup label="Aprilia">
                            <option value="shiver">Shiver</option>
                        </optgroup>
                         <optgroup label="Benelli">
                            <option value="Tornado">Tornado</option>
                         </optgroup>
                        <optgroup label="Cagiva">
                            <option value="mito">Mito</option>
                         </optgroup>
                        <optgroup label="Kawasaki">
                            <option value="KDX">KDX</option>
                            <option value="Z1000">Z1000</option>
                            <option value="KXF">KXF</option>
                            <option value="Z750S">Z750S</option>
                        </optgroup>
                    </optgroup>
                    </select>
                </div>

                <div class="form-group">
                  <label class="control-label" for="couleur">Couleur</label>  
                    <select name="couleur" id="couleur" class="form-control">
                    <option value="blanc">blanc</option>
                    <option value="bleu">bleu</option>
                    <option value="gris">gris</option>
                    <option value="noir">noir</option>
                    <option value="rouge">rouge</option>
                    <option value="vert">vert</option>
                    <option value="violet">violet</option>
                    </select>
                </div>


                <div class="form-group">
                  <label class="control-label" for="immatriculation">Immatriculation</label>  
                    <input id="immatriculation" name="immatriculation" class="form-control" type="text">
                    <span class="help-block">Le format attendu est AA-111-BB.</span>  
                </div>


                <div class="form-group">
                    <label class="control-label" for="nom">Nom du propriétaire :</label>
                    <input type="text" name="nom" id="nom" class="form-control" />
                </div>
                <div class="form-group">
                    <label class="control-label" for="prenom">Prénom du propriétaire :</label>
                    <input type="text" name="prenom" id="prenom" class="form-control" />
                </div>

                <div class="form-group">
                    <label class="control-label" for="ajouter"></label>
                    <button id="ajouter" name="ajouter" class="btn btn-primary">Ajouter</button>
                </div>

              </fieldset>
            </form>
        </div>


    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    </body>
 </html>