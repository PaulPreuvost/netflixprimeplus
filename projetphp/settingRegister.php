<?php
session_start();
// Identifiants de la base de données
$dataBaseHost = "localhost";
$dataBaseUser = "root";
$dataBasePassword = "";
$dataBase = "NetflixPrimePlus";

// Vérification du token CSRF
if(!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
    echo "<script>location.replace('register.php')</script>";
    exit;
}

// Connexion à la base de données
$coRegister = new mysqli($dataBaseHost, $dataBaseUser, $dataBasePassword, $dataBase);
if ($coRegister->connect_error) {
    echo "Erreur - 404 URL inexistante";
}

// Attribution des variables
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordConfirm = $_POST['passwordConfirm'];

// Vérification des données

    //Vérifie que les données son bien rentrées
if(!isset($username) || !isset($email) || !isset($password) || !isset($passwordConfirm)){
    echo "<script>location.replace('register.php')</script>";
    //Vérifie que les données font la bonne taille
}elseif(strlen($username) > 20 || strlen($passwordConfirm) < 8){
    echo"<script>alert('Veuillez rentrer des données correctes !')</script>";
    echo "<script>location.replace('register.php')</script>";
    //Vérifie que l'email rentré soit correct 
}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo "<script>alert('Veuillez rentrer un email valide !')</script>";
    echo "<script>location.replace('register.php')</script>"; 

    //Vérifie que les deux mots de passe correspondent 
}elseif($password != $passwordConfirm){
    echo "<script>alert('Les deux mot de passe ne correspondent pas !')</script>";
    echo "<script>location.replace('register.php')</script>"; 
}else{
    // Hash du mot de passe
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Requête SQL    
    $sqlRegister = "INSERT into user (username, email, password) VALUES (?, ?, ?)";

    // Préparation de la requête
    $prepare = $coRegister->prepare($sqlRegister);
    // Paramétrage de la requête
        // Lien des valeurs aux paramètres de la requête en utilisant la méthode bind_param()
        // Evite les injection SQL en définissant les paramètres à l'avance pour éviter les entrées malveillantes.
        // Les types de données des paramètres sont définis avec la chaîne "sss" (chaînes de caractères)
    $prepare->bind_param("sss", $username, $email, $hashed_password);

    // Exécution de la requête
    if ($prepare->execute()) {
        // Redirige vers la page de connexion
        echo "<script>alert('Compte créé')</script>";
        echo "<script>location.replace('login.php')</script>";
    } else {
        // Redirige vers la page de création de compte
        echo "<script>alert('Un problème est survenu, veuillez réessayer')</script>";
        echo "<script>location.replace('register.php')</script>";
    }

    // Fermeture de la requête et de la connexion à la base de données
    $prepare->close();
    $coRegister->close();
}
?>
