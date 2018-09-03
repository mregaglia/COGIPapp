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
<?php echo $content_for_layout;?>
    <h1>Session</h1>
<pre><?php print_r($_SESSION);?></pre>
    </body>
    </html>
