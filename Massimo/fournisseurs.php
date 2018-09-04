
<?php
try {
  // Se connecter à MySQL via PDO
  $bdd = new PDO('mysql:host=localhost;dbname=cogipapp', 'root', 'root');
  // Récupérer les données avec une requête SQL
  $data=$bdd->query('SELECT id_society, society_name FROM societes WHERE FK_type = 2');
  // Fonction pour créer les row dans la table et l'appeler dans mon form html
  function newrow(){
    global $data; //définir la variable en global car elle est définie en dehors de la fonction
    foreach ($data as $row) { //récupération des éléments ligne par ligne
      echo '<tr><td><a href="./detailsociete.php?id='.$row['id_society'].'">' . $row["society_name"] . '</a></td></tr>';
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
    <link rel="stylesheet" href="../assets/css/basics.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body class="bg-info">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a href="../index.php"> <img class="logo" src="../assets/images/cogip.png" alt="logo cogip"> </a>
  <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button> -->

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <!-- <li class="nav-item active">
        <a class="nav-link" href="/">Liste des factures <span class="sr-only">(current)</span></a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href="../Ajay/create.php">Facturation</a>
      </li>
			<li class="nav-item">
        <a class="nav-link" href="../Massimo/fournisseurs.php">Fournisseurs</a>
      </li>
			<li class="nav-item">
        <a class="nav-link" href="../Massimo/clients.php">Clients</a>
      </li>

  	</ul>
  </div>
</nav>
    <h1>Fournisseurs</h1>
    <table>
      <?php newrow(); //Appel de la fonction ?>
    </table>
    <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
      </body>
    </html>
