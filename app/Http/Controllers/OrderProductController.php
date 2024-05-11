<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;

class OrderProductController extends Controller
{
    protected $product;
    protected $sale;
    public function __construct(Product $product, Sale $sale) {
        $this->product = $product;
        $this->sale = $sale;
    }
    public function index(Request $request)
    {
        $product = new Product();
        $data["products"] = $this->product->getDataByFilters(['id', 'product_name']);
        if($request->ajax()){
            if(!empty($request['product_id'])) {
                return response()->json($this->product->getById($request['product_id']));
            }
            return response()->json();
        }
        return view('order_product.index', $data);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $selected_products = $this->product->getById($input['selected_product_id']);

        foreach($selected_products as $selected_product) {
            $data = [
                'product_id' => $selected_product->id,
                'product_price' => $selected_product->price,
                'ordered_quantity' => $input['quantity'][$selected_product->id],
                'product_total_amount' => $selected_product->price * $input['quantity'][$selected_product->id]
            ];

            $this->sale->insertData($data);
            $updated_quantity = $selected_product->quantity - $input['quantity'][$selected_product->id];
            $this->product->updateData($selected_product->id, ['quantity' => $updated_quantity]);
        }
        return redirect()->back()->withSuccess('Ordered has been done successfully!');
    }
}
