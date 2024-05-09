<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class OrderProductController extends Controller
{
    public function index(Request $request)
    {
        $product = new Product();
        $data["products"] = $product->getDataByFilters(['id', 'product_name']);
        if($request->ajax()){
            if(!empty($request['product_id'])) {
                return response()->json($product->getById($request['product_id']));
            }
            return response()->json();
        }
        return view('order_product.index', $data);
    }

    public function store()
    {

    }
}
