<?php
declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/config/Router.php';
require_once __DIR__ . '/config/Database.php';
require_once __DIR__ . '/controller/AdminController.php';

$route = new Router();
$route->route();
?>
