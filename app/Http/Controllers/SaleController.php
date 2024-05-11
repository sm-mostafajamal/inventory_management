<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    //
    public function index(Request $request, Sale $sales)
    {

        $data["products"] = $sales->getAllDataWithProducts(Product::PAGE_LIMIT);
        return view('sales.index', $data);
    }
}
