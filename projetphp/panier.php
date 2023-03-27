<?php 
require 'required/config.php';
require 'required/panier.class.php';

$panier = new Panier();

if(isset($_GET['del'])){
$panier->del($_GET['del']);
}
?>

<?php require('required/header.php') ?>
<title>Panier</title>
<?php $idPage = "4";
require('required/nav.php')?>

<?php 
if ($_SESSION['username']==null){
echo "<script>alert('Vous devez être connecté')</script>";
echo "<script>location.replace('login.php')</script>";
}else{ 
if (!empty($_SESSION['panier'])): ?>
<div class="tablePanier">
<table>
<thead>
    <tr>
        <th class="panierTitre"><h1>Titres</h1></th>
        <th class="panierTitre"><h1>Prix</h1></th>
        <th class="panierTitre"><h1>Action</h1></th>
    </tr>
</thead>
<tbody>
    <?php 
    $ids = array_keys($_SESSION['panier']);
    if(empty($ids)){
        $products = array();
    }else{
        // implode — Rassemble les éléments d'un tableau en une chaîne
        $products = $bdd->query('SELECT * FROM film WHERE IDfilm IN ('.implode(',',$ids).')');
    }
    $total = 0;
    foreach ($products as $product): 
        $total += $product['Prix'] * $_SESSION['panier'][$product['IDfilm']];
    ?>
    <tr>
        <td class="panierFilmTitre"><?php echo $product['Titre'] ?></td>
        <td class="panierFilmTitre"><?php echo number_format($product['Prix'], 2,',',' ') ?>€</td>
        <td class="panierFilmTitre"><a href="panier.php?del=<?php echo $product['IDfilm'] ?>">Supprimer</a></td>
    </tr>
    <?php endforeach ?>
</tbody>
</table>
<div class="panierPaiement">
<div class="totalLeft"><p><h1>Total: <?php echo number_format($total, 2, ',', ' ') ?>€</h1></p></div>
<div>
    <a href="paiement.php" onclick="viderPanier()">
        <button class="boutonAddPanier panierLeft" alt="Procéder au Paiement">Procéder au Paiement</button>
    </a>
</div>
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
<p><strong>Nombre d'articles dans le panier :</strong> <?php echo array_sum($_SESSION['panier']) ?></p>
</div>
<?php else: ?>
<p>Votre panier est vide</p>
<?php endif;
} ?>

<?php require('required/footer.php') ?>" }