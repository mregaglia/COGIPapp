<?php class Auth
{

    var $forbiddenPage='index.php?p=forbidden';

    /**
     * Permet d'identifier un utilisateur
     **/
    function login($d){
        global $PDO;
        $req = $PDO->prepare('SELECT users.id,users.Login,users.address,roles.Name,roles.Slug,roles.level FROM users LEFT JOIN roles ON users.Role_id=roles.id WHERE login=:login AND password=:password');
        $req->execute($d);
        $data = $req->fetchAll();
        if (count($data) > 0) {
            $_SESSION['Auth'] = $data[0];
            return true;
        }
        return false;
    }

//Autorise un rang a accéder a la cession qui lui est permise ou redirige ver forbiden
    function allow($rang){
        global $PDO;
        $req = $PDO->prepare('SELECT Slug,level FROM roles');
        $req->execute();
        $data = $req->fetchAll();
        foreach ($data as $d){
            $roles[$d->Slug] = $d->level;
        }
        if (!$this->user('Slug')){
            $this->forbidden();
        }else {
        if ($roles[$rang] > $this->user('level')) {
            $this->forbidden();
            } else {
                return true;
            }
        }
    }
    /**
   Récupère une info utilisateur
**/
    function user ($field){
        if ($field=='role') $field = 'slug';
        if(isset($_SESSION['Auth']->$field)) {
            return $_SESSION['Auth']->$field;
        }else{
            return false;
        }
    }

    /**
    Redirige l'utilisateur
     **/

    function forbidden(){
        header('Location'.$this->forbiddenPage);
    }
}
$Auth=new Auth();