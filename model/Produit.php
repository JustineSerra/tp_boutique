<?php
declare(strict_types=1);

class Produit {
    //propriétés privées afin de protéger les données de l'objet
    private ?int $id;
    private string $nom;
    private string $description;
    private float $prix;

    //permet la création d'un produit avec des valeurs par défaut
    public function __construct(?int $id=null, string $nom="", string $description="", float $prix=0.0) {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->prix = $prix;
    }

    //Lire et modifier les données de l'objet via des méthodes publiques (getters et setters)
    public function getId(): ?int {
        return $this->id;
    }
    public function setId(?int $id): self {
        $this->id = $id;
        return $this;
    }
    public function getNom(): string {
        return $this->nom;
    }
    public function setNom(string $nom): self {
        $this->nom = $nom;
        return $this;
    }
    public function getDescription(): string {
        return $this->description;
    }
    public function setDescription(string $description): self {
        $this->description = $description;
        return $this;
    }
    public function getPrix(): float {
        return $this->prix;
    }
    public function setPrix(float $prix): self {
        $this->prix = $prix;
        return $this;
    }
}
?>