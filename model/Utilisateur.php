<?php
declare(strict_types=1);

class Utilisateur
{
    //propriétés privées afin de protéger les données de l'objet
    private int $id; 
    private string $email;
    private string $password_hash;
    private string $role;

    //permet la création d'un utilisateur avec des valeurs par défaut
    public function __construct(int $id, string $email, string $password_hash, string $role)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password_hash = $password_hash;
        $this->role = $role;
    }

    //Lire et modifier les données de l'objet via des méthodes publiques (getters et setters)
    public function getId(): int 
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPasswordHash(): string
    {
        return $this->password_hash;
    }

    public function setPasswordHash(string $password_hash): void
    {
        $this->password_hash = $password_hash;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function setRole(string $role): void
    {
        $this->role = $role;
    }
}


