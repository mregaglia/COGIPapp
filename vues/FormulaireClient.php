
<?php
    $message = '';

if (isset ($_POST['name']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['phonenumber'])) 
{
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $email = $_POST['phonenumber'];

    $sql = 'INSERT INTO poeple(name, lastname, email, phonenumber) VALUES(:name, :lastname :email :phonenumber)';
    $statement = $connection->prepare($sql);

    if ($statement->execute([':name' => $name, ':lastname' => $lastname, ':email' => $email,':phonenumber' => $phonenumber])) 
    {
        $message = 'data inserted succesfully';
    }
}
?>

<?php require 'header.php' ?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Client</h2>
        </div>
        <div class="card-body">
            <?php if(!empty($message)): ?>
                <div class="alert alert-success">
                    <?= $message; ?>
                </div>
            <?php endif; ?>
            <form methode="POST">
                <div class="form-group">
                    <label for="name">Prénom</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="lastname">Nom</label>
                    <input type="text" name=" lastname" id="lastname" class="form-control">           
                </div>
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="text" name="email" id="email" class="form-control">          
                </div>
                <div class="form-group">
                    <label for="phonenumber">Téléphone</label>
                    <input type="tel" name="phonenumber" id="phonumber" class="form-control">
                </div>
            
                <div class="form-group">
                    <button type="submit" class="btn-info">client</button>
                    
                </div>
            </form>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>