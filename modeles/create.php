

<?php
if (isset ($_POST['button'])){
    try
    {
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=cogipapp;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
    }
     $bdd->exec("INSERT INTO
   	factures (
   	facture_number, 
   	date, 
    prestation,
    FK_societes,
    FK_personnes
    ) 
    VALUES(
    '".$_POST['facture_number']."',
    '".$_POST['date']."',
    '".$_POST['prestation']."',
    '".$_POST['FK_societes']."',
    '".$_POST['FK_personnes']."'
    )");
   
  
   
}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une facture</title>
	<link rel="stylesheet" href="main.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<?php require '../header.php' ; ?>
	<a href="../vues/read.php">Facturation</a>
	<h1>Ajouter</h1>
	<form action="#" method="post">
		<div>
			<label for="facture_number">Numéro de facture</label>
			<input type="number" name="facture_number" value="">
		</div>
		<div>
			<label for="date">Date</label>
			<input type="date" name="date" value="">
		</div>
		<div>
			<label for="prestation">prestation</label>
			<input type="text" name="prestation" value="">
		</div>
		<div>
			<label for="FK_societes">Client</label>
			<input type="number" name="FK_societes" value="">
		</div>
		<div>
			<label for="FK_personnes">Fournisseurs</label>
			<input type="number" name="FK_personnes" value="">
		</div>
        <button type="submit"  name="button">Facturer</button>
	</form>
</body>
<?php require '../footer.php' ; ?>
</html>