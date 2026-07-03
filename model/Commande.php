<?php
declare(strict_types=1);

class Commande {
    private ?int $id;
    private int $userId;
    private string $createdAt;
    private float $total;

    public function __construct(?int $id, int $userId, string $createdAt, float $total) {
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

    public function getUserId(): int {
        return $this->userId;
    }
    public function setUserId(int $userId): self {
        $this->userId = $userId;
        return $this;
    }

    public function getCreatedAt(): string {
        return $this->createdAt;
    }
    public function setCreatedAt(string $createdAt): self {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getTotal(): float {
        return $this->total;
    }
    public function setTotal(float $total): self {
        $this->total = $total;
        return $this;
    }

}
