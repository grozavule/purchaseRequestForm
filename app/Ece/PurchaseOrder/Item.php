<?php

namespace App\Ece\PurchaseOrder;

class Item {
    public function __construct(
        private string $partNumber,
        private string $description,
        private string $webLink = '',
        private float $unitPrice,
        private string $unit,
        private float $quantity
    ){}

    public function getPartNumber(): string {
        return $this->partNumber;
    }

    public function setPartNumber(string $partNumber): void {
        $this->partNumber = $partNumber;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }

    public function getWebLink(): string {
        return $this->webLink;
    }

    public function setWebLink(string $webLink): void {
        $this->webLink = $webLink;
    }

    public function getUnitPrice(): float {
        return $this->unitPrice;
    }

    public function setUnitPrice(float $unitPrice): void {
        $this->unitPrice = $unitPrice;
    }

    public function getUnit(): string {
        return $this->unit;
    }

    public function setUnit(string $unit): void {
        $this->unit = $unit;
    }

    public function getQuantity(): float {
        return $this->quantity;
    }

    public function setQuantity(float $quantity): void {
        $this->quantity = $quantity;
    }
}
