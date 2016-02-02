<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Accueil</title>
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
    <?php include_once('navbar.php'); ?>
   
<!-- TABLEAU DES TOUS LES VEHICULES AFFICHES PAR ID DESC -->

    <table class="table table-bordered table-striped table-condensed table-hover">
        <caption>
            <h2>Liste de tous les véhicules classés du plus récent au plus ancien</h2>
        </caption>
        <thead>
            <tr>
                <th>Type</th>
                <th>Marque</th>
                <th>Modèle</th>
                <th>Couleur</th>
                <th>Immatriculation</th>
                <th>Propriétaire</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                include_once('class/Vehicule.class.php');
                include_once('ouverture_bdd.php');

                $reponse = $bdd->query('SELECT id FROM vehicule ORDER BY id DESC');
                while($donnees = $reponse->fetch())
                {
                    $vehicule = new Vehicule($donnees['id']);
                    $vehicule->affiche_donnees_ligne();
                }
                $reponse->closeCursor();
            ?>
        </tbody>
    </table>
    <?php

    /* compter le nombre de vehicule et le nombre des voitures et moto */
    include_once('fonction/count.php');
    $totalveh = count_allveh();
    $totalvoiture = count_voitures();
    $totalmoto = count_motos();

    echo '<h4>La base de données compte ' . $totalveh . ' véhicules dont ' . $totalvoiture . ' voitures et ' . $totalmoto . ' motos.</h4><br />';
    ?>

 	<!-- jQuery -->

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    </body>
</html>