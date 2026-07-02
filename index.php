<?php
declare(strict_types=1);

session_start();

require_once __DIR__ . '/config/Database.php';
require_once __DIR__ . '/config/Router.php';
require_once __DIR__ . '/controller/ProduitController.php';

$route = new Router();
$route->route();
?>
