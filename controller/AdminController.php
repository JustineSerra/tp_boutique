<?php 

require_once __DIR__ . "/../repository/ProduitRepository.php";

class AdminController {
    private ProduitRepository $produitRepository;

    public function __construct() {
        $this->produitRepository = new ProduitRepository();
    }

    public function index(): void {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header("Location: index.php?route=accueil");
            exit();
        }
        $produits = $this->produitRepository->displayProducts();
        require_once __DIR__ . "/../view/admin_produits.php";
    }
}