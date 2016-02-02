<?php
/* fonction qui retourne un tableau de données en fonction du paramètre order by (couleur, immmat, etc) */
/* Fonction non utilisée dand l'appli car difficulté à mettre en oeuvre : peut on mettre en variable le nom d'une colonne dans la requête ?*/

function get_vehorderby($order)
{
	global $bdd;
	$req = $bdd->prepare('SELECT marque, modele, UPPER(type) as type_maj, couleur, immat, nom, prenom FROM vehicule
         	LEFT JOIN proprietaire ON vehicule.id_proprietaire = proprietaire.id
        	ORDER BY :order DESC');
	$req->bindParam(':order', $order, PDO::PARAM_STR);
    $req->execute();
    $vehicules = $req->fetchAll();

    return $vehicules;
    $req->closeCursor();
}

?>