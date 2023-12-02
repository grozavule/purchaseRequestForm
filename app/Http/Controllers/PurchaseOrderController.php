<?php

namespace App\Http\Controllers;

use App\Ece\PurchaseOrder\PurchaseOrder;
use App\Exceptions\MailDeliveryFailureException;
use App\Http\Requests\PurchaseOrderRequest;
use App\Ece\PurchaseOrder\Approver;
use App\Services\PurchaseOrderService;
use Carbon\Carbon;

class PurchaseOrderController extends Controller {
    private PurchaseOrderService $service;
    public function __construct(PurchaseOrderService $service){
        $this->service = $service;
    }
    public function index(){
        $faculty = Approver::retrieveAllApprovers();
        return view('purchase_order.index', ['faculty' => $faculty]);
    }

    public function store(PurchaseOrderRequest $request){
        try {
            $validInput = $request->validated();

            $order = new PurchaseOrder();

            $order->addSubmitter($validInput['submitter-name'], $validInput['submitter-email']);
            $order->setIsUrgent(isset($validInput['urgent-request']));
            $dateNeeded = Carbon::createFromFormat('Y-m-d', $validInput['date-needed']);
            $order->setDateNeeded($dateNeeded);
            $approver = Approver::retrieveApproverByNetId($validInput['approver-name']);
            $order->setApprover($approver);
            $order->setProjectName($validInput['project-name']);
            $order->addVendor($validInput['vendor-name'], $validInput['vendor-address'],
                $validInput['vendor-website'] ?? '', $validInput['vendor-fax'] ?? '',
                $validInput['contact-name'], $validInput['contact-email']);

            foreach($validInput['item'] as $item){
                $order->addOrderItem($item['part-number'], $item['description'], $item['web-link'], $item['unit-price'],
                    $item['unit'], $item['quantity']);
            }
            if($request->hasFile('pdf-file')){
                $attachmentPath = $validInput['pdf-file']->store('pdf');
                $order->setAttachmentPath(storage_path('app/' . $attachmentPath));
            }

            $this->service->sendEmail($order);

            return redirect('/')->with('success', 'Your request was successfully sent.');
        } catch(InvalidFormatException $e){
            return redirect('/')->with('error', 'Please verify that the Date Needed is a valid date');
        } catch(MailDeliveryFailureException $e){
            return redirect('/')->with('error', 'A problem occurred when sending the request via email. Please try again later.');
        } catch(\Exception $e){
            return redirect('/')->with('error', 'Message: ' . $e->getMessage() . " File: " . $e->getFile() . " Line: " . $e->getLine() . " Code: " . $e->getCode());
        }
    }
}
