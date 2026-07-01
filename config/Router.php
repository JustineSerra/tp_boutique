<?php

class Router
{
    public static function dispatch()
    {
        //1 Récup des paramètres URL
        $controller = $_GET['controller'] ?? 'Utilisateur';
        $action = $_GET['action'] ?? 'index';
        //2 Mise en forme nom du contrôleur
        $controlName = ucfirst($controller) . "Controller";
        //3 Chemin d'accès du contrôleur
        $controlFile = __DIR__ . '/../Controllers/' . $controlName . '.php';
        //4 Sécurité on vérifie si le fichier existe :
            if (!file_exists($controlFile)) {
                die("Contrôleur Introuvable !");
            }
        require_once $controlFile; 
        //5 Instanciation
        $ctrl = new $controlName();
        if (!method_exists($ctrl, $action)) {
           die("Action inexistante");
        }
        $ctrl->$action();
    } 
}
?>