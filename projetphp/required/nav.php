<?php
$actuel1 = "";
$actuel2 = "";
$actuel3 = "";
$actuel4 = "";
$actuel5 = "";

if (isset($idPage)) {
    if ($idPage == 1) {
        $actuel1 = "actuel";
    } elseif ($idPage == 2) {
        $actuel2 = "actuel";
    } elseif ($idPage == 3) {
        $actuel3 = "actuel";
    } elseif ($idPage == 4) {
        $actuel4 = "actuel";
    } elseif ($idPage == 5) {
        $actuel5 = "actuel";
    }
}
?> 
</head>
<body class="body">
<nav>
    <div class="nav">
        <div class="navLeft">
            <a href="index.php" title ="Accueil" class="nav-lien <?php echo $actuel1;?>">Accueil</a>
            <a href="categorie.php?cat=Action" class="nav-lien" title="Films de catégorie Action">Action</a>
            <a href="categorie.php?cat=Comédie" class="nav-lien" title="Films de catégorie Comédie">Comédie</a>
        </div>
        <div class="navRight">
            <a href="rechercheFilm.php" class="nav-lien <?php echo $actuel2;?>" title="Page de recherche films">Films <i class="fa-solid fa-magnifying-glass" id="searchIcon" alt="Rechercher un film"></i></a>
            <a href="rechercheReal.php" class="nav-lien <?php echo $actuel3;?>" title="Page de recherche réalisateurs">Réalisateurs <i class="fa-solid fa-magnifying-glass" id="searchIcon" alt="Rechercher un réalisateur"></i></a>
            <a href="panier.php" class="nav-lien <?php echo $actuel4;?>" title="Page de panier">Panier<sup>
                <?php if (isset($_SESSION['panier']) && is_array($_SESSION['panier'])) {
                        echo array_sum($_SESSION['panier']);
                        } else {echo '0';}?></sup></a>
            <a href="profil.php" class="nav-lien <?php echo $actuel5;?>" title="Votre compte">Compte</a>
        </div>
    </div>
</nav>