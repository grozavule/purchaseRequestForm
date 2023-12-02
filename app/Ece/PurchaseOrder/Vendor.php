<?php

namespace App\Ece\PurchaseOrder;

class Vendor
{
    public function __construct(
        private string $name,
        private string $address,
        private string $website = '',
        private string $fax = '',
        private string $contactName,
        private string $contactEmail
    ){}

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function getAddress(): string {
        return $this->address;
    }

    public function setAddress(string $address): void {
        $this->address = $address;
    }

    public function getWebsite(): string {
        return $this->website;
    }

    public function setWebsite(string $website): void {
        $this->website = $website;
    }

    public function getFax(): string {
        return $this->fax;
    }

    public function setFax(string $fax): void {
        $this->fax = $fax;
    }

    public function getContactName(): string {
        return $this->contactName;
    }

    public function setContactName(string $contactName): void {
        $this->contactName = $contactName;
    }

    public function getContactEmail(): string {
        return $this->contactEmail;
    }

    public function setContactEmail(string $contactEmail): void {
        $this->contactEmail = $contactEmail;
    }
}
