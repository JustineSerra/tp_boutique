<?php

declare(strict_types=1);

class Router
{
    public function route(): void
    {
        $route = $_GET['route'] ?? 'accueil';

        match ($route) {
            'accueil'        => (new ProduitController())->index(),

            default          => $this->notFound(),
        };
    }

    // Méthode privée : gère le cas "route inconnue".
    private function notFound(): void
    {
        // http_response_code = définit le code HTTP renvoyé (404 = page non trouvée).
        http_response_code(404);
        echo 'Page non trouvée, dommage pour toi !';
    }
}

//     public static function dispatch()
//     {
//         //1 Récup des paramètres URL
//         $controller = $_GET['controller'] ?? 'Utilisateur';
//         $action = $_GET['action'] ?? 'index';
//         //2 Mise en forme nom du contrôleur
//         $controlName = ucfirst($controller) . "Controller";
//         //3 Chemin d'accès du contrôleur
//         $controlFile = __DIR__ . '/../Controllers/' . $controlName . '.php';
//         //4 Sécurité on vérifie si le fichier existe :
//             if (!file_exists($controlFile)) {
//                 die("Contrôleur Introuvable !");
//             }
//         require_once $controlFile; 
//         //5 Instanciation
//         $ctrl = new $controlName();
//         if (!method_exists($ctrl, $action)) {
//            die("Action inexistante");
//         }
//         $ctrl->$action();
//     } 
// }
// ?>