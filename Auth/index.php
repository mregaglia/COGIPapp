<?php
session_start();

//Instance PDO
try{
    $PDO = new PDO('mysql:host=localhost;dbname=tuto', 'root',"");
    $PDO->setAttribute(PDO::ATTR_ERRMODE,$PDO::ERRMODE_WARNING);
    $PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}catch(PDOException $e){
    echo'Connexion impossible';
}
//Class Auth
require "class.auth.php";

ob_start();
include((isset($_GET['p'])?$_GET['p']:'home').'.php');
$content_for_layout=ob_get_clean();
?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Page Title</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
        <script src="main.js"></script>
    </head>
    <body>
<?php if ($Auth->user('ID')):?>
    <h1>Bonjour <?php echo $Auth->user('login');?></h1>

<ul>
    <li><a href="index.php?p=Compte">Mon compte</a></li>
    <?php if ($Auth->user('roles')=='admin'):?>
    <li><a href="index.php?p=Admin">Administration</a></li>
    <?php endif; ?>
    <li><a href="index.php?p=logout">Se déconnecter</a></li>
</ul>

<?php else: ?>
<a href="index.php?P=login.php">Se connecter</a>
<?php endif;?>
<?php echo $content_for_layout; ?>
    </body>
    </html>