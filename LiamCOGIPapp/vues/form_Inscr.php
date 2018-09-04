<?php 
require_once'inc/functions.php';
if (!empty($_POST)) {
    $errors = array();
    require_once "Inc/db.php";
// Si le nom d'utilisateur est vide ou qu'il est différent des carractères autorisés par les expression régulières
// Si L'email est vide ou que l'adresse entrée diffère du filtre propre aux adresse mail 
// Si le mot de passe est vide ou ne correspond pas a la validation du pseudo
    if (empty($_POST["username"]) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST["username"])) {
        $errors["username"] = "Amigo, entre ton pseudo ou un pseudo valide";
    } else {

        $req = $pdo->prepare('SELECT id FROM user WHERE username =?');
        $req->execute([$_POST['username']]);
        $user = $req->fetch();
        if ($user) {
            $errors['username'] = 'Ce pseudo est déjà pris';
        }
    }
    if (empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Amigo, entre une adresse mail valide";
    } else {

        $req = $pdo->prepare('SELECT id FROM user WHERE email =?');
        $req->execute([$_POST['email']]);
        $user = $req->fetch();
        if ($user) {
            $errors['email'] = "T'as déjà un compte chez nous mon loulou, ça va pas l'faire";
        }
    }
    if (empty($_POST["password"]) || !$_POST["password_confirm"]) {
        $errors["password"] = "Amigo, entre un mot de passe valide";
    }

    if (empty($errors)) {

        $req = $pdo->prepare("INSERT INTO user SET username = ?, password = ?, email = ?, confirmation_token = ? ");
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $token = str_random(60);
        $req->execute([$_POST['username'], $password, $_POST['email'], $token]);
        $user_id = $pdo->lastInsertId();
        main($_POST['email'], 'confirmation de votre compte', "Afin de valider votre compte, merci de cliquer sur le lien \n\n http://localhost/test/Grafikart/gesionEspaceMembre/confirm.php?id=$user_id&token=$token");
        header("Location:login.php");
        exit();
    }
}
require 'inc/header.php';
?>
<!-- https://www.youtube.com/watch?v=ahvJkaoc7Gk -->
<!--Du coup pour créer une adresse mail locale, c'est là mon coco ^^-->

<h1> Inscris-toi mon loulou </h1>

<?php if(!empty($errors)):?>
<div class="alert alert-danger">
<p>Vous n'avez pas les bases, euh, j'veux dire qu'en fait, t'as pas remplis le formulaire</p>
<ul>
    <p> Vous n'avez pas rempli le formulaire correctement </p>
    <ul>
        <?php foreach($errors as $error): ?>
        <li><?= $error; ?></li>
        <?php endforeach ?>
    </ul>
</div> 
<?php endif; ?>

<form action="" method="POST">
<div class="form-group">
    <label form="">pseudo</label>
    <input type="text" name="username" class="form-control" />
</div>

<div class="form-group">
    <label form="">Email</label>
    <input type="text" name="email" class="form-control"/>
</div>

<div class="form-group">
    <label form=""><P>Motde passe</P></label>
    <input type="password" name="password" class="form-control" />
</div>

<div class="form-group">
    <label form=""><P>Confirmes ton mot de passe vieux wesh</P></label>
    <input type="password" name="password_confirm" class="form-control" />
</div>

<button type="submit" class="btn btn-primary">m'inscrire</button>

</form>

<?php require 'inc/footer.php';?>

<!-- Partie hors code mais sur PC 
Du coup j'commence par créer une base de donnée dans mysql
Je l'ai appellée USM pour User Space Management
Je crées une table nommée users
J'en nomes une une "id", coche A_I
-->