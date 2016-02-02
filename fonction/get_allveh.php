<?php
/* fonction qui retourne un tableau avec tte la base de données */

function get_allveh()
{
	global $bdd;
	$req = $bdd->query('SELECT marque, modele, upper(type) as type_maj, couleur, immat, nom, prenom FROM vehicule LEFT JOIN proprietaire ON vehicule.id_proprietaire = proprietaire.id
            ORDER BY vehicule.id DESC');
	$req->execute();
    $vehicules = $req->fetchAll();
    $req->closeCursor();
    return $vehicules;
}

?>