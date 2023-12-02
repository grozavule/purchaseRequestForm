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

    public static function retrieveApproverByNetId(string $netId) : Approver|null {
        $approvers = self::retrieveAllApprovers();
        foreach($approvers as $approver){
            if($approver->netid == $netId){
                return $approver;
            }
        }
        return null;
    }

    public static function retrieveAllApprovers() : array {
        if(Storage::exists('faculty.json')){
            return Storage::json('faculty.json');
        } else {
            return [];
        }
    }
}
