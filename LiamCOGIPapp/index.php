<?php

//On se connecte à MySQL
new PDO('mysql:host=localhost;dbname=cogipapp;charset=utf8', 'root','');


////On inclut le logo du site et le menu
include 'vues/header.php';
//
//
////On inclut le contrôleur s'il existe et s'il est spécifié
//if (!empty($_GET['page']) && is_file('controleurs/'.$_GET['page'].'.php'))
//{
//        include 'controleurs/'.$_GET['page'].'.php';
//}
//else
//{
//        include 'index.php';
//}

//On inclut le pied de page
include 'vues/footer.php';

//On ferme la connexion à MySQL

