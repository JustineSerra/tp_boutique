<?php 
require_once __DIR__ . "/../config/Database.php";

class CommandeRepository {

    public function addOrder(Commande $commande): Commande 
    {
        $pdo=Database::getConnexion();
        $stmt=$pdo->prepare("INSERT INTO orders (user_id, created_at, total) VALUES (:user_id, :created_at, :total)");
        $stmt->execute([
            ':user_id' => $commande->getUserId(),
            ':created_at' => $commande->getCreatedAt(),
            ':total' => $commande->getTotal()
        ]);
        $commande->setId((int)$pdo->lastInsertId());
        return $commande;
    }

    public function getOrdersByUserId(int $id): array {
        $pdo=Database::getConnexion();
        $stmt=$pdo->prepare("SELECT * FROM orders WHERE user_id = :user_id");
        $stmt->execute([':user_id' => $id]);

        $rows=$stmt->fetchAll();
        $orders = [];
        foreach ($rows as $row) {
            $orders[] = new Commande(
                (int)$row['id'],
                (int)$row['user_id'],
                $row['created_at'],
                (float)$row['total']
            );
        }

        return $orders;
    }
}