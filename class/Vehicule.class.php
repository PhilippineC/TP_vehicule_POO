<?php
class Vehicule
{
	private $idvehicule;
	private $marque;
    private $modele;
    private $type;
    private $couleur;
    private $immat;
    private $idproprietaire;
    private $nom;
    private $prenom;

	public function __construct($idVehicule)
	{
		// Récupérer en base de données les infos du vehicule
	/*	include_once('../ouverture_bdd.php');*/
		global $bdd;
		$req = $bdd->prepare('SELECT vehicule.id as vehid, marque, modele, type, couleur, immat, proprietaire.id as propid, nom, prenom FROM vehicule
            LEFT JOIN proprietaire
            ON vehicule.id_proprietaire = proprietaire.id
            WHERE vehicule.id = ?');
		$req->execute(array($idVehicule));
		$vehicule = $req->fetchAll();
	    $req->closeCursor();
	    
	    // Définir les variables avec les résultats de la base
	    foreach ($vehicule as $veh)
	    {
		    $this->idvehicule = $veh['vehid'];
	        $this->marque = $veh['marque'];
	        $this->modele = $veh['modele'];
	        $this->type = $veh['type'];
	        $this->couleur = $veh['couleur'];
	        $this->immat = $veh['immat'];
	        $this->idproprietaire = $veh['propid'];
	        $this->nom = $veh['nom'];
	        $this->prenom = $veh['prenom'];
    	}
	}

	public function maj($mot)
	{
		$motmaj = strtoupper($mot);
		return $motmaj;
	}

	public function affiche_donnees_ligne()
	{
		echo '<tr>';
		echo '<td>' . $this->maj($this->type) . '</td>';
        echo '<td>' . $this->marque . '</td>';
        echo '<td>' . $this->modele . '</td>';
        echo '<td>' . $this->couleur . '</td>';
        echo '<td>' . $this->immat . '</td>';
        echo '<td>' . $this->nom . ' ' . $this->prenom . '</td>';
        echo '</tr>';
	}


	public function search($mot, $result)
	{
		if (preg_match($mot, $this->type) OR
			 preg_match($mot, $this->marque) OR
			 preg_match($mot, $this->modele) OR
			 preg_match($mot, $this->couleur) OR
			 preg_match($mot, $this->immat) OR
			 preg_match($mot, $this->nom) OR 
			 preg_match($mot, $this->prenom))
        {
            echo '<tr>';
			echo '<td>' . $this->maj($this->type) . '</td>';
	        echo '<td>' . $this->marque . '</td>';
	        echo '<td>' . $this->modele . '</td>';
	        echo '<td>' . $this->couleur . '</td>';
	        echo '<td>' . $this->immat . '</td>';
	        echo '<td>' . $this->nom . ' ' . $this->prenom . '</td>';
	        echo '</tr>';
            $result ++;
        }
    return $result;    
	}
}

?>