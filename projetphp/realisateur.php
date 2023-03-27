<?php require('required/config.php'); ?>
<?php
$id = $_GET['IDRealisateur'];

$query = "SELECT * FROM realisateur WHERE IDRealisateur = :IDRealisateur";
$response = $bdd->prepare($query);
$response->execute(array(':IDRealisateur'=> $id));
$data =  $response->fetch();
?>

<?php require('required/header.php'); ?>
<title>Informations Réalisateurs</title>
<?php $idPage = "3";
require('required/nav.php');?>

<section>
<div class="parentInfoFilm">
    <div class="parentInfoFilmGauche">
        <div class="filmInfoImage"><img src="image/real/<?php echo $data['image']; ?>" alt="Photo de <?php echo $data['Nom']; ?>"></div><br> 
    </div>

    <div class="parentInfoFilmDroite">
        <div class="filmInfoTitre"><p><?php echo $data['Nom']; ?></p></div>
        <div class="filmInfoDate"><p>Date de naissance : <br><?php echo $data['Age']; ?></p></div><br>
        <div class="filmInfoCategorie"><p>Genre : <?php echo $data['Genre']; ?></p></div>
        <p>Liste des films :</p>
        <?php 
            $idRealisateur=$data['IDRealisateur'];
            $queryFilm = "SELECT * FROM film WHERE IDRealisateur = :IDRealisateurFilm";
            $responseFilm = $bdd->prepare($queryFilm);
            $responseFilm->execute(array(':IDRealisateurFilm'=>$idRealisateur));
            while ($dataFilm = $responseFilm->fetch()) {
        ?>

        <div class="filmRealisateur">            
            <a href="infos.php?id=<?php echo $dataFilm['IDfilm']; ?>" alt="En savoir plus sur <?php echo $dataFilm['Titre']; ?>"><div><p><?php echo $dataFilm['Titre']; ?></p></div></a>

        </div>
        <?php } ?>
    </div>
</div>
</section>

<?php require('required/footer.php'); ?>
