<?php 
require 'required/config.php';
require 'required/panier.class.php';

$query = "SELECT * FROM film";
$response = $bdd->query($query);
$data = $response->fetchAll();
$panier = new Panier();
?>

<?php require 'required/header.php'; ?>
<title>Accueil</title>
<?php 
$idPage = "1";
require 'required/nav.php';
?>

<section>
    <div class="filmGlobal">
        <?php foreach ($data as $film) : ?>
            <div class="filmSolo">
                <div>
                    <a href="infos.php?id=<?php echo $film['IDfilm']; ?>" alt="En savoir plus sur <?php echo $film['Titre']; ?>">
                        <img src="image/film/<?php echo $film['Image']; ?>" alt="<?php echo $film['Titre']; ?>" class="imageFilm">
                    </a>
                </div><br><br>
                <a href="addPanier.php?id=<?php echo $film['IDfilm'];?>" class="boutonAddPanier" type="submitPanier">Ajouter au panier <?php echo $film['Prix']; ?>€</a>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?php require 'required/footer.php'; ?>

