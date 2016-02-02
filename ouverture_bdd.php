 <?php
/* ouverture bdd */
 try
{
    $bdd = new PDO('mysql:host=localhost;dbname=phpv2', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
?>