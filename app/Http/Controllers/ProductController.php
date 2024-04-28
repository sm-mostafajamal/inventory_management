<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //
    public function index()
    {
        return view('product_management.index');
    }

    public function create(Request $request, Product $product)
    {
        if($request->isMethod('POST')) {
         $rules = [
                    'sr_name' => 'required|string|max:100',
                    'sr_company' => 'required|string|max:100',
                    'sr_phone' => 'sometimes|min:11',
                    'product_name' => 'required|string|max:100',
                    'price' => 'required|numeric|min:0',
                    'quantity' => 'required|numeric|min:0',
                    'category' => 'required|string|max:100',
                ];

                $validator = Validator::make($request->all(), $rules);

                if ($validator->fails()) {
                    return redirect()->back()->withInput()->withErrors($validator->errors());
                }

            $product->insertData($request->all());
            return redirect()->back()->withSuccess('Successfully added');
        }
        return view('product_management.add_product');
    }
}
