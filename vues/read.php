<?php
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
    // $resultat = $bdd->query('SELECT * FROM factures');
    $resultat = $bdd->query('SELECT *,society_name FROM factures, societes');

    // echo 'Votre message à bien été envoyer';

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>facturation</title>
    <link rel="stylesheet" href="../modeles/main.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <h1>Liste des factures</h1>
    <table>
      <!-- Afficher la liste des randonnées -->
      <table class="tableau">
                <tr>
                    <!-- <td class="tableau">id</td> -->
                    <td class="tableau">id</td>
                    <td class="tableau1">Numéro de facture</td>
                    <td class="tableau">date</td>
                    <td class="tableau1">Entreprise</td>
                    <td class="tableau">Prestations</td>
                    <!-- <td class="tableau">modification</td>
                    <td  class="tableau">supprimer</td> -->
                </tr>
                <?php while ($donnees = $resultat->fetch()) { ?>
                 <tr>
                    <?php $id_facture=$donnees['id_facture'];?>
                    <td class="tableau"><?php echo $id_facture;?> </td>
                    <td class="tableau1"><?php echo $donnees['facture_number'];?> </td>
                    <td class="tableau"><?php echo $donnees['date'];?></td>
                    <td class="tableau1"><?php echo $donnees['society_name'];?></td>
                    <td class="tableau"><?php echo $donnees['prestation'];?></td>
                    <?php echo '<td class="tableau"><a href="../modeles/update.php"?id_facture='.$id_facture.'">modifier</a></td>'?>
                    <?php echo '<td class="tableau"><a href="../vues/read.php"?id='.$id_facture.'">supprimer</a></td>'?>
                    
                </tr>
                 <?php } ?>
    </table>
    <?php $resultat->closeCursor(); ?>
    
  </body>
</html>