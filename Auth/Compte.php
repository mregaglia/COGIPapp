<?php $Auth->allow('member');?>
<?php

    $req = $PDO->prepare('SELECT address FROM users WHERE ID=:ID ');
    $req->execute(array(
        'ID'=>$Auth->user('ID')
    ));
    $user = $req->fetch();

?>

<h1>Mon compte</h1>
<h1>Mon adresse</h1>
<h1><strong><?php echo $user->address;?></strong></h1>