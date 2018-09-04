<?php $Auth->allow('member');?>
<?php

    $req = $PDO->prepare('SELECT address FROM users WHERE Id=:Id ');
    $req->execute(array(
        'Id'=>$Auth->user('Id')
    ));
    $user = $req->fetch();

?>

<h1>Mon compte</h1>
<h1>Mon adresse</h1>
<h1><strong><?php echo $user->address;?></strong></h1>