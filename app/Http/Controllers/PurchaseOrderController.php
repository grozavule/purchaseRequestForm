<?php

namespace App\Http\Controllers;

use App\Http\Requests\PurchaseOrderRequest;
use App\Ece\PurchaseOrder\Approver;

class PurchaseOrderController extends Controller
{
    public function index(){
        $faculty = Approver::retrieveAllApprovers();
        return view('purchase_order.index', ['faculty' => $faculty]);
    }

    public function store(PurchaseOrderRequest $request){
        $validInput = $request->validated();
        dd($validInput);
    }
}
