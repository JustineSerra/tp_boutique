<?php

require_once __DIR__ . "/../model/Utilisateur.php";
require_once __DIR__ . "/../repository/UtilisateurRepository.php";



// if (isset($_SESSION["user_id"])) {
//     // header("Location: ./view/index.php");
//     exit;
// };

// //verif : si le formulaire a la methode post - > je continue !!

// if ($_SERVER["REQUEST_METHOD"] === "POST") {

//     $email = $_POST["email"];
//     $password = $_POST["password"];

//     if ($email !== "" && $password !== "") {
//         $pdo = Database::getConnexion();
//         $request = $pdo->prepare("SELECT * FROM users WHERE email = :email");
//         $request->execute(["email" => $email]);
//         $user = $request->fetch();
//         var_dump($user);
//         $passwordVerif = password_verify($password, $user["password_hash"]);

//         if ($passwordVerif) {
//             $_SESSION["user_id"] = $user["id"];
//             $_SESSION["user_email"] = $user["email"];
//             header("Location: /view/accueil.php");
//             exit;
//         } else {
//             $error_msg = "MOT DE PASSE OU EMAIL INCORRECT";
//             echo $error_msg;
//         }
//     }
// }
