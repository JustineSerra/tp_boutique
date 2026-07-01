<?php
require_once './controller/UtilisateurController.php';

if (isset($_SESSION['user_id'])) {
    header("Location: ./view/login.php");
    exit;
} else {

 