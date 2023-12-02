<?php

namespace App\Ece\PurchaseOrder;

use Illuminate\Support\Facades\Storage;

class Approver
{
    public function __construct(
        private string $firstName,
        private string $lastName,
        private string $jobTitle,
        private string $displayName,
        private string $netId
    ){}

    public function getFirstName(): string {
        return $this->firstName;
    }

    public function getLastName(): string {
        return $this->lastName;
    }

    public function getJobTitle(): string {
        return $this->jobTitle;
    }

    public function getDisplayName(): string {
        return $this->displayName;
    }

    public function getNetId(): string {
        return $this->netId;
    }

    public static function retrieveApproverByNetId(string $netId): Approver|null {
        $approvers = self::retrieveAllApprovers();
        foreach($approvers as $approver){
            if($approver['netid'] == $netId){
                return new Approver($approver['firstname'], $approver['lastname'], $approver['jobtitle'],
                    $approver['displayname'], $approver['netid']);
            }
        }
        return null;
    }

    public static function retrieveAllApprovers(): array {
        if(Storage::exists('faculty.json')){
            return Storage::json('faculty.json');
        } else {
            return [];
        }
    }
}
