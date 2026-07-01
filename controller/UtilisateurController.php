<?php
require_once "Database.php";

if (isset($_SESSION["user_id"])) {
    header("Location: dashboard.php");
    exit;
}

$error_msg = null;

//verif : si le formulaire a la methode post - > je continue !!

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    if ($email !== "" && $password !== "") {
        $request = $pdo->prepare("SELECT * FROM users WHERE email == :email");
        $request->execute(["email" => $email]);
        $user = $request->fetch();

        $passwordVerif = password_verify($password, $user["mot_de_passe"]);

        if ($passwordVerif) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["user_email"] = $user["email"];
            header("Location: dashboard.php");
            exit;
        } else {

            $error_msg = "MOT DE PASSE OU EMAIL INCORRECT";
        }
    }
}
