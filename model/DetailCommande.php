<?php
declare(strict_types=1);

class DetailCommande
{
    private int $id;
    private int $orderId;
    private int $productId;
    private int $quantity;
    private float $unitPrice;  

    public function __construct(int $id, int $orderId, int $productId, int $quantity, float $unitPrice)
    {
        $this->id = $id;
        $this->orderId = $orderId;
        $this->productId = $productId;
        $this->quantity = $quantity;
        $this->unitPrice = $unitPrice;
    }

    // Getters and Setters
    public function getId(): int
    {
        return $this->id;
    }
    
    public function getOrderId(): int
    {
        return $this->orderId;
    }

    public function getProductId(): int
    {
        return $this->productId;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getUnitPrice(): float
    {
        return $this->unitPrice;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setOrderId(int $orderId): void
    {
        $this->orderId = $orderId;
    }

    public function setProductId(int $productId): void
    {
        $this->productId = $productId;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function setUnitPrice(float $unitPrice): void
    {
        $this->unitPrice = $unitPrice;
    }   
}