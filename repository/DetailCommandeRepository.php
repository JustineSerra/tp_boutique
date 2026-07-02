<?php
require_once __DIR__ . '/../config/Database.php';

class DetailCommandeRepository
{
    //création d'une ligne de commande lorsque le panier est validé
    public function create(DetailCommande $detail): DetailCommande
    {
        $pdo = Database::getConnexion();
        $stmt = $pdo->prepare('INSERT INTO order_items (order_id, product_id, quantity, unit_price) 
                VALUES (:orderId, :productId, :quantity, :unitPrice)');
        $stmt->execute([
            ':orderId' => $detail->getOrderId(),
            ':productId' => $detail->getProductId(),
            ':quantity' => $detail->getQuantity(),
            ':unitPrice' => $detail->getUnitPrice()
        ]);
        $detail->setId((int) $pdo->lastInsertId()); 
        return $detail;
    }

    //on récupère toutes les lignes (produits achetés) d'une commande validée
    public function findByOrderId(int $orderId): array
    {
        $pdo = Database::getConnexion();
        $stmt = $pdo->prepare('SELECT * FROM order_items WHERE order_id = :orderId');
        $stmt->execute([':orderId' => $orderId]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $details = [];
        foreach ($results as $row) {
            $details[] = new DetailCommande(
                (int) $row['id'],
                (int) $row['order_id'],
                (int) $row['product_id'],
                (int) $row['quantity'],
                (float) $row['unit_price']
            );
        }
        return $details;
    }    
}

