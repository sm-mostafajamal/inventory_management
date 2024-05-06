<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class OrderProductController extends Controller
{
    public function index(Request $request)
    {
        $data["products"] = (new Product())->getAll();
        if($request->ajax()){
            dd($request->all());
        }
        return view('order_product.index', $data);
    }

    public function store()
    {

    }
}
