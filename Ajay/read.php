
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
    $resultat = $bdd->query('SELECT * FROM factures ORDER BY date ASC LIMIT 0,5');

    // echo 'Votre message à bien été envoyer';

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>facturation</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href=main.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
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
                    <?php echo '<td class="tableau"><a href="../modeles/update.php"?id_facture='.$id_facture.'"><i class="fas fa-pencil-alt"></i></a></td>'?>
                    <?php echo '<td class="tableau"><a href="../vues/read.php"?id='.$id_facture.'"><i class="far fa-trash-alt"></i></a></td>'?>
                </tr>
                 <?php } ?>
    </table>
    <?php $resultat->closeCursor(); ?>

  </body>
  <?php require '../footer.php' ; ?>
</html>
