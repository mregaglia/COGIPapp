<?php class Auth{
//Permet d'identifier un utilisateur
function login($d){
    global$PDO;
    $req=$PDO->prepare('SELECT users.Login,users.address,roles.Name,roles.Slug,roles.level FROM users LEFT JOIN roles ON users.Role_id=roles.id WHERE login=:login AND password=:password');
    $req->execute($d);
    $data=$req->fetchAll();
if(count($data)>0){
    $_SESSION['Auth']=$data[0];
return true;
        }
    return false;
    }
//Autorise un rang a accéder a la cession qui lui est permise ou redirige ver forbiden
function allow($rang){
    global$PDO;
    $req=$PDO->prepare('SELECT Slug, level FROM roles ');
    $req->execute();
    $data=$req->fetchAll();
    foreach ($data as $d){
        $roles[$d->slug]=$d->level;
        }
    }
}
$Auth=new Auth();