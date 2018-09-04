<?php
if(empty($_POST['code'])){header("../index.php");}
?>
<DOCTYPE.html>
    <html lang="fr">
    <head>
        <meta http-equiv="content-type" content="text/html"; charset="UTF-8"/>
        <title>Modifiez vos coordonnées</title>
    </head>
    <body>
<?php
include ("header.php");
$idcom=connexpdo('obj1','obj2');
if(!isset($_POST['modif']))
{
$code=(integer)($POST['code']);
    //requête SQL
$requete="SELECT * FROM `personnes` WHERE `id_personnes`='$code'";
$result=$idcom->query ($requete);
$coord=$result->fetch(PDO::FETCH_NUM);
    //Création du formulaire complété avec les données existantes
echo "<form action=\"".$_SERVER['PHP_SELF']."\"method=\"post\"enctype='\"applicaton/x-/xx-www-form-urlencoded\">";
echo"<fildset>";
echo"<legend><b>Modifiez vos coordonées</b></legend>";
echo"<table>";
echo"<tr><td>Nom:</td></td><input type=\"text\" name=\"nom\" size=\"40\"maxlenght=\"30\" value=\"$coord[1]\"/></td>;
echo
echo
echo
echo
echo
echo
echo
echo
?>
    </body>
    </html>
