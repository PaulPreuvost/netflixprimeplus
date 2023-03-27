<?php
require 'required/config.php';
// Création du token de session
$token = bin2hex(random_bytes(32));
$_SESSION['token'] = $token;
?>

<?php require('required/header.php') ?>
<title>Register</title>
<?php $idPage = "5";
require('required/nav.php')?>

<section>
<div class="loginForm"> 
    <h2>Créer un compte</h2>  
    <form method="post" action="settingRegister.php">
        <div class= "formAlign">
            <div class="formGroup">
                <label for="Username">Nom d'utilisateur (20 caractères maximum) :</label>
                <input type="text" name="username">
            </div>
            <div class="formGroup">
                <label for="email">Adresse mail :</label>
                <input type="text" name="email">
            </div>
            <div class="formGroup">
                <label for="password">Mot de passe (8 caractères minimum) :</label>
                <input type="password" name="password">
            </div>
            <div class="formGroup">
                <label for="passwordConfirm">Confirmer le mot de passe :</label>
                <input type="password" name="passwordConfirm"><br>
            </div>
            <!-- Ajout du champ pour le token CSRF -->
            <input type="hidden" name="token" value="<?php echo $token; ?>">
            <button alt="Créer un compte" type="submit">Créer un compte</button>
    </form>
</div>    
</section>

<?php require('required/footer.php') ?>
