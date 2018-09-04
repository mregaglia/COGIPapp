<?php
try {
  // Se connecter à MySQL via PDO
  $bdd = new PDO('mysql:host=localhost;dbname=cogipapp', 'root', 'root');

  // Insertion de données variables grâce à une requête préparée
  $id_society=$_GET["id"];


  $soc=$bdd->prepare(
    "SELECT *
    FROM societes
    WHERE id_society = :id_society");

  $soc->bindParam(":id_society", $id_society, PDO::PARAM_INT);
  $soc->execute();
  $soc_value=$soc->fetch();

  $type=$bdd->prepare(
    "SELECT *
    FROM type");
  $type->execute();
  $type_value=$type->fetchAll();


  if (isset ($_POST['button'])){
          $id_society = $_GET["id"];
          $society_name = $_POST['society_name'];
          $society_phone = $_POST['society_phone'];
          $type = $_POST['type'];

         $bdd->exec("
          UPDATE societes
          SET
          society_name ='.$society_name.',
          society_phone='.$society_phone.',
          type='.$type.'
          WHERE
          id_society='.$id_society.'");
      }



  // $req=$req->fetchAll();
  // print_r($req);

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
  </head>
  <body>
    <h1>Modifier données</h1>

    <form action="" method="post">

      <div>
  			<label for="name">Société</label>
  			<input type="text" name="name" value="<?= $soc_value["society_name"] ?>">
  		</div>
      <div>
        <label for="phone">Téléphone</label>
        <input type="tel" name="phone" value="<?= $soc_value["society_phone"] ?>">
      </div>

  		<div>
  			<label for="type">Type</label>
  			<select name="type">
          <?php foreach ($type_value as $baba) { ?>
            <option value="<?= $baba['id_type']; ?>"
            <?php if($baba['id_type']==$soc_value['FK_type']){
            echo 'selected';
          }?>>
          <?= $baba['type']; ?></option>
          <?php } ?>

  			</select>
  		</div>

  		<button type="submit" name="button">Envoyer</button>

    </form>

  </body>
</html>
