<?php
session_start();

// Connexion à la base de données
try {
    $bdd = new PDO(
        'mysql:host=localhost; dbname=NetflixPrimePlus; charset=utf8','root',''
    );

}
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>