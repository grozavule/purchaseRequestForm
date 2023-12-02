<?php

namespace App\Ece\PurchaseOrder;

use Illuminate\Http\UploadedFile;
use Carbon\Carbon;

class PurchaseOrder {
    private Submitter $submitter;
    private bool $isUrgent;
    private Carbon $dateNeeded;
    private Approver $approver;
    private string $projectName;
    private Vendor $vendor;
    private array $orderItems;
    private string $attachmentPath = '';
    public function __construct(){}

    public function addOrderItem(string $partNumber, string $description, string $webLink, float $unitPrice,
                                 string $unit, float $quantity): void {
        $this->orderItems[] = new Item($partNumber, $description, $webLink, $unitPrice, $unit, $quantity);
    }

    public function addSubmitter(string $submitterName, string $submitterEmailAddress): void {
        $this->submitter = new Submitter($submitterName, $submitterEmailAddress);
    }

    public function addVendor(string $name, string $address, string $website, string $fax, string $contactName,
                              string $contactEmail): void {
        $this->vendor = new Vendor($name, $address, $website, $fax, $contactName, $contactEmail);
    }

    public function calculateOrderTotal(): float {
        $total = 0;
        foreach($this->orderItems as $item){
            $total += $item->getUnitPrice() * $item->getQuantity();
        }
        return $total;
    }

    public function getSubmitter(): Submitter {
        return $this->submitter;
    }

    public function setSubmitter(Submitter $submitter): void {
        $this->submitter = $submitter;
    }

    public function isUrgent(): bool {
        return $this->isUrgent;
    }

    public function setIsUrgent(bool $isUrgent): void {
        $this->isUrgent = $isUrgent;
    }

    public function getDateNeeded(): Carbon {
        return $this->dateNeeded;
    }

    public function setDateNeeded(Carbon $dateNeeded): void {
        $this->dateNeeded = $dateNeeded;
    }

    public function getApprover(): Approver {
        return $this->approver;
    }

    public function setApprover(Approver $approver): void {
        $this->approver = $approver;
    }

    public function getProjectName(): string {
        return $this->projectName;
    }

    public function setProjectName(string $projectName): void {
        $this->projectName = $projectName;
    }

    public function getOrderItems(): array {
        return $this->orderItems;
    }

    public function getAttachmentPath(): string {
        if(strlen($this->attachmentPath) > 0){
            return $this->attachmentPath;
        } else {
            return '';
        }
    }

    public function setAttachmentPath(string $attachmentPath): void {
        $this->attachmentPath = $attachmentPath;
    }

    public function getVendor(): Vendor {
        return $this->vendor;
    }

    public function setVendor(Vendor $vendor): void {
        $this->vendor = $vendor;
    }
}
