<?php
try
{
    // On se connecte à MySQL
    $bd = new PDO('mysql:host=localhost;dbname=cogipapp;charset=utf8', 'root','');
}
catch(Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : ' . $e->getMessage());
}
//J'dois importer (avec SELECT) la table météo via (FROM) PHPMyAdmin.
$resultat = $bd->query('UPDATE personnes SET id_personnes=$_POST[id_personnes],firstname=$_POST[firstname],lastname=$_POST[lastname],phone_number=$_POST[phone_number],email=$_POST[email],FK_societes=$_POST[value-6] WHERE 1 ');
//créer une jonction entre la variable donnée et la variable résultat
// $donnees = $resultat->fetch();
//Montrer le résultat de cette jonction
?>
    <html>
    <head>
        <title></title>
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
    <div class="maindiv">
        <div class="divA">
            <div class="title">
                <h2>Update Data Using PHP</h2>
            </div>
            <div class="divB">
                <div class="divD">
                    <p>Click On Menu</p>
                    <?php

                    if (isset($_GET['submit'])) {
                        $id = $_GET['did'];
                        $name = $_GET['dname'];
                        $email = $_GET['demail'];
                        $mobile = $_GET['dmobile'];
                        $address = $_GET['daddress'];
                        $query = mysql_query("update personnes set
id_personnes='$name', employee_email='$email', employee_contact='$mobile',
employee_address='$address' where employee_id='$id'", $connection);
                    }
                    $query = mysql_query("select * from employee", $connection);
                    while ($row = mysql_fetch_array($query)) {
                        echo "<b><a href='updatephp.php?update={$row['employee_id']}'>{$row['employee_name']}</a></b>";
                        echo "<br />";
                    }
                    ?>
                </div><?php

                if (isset($_POST['update'])) {
                    $update = $_POST['update'];
                    $query1 = mysql_query("select * from employee where employee_id=$update", $connection);
                    while ($row1 = mysql_fetch_array($query1)) {
                        echo "<form class='form' method='get'>";
                        echo "<h2>Update Form</h2>";
                        echo "<hr/>";
                        echo"<input class='input' type='hidden' name='did' value='{$row1['employee_id']}' />";
                        echo "<br />";
                        echo "<label>" . "Name:" . "</label>" . "<br />";
                        echo"<input class='input' type='text' name='dname' value='{$row1['employee_name']}' />";
                        echo "<br />";
                        echo "<label>" . "Email:" . "</label>" . "<br />";
                        echo"<input class='input' type='text' name='demail' value='{$row1['employee_email']}' />";
                        echo "<br />";
                        echo "<label>" . "Mobile:" . "</label>" . "<br />";
                        echo"<input class='input' type='text' name='dmobile' value='{$row1['employee_contact']}' />";
                        echo "<br />";
                        echo "<label>" . "Address:" . "</label>" . "<br />";
                        echo "<textarea rows='15' cols='15' name='daddress'>{$row1['employee_address']}";
                        echo "</textarea>";
                        echo "<br />";
                        echo "<input class='submit' type='submit' name='submit' value='update' />";
                        echo "</form>";
                    }
                }
                if (isset($_GET['submit'])) {
                    echo '<div class="form" id="form3"><br><br><br><br><br><br>
<Span>Data Updated Successfuly......!!</span></div>';
                }
                ?>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
    </div><?php
    mysql_close($connection);
    ?>
    </body>
    </html>
<!--    <table class="table table-bordered">-->
<!--        <caption>Nos clients</caption>-->
<!--        <tr>-->
<!--            <th><p class="id_personnes">N°ID.</p></th>-->
<!--            <th><p class="lastname">Nom</p></th>-->
<!--            <th><p class="firstname">Prénom</p></th>-->
<!--            <th><p class="card">email</p></th>-->
<!--            <th><p class="phone_number">numéros de téléphone</p></th>-->
<!--        </tr>-->
<!---->
<!--        --><?php //while ($donnees = $resultat->fetch()){?>
<!--            <tr>-->
<!--                <th>--><?//= $donnees['id_personnes'];?><!--</th>-->
<!--                <th>--><?//= $donnees['lastname'];?><!--</th>-->
<!--                <th>--><?//= $donnees['firstname'];?><!--</th>-->
<!--                <th>--><?//= $donnees['email'];?><!--</th>-->
<!--                <th>--><?//= $donnees['phone_number'];?><!--</th>-->
<!--            </tr>-->
<!--        --><?php //} ?>
<!--    </table>-->
<?php $resultat->closeCursor();?>