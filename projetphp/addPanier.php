<?php
require 'required/config.php';
require 'required/panier.class.php';

$panier = new Panier();

if ($_SESSION['username'] == null) {
    echo "<script>alert('Vous devez être connecté')</script>";
    echo "<script>location.replace('login.php')</script>";
} else {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];
        $query = $bdd->prepare('SELECT IDfilm FROM film WHERE IDfilm = :id');
        $query->execute(array(':id' => $id));
        $result = $query->fetch();
        if (empty($result)) {
            echo "<script>alert('L\'article est inexistant !')</script>";
            echo "<script>history.back()</script>";
        } else {
            $panier = new Panier();
            if (!$panier->isInPanier($id)) {
                $panier->add($id);
            } else {
                echo "<script>alert('Le produit est déjà dans le panier')</script>";
            }
            echo "<script>history.back()</script>";
        }
    } else {
        echo "<script>alert('Vous n\'avez rien ajouté au panier !')</script>";
        echo "<script>location.replace('index.php')</script>";
    }
}
?>