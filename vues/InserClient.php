<?php require 'header.php' ?>
<?php require '../modeles/db.php'?>
<div id="sign_form" class="container">
    <form>
        <fieldset>
            <div class="row">
                <label class="col-md-6">Votre nom<input type="text" name="lastname" id="lastname" required></label>
                <label class="col-md-6">Votre prénom<input type="text" name="firstname" id="firstname" required></label>
            </div>
            <div class="row">
                <label class="col-md-6">Numéro de téléphone<input type="tel" name="phone_number" id="phone_number" required></label>
                <label class="col-md-6">Adresse email<input type="email" name="email" id="email" required></label>
            </div>
        </fieldset>
    </form>
</div>
<?php require 'footer.php' ?>