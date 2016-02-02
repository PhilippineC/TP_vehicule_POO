<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Tri par propriétaire</title>
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
    
<!-- FORMULAIRE DE SELECTION DU PROPRIETAIRE -->

<form method="post" action="parproprietaire.php">
<label for="proprietaire">Tri par propriétaire : </label>
<select name="proprietaire" id="proprietaire">

<?php
include_once('ouverture_bdd.php');

/* Boucle dans la BDD pour aller chercher tous les prenoms et noms et mémoriser le choix du propriétaire selectionné précedemment */
    $reponse = $bdd->query('SELECT nom, prenom FROM proprietaire');
    while($donnees = $reponse->fetch())
        {
?>
            <option value="<?php echo $donnees['nom'] . ' ' . $donnees['prenom'];?>" 
            <?php if (isset($_POST['proprietaire']) AND ($_POST['proprietaire'] == $donnees['nom'] . " " . $donnees['prenom'])) 
                {
                    echo 'selected="selected"';
                } 
                ?>
            ><?php echo $donnees['nom'] . ' ' . $donnees['prenom'];?></option>
<?php   
        }
?>
            <option value="tous" <?php if (isset($_POST['proprietaire']) AND ($_POST['proprietaire'] == 'tous')) 
                {
                    echo 'selected="selected"';
                } 
                ?>
            >Tous</option>
<?php
            $reponse->closeCursor();

/* Couper la chaine proprietaire en nom prenom avec explode */
$nom_prenom = explode(" ", $_POST['proprietaire']);
?>

<input type="submit" value="OK" />
</select>

<table class="table table-bordered table-striped table-condensed table-hover">
    <caption>
        <h2>
        <?php 
            if (isset($_POST['proprietaire']) AND $_POST['proprietaire'] == 'tous')
            {
                echo 'Liste de tous les véhicules classés par proriétaire'; 
            }
            elseif (isset($_POST['proprietaire']))
            {
                echo 'Liste des véhicules de ' . $_POST['proprietaire'];
            }
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
        <tr>

<!-- TRAITEMENT DU FORMULAIRE -->
<?php
if (isset($_POST['proprietaire']))
    {
    if ($_POST['proprietaire'] == 'tous') /* SI ON A CHOISI TOUS LES PROPRIETAIRES */
        {
            include_once('class/Vehicule.class.php');
            include_once('ouverture_bdd.php');
            $reponse = $bdd->query('SELECT id FROM vehicule ORDER BY id_proprietaire');
            while($donnees = $reponse->fetch())
            {
                $vehicule = new Vehicule($donnees['id']);
                $vehicule->affiche_donnees_ligne();
            }
            $reponse->closeCursor();

        }
    else /* SI ON A CHOISI UN PROPRIETAIRE */
        {

            include_once('class/Vehicule.class.php');
            include_once('ouverture_bdd.php');
            $reponse = $bdd->prepare('SELECT vehicule.id as idveh, nom, prenom FROM vehicule 
                LEFT JOIN proprietaire
                ON vehicule.id_proprietaire = proprietaire.id 
                WHERE nom=? AND prenom=?
                ORDER BY idveh DESC');
            $reponse->execute(array($nom_prenom[0], $nom_prenom[1]));
            while($donnees = $reponse->fetch())
            {
                $vehicule = new Vehicule($donnees['idveh']);
                $vehicule->affiche_donnees_ligne();
            }
?>
    </tbody>
</table>
<?php
            $nbr = $reponse->rowCount();
            if ($nbr == 0) /* SI AUCUN VEHICULE N'APPARTIENT A CE PROPRIETAIRE */
                {
                    echo '<em>Aucun véhicule pour ce propriétaire</em>';
                }
            $reponse->closeCursor();

        }

    }
?>  

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    </body>
 </html>