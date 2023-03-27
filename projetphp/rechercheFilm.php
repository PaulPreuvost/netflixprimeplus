<?php require('required/config.php') ?>

<?php
$data = [];
if (isset($_GET['searchFilm'])) {
    $recherche = $_GET['searchFilm'];
    // Rechercher les films correspondant au critère de recherche
    $query = "SELECT IDfilm, titre, image, Prix FROM film WHERE titre LIKE :recherche";
    $response = $bdd->prepare($query);
    $response->execute(array(":recherche" => "%" . $recherche . "%"));
    $data = $response->fetchAll();
    if (empty($data)) {
        echo "<div class='filmGlobalRecherche'>"."<h1>"."Aucun résultat trouvé"."</h1>"."</div>";
    }
}

?>
<?php require('required/header.php') ?>
<title>Recherche Films</title>
<?php $idPage = "2";
require('required/nav.php')?>



<section>
<div class = "recherchePlace">

<div class ="rechercheFilm">
    <form method="GET">
        <H3>Recherchez des films :</H3>
        <input class="searchInput" name="searchFilm" type="textRecherche" required>
        <button type="submit" alt="Rechercher" id="searchButton">Rechercher</button>
    </form>
</div>

</div>
    <div class="filmGlobalRecherche">
    <?php foreach ($data as $film) : ?>
        <div class="filmSolo">
            <div><a href="infos.php?id=<?php echo $film['IDfilm']; ?>" alt="En savoir plus sur <?php echo $film['titre']; ?>"><img src="image/film/<?php echo $film['image']; ?>" alt="<?php echo $film['titre']; ?>" class="imageFilm"></a></div><br>
            <div class="filmTitre"><?php echo $film['titre']; ?></div>
            <div><a href="panier.php?id=<?php echo $film['IDfilm']; ?>"><button alt="Ajouter au panier" class="boutonAddPanier">Ajouter au panier <?php echo $film['Prix']; ?>€</button></a></div> 
        </div>
    <?php endforeach; ?>
</div>
<?php require('required/footer.php') ?>