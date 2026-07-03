<?php

require_once __DIR__ . "/../repository/ProduitRepository.php";
require_once __DIR__ . "/../model/Produit.php";

class ProduitController
{
    // private ProduitRepository $produitRepository;

    // public function __construct() {
    //     $this->produitRepository = new ProduitRepository();
    // }

    public function index(): void
    {

        // $listeProduits=$this->produitRepository->displayProducts();
        $repository = new ProduitRepository();
        $produits = $repository->displayProducts();
        require_once __DIR__ . "/../view/accueil.php";
    }

    public function add(string $nom, string $description, float $prix): bool
    {
        $produit = new Produit(null, $nom, $description, $prix);

        return $this->produitRepository->addProducts($produit);
    }

    public function modify(int $id, string $nom, string $description, float $prix): bool
    {
        $produit = new Produit($id, $nom, $description, $prix);

        return $this->produitRepository->modifyProducts($produit);
    }

    public function delete(int $id): bool
    {
        return $this->produitRepository->deleteProducts($id);
    }
}
