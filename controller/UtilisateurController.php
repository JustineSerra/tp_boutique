<?php
require_once "./config/Database.php";

if (isset($_SESSION["user_id"])) {
    // header("Location: ./view/index.php");
    exit;
};
//verif : si le formulaire a la methode post - > je continue !!

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    if ($email !== "" && $password !== "") {
        $request = $pdo->prepare("SELECT * FROM users WHERE email == :email");
        $request->execute(["email" => $email]);
        $user = $request->fetch();

        $passwordVerif = password_verify($password, $user["password"]);

        if ($passwordVerif) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["user_email"] = $user["email"];
            // header("Location: ./view/login.php");
            exit;
        } else {

            $error_msg = "MOT DE PASSE OU EMAIL INCORRECT";
        }
    }
}
//INSCRIPTION UTILISATEUR -> enregistre l'email et le mdp (en hash)

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $passwordconfirm = $_POST['password_confirm'];

    $requete = $pdo->prepare("INSERT INTO users (email, password_hash) VALUES(:email, :password_hash)");
    $requete->execute(
        array(
            "email" => $email,
            "password_hash" => $password
        )
    );
    echo "inscription réussie!";
    // header("Location: ./view/login.php");
}
