<?php
session_start();

// Identifiants de la base de données
$dataBaseHost = "localhost";
$dataBaseUser = "root";
$dataBasePassword = "";
$dataBase = "NetflixPrimePlus";

// Connexion à la base de données
$coLog = new mysqli($dataBaseHost, $dataBaseUser, $dataBasePassword, $dataBase);
if ($coLog->connect_error) {
    echo "Erreur - 404 URL inexistante";
}

// Vérification du token de session
if ($_SESSION['token'] !== $_POST['token']) {
    header("Location: login.php");
    exit();
}

// Attribution des variables
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$username = "";

// Vérification des données
if(empty($email) || empty($password)){
    header("Location: login.php");
    exit();
} elseif(strlen($password) < 8){
    header("Location: login.php");
    exit();
} elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    header("Location: login.php");
    exit(); 
} else {
    // Requête SQL
    $sqlLog = "SELECT * FROM user WHERE email ='$email'";
    $result = mysqli_query($coLog, $sqlLog);
    $row = mysqli_fetch_array($result);
    if ($row['email']==null){
        echo "<script>alert('Le mail est pas valide')</script>";
        echo "<script>location.replace('login.php')</script>";
    }
    // Test la correspondance des identifiants
    if ($row && password_verify($password, $row['password'])) {
        // Transforme les données utilisateur en donnée de session
        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];
        // Redirige vers la page de profil quand les identifiants de connexion sont corrects
        header("Location: profil.php");
        exit();
    }
}
?>
