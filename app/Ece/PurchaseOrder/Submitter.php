<?php

namespace App\Ece\PurchaseOrder;

class Submitter
{
    public function __construct(
       protected string $name,
       protected string $emailAddress
    ){}

    public function getName() : string {
        return $this->name;
    }

    public function getEmailAddress() : string {
        return $this->emailAddress;
    }

    public function setName(string $name) : void {
        $this->name = $name;
    }

    public function setEmailAddress(string $email) : void {
        $this->emailAddress = $email;
    }
}
