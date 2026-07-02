<?php 

require_once __DIR__ . "/../model/Produit.php";
require_once __DIR__ . "/../config/Database.php";

class ProduitRepository {

    public function displayProducts(): array
    //récupère les produits de la base de données et les retourne sous forme d'un tableau d'objets Produit
    {
        $pdo=Database::getConnexion();
        $stmt = $pdo->query("SELECT * FROM produit");
        $rows = $stmt->fetchAll(); 
        //récupère toutes les lignes de la table produit
        $produits = [];
        //sert à stocker les objets Produit
        foreach ($rows as $row) {
            $produits[] = new Produit($row['id'], $row['nom'], $row['description'], (float)$row['prix']);
        }
        return $produits;
    }

    public function addProducts(Produit $produit): bool{
        //création de l'objet Produit

        $pdo=Database::getConnexion();
        $stmt=$pdo->prepare("INSERT INTO produit (nom, description, prix) VALUES (:nom, :description, :prix)");
        return $stmt->execute([
            ':nom' => $produit->getNom(),
            ':description' => $produit->getDescription(),
            ':prix' => $produit->getPrix()
        ]);
    }

    public function modifyProducts(Produit $produit): bool{
        //modification de l'objet Produit

        $pdo=Database::getConnexion();
        $stmt=$pdo->prepare("UPDATE produit SET nom=:nom, description=:description, prix=:prix WHERE id=:id");
        return $stmt->execute([
            ':id' => $produit->getId(),
            ':nom' => $produit->getNom(),
            ':description' => $produit->getDescription(),
            ':prix' => $produit->getPrix()
        ]);
    }

    public function deleteProducts(int $id): bool{
        //suppression de l'objet Produit

        $pdo=Database::getConnexion();
        $stmt=$pdo->prepare("DELETE FROM produit WHERE id=:id");
        return $stmt->execute([
            ':id' => $id
        ]);
    }
}