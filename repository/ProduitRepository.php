<?php 

require_once __DIR__ . "/../config/Database.php";

class ProduitRepository {

    public function displayProducts(): array
    //récupère les produits de la base de données et les retourne sous forme d'un tableau d'objets Produit
    {
        $pdo=Database::getConnexion();
        $stmt = $pdo->query("SELECT * FROM products");
        $rows = $stmt->fetchAll(); 
        //récupère toutes les lignes de la table produit
        $produits = [];
        //sert à stocker les objets Produit
        foreach ($rows as $row) {
            $produits[] = new Produit(
            (int)$row['id'], 
            $row['name'],
            $row['description'],
            (float)$row['price']);
        }
        return $produits;
    }

    public function addProducts(Produit $produit): bool{
        //création de l'objet Produit

        $pdo=Database::getConnexion();
        $stmt=$pdo->prepare("INSERT INTO products (name, description, price) VALUES (:name, :description, :price)");
        return $stmt->execute([
            ':name' => $produit->getNom(),
            ':description' => $produit->getDescription(),
            ':price' => $produit->getPrix()
        ]);
    }

    public function modifyProducts(Produit $produit): bool{
        //modification de l'objet Produit

        $pdo=Database::getConnexion();
        $stmt=$pdo->prepare("UPDATE products SET name=:name, description=:description, price=:price WHERE id=:id");
        return $stmt->execute([
            ':id' => $produit->getId(),
            ':name' => $produit->getNom(),
            ':description' => $produit->getDescription(),
            ':price' => $produit->getPrix()
        ]);
    }

    public function deleteProducts(int $id): bool{
        //suppression de l'objet Produit

        $pdo=Database::getConnexion();
        $stmt=$pdo->prepare("DELETE FROM products WHERE id=:id");
        return $stmt->execute([
            ':id' => $id
        ]);
    }
}
