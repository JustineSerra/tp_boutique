<?php
declare(strict_types=1);

require_once __DIR__ . "/../controller/ProduitController.php";
require_once __DIR__ . "/../controller/AdminController.php";

class Router
{
   public function route(): void
    {
        $route = $_GET['route'] ?? 'accueil';

        match ($route) {
            'accueil' => (new ProduitController())->index(),
            "logout" => $this->handleLogout(),
            "admin" => (new AdminController())->index(),

            default => $this->notFound(),
        };
    }

    private function handleLogout(): void {
        require_once __DIR__ . "/../controller/logout.php";
    }

    private function notFound(): void
    {
        http_response_code(404);
        echo "Page non trouvée, t'es un gros naze ! ";
    }
}   
?>



