
<?php

 try
{
    $bdd = new PDO('mysql:host=localhost;dbname=cogipapp;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
die('Erreur : '.$e->getMessage());
}

    if (isset ($_POST['button'])){
        $id_facture= $_POST['id_facture'];
        $facture_number= $_POST['facture_number'];
        $date= $_POST['date'];

        $prestation= $_POST['prestation'];
        $FK_societes= $_POST['FK_societes'];
        $FK_personnes= $_POST['FK_personnes'];


       $bdd->exec("
        UPDATE factures
        SET
        date ='".$date."',

        prestation='".$prestation."',
        facture_number='".$facture_number."',
        FK_societes='".$FK_societes."',
        FK_personnes='".$FK_personnes."'
        WHERE
        id_facture='".$id_facture."'");




    }

        $req= $bdd->query('SELECT factures.*, societes.society_name FROM factures LEFT JOIN societes ON factures.FK_societes = societes.id_society WHERE id_facture= id_facture');
        $donnees= $req->fetch();


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


        <h1>Modifier</h1>
        <form action="" method="POST">
            <div>
                <label for="id_facture"></label>
                <input type="hidden" name="id_facture" value=<?php echo $donnees['id_facture'] ?>>
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
                <label for="prestation">Libellé</label>
                <input type="text" name="prestation" value=<?php echo $donnees['prestation'] ?>>
            </div>
            <div>
                <label for="FK_societes">Libellé</label>
                <input type="number" name="FK_societes" value=<?php echo $donnees['FK_societes'] ?>>
            </div>
            <div>
                <label for="FK_personnes">Libellé</label>
                <input type="number" name="FK_personnes" value=<?php echo $donnees['FK_personnes'] ?>>
            </div>
            <button type="submit" name="button">Envoyer</button>
        </form>


        <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
          </body>
        </html>
