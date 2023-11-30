<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PurchaseOrderController extends Controller
{
    public function index(){
        $faculty = Storage::json('faculty.json');
        return view('purchase_order.index', ['faculty' => $faculty]);
    }
}
