<?php require 'required/config.php';?>

<title>Panier</title>
<?php require('required/header.php'); ?>
<?php $idPage = "4";
require('required/nav.php')?>

<?php 
// Vider le panier
unset($_SESSION['panier']);
?>

<div class="parentInfoFilm paiement">
    <div><h1>Paiement effectué</h1></div> <br> <br>
    <i class="fa-solid fa-circle-check fa-bounce" id="check" alt="icone de check"></i><br><br>
    <a href="index.php">
        <button class="boutonAddPanier" alt="Retourner à l'accueil">Retourner à l'accueil</button>
    </a>
</div>

<?php
require('required/footer.php')
?>