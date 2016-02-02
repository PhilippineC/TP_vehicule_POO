<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Résultat recherche</title>
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
 <?php include('navbar.php'); 


/* Traitement de la recherche */
$_POST['chercher'] = htmlspecialchars($_POST['chercher']);
if (empty($_POST['chercher'])) /* SI AUCUN CARACTERE SAISI*/
    {
        echo 'Veuillez saisir un mot pour effectuer une recherche.';
    }
else
    {
        $pattern = '#' . $_POST['chercher'] . '#i';
        $nb_result = 0;
        include_once('ouverture_bdd.php');
?> <!-- en tête du tableau -->
            <table class="table table-bordered table-striped table-condensed table-hover">
                <caption>
                  <h2>Résultat de la recherche du mot '<strong> <?php echo $_POST['chercher'] . '\' : ';?></strong></h2>
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
                    <tr>
<?php
        include_once('class/Vehicule.class.php');

        $requete = $bdd->query('SELECT id FROM vehicule');
        while($donnees = $requete->fetch())
        {
            $vehicule = new Vehicule($donnees['id']);
            $nb_result = $vehicule->search($pattern, $nb_result);
        }
        ?>
        </tbody>
    </table>
    <?php
       if ($nb_result==0)
        {
             echo '<h2>Aucun resultat</h2>';
        } 
        else
        {
            echo '<h3>' . $nb_result . ' résultat(s)</h3>';
        }
    }
?>


 	<!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    </body>
 </html>