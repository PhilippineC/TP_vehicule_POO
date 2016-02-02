<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Tri par type de véhicule</title>
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
    
<!-- FORMULAIRE DE SELECTION PAR TYPE AVEC MEMORISATION DU CHOIX AVEC SELECTED -->
<form method="post" action="partype.php">
<label for="type">Tri par type de véhicule : </label>
<select name="type" id="type">
<option value="voiture" <?php if (isset($_POST['type']) AND ($_POST['type'] == 'voiture')) 
    {
        echo 'selected="selected"';
    } 
    ?>
    >Voiture</option>
<option value="moto" <?php if (isset($_POST['type']) AND ($_POST['type'] == 'moto')) 
    {
        echo 'selected="selected"';
    } 
    ?>
>Moto</option>
<option value="tous" <?php if (isset($_POST['type']) AND ($_POST['type'] == 'tous')) 
    {
        echo 'selected="selected"';
    } 
    ?>
    >Tous</option>
<input type="submit" value="OK" />
</select>

<?php

/* AFFICHAGE DE LA BASE DE DONNEES EN FONCTION DU CHOIX */
if (isset($_POST['type']))
{
    ?>
    <table class="table table-bordered table-striped table-condensed table-hover">
        <caption>
            <h2>
            <?php 
            if ($_POST['type'] == 'tous') {echo 'Liste de tous les véhicules classés du plus récent au plus ancien'; }
            if ($_POST['type'] == 'voiture') {echo 'Liste de toutes les voitures classées de la plus récente à la plus ancienne'; }
            if ($_POST['type'] == 'moto') {echo 'Liste de toutes les motos classées de la plus récente à la plus ancienne'; }
            ?>
            </h2>
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

            if ($_POST['type'] == 'tous')
            {
                $reponse = $bdd->query('SELECT id FROM vehicule ORDER BY id DESC');
                while($donnees = $reponse->fetch())
                {
                     $vehicule = new Vehicule($donnees['id']);
                     $vehicule->affiche_donnees_ligne();
                }
                $reponse->closeCursor();
            }
            else 
            {
                $reponse = $bdd->prepare('SELECT id FROM vehicule WHERE type = ? ORDER BY id DESC');
                $reponse->execute(array($_POST['type']));
                while($donnees = $reponse->fetch())
                {
                     $vehicule = new Vehicule($donnees['id']);
                     $vehicule->affiche_donnees_ligne();
                }
                $reponse->closeCursor();
            }

            ?>  
        </tbody>
    </table>
<?php
}
?>
 	<!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    </body>
 </html>