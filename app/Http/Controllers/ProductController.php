<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    protected $product;
    public function __construct(Product $product) {
        $this->product = $product;
    }

    public function index(Request $request)
    {
        $data['products'] = $this->product->getAll(Product::PAGE_LIMIT);
        $data['product_categories'] = $this->product->product_category;

        if ($request->isMethod('POST') && $request?->action == 'delete') {
            if (!empty($request->product_id)) {
                $this->product->deleteById($request->product_id);
                return redirect()->back()->with('success', 'Product has been deleted.');
            }
        } elseif ($request->ajax() && $request->isMethod('POST')) {
            $product_id = $request->input('product_id');
            $input = $request->except(['_token', 'product_id']);
            $validator = $this->productValidation($input);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            $this->product->updateData($product_id, $input);
            $request->session()->flash('success', "$request->product_name has been updated.");
            return response()->json('success', 200);
        }

        return view('product_management.index', $data);
    }

    public function create(Request $request)
    {
        $data['product_categories'] = $this->product->product_category;

        if ($request->isMethod('POST')) {
            $validator = $this->productValidation($request->all());

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator->errors());
            }

            if ($request->hasFile('photo')) {
                $filename = time() . '.' . $request->photo?->extension();
                $request->photo->move(public_path('assets/img/'), $filename);
                $request['image'] = $filename;
            }

            $this->product->insertData($request->except('photo'));
            return redirect()->back()->withSuccess('Successfully added');
        }
        return view('product_management.add_product', $data);
    }


    private function productValidation($request)
    {
        $rules = [
            'sr_name' => 'required|string|max:100',
            'sr_company' => 'required|string|max:100',
            'sr_phone' => 'sometimes|min:11',
            'product_name' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|numeric|min:0',
            'category' => 'required|string|max:100',
            'photo' => 'sometimes|image|mimes:png,jpg,jpeg|max:2048'
        ];

        return Validator::make($request, $rules);

    }
}
