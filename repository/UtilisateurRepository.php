<?php
require_once __DIR__ . "/../config/Database.php";

class UtilisateurRepository
{
    public function getAllUser(): array
    {
        $pdo = Database::getConnexion();
        $stmt = $pdo->query("SELECT * FROM users");
        $rows = $stmt->fetchAll();
        $users = [];
        foreach($rows as $row) {
            $users[] = new Utilisateur($row['id'], $row['email'], $row['password_hash'], $row['role']);
        }
        return $users;
    }

    public function addUser(string $email, string $password_hash, string $role)
    {
        $pdo = Database::getConnexion();
        $stmt = $pdo->prepare("INSERT INTO users (email, password_hash, role) VALUES (:email, :hash, :role)");
        $stmt->execute([':email' => $email, ':hash' => $password_hash, ':role' => $role]);
    }

    public function deleteUser(int $id)
    {
        $pdo = Database::getConnexion();
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
}