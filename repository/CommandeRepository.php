<?php 

require_once __DIR__ . "/../config/Database.php";

class CommandeRepository {

    public function addOrder(Commande $commande): bool {
        $pdo=Database::getConnexion();
        $stmt=$pdo->prepare("INSERT INTO orders (user_id, created_at, total) VALUES (:user_id, :created_at, :total)");
        
        return $stmt->execute([
            ':user_id' => $commande->getUserId(),
            ':created_at' => $commande->getCreatedAt(),
            ':total' => $commande->getTotal()
        ]);
    }

    public function getOrdersByUserId(int $userId): array {
        $pdo=Database::getConnexion();
        $stmt=$pdo->prepare("SELECT * FROM orders WHERE user_id = :user_id");
        $stmt->execute([':user_id' => $userId]);

        $rows=$stmt->fetchAll();
        $orders = [];
        foreach ($rows as $row) {
            $orders[] = new Commande(
                (int)$row['id'],
                (int)$row['user_id'],
                $row['created_at'],
                (int)$row['total']
            );
        }

        return $orders;
    }
}