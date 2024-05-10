<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
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

    public function store(Request $request, Product $productObj)
    {
        $input = $request->all();
        $selected_products = $productObj->getById($input['selected_product_id']);
        $salesObj = (new Sale());
        foreach($selected_products as $product) {
            $data = [
                'product_id' => $product->id,
                'product_price' => $product->price,
                'ordered_quantity' => $input['quantity'][$product->id],
                'product_total_amount' => $product->price * $input['quantity'][$product->id]
            ];
            $res = $salesObj->insertData($data);
            if(!empty($res)) {
                return redirect()->back()->withSuccess('Ordered has been done successfully!');
            }
        }
    }
}
