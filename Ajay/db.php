<?php
    try
    {
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=app;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
    }
    // $resultat = $bdd->query('SELECT * FROM factures');
    $resultat = $bdd->query('SELECT * FROM factures');

    // echo 'Votre message à bien été envoyer';

?>