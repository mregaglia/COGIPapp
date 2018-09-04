<?php
    try
    {
     // On se connecte à MySQL
     $bdd = new PDO('mysql:host=localhost;dbname=cogipapp;charset=utf8', 'root', 'root');
    }
    catch(Exception $e)
    {
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
    }
    // $resultat = $bdd->query('SELECT * FROM factures');
    $resultat = $bdd->query('SELECT * FROM factures ORDER BY date DESC LIMIT 0,5');

    // echo 'Votre message à bien été envoyer';

?>

<?php
try {
  // Se connecter à MySQL via PDO
  $bdd = new PDO('mysql:host=localhost;dbname=cogipapp', 'root', 'root');
  // Récupérer les données avec une requête SQL
  $data=$bdd->query(
    'SELECT societes.id_society, societes.society_name, societes.society_phone, type.type FROM societes
    LEFT JOIN type ON societes.FK_type = type.type
    ORDER BY id_society
    DESC LIMIT 0,5'
  );
  // Fonction pour créer les row dans la table et l'appeler dans mon form html
  function newrow(){
    global $data; //définir la variable en global car elle est définie en dehors de la fonction
    foreach ($data as $row) { //récupération des éléments ligne par ligne
      echo '<tr><td><a href="./Massimo/update_societe.php?id='.$row['id_society'].'">' . $row['society_name'] .'</a></td><td>' . $row['society_phone'] . '</td><td>' . $row['type'] .'</td><td>' . '<i class="far fa-trash-alt"></i>' .'</td></tr>';
    }
  }

  // $data=$data->fetchAll();
  // print_r($data);

  $bdd = null; // remettre la requête à zéro
}

catch (\Exception $e) {
  die('Erreur: ' . $e->getMessage());
}

?>

<!doctype html>
<html lang="fr">
  <head>
    <title>Hello, world!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./assets/css/basics.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body class="bg-info">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a href="./index.php"> <img class="logo" src="./assets/images/cogip.png" alt="logo cogip"> </a>
  <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button> -->

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <!-- <li class="nav-item active">
        <a class="nav-link" href="/">Liste des factures <span class="sr-only">(current)</span></a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href="./Ajay/create.php">Facturation</a>
      </li>
			<li class="nav-item">
        <a class="nav-link" href="./Massimo/fournisseurs.php">Fournisseurs</a>
      </li>
			<li class="nav-item">
        <a class="nav-link" href="./Massimo/clients.php">Clients</a>
      </li>

  	</ul>
  </div>
</nav>


<h1>Liste des factures</h1>
<table>
	<!-- Afficher la liste des randonnées -->
	<table class="tableau">
						<tr>
								<!-- <td class="tableau">id</td> -->
								<td class="tableau">id</td>
								<td class="tableau">Numéro de facture</td>
								<td class="tableau">date</td>
								<td class="tableau">Prestations</td>
								<!-- <td class="tableau">modification</td>
								<td  class="tableau">supprimer</td> -->
						</tr>
						<?php while ($donnees = $resultat->fetch()) { ?>
						 <tr>
								<?php $id_facture=$donnees['id_facture'];?>
								<td class="tableau"><?php echo $id_facture;?> </td>
								<td class="tableau"><?php echo $donnees['facture_number'];?> </td>
								<td class="tableau"><?php echo $donnees['date'];?></td>
								<td class="tableau"><?php echo $donnees['prestation'];?></td>
								<?php echo '<td class="tableau"><a href="./Ajay/update.php"?id_facture='.$id_facture.'"><i class="fas fa-pencil-alt"></i></a></td>'?>
								<?php echo '<td class="tableau"><a href="../vues/read.php"?id='.$id_facture.'"><i class="far fa-trash-alt"></i></a></td>'?>
						</tr>
						 <?php } ?>
</table>

<?php $resultat->closeCursor(); ?>

<br>

<h1>Dashboard sociétés</h1>
<table>
	<tr>
		<th>Société</th>
		<th>Téléphone</th>
		<th>Type</th>
		<th></th>
	</tr>
	<?php newrow(); //Appel de la fonction ?>
</table>




<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>
