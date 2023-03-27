<?php
require 'required/config.php';
$_SESSION['token'] = bin2hex(random_bytes(32));
?> 

<?php 
// Vider le panier
unset($_SESSION['panier']);
?>

<?php require('required/header.php') ?>
<title>Log In</title>
<?php $idPage = "5";
require('required/nav.php')?>

<section>
<div class="loginForm"> 
        <h2>Connexion</h2>  
        <form method="post" action="settingLogIn.php">
    <div class= "formAlign">
        <div class="formGroup">
        <label for="email">Adresse mail:</label>
        <input type="text" id="email" name="email" maxlength="255"> 
        </div>
        <div class="formGroup">
        <label for="password">Mot de passe :</label>  
        <input type="password" id="password" name="password"> <br>
        </div>
        <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
        <button type="submit" alt="Se connecter">Se connecter</button>
        <a href="register.php" title="Créer un compte" class="creatAccount"> Créer un compte </a><br><br>
        </form>
    </div>    
        </form>
</div>
</section>

<?php require('required/footer.php') ?>
