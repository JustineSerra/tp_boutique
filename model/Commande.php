<?php

class Commande {
    private ?int $id;
    private int $userId;
    private string $createdAt;
    private int $total;

    public function __construct(?int $id, int $userId, string $createdAt, int $total) {
        $this->id = $id;
        $this->userId = $userId;
        $this->createdAt = $createdAt;
        $this->total = $total;
    }

    public function getId(): ?int {
        return $this->id;
    }
    public function setId(?int $id): self {
        $this->id = $id;
        return $this;
    }

}
