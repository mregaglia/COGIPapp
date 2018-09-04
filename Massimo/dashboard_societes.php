
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
      echo '<tr><td><a href="./update_societe.php?id='.$row['id_society'].'">' . $row['society_name'] .'</a></td><td>' . $row['society_phone'] . '</td><td>' . $row['type'] .'</td><td>' . '<i class="far fa-trash-alt"></i>' .'</td></tr>';
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
    <title>Dashboard sociétés</title>
    <link rel="stylesheet" href="../assets/css/basics.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  </head>
  <body>

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
  </body>
</html>
