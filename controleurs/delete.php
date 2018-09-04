<?php
require 'bd.sql';
?>
<?php
if (isset ($_POST['button'])) {
	 $id = $_POST['id'];
    
    try
    {
   	$bdd = new PDO('mysql:host=localhost;dbname=cogipapp;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
    die('Erreur : '.$e->getMessage());
    }

	$id_facture= $_POST['id_facture'];
	
   $bdd->exec("DELETE FROM factures WHERE id_facture='".$id_facture."'");
   $bdd = new PDO('mysql:host=localhost;dbname=cogipapp;charset=utf8', 'root', '');
	$req= $bdd->exec('SELECT * FROM factures WHERE id_facture="'.$id_facture.'"');
	$donnees= $req->fetch();

}
	// print_r($_GET['id'])
?>
