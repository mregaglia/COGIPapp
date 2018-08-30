<?php
	if (isset ($_POST['button'])){
	    try
	    {
	   	$bdd = new PDO('mysql:host=localhost;dbname=COGIPapp;charset=utf8', 'root', '');
	    }
	    catch(Exception $e)
	    {
	    die('Erreur : '.$e->getMessage());
	    }

		$id_facture= $_POST['id_facture'];
		$facture_number= $_POST['facture_number'];
		$date= $_POST['date'];
		$society_name= $_POST['society_name'];
		$prestation= $_POST['prestation'];
		
		
	   $bdd->exec("UPDATE factures SET  date='".$date."', society_name='".$society_name."', prestation='".$prestation."', facture_number='".$facture_number."' WHERE id_facture='".$id_facture."'");

		
		$bdd = new PDO('mysql:host=localhost;dbname=COGIPapp;charset=utf8', 'root', '');
		$req= $bdd->query('SELECT *, societes FROM factures, society_name  WHERE id_facture=id_facture');
		$donnees= $req->fetch();
		}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modifier une facture</title>
	<link rel="stylesheet" href="main.css" media="screen" title="no title" charset="utf-8">
</head>
	<body>
		<a href="../vues/read.php">Liste des factures</a>
		<h1>Modifier</h1>
		<form action="" method="POST">
	    	<div>
				<label for="id_facture">id</label>
				<input type="number" name="id_facture" value=<?php echo $donnees['id_facture'] ?>>
			</div>
			<div>
				<label for="facture_number">Numéro de la facture</label>
				<input type="text" name="facture_number" value=<?php echo $donnees['facture_number'] ?>>
			</div>
			<div>
				<label for="date">Date</label>
				<input type="date" name="date" value=<?php echo $donnees['date'] ?>>
			</div>
			<div>
				<label for="society_name">Entreprise</label>
				<input type="text" name="society_name" value=<?php echo $donnees['society_name'] ?>>
			</div>
			<div>
				<label for="prestation">Libellé</label>
				<input type="text" name="prestation" value=<?php echo $donnees['prestation'] ?>>
			</div>
			<button type="submit" name="button">Envoyer</button>
		</form>
	</body>
</html>