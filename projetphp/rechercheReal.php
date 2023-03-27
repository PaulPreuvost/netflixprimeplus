<?php require('required/config.php') ?>

<?php
$data = [];
if (isset($_GET['searchReal'])) {
    $recherche = $_GET['searchReal'];
    // Rechercher les réalisateurs correspondant au critère de recherche
    $query = "SELECT Films,	IDRealisateur,Nom, Genre, Image FROM realisateur WHERE Nom LIKE :recherche";
    $response = $bdd->prepare($query);
    $response->execute(array(":recherche" => "%" . $recherche . "%"));
    $data = $response->fetchAll();
    if (empty($data)) {
        echo "<div class='filmGlobalRecherche'>"."<h1>"."Aucun résultat trouvé"."</h1>"."</div>";
    }
}
?>

<?php require('required/header.php') ?>

<title>Recherche Réalisateurs</title>
<?php $idPage = "3";
require('required/nav.php')?>

<section>
<div class = "recherchePlace">
<div class ="rechercheReal">
    <form method="GET">
        <H3>Recherchez des réalisateurs :</H3>
        <input class="searchInput" name="searchReal" type="textRecherche" required>
        <button alt="Rechercher" type="submit" id="searchButton">Rechercher</button>
    </form>
</div>

</div>
    <div class="filmGlobalRecherche">
    <?php foreach ($data as $film) : ?>
        <div class="filmSolo">
            <div><a href="realisateur.php?IDRealisateur=<?php echo $film['IDRealisateur']; ?>" 
            alt="En savoir plus sur <?php echo $film['Nom']; ?>">
            <img src="image/real/<?php echo $film['Image']; ?>" 
            alt="<?php echo $film['Nom']; ?>" 
            class="imageRealisateur"></a></div><br>
            <div class="filmTitre"><?php echo $film['Nom']; ?></div>
        </div>
    <?php endforeach; ?>
</div>
</section>

<?php require('required/footer.php') ?>