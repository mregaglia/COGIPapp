
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

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Fournisseurs</title>
    <link rel="stylesheet" href="../assets/css/basics.css">
  </head>
  <body>

    <h1>Fournisseurs</h1>
    <table>
      <?php newrow(); //Appel de la fonction ?>
    </table>
  </body>
</html>
