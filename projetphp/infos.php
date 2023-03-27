<?php require('required/config.php') ?>

<?php
$id = $_GET['id'];

$query = "SELECT * FROM film WHERE IDfilm= :id";
$response = $bdd->prepare($query);
$response->execute(array(':id'=> $id));
$data =  $response->fetch();
?>

<?php require('required/header.php') ?>
<title>Informations Films</title>
<?php $idPage = "2";
require('required/nav.php')?>

<section>
<div class="parentInfoFilm">
    <div class="parentInfoFilmGauche">
        <div class="filmInfoImage"><img src="image/film/<?php echo $data['Image']; ?>" alt="<?php echo $data['Titre']; ?>"></div><br>
        <div class="filmInfoBandeAnnonce"><a href="<?php echo $data['bandeAnnonce']; ?>" alt="Regarder la bande annonce" target="_blank" rel="noopener noreferrer">Regarder la bande annonce</a></div>
    </div>
    <div class="parentInfoFilmDroite">
        <div class="filmInfoTitre"><p><?php echo $data['Titre']; ?></p></div>
        <div class="filmInfoNomRealisateur"><p>Réalisé par : <?php echo $data['NomRealisateur']; ?></p></div>
        <div class="filmBoutonRealisateur"><a href="realisateur.php?IDRealisateur=<?php echo $data['IDRealisateur']; ?>" class="filmInfoBoutonRealisateur" alt="En savoir plus sur <?php echo $data['NomRealisateur']; ?>">En savoir plus</a></div><br>

        <div class="filmInfoDate"><p>Sortie en : <?php echo $data['Date']; ?></p></div>
        <div class="filmInfoCategorie"><p>Catégorie : <?php echo $data['Categorie']; ?></p></div>
        <div class="filmInfoSynopsis"><p><?php echo $data['Synopsis']; ?></p></div>
        <div><a href="addPanier.php?id=<?php echo $data['IDfilm'];?>"><button alt= "Ajouter au panier"class="boutonAddPanierInfo">Ajouter au panier <?php echo $data['Prix']; ?>€</button></a></div> 
    </div>
</div>
</section>

<?php require('required/footer.php') ?>