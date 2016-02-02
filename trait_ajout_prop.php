<?php

/* Vérification de toutes les données d'entrées du formulaire */

/* vérification de l'immatriculation */
$_POST['immatriculation'] = htmlspecialchars($_POST['immatriculation']);
$SUITE=true;

if (!(preg_match("#^[A-Z]{2}\-[0-9]{3}\-[A-Z]{2}$#", $_POST['immatriculation'])))
{
	$SUITE = false;
	echo '<p><strong>L\'immatriculation n\'est pas dans le format AA-111-BB. Merci de <a href="ajout_veh.php">recommencer</a>.</strong></p>';
}
if ($SUITE==true)
{

	/* desactivation des balises HTML du prénom et nom du propriétaire */
	$_POST['nom'] = htmlspecialchars($_POST['nom']);
	$_POST['prenom'] = htmlspecialchars($_POST['prenom']);

	/* recherche s'il existe dans la BDD, si oui on récupère son id, sinon on en créera un */
	include_once('ouverture_bdd.php');
	$req = $bdd->prepare('SELECT id, nom, prenom FROM proprietaire WHERE nom = :nom AND prenom = :prenom');
	$req->execute(array(
	    'nom' => $_POST['nom'],
	    'prenom' => $_POST['prenom']
	    ));
	$resultat = $req->fetch();
	$req->closeCursor();
	if (!$resultat)
	{
	    /* enregistrer le nouveau proprietaire dans la bdd proprietaire */
		$req = $bdd->prepare('INSERT INTO proprietaire(nom, prenom) VALUES(:nom, :prenom)');
		$req->execute(array(
		    'nom' => $_POST['nom'],
		    'prenom' => $_POST['prenom']
		     ));
		$req->closeCursor();
	    echo '<p><em>Nouveau proprietaire enregistré dans la base de données.</em></p>';

	 /* recupérer l'id du nouveau proprietaire */
	    $reponse = $bdd->query('SELECT LAST_INSERT_ID() FROM proprietaire');
		$nv_id = $reponse->fetch();
		$id_prop = $nv_id['LAST_INSERT_ID()'];
		$reponse->closeCursor();
	}

	else
	{
		$id_prop = $resultat['id'];
	}
}
/* Insertion de toutes ces données dans la BDD grâce à une requête préparée*/
if ($SUITE==true)
{
	$req = $bdd->prepare('INSERT INTO vehicule(marque, modele, type, couleur, immat, id_proprietaire) VALUES(:marque, :modele, :type, :couleur, :immat, :id_proprietaire)');
	$req->execute(array(
	    'marque' => $_POST['marque'],
	    'modele' => $_POST['modele'],
	    'type' => $_POST['type'],
	    'couleur' => $_POST['couleur'],
	    'immat' => $_POST['immatriculation'],
	    'id_proprietaire' => $id_prop
	    ));
	$req->closeCursor();
?>
	<!-- insertion de la page html qui suit -->

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
  <?php include('navbar.php'); ?>
   
<!-- TABLEAU DES TOUS LES VEHICULES AFFICHES PAR ID DESC -->
<p><strong>Le véhicule a bien été ajouté ! </strong></p>
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
 <?php
}
?>
 </html>