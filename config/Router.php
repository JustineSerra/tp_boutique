<?php

declare(strict_types=1);

class Router
{
    public function route(): void
    {
        $route = $_GET['route'] ?? 'accueil';

        match ($route) {
            'accueil' => (new ProduitController())->index(),

            default => $this->notFound(),
        };
    }

    private function notFound(): void
    {
        http_response_code(404);
        echo "Page non trouvée, t'es un gros naze ! ";
    }
}
