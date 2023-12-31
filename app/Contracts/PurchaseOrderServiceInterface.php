<?php

namespace App\Contracts;

use App\Ece\PurchaseOrder\PurchaseOrder;
use Illuminate\Http\Request;

interface PurchaseOrderServiceInterface {
    public function sendEmail(PurchaseOrder $order) : void;
}
