<?php require('required/config.php') ?>

<?php
$categorie = $_GET['cat'];

$query = "SELECT * FROM film WHERE Categorie= :cat";
$response = $bdd->prepare($query);
$response->execute(array(':cat'=> $categorie));
$data = $response->fetchALL()
?>

<?php require('required/header.php') ?>
<title>Catégorie</title>
<?php require('required/nav.php')?>

<section>
<div class="filmGlobal">
        <?php foreach ($data as $film) : ?>
            <div class="filmSolo">
                <div><a href="infos.php?id=<?php echo $film['IDfilm']; ?>" alt="En savoir plus sur <?php echo $film['Titre']; ?>"><img src="image/film/<?php echo $film['Image']; ?>" alt="<?php echo $film['Titre']; ?>" class="imageFilm"></a></div><br><br>
                <div><a href="addPanier.php?id=<?php echo $film['IDfilm'];?>" class="boutonAddPanier" type="submitPanier">Ajouter au panier <?php echo $film['Prix']; ?>€</a></div> 
                
            </div>
        <?php endforeach; ?>
</div>
</section>

<?php require('required/footer.php') ?>