<?php

require_once __DIR__ . "/../model/Utilisateur.php";
require_once __DIR__ . "/../repository/UtilisateurRepository.php";

class UtilisateurController
{
    public function index()
    {
        $repository = new UtilisateurRepository();
        $users = $repository->getAllUser();
        require_once __DIR__ . "/../view/register.php";
    }

    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $email = $_POST["email"];
            $password = $_POST["password"];
            $role = $_POST["role"];

            if ($email !== "" && $password !== "" && $role !== "") {
                $password_hash = password_hash($password, PASSWORD_DEFAULT);
                $repository = new UtilisateurRepository();
                $repository->addUser($email, $password_hash, $role);
                header("Location: /register");
                exit;
            } else {
                echo "Veuillez remplir tous les champs.";
            }
        }
        require_once __DIR__ . "/../view/register.php";
    }

    public function delete()
    {
        $id = $_GET['id'];
        $repository = new UtilisateurRepository();
        $repository->deleteUser($id);
        header('Location: /register');
    }
}

// if (isset($_SESSION["user_id"])) {
//     // header("Location: ./view/index.php");
//     exit;
// };
