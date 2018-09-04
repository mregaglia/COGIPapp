<?php
 // On se connecte à MySQL
    $connection = new PDO('mysql:host=localhost;dbname=cogipapp;charset=utf8', 'root','');


// $donnees = $resultat->fetch();
//Montrer le résultat de cette jonction
?>
<!--    <table class="table table-bordered">-->
<!--        <caption>Nos clients</caption>-->
<!--        <tr>-->
<!--            <th><p class="id">N°ID.</p></th>-->
<!--            <th><p class="lastName">Nom</p></th>-->
<!--            <th><p class="firstName">Prénom</p></th>-->
<!--            <th><p class="birthDate">Date de naissance</p></th>-->
<!--            <th><p class="card">Carte</p></th>-->
<!--            <th><p class="cardNumber">numéros de carte</p></th>-->
<!--        </tr>-->
<!---->
<!--        --><?php //while ($donnees = $resultat->fetch()){?>
<!--            <tr>-->
<!--                <th>--><?//= $donnees['id'];?><!--</th>-->
<!--                <th>--><?//= $donnees['lastName'];?><!--</th>-->
<!--                <th>--><?//= $donnees['firstName'];?><!--</th>-->
<!--                <th>--><?//= $donnees['birthDate'];?><!--</th>-->
<!--                <th>--><?//= $donnees['card'];?><!--</th>-->
<!--                <th>--><?//= $donnees['cardNumber'];?><!--</th>-->
<!--            </tr>-->
<!--        --><?php //} ?>
<!--    </table>-->
<?php
//$connection = mysql_connect("localhost", "root", "");
//$db = mysql_select_db("company", $connection);
//sur base de https://www.formget.com/update-data-in-database-using-php/#comment-490313
if (isset($_POST['submit'])) {
    $id_personnes = $_POST['id_personnes'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $query = mysql_query("update personnes set
firstname='$firstname',email='$email', phone_number='$phone_number',
lastname='$lastname' where employee_id='$id'", $connection);
}
$query = mysql_query("select * from personnes", $connection);
while ($row = mysql_fetch_array($query)) {
    echo "<b><a href='updatephp.php?update={$row['id_personnes']}'>{$row['firstname']}</a></b>";
    echo "<br />";
}
?><?php
if (isset($_POST['update'])) {
    $update = $_POST['update'];
    $query1 = mysql_query("select * from personnes where personnes_id=$update", $connection);
    while ($row1 = mysql_fetch_array($query1)) {
        echo "<form class='form' method='get'>";
        echo "<h2>formulaire de mise à jours</h2>";
        echo "<hr/>";
        echo"<input class='input' type='hidden' name='id_personnes' value='{$row1['id_personnes']}' />";
        echo "<br />";
        echo "<label>" . "Prénom:" . "</label>" . "<br />";
        echo"<input class='input' type='text' name='firstname' value='{$row1['firstname']}' />";
        echo "<br />";
        echo "<label>" . "Nom:" . "</label>" . "<br />";
        echo"<input class='input' type='text' name='firstname' value='{$row1['firstname']}' />";
        echo "<br />";
        echo "<label>" . "Email:" . "</label>" . "<br />";
        echo"<input class='input' type='mail' name='mail' value='{$row1['mail']}' />";
        echo "<br />";
        echo "<label>" . "Téléphone:" . "</label>" . "<br />";
        echo"<input class='input' type='tel' name='phone_number' value='{$row1['phone_number']}' />";
        echo "<br />";
        echo "<textarea rows='15' cols='15' name='daddress'>{$row1['employee_address']}";
        echo "</textarea>";
        echo "<br />";
        echo "<input class='submit' type='submit' name='submit' value='update' />";
        echo "</form>";
    }
}
if (isset($_POST['submit'])) {
    echo '<div class="form" id="form3"><br><br><br><br><br><br>
<Span>Data Updated Successfuly......!!</span></div>';
}
?>
<?php
mysql_close($connection);
?>
<?php $resultat->closeCursor();?>