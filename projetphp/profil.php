<?php 
require 'required/config.php';
//Redirige vers la page de login si in n'y a pas d'utilisateur connecté
if ($_SESSION['username']==null){
    echo "<script>location.replace('login.php')</script>";
}
// Deconexion, efface les données de la session  
if (isset($_POST['todo']) && $_POST['todo'] === 'logout'){
    unset($_SESSION['username']);
    header("Location: login.php");
}
?>

<?php require('required/header.php') ?>
<title>Profil</title>
<?php $idPage = "5";
require('required/nav.php')?>

<section>
<div class="profile">
    <div class="profileIcone"><img src="image/svg/user-regular.png" alt="Icone de profil"></div>
    <div class="profilCase">
        <div><h1>Bienvenue <?php echo $_SESSION['username']?></h1></div>
        <div>Adresse mail : <?php echo $_SESSION['email']?> </div>
        <div></div>
    </div>
<form action="profil.php" method="POST" enctype="multipart/form-data">
<input type="hidden" name="todo" value="logout">
<button type="submit" onclick="viderPanier()" alt="Se déconnecter">Se déconnecter</button></form>
<div class="warningItem"><p><h4><i>Votre panier sera supprimé si vous vous déconnectez.</i></h4></p></div>

<script>
function viderPanier() {
    // Crée une requête XMLHttpRequest pour communiquer avec le serveur
    var xhr = new XMLHttpRequest();

    // Ouvre une connexion avec la page paiement.php en utilisant la méthode GET
    xhr.open('GET', 'paiement.php');

    // Envoie la requête au serveur
    xhr.send();
}
</script>
</div>
</section>

<?php require('required/footer.php') ?>
