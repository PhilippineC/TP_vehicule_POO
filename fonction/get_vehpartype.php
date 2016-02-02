<?php
/* fonction qui retourne un tableau de données en fonction du type (moto, voiture) */

function get_vehpartype($type)
{
	global $bdd;
	$req = $bdd->prepare('SELECT marque, modele, upper(type) as type_maj, couleur, immat, nom, prenom FROM vehicule
             LEFT JOIN proprietaire
            ON vehicule.id_proprietaire = proprietaire.id
            WHERE type = :type
            ORDER BY vehicule.id DESC');
	$req->bindParam(':type', $type, PDO::PARAM_STR);
    $req->execute();
    $vehicules = $req->fetchAll();
    $req->closeCursor();
    return $vehicules;
}

?>