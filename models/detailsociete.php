<?php
try {
  // Se connecter à MySQL via PDO
  $bdd = new PDO('mysql:host=localhost;dbname=cogipapp', 'root', 'root');

  // Insertion de données variables grâce à une requête préparée
  $id_society=$_GET["id"]; // or f


  if (filter_var ($id_society, FILTER_VALIDATE_INT)) {

  $req = $bdd->prepare(
    'SELECT societes.*, factures.facture_number, personnes.firstname, personnes.lastname
    FROM societes
    LEFT JOIN factures ON societes.id_society = factures.FK_societes
    LEFT JOIN personnes ON societes.id_society = personnes.FK_societes
    WHERE id_society = :id_society ');


  $req->bindParam(':id_society', $id_society);

  // On exécute la requête.
  $req->execute();

  // $req=$req->fetchAll();
  // print_r($req);

  // Fonction pour créer les row dans la table et l'appeler dans mon form html
  function newrow(){
    global $req; //définir la variable en global car elle est définie en dehors de la fonction
    foreach ($req as $row) { //récupération des éléments ligne par ligne

      echo '<tr><td>' . $row["society_name"] . '</td><td>' . $row["society_adress"] . '</td><td>' . $row["country"] . '</td><td>' . $row["TVA"] . '</td><td>' . $row["society_phone"] . '</td><td>' . $row["facture_number"] . '</td><td>' . $row["firstname"] . ' ' . $row["lastname"] . '</td></tr>';
    }
  }


  // $req=$req->fetchAll();
  // print_r($req);

  $bdd = null; // remettre la requête à zéro
  }
  else {
    echo "Qu'est-ce tu fais là?!";
  }

}

catch (\Exception $e) {
  die('Erreur: ' . $e->getMessage());
}

 ?>



 <!DOCTYPE html>
 <html lang="fr" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>detailsociete</title>
     <link rel="stylesheet" href="../assets/css/basics.css">
   </head>
   <body>
     <h1>Détail société</h1>
     <table>
       <tr>
         <th>Société</th>
         <th>Adresse</th>
         <th>Pays</th>
         <th>N° TVA</th>
         <th>Téléphone</th>
         <th>Facture</th>
         <th>Contact</th>
       </tr>
       <?php newrow(); //Appel de la fonction ?>
     </table>
   </body>

 </html>
