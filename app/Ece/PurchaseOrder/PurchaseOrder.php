<?php

namespace App\Ece\PurchaseOrder;

use Illuminate\Support\Carbon;
class PurchaseOrder
{
    public function __construct(
        private Submitter $submitter,
        private bool $isUrgent,
        private Carbon $dateNeeded,
        private Approver $approver,
        private string $projectName,
        private array $orderItems = []
    ){}

    public function addOrderItem(Item $item){
        $this->orderItems[] = $item;
    }

    public function getSubmitter(): Submitter
    {
        return $this->submitter;
    }

    public function setSubmitter(Submitter $submitter): void
    {
        $this->submitter = $submitter;
    }

    public function isUrgent(): bool
    {
        return $this->isUrgent;
    }

    public function setIsUrgent(bool $isUrgent): void
    {
        $this->isUrgent = $isUrgent;
    }

    public function getDateNeeded(): Carbon
    {
        return $this->dateNeeded;
    }

    public function setDateNeeded(Carbon $dateNeeded): void
    {
        $this->dateNeeded = $dateNeeded;
    }

    public function getApprover(): Approver
    {
        return $this->approver;
    }

    public function setApprover(Approver $approver): void
    {
        $this->approver = $approver;
    }

    public function getProjectName(): string
    {
        return $this->projectName;
    }

    public function setProjectName(string $projectName): void
    {
        $this->projectName = $projectName;
    }
}
