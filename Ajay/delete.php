<?php

 try
{
    $bdd = new PDO('mysql:host=localhost;dbname=cogipapp;charset=utf8', 'root', '');
}
catch(Exception $e)
{
die('Erreur : '.$e->getMessage());
}

    if (isset ($_POST['button'])){
        $id_facture= $_POST['id_facture'];
        // $facture_number= $_POST['facture_number'];
        // $date= $_POST['date'];
        
        // $prestation= $_POST['prestation'];
        // $FK_societes= $_POST['FK_societes'];
        // $FK_personnes= $_POST['FK_personnes'];
        
        
       $bdd->exec("
        DELETE FROM 'factures' 
        WHERE  
        'id_facture'='.$id_facture.'");
  
   $bdd = new PDO('mysql:host=localhost;dbname=cogipapp;charset=utf8', 'root', '');
	$req= $bdd->exec('SELECT * FROM factures WHERE id_facture="'.$id_facture.'"');
	$donnees= $req->fetch();

}
	// var_dump($_POST[id_facture]);
?>

