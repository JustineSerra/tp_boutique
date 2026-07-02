<?php
require_once "../config/Database.php";

if (isset($_SESSION['user_id'])) {
    header("Location: ./view/login.php");
    exit;
}

//INSCRIPTION UTILISATEUR -> enregistre l'email et le mdp (en hash)
var_dump($_POST);
if (isset($_POST['email']) && isset($_POST['email']) && isset($_POST['password_confirm'])) {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $passwordconfirm = $_POST['password_confirm'];
    $pdo = Database::getConnexion();
    $requete = $pdo->prepare("INSERT INTO users (email, password_hash) VALUES(:email, :password_hash)");
    $requete->execute(
        array(
            "email" => $email,
            "password_hash" => $password
        )
    );
    echo "inscription réussie!";
    header("Location: ../view/login.php");
}
