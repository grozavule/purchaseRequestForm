<?php

namespace App\Services;

use App\Contracts\PurchaseOrderServiceInterface;
use App\Ece\PurchaseOrder\PurchaseOrder;
use App\Mail\PurchaseOrderRequested;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class PurchaseOrderService implements PurchaseOrderServiceInterface {
    public function sendEmail(PurchaseOrder $order): void {
        Mail::to(env('MAIL_TO_ADDRESS'))
            ->cc($order->getSubmitter()->getEmailAddress())
            ->send(new PurchaseOrderRequested($order));
        if(Mail::failures()){
            throw new MailDeliveryFailureException();
        }
    }
}
