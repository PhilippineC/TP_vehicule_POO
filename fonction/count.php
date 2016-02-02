<?php
/* fonction qui compte le nombre de vehicules, motos et voitures */

function count_allveh()
{
    global $bdd;
    $reponse = $bdd->query('SELECT COUNT(*) AS nbveh FROM vehicule');
    $totalveh = $reponse->fetch();
    $reponse->closeCursor();
    return $totalveh['nbveh'];
}

function count_voitures()
{
    global $bdd;
    $reponse = $bdd->query('SELECT COUNT(*) AS nbvoiture FROM vehicule WHERE type="voiture"');
    $totalvoiture = $reponse->fetch();
    $reponse->closeCursor();
    return $totalvoiture['nbvoiture'];
}

function count_motos()
{
    global $bdd;
    $reponse = $bdd->query('SELECT COUNT(*) AS nbmoto FROM vehicule WHERE type="moto"');
    $totalmoto = $reponse->fetch();
    $reponse->closeCursor();
    return $totalmoto['nbmoto'];
}

?>